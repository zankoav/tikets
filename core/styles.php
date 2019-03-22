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

			wp_enqueue_style( 'commons', Assets::getCss( 'common' ), false, null );

			if ( is_page_template( 'template-home.php' ) ) {
				wp_enqueue_style( 'home', Assets::getCss( 'home' ), false, null );
			}
			else if ( is_page_template( 'template-contacts.php' ) ) {
				wp_enqueue_style( 'contacts', Assets::getCss( 'contacts' ), false, null );
			}
			else if ( is_page_template( 'template-checkout.php' ) ) {
				wp_enqueue_style( 'checkout', Assets::getCss( 'checkout' ), false, null );
			}
			else if ( is_singular( 'product') ) {
				wp_enqueue_style( 'program', Assets::getCss( 'program' ), false, null );
			}
			else if ( is_404() ) {
				wp_enqueue_style( 'p404', Assets::getCss( 'p404' ), false, null );
			}

			wp_enqueue_style( 'style', BASE_URL . '/style.css', false, null );

		} );
	} );
