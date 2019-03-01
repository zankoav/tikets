<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 2/24/19
	 * Time: 6:27 PM
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit();
	}

	function before_footer_action() {
		if ( ! is_404() ) {
			get_template_part( 'views/contact-form' );
			get_template_part( 'views/partners' );
		}
	}

	add_action( 'before_footer', 'before_footer_action' );