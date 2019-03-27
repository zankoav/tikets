<?php

if (!defined('ABSPATH')) {
    exit();
}
//
//function set_html_content_type()
//{
//    return "text/html";
//}

//add_filter( 'wp_mail_content_type', 'set_html_content_type' );

function contact_form()
{
    $options = SingletonOptions::getOptions();
    $mail_to = $options['email'];
    $subject = __('Zankoav question!', THEME_NAME);
    $headers = 'From: Zankoav Web Site <zankoav@mail.ru>' . "\r\n";

    $response = array();
    $response['status'] = 0;

    $form_name = empty($_POST['name']) ? '' : esc_attr($_POST['name']);
    $form_email = empty($_POST['email']) ? '' : esc_attr($_POST['email']);
    $form_message = empty($_POST['message']) ? '' : esc_attr($_POST['message']);
    $form_spam = empty($_POST['spam']) ? '' : esc_attr($_POST['spam']);

    if (!empty($form_spam)) {
        return;
    }

    if (!filter_var($form_email, FILTER_VALIDATE_EMAIL)) {

        $response['status'] = 2;
        echo json_encode($response);
        wp_die();
    }


    $msg = "<p><strong>Name: </strong><span>" . $form_name . "</span></p>
			<p><strong>Email: </strong><span>" . $form_email . "</span></p>
			<p><strong>Message: </strong><span>" . $form_message . "</span></p>";


    if (wp_mail($mail_to, $subject, $msg, $headers)) {
        $response['status'] = 1;
    }

    echo json_encode($response);
    wp_die();
}

//	add_action( 'wp_ajax_contact_form', 'contact_form' );
//	add_action( 'wp_ajax_nopriv_contact_form', 'contact_form' );


