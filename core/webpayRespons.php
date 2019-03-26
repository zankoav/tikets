<?php
	function ifPaymentWasCorrect(){
		$nameWP = carbon_get_theme_option('webpay_user_name');
		$passwordWP = carbon_get_theme_option('webpay_user_password');
		$payment_mode = carbon_get_theme_option('payment_test_mode');
		$urlTarget = 'https://sandbox.webpay.by';
		
		if ($payment_mode == 0){
			$urlTarget = 'https://billing.webpay.by';
		}
		$orderId       = $_GET[ 'wsb_order_num' ];
		$transactionId = $_GET[ 'wsb_tid' ];
		
		if (empty( $orderId ) || empty( $transactionId )) {
			return;
		}
		
		$order = wc_get_order( $orderId );
		try {
			$order->set_transaction_id( $transactionId );
		} catch(WC_Data_Exception $e) {
			var_dump( $e );
		}
		
		
		$postdata = '*API=&API_XML_REQUEST=' . urlencode( '<?xml version="1.0" encoding="ISO-8859-1" ?>
<wsb_api_request>
<command>get_transaction</command>
<authorization>
<username>'.$nameWP.'</username>
<password>' . md5( $passwordWP ) . '</password>
</authorization>
<fields>
<transaction_id>' . $order->get_transaction_id() . '</transaction_id>
</fields>
</wsb_api_request>' );
		
		$curl = curl_init( $urlTarget );
		curl_setopt( $curl, CURLOPT_HEADER, 0 );
		curl_setopt( $curl, CURLOPT_POST, 1 );
		curl_setopt( $curl, CURLOPT_POSTFIELDS, $postdata );
		curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
		$response = curl_exec( $curl );
		curl_close( $curl );
		$result =  simplexml_load_string($response);
		
		if ($result->fields->payment_type == 1 || $result->fields->payment_type == 4 || $result->fields->payment_type == 10){
			$order->update_status('completed');
		}elseif($result->fields->payment_type == 5 || $result->fields->payment_type == 7 || $result->fields->payment_type == 9){
			$order->update_status('failed');
		}
		
	}