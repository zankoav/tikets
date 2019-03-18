<?php
	
	function create_order(){
		global $woocommerce;
		
		$address = [
			'first_name' => 'Remi',
			'last_name'  => 'Corson',
			'company'    => 'Automattic',
			'email'      => 'no@spam.com',
			'phone'      => '123-123-123',
			'address_1'  => '123 Main Woo st.',
			'address_2'  => '',
			'city'       => 'San Francisco',
			'state'      => 'Ca',
			'postcode'   => '92121',
			'country'    => 'US',
		];
		
		// Now we create the order
		$order = wc_create_order();
		
		// The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
		$order->add_product( get_product( 99 ), 1 ); // Use the product IDs to add
		
		// Set addresses
		$order->set_address( $address, 'billing' );
		$order->set_address( $address, 'shipping' );
		
		// Set payment gateway
		$payment_gateways = WC()->payment_gateways->payment_gateways();
		$order->set_payment_method( $payment_gateways[ 'bacs' ] );
		
		// Calculate totals
		$order->calculate_totals();
		$order->update_status( 'Completed', 'Order created dynamically - ', TRUE );
	}