<?php
	
	add_action( 'wp_ajax_questionSpeaker', 'questionSpeaker' );
	add_action( 'wp_ajax_nopriv_questionSpeaker', 'questionSpeaker' );
	
	function questionSpeaker(){
		
		$form_name    = empty( $_POST[ 'name' ] ) ? '' : esc_attr( $_POST[ 'name' ] );
		$form_message = empty( $_POST[ 'message' ] ) ? '' : esc_attr( $_POST[ 'message' ] );
		$form_email   = empty( $_POST[ 'email' ] ) ? '' : esc_attr( $_POST[ 'email' ] );
		$programName  = empty( $_POST[ 'programName' ] ) ? '' : esc_attr( $_POST[ 'programName' ] );
		$speakerName  = empty( $_POST[ 'speakerName' ] ) ? '' : esc_attr( $_POST[ 'speakerName' ] );
		
		if (!filter_var( $form_email, FILTER_VALIDATE_EMAIL )) {
			$response[ 'status' ] = 0;
			$response[ 'text' ]   = "$form_email is not a valid email address";
			echo json_encode( $response );
			wp_die();
			return;
		}
		
		
		$msg = "<p><strong>От: </strong><span>" . $form_name . "</span></p>
			<p><strong>Email: </strong><span>" . $form_email . "</span></p>
			<p><strong>Программа: </strong><span>" . $programName . "</span></p>
			<p><strong>Спикер: </strong><span>" . $speakerName . "</span></p>
			<p><strong>Message: </strong><span>" . $form_message . "</span></p>";
		
		$mail_to = carbon_get_theme_option( 'partnership_mail' );
		$subject = 'Вопрос для '. $speakerName . '. Семинар "' . $programName.'"';
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