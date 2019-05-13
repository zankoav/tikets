<?php
	add_action( 'wp_ajax_sendFormTo', 'sendFormTo' );
	add_action( 'wp_ajax_nopriv_sendFormTo', 'sendFormTo' );
	
	function sendFormTo(){
		
		$form_name    = empty( $_POST[ 'name' ] ) ? '' : esc_attr( $_POST[ 'name' ] );
		$form_email   = empty( $_POST[ 'email' ] ) ? '' : esc_attr( $_POST[ 'email' ] );
        $form_komp    = empty( $_POST[ 'komp' ] ) ? '' : esc_attr( $_POST[ 'komp' ] );
        $form_col   = empty( $_POST[ 'col' ] ) ? '' : esc_attr( $_POST[ 'col' ] );
        $form_phone    = empty( $_POST[ 'phone' ] ) ? '' : esc_attr( $_POST[ 'phone' ] );
        $programId    = empty( $_POST[ 'programId' ] ) ? '' : esc_attr( $_POST[ 'programId' ] );

		
		if (!filter_var( $form_email, FILTER_VALIDATE_EMAIL )) {
			$response[ 'status' ] = 0;
			$response[ 'text' ]   = "$form_email is not a valid email address";
            $response[ 'form_email' ] = $form_email;
			echo json_encode( $response , JSON_UNESCAPED_UNICODE);
			wp_die();
			return;
		}
		if (empty($programId)){

            $response[ 'programId' ] = $programId;
            $response[ 'status' ] = 0;
            $response[ 'text' ]   = "program Id is empty";
            echo json_encode( $response , JSON_UNESCAPED_UNICODE);
            wp_die();
//            $programId = 188;
        }

		$post = get_post($programId);

		$msg = "<p><strong>От: </strong><span>" . $form_name . "</span></p>
			<p><strong>Телефон: </strong><span>" . $form_phone . "</span></p> 
			<p><strong>Email: </strong><span>" . $form_email . "</span></p>
			<p><strong>Компания: </strong><span>" . $form_komp . "</span></p> 
			<p><strong>Программа: </strong><span>" . $post->post_title . "</span></p>
			<p><strong>Количество билетов: </strong><span>" . $form_col . "</span></p> ";
		
		$mail_to = carbon_get_theme_option( 'partnership_mail' );
		$subject = 'Заказ билетов юртдтческим лицом на семинар "' . $post->post_title.'"';
		$headers = 'From:' . $form_email . ' <' . $form_email . '>' . "\r\n";
		
		if (wp_mail( $mail_to, $subject, $msg, $headers )) {
			$response[ 'text' ]   = 'сообщение отправлено';
			$response[ 'status' ] = 1;
		} else {
			$response[ 'text' ]   = 'ошибка при отправке';
			$response[ 'status' ] = 0;
		}
		
		echo json_encode( $response, JSON_UNESCAPED_UNICODE );
		wp_die();
	}