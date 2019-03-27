<?php
	add_filter( 'wp_mail_content_type', 'set_html_content_type' );
	function set_html_content_type(){
		return "text/html";
	}
	
	add_action( 'wp_ajax_sendForm', 'sendForm' );
	add_action( 'wp_ajax_nopriv_sendForm', 'sendForm' );
	
	function sendForm(){
		
		$form_name    = empty( $_POST[ 'username' ] ) ? '' : esc_attr( $_POST[ 'username' ] );
		$form_message = empty( $_POST[ 'usermessage' ] ) ? '' : esc_attr( $_POST[ 'usermessage' ] );
		$form_email   = empty( $_POST[ 'useremail' ] ) ? '' : esc_attr( $_POST[ 'useremail' ] );
		
		if (filter_var( $form_email, FILTER_VALIDATE_EMAIL )) {
			//echo("$form_email is a valid email address");
		} else {
			echo("$form_email is not a valid email address");
			wp_die();
			return;
		}
		
		
		$msg = "<p><strong>Name: </strong><span>" . $form_name . "</span></p>
			<p><strong>Email: </strong><span>" . $form_email . "</span></p>
			<p><strong>Message: </strong><span>" . $form_message . "</span></p>";
		
		$mail_to = carbon_get_theme_option( 'partnership_mail' );
		$subject = 'Партнерство';
		$headers = 'From:'. $form_email .' <' . $form_email . '>' . "\r\n";
		
		if (wp_mail( $mail_to, $subject, $msg, $headers )) {
			$response = 'сообщение отправлено';
		} else {
			$response = 'ошибка при отправке';
		}
		
		
		echo $response;
		wp_die();
	}