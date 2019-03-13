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

//		  wp_localize_script( 'commons', 'landing_ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

        if (is_page_template('template-home.php')) {
            wp_enqueue_script('home', Assets::getJs('home'), false, null, true);
        }
        elseif (is_singular('program')) {
            wp_enqueue_script('program', Assets::getJs('program'), false, null, true);
        }
	    elseif (is_singular('post')) {
		    wp_enqueue_script('single', Assets::getJs('single'), false, null, true);
	    }
        else if (is_404()) {
	        wp_enqueue_script('p404', Assets::getJs('p404'), false, null, true);
        }
        else {
		    wp_enqueue_script('page', Assets::getJs('page'), false, null, true);
	    }
    });
});