<?php
	
	if (!defined( 'ABSPATH' )) {
		exit();
	}
	
	add_action( 'wp_ajax_createOrder', 'createOrder' );
	add_action( 'wp_ajax_nopriv_createOrder', 'createOrder' );
	function createOrder(){
		$form_data = [
			'customer_name' => empty( $_POST[ 'name' ] ) ? '' : esc_attr( $_POST[ 'name' ] ),
			'item_quantity' => empty( $_POST[ 'ticketCount' ] ) ? '' : esc_attr( $_POST[ 'ticketCount' ] ),
			'product_id'    => empty( $_POST[ 'programId' ] ) ? '' : esc_attr( $_POST[ 'programId' ] ),
			'ticket_type'   => empty( $_POST[ 'tariffId' ] ) ? '' : esc_attr( $_POST[ 'tariffId' ] ),
			'wsb_email'     => empty( $_POST[ 'email' ] ) ? '' : esc_attr( $_POST[ 'email' ] ),
			'phone'         => empty( $_POST[ 'phone' ] ) ? '' : esc_attr( $_POST[ 'phone' ] ),
		];
		
		//error if wrong email
		if (!filter_var( $form_data[ 'wsb_email' ], FILTER_VALIDATE_EMAIL )) {
			$response[ 'status' ] = 0;
			echo json_encode( $response );
			wp_die();
			return;
		}
		foreach($form_data as $form_datum) {
			if (empty($form_data)){
				$response[ 'status' ] = 0;
				echo json_encode( $response );
				wp_die();
				return;
			}
		}
		
		$orderInfo     = createOrderEntity( $form_data );
		$product       = wc_get_product( $form_data[ 'product_id' ] );
		$wsb_order_num = $orderInfo[ 'orderId' ];
		$wsb_total     = $orderInfo[ 'totalPrice' ];
		
		$wsb_secret_key        = carbon_get_theme_option( 'wsb_secret_key' );
		$wsb_storeid           = carbon_get_theme_option( 'wsb_storeid' );
		
		
		$wsb_return_url        = get_permalink((int)$form_data['product_id']);
		$wsb_cancel_return_url = carbon_get_theme_option( 'wsb_cancel_return_url' );
		$wsb_notify_url        = carbon_get_theme_option( 'wsb_notify_url' );
		$wsb_seed              = time();
		
		$test_mode           = carbon_get_theme_option( 'payment_test_mode' );
		$wsb_signature_origin = $wsb_seed . $wsb_storeid . $wsb_order_num . $test_mode . 'BYN' . $wsb_total . $wsb_secret_key;
		$wsb_signature        = sha1( $wsb_signature_origin );
		
//		update_post_meta($orderInfo[ 'orderId' ], 'webpay_signature', $wsb_signature);
//		update_post_meta($orderInfo[ 'orderId' ], 'webpay_feed', $wsb_seed);
		
		$response = [
			'wsb_order_num'                => $orderInfo[ 'orderId' ],
			'wsb_total'                    => $orderInfo[ 'totalPrice' ],
			'wsb_signature'                => $wsb_signature,
			'wsb_seed'                     => $wsb_seed,
			'wsb_customer_name'            => $form_data[ 'customer_name' ],
			'wsb_invoice_item_name[0]'     => $product->get_title() . '(' . $orderInfo[ '$variationName' ] . ')',
			'wsb_invoice_item_price[0]'    => $orderInfo[ 'price' ],
			'wsb_invoice_item_quantity[0]' => $form_data[ 'item_quantity' ],
			'wsb_email'                    => $form_data[ 'wsb_email' ],
			'wsb_storeid'                  => $wsb_storeid,
			'*scart',
			'wsb_currency_id'              => 'BYN',
			'wsb_version'                  => '2',
			'wsb_test'                     => '1',
			'wsb_return_url'               => get_permalink($wsb_return_url ),
			'wsb_cancel_return_url'        => get_permalink($wsb_cancel_return_url),
			'wsb_notify_url'               => get_permalink($wsb_notify_url),
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
		$ticket_type       = (int)$form_data[ 'ticket_type' ];
		
		$variationName = '';
		$price         = '';
		
		$theMemberships  = $membershipProduct->get_available_variations();
		$variationsArray = [];
		foreach($theMemberships as $membership) {
			if ((int)$membership[ 'variation_id' ] == $ticket_type) {
				$variationID                    = $membership[ 'variation_id' ];
				$variationsArray[ 'variation' ] = $membership[ 'attributes' ];
				$variationName                  = $membership[ "attributes" ][ "attribute_pa_tip-bileta" ];
				$price                          = $membership[ 'display_regular_price' ];
			}
		}
		
		if ($variationID) {
			$varProduct = new WC_Product_Variation( $variationID );
			
			$order->add_product( $varProduct, $quantity, $variationsArray );
			$order->set_address( $address, 'billing' );
			$order->set_address( $address, 'shipping' );
			$order->calculate_totals();
			$order->update_status( 'pending' );
		}
		
		
		return [
			'orderId'        => $order->get_id(),
			'totalPrice'     => $order->get_total(),
			'$variationName' => $variationName,
			'price'          => $price,
		];
	}