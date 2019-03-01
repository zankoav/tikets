<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/16/18
	 * Time: 4:30 PM
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit();
	}

	add_action( 'template_redirect', function () {

		add_action( 'wp_enqueue_scripts', function () {
			wp_enqueue_script( 'commons', Assets::getJs( 'common' ), false, null, true );
			wp_localize_script( 'commons', 'landing_ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

			if ( is_page_template( 'template-home.php' ) ) {
				wp_enqueue_script( 'home', Assets::getJs( 'home' ), false, null, true );
			} else if ( is_page_template( 'template-contacts.php' ) ) {
				wp_enqueue_script( 'contacts', Assets::getJs( 'contacts' ), false, null, true );
			} else if ( is_singular( 'project' ) ) {
				wp_enqueue_script( 'project', Assets::getJs( 'project' ), false, null, true );
			} else if ( is_singular( 'worker' ) ) {
				wp_enqueue_script( 'user_js', Assets::getJs( 'user' ), false, null, true );
			} else if ( is_post_type_archive( 'worker' ) ) {
				wp_enqueue_script( 'tean', Assets::getJs( 'team' ), false, null, true );
			} else if ( is_post_type_archive( 'project' ) or is_tax('type') ) {
				wp_enqueue_script( 'category_js', Assets::getJs( 'category' ), false, null, true );
			}else if ( is_404() ) {
				wp_enqueue_script( 'p404_js', Assets::getJs( 'p404' ), false, null, true );
			} else {
				wp_enqueue_script( 'default_template', Assets::getJs( 'default_template' ), false, null, true );
			}

		} );
	} );