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
        if (is_singular('program')) {
            wp_enqueue_script('program', Assets::getJs('program'), false, null, true);
        }
    });
});