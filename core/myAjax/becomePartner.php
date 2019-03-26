<?php
	add_action( 'wp_ajax_sendForm', 'sendForm' );
	add_action( 'wp_ajax_nopriv_sendForm', 'sendForm' );
	
	function sendForm() {
		
		$form_name  = empty( $_POST['username'] ) ? '' : esc_attr( $_POST['username'] );
		$form_message = empty( $_POST['usermessage'] ) ? '' : esc_attr( $_POST['usermessage'] );
		$form_email = empty( $_POST['useremail'] ) ? '' : esc_attr( $_POST['useremail'] );
		
		if (filter_var($form_email, FILTER_VALIDATE_EMAIL)) {
			echo("$form_email is a valid email address");
		} else {
			echo("$form_email is not a valid email address");
			wp_die();
			return;
		}
		
		
		$msg      = "имя: " . $form_name . "</br>
				 Телефон: " . $form_message . "</br>";
		$mail_to  = carbon_get_theme_option('partnership_mail');
		$subject ='The subject';
		$headers = 'From: <'.$form_email.'>' . "\r\n";
		
		if (wp_mail($mail_to,$subject,$msg,$headers)){
			$response = 'сообщение отправлено';
		}else{
			$response = 'ошибка при отправке';
		}
		
		
		echo $response;
		wp_die();
	}