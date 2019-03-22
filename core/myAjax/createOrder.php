<?php
	
	if (!defined( 'ABSPATH' )) {
		exit();
	}
	
	add_action( 'wp_ajax_createOrder', 'createOrder' );
	add_action( 'wp_ajax_nopriv_createOrder', 'createOrder' );
	function createOrder(){
		$form_data = [
			'customer_address' => empty( $_POST[ 'customer_address' ] ) ? '' : esc_attr( $_POST[ 'customer_address' ] ),
			'customer_name'    => empty( $_POST[ 'customer_name' ] ) ? '' : esc_attr( $_POST[ 'customer_name' ] ),
			'item_name'        => empty( $_POST[ 'item_name' ] ) ? '' : esc_attr( $_POST[ 'item_name' ] ),
			'item_price'       => empty( $_POST[ 'item_price' ] ) ? '' : esc_attr( $_POST[ 'item_price' ] ),
			'item_quantity'    => empty( $_POST[ 'item_quantity' ] ) ? '' : esc_attr( $_POST[ 'item_quantity' ] ),
			'product_id'       => empty( $_POST[ 'product_id' ] ) ? '' : esc_attr( $_POST[ 'product_id' ] ),
			'ticket_type'      => empty( $_POST[ 'ticket_type' ] ) ? '' : esc_attr( $_POST[ 'ticket_type' ] ),
			'wsb_email'        => empty( $_POST[ 'wsb_email' ] ) ? '' : esc_attr( $_POST[ 'wsb_email' ] ),
		];
		
		if (!filter_var( $form_data[ 'wsb_email' ], FILTER_VALIDATE_EMAIL )) {
			$response[ 'status' ] = 2;
			echo json_encode( $response );
			wp_die();
		}
		
		$orderInfo      = createOrderEntity( $form_data );
		$wsb_secret_key = carbon_get_theme_option( 'wsb_secret_key' );
		$wsb_storeid    = carbon_get_theme_option( 'wsb_storeid' );
		$wsb_order_num  = $orderInfo[ 'orderId' ];
		$wsb_total      = $orderInfo[ 'totalPrice' ];
		$wsb_seed       = time();
		
		$wsb_signature_origin = $wsb_seed . $wsb_storeid . $wsb_order_num . '1' . 'BYN' . $wsb_total . $wsb_secret_key;
		$wsb_signature        = md5( $wsb_signature_origin );
		
		$response = [
			'wsb_order_num' => $orderInfo[ 'orderId' ],
			'wsb_total'     => $orderInfo[ 'totalPrice' ],
			'wsb_signature' => $wsb_signature,
			'wsb_seed'      => $wsb_seed,
		];
		
		echo json_encode( $response );
		wp_die();
	}
	
	
	function createOrderEntity($form_data){
		$address = [
			'first_name' => $form_data[ 'customer_name' ],
			'last_name'  => '',
			'company'    => '',
			'email'      => $form_data[ 'wsb_email' ],
			'phone'      => '',
			'address_1'  => $form_data[ 'customer_address' ],
			'address_2'  => '',
			'city'       => '',
			'state'      => '',
			'postcode'   => '',
			'country'    => '',
		];
		
		$product_id        = (int)$form_data[ 'product_id' ];
		$order             = wc_create_order();
		$membershipProduct = new WC_Product_Variable( $product_id );
		$quantity          = (int)$form_data[ 'item_quantity' ];
		$ticket_type       = $form_data[ 'ticket_type' ];
		
		$theMemberships = $membershipProduct->get_available_variations();
		
		$variationsArray = [];
		foreach($theMemberships as $membership) {
			if ($membership[ "attributes" ][ "attribute_pa_tip-bileta" ] == $ticket_type) {
				$variationID                    = $membership[ 'variation_id' ];
				$variationsArray[ 'variation' ] = $membership[ 'attributes' ];
			}
		}
		
		if ($variationID) {
			$varProduct = new WC_Product_Variation( $variationID );
			
			$order->add_product( $varProduct, $quantity, $variationsArray );
			$order->set_address( $address, 'billing' );
			$order->set_address( $address, 'shipping' );
			$order->calculate_totals();
			$order->update_status( 'processing' );
		}
		
		
		return [
			'orderId'    => $order->get_id(),
			'totalPrice' => $order->get_total(),
		];
	}