<?php
	add_filter( 'wp_mail_content_type', 'set_html_content_type' );
	function set_html_content_type(){
		return "text/html";
	}
	
	add_action( 'wp_ajax_sendForm', 'sendForm' );
	add_action( 'wp_ajax_nopriv_sendForm', 'sendForm' );
	
	function sendForm(){
		
		$form_name    = empty( $_POST[ 'name' ] ) ? '' : esc_attr( $_POST[ 'name' ] );
		$form_message = empty( $_POST[ 'message' ] ) ? '' : esc_attr( $_POST[ 'message' ] );
		$form_email   = empty( $_POST[ 'email' ] ) ? '' : esc_attr( $_POST[ 'email' ] );
		$message      = empty( $_POST[ 'spam' ] ) ? '' : esc_attr( $_POST[ 'spam' ] );
		
		if (!filter_var( $form_email, FILTER_VALIDATE_EMAIL )) {
			$response[ 'status' ] = 0;
			$response[ 'text' ]   = "$form_email is not a valid email address";
			echo json_encode( $response );
			wp_die();
			return;
		}
//		if (!empty( $message )) {
//			$response[ 'status' ] = 0;
//			echo json_encode( $response );
//			wp_die();
//			return;
//		}
		
		
		$msg = "<p><strong>Name: </strong><span>" . $form_name . "</span></p>
			<p><strong>Email: </strong><span>" . $form_email . "</span></p>
			<p><strong>Message: </strong><span>" . $form_message . "</span></p>";
		
		$mail_to = carbon_get_theme_option( 'partnership_mail' );
		$subject = 'Партнерство';
		$headers = 'From:' . $form_email . ' <' . $form_email . '>' . "\r\n";
		
		if (wp_mail( $mail_to, $subject, $msg, $headers )) {
			$response[ 'text' ]   = 'сообщение отправлено';
			$response[ 'status' ] = 1;
		} else {
			$response[ 'text' ]   = 'ошибка при отправке';
			$response[ 'status' ] = 0;
		}
		
		echo json_encode( $response );
		wp_die();
	}