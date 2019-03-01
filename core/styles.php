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
			} else if ( is_page_template( 'template-contacts.php' ) ) {
				wp_enqueue_style( 'contacts', Assets::getCss( 'contacts' ), false, null );
			} else if ( is_singular( 'project' ) ) {
				wp_enqueue_style( 'project', Assets::getCss( 'project' ), false, null );
			} else if ( is_singular( 'worker' ) ) {
				wp_enqueue_style( 'user_css', Assets::getCss( 'user' ), false, null );
			} else if ( is_post_type_archive( 'worker' ) ) {
				wp_enqueue_style( 'team', Assets::getCss( 'team' ), false, null );
			} else if ( is_post_type_archive( 'project' ) or is_tax( 'type' ) ) {
				wp_enqueue_style( 'category_css', Assets::getCss( 'category' ), false, null );
			} else if ( is_404() ) {
				wp_enqueue_style( 'p404_css', Assets::getCss( 'p404' ), false, null );
			} else {
				wp_enqueue_style( 'default_template', Assets::getCss( 'default_template' ), false, null );
			}

			wp_enqueue_style( 'style', BASE_URL . '/style.css', false, null );

		} );
	} );
