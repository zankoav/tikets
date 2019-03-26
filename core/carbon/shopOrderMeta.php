<?php
	if (!defined( 'ABSPATH' )) exit();
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_attach_shop_order_meta' );
	function crb_attach_shop_order_meta(){
		Container::make( 'post_meta', 'Сигнатура и фиид' )
			->where( 'post_type', '=', 'shop_order' )
			->add_fields( [
				Field::make( 'text', 'webpay_signature', 'Сигнатура' )
					->set_help_text( 'НЕ МЕНЯТЬ! Необходима для корректной работы с WEBPAY' ),
				Field::make( 'text', 'webpay_feed', 'Фиид' )
					->set_help_text( 'НЕ МЕНЯТЬ! Необходима для корректной работы с WEBPAY' ),
			] );
 
	}
	
	add_action( 'after_setup_theme', 'crb_load_order_meta' );
	function crb_load_order_meta(){
		\Carbon_Fields\Carbon_Fields::boot();
	}
 
