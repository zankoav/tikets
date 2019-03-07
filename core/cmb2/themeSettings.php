<?php
	if (!defined( 'ABSPATH' )) exit();

	add_action( 'cmb2_admin_init', 'tikets_theme_options_metabox' );
	function tikets_theme_options_metabox(){
		$cmb_options = new_cmb2_box( array(
			'id'           => THEME_NAME . '_theme_options_page',
			'title'        => esc_html__( 'Настройки темы', THEME_NAME ),
			'object_types' => array( 'options-page' ),
			'option_key'   => THEME_NAME . '_theme_options',
			'icon_url'     => 'dashicons-admin-generic'
		) );
		//header
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'Логотип в шапке', THEME_NAME ),
			'id'      => 'main_logo',
			'type'    => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url,
			),
		) );
	}