<?php

//    var_dump($spikers_list[0]["spiker_name"]);
	add_action( 'wp_ajax_questionSpeaker', 'questionSpeaker' );
	add_action( 'wp_ajax_nopriv_questionSpeaker', 'questionSpeaker' );
	
	function questionSpeaker(){
		
		$form_name    = empty( $_POST[ 'name' ] ) ? '' : esc_attr( $_POST[ 'name' ] );
		$form_message = empty( $_POST[ 'message' ] ) ? '' : esc_attr( $_POST[ 'message' ] );
		$form_email   = empty( $_POST[ 'email' ] ) ? '' : esc_attr( $_POST[ 'email' ] );
		$programId  = empty( $_POST[ 'programName' ] ) ? '' : esc_attr( $_POST[ 'programName' ] );
		$speakerName  = empty( $_POST[ 'speakerName' ] ) ? '' : esc_attr( $_POST[ 'speakerName' ] );
		
		if (!filter_var( $form_email, FILTER_VALIDATE_EMAIL )) {
			$response[ 'status' ] = 0;
			$response[ 'text' ]   = "$form_email is not a valid email address";
			echo json_encode( $response );
			wp_die();
			return;
		}
		if (empty($programId) || empty($speakerName)){

            $response[ 'status' ] = 0;
            echo json_encode( $response );
            wp_die();
        }

		$post = get_post($programId);
        $spikers_list = carbon_get_post_meta( $programId, 'spikers_list' );
        $speaker = '';

        foreach ($spikers_list as $item) {
            if ($item["spiker_name"] == $speakerName){
                $speaker = $speakerName;
                break;
            }
        }
        if (empty($speaker )){
            $response[ 'status' ] = 0;
            echo json_encode( $response );
            wp_die();
        }

		
		$msg = "<p><strong>От: </strong><span>" . $form_name . "</span></p>
			<p><strong>Email: </strong><span>" . $form_email . "</span></p>
			<p><strong>Программа: </strong><span>" . $post->post_title . "</span></p>
			<p><strong>Спикер: </strong><span>" . $speaker . "</span></p>
			<p><strong>Message: </strong><span>" . $form_message . "</span></p>";
		
		$mail_to = carbon_get_theme_option( 'partnership_mail' );
		$subject = 'Вопрос для '. $speaker . '. Семинар "' . $post->post_title.'"';
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