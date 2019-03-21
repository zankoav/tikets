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
		
//		createOrderEntity( $form_data );
//		echo json_encode( $response );
		wp_die();
	}
	
	
	
	function createOrderEntity($form_data){
		$address = array(
			'first_name' => $form_data['customer_name'],
			'last_name'  => '',
			'company'    => '',
			'email'      => $form_data['wsb_email'],
			'phone'      => '',
			'address_1'  => $form_data['customer_address'],
			'address_2'  => '',
			'city'       => '',
			'state'      => '',
			'postcode'   => '',
			'country'    => ''
		);
		
		$order = wc_create_order();
		
		// add products from cart to order
//		$items = WC()->cart->get_cart();
		foreach($items as $values) {
			$product_id = $values['product_id'];
			$product = wc_get_product($product_id);
			$var_id = $values['variation_id'];
			$var_slug = $values['variation']['attribute_pa_weight'];
			$quantity = (int)$values['quantity'];
			$variationsArray = array();
			$variationsArray['variation'] = array(
				'pa_weight' => $var_slug
			);
			$var_product = new WC_Product_Variation($var_id);
			$order->add_product($var_product, $quantity, $variationsArray);
		}
		
		$order->set_address( $address, 'billing' );
		$order->set_address( $address, 'shipping' );
		
		$order->calculate_totals();
		$order->update_status( 'processing' );
		
		WC()->cart->empty_cart();
	}