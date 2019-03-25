<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 10/16/18
 * Time: 4:30 PM
 */

if (!defined('ABSPATH')) {
    exit();
}

add_action('template_redirect', function () {

    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_script('commons', Assets::getJs('common'), false, null, true);

		  wp_localize_script( 'commons', 'tikets_ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

        if (is_page_template('template-contacts.php')) {
            wp_enqueue_script('contacts', Assets::getJs('contacts'), false, null, true);
        }
        elseif (is_page_template('template-home.php')) {
	        wp_enqueue_script('home', Assets::getJs('home'), false, null, true);
        }
        elseif (is_page_template('template-checkout.php')) {
//	        wp_enqueue_script( 'checkout_tickets', BASE_URL.'/core/myAjax/formManipulation.js', ['jquery'], null, true);
	        wp_enqueue_script('checkout', Assets::getJs('checkout'), false, null, true);
        }
        elseif (is_singular('product')) {
            wp_enqueue_script('program', Assets::getJs('program'), false, null, true);
        }
        elseif (is_singular('product')) {
	        wp_enqueue_script('program', Assets::getJs('program'), false, null, true);
        }
	    elseif (is_tax('product_cat')) {
		    wp_enqueue_script('category', Assets::getJs('category'), false, null, true);
	    }
        else if (is_404()) {
	        wp_enqueue_script('p404', Assets::getJs('p404'), false, null, true);
        }
        else {
		    wp_enqueue_script('page', Assets::getJs('page'), false, null, true);
	    }
    });
});