<?php
	if (!defined( 'ABSPATH' )) exit();
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
	function crb_attach_theme_options(){
		Container::make( 'theme_options', __( 'Настройки темы' ) )
			->set_page_file( 'theme-options' )
			->set_page_menu_title( 'Настройки темы' )
			->set_icon( 'dashicons-carrot' )
			->add_fields( [
				Field::make( 'image', 'crb_logo_img', __( 'Logo' ) )
					->set_value_type( 'url' ),
				Field::make( 'image', 'crb_footer_logo_img', 'Логотип в подвале' )
					->set_value_type( 'url' ),
				Field::make( 'text', 'crb_phone_vel', 'Номер телефон(velcom)' ),
				Field::make( 'text', 'crb_phone_mts', 'Номер телефон(МТС)' ),
				Field::make( 'text', 'crb_email', 'Email' ),
				Field::make( 'text', 'crb_address', __('Address') ),
				Field::make( 'text', 'crb_unp', 'УНП' ),
				
				//Field::make( 'oembed', 'crb_oembed', __( 'oEmbed' ) )
			] );
	}
	
	add_action( 'after_setup_theme', 'crb_load' );
	function crb_load(){
		\Carbon_Fields\Carbon_Fields::boot();
	}