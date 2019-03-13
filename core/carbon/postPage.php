<?php
	if (!defined( 'ABSPATH' )) exit();
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
	function crb_attach_post_meta(){
		Container::make( 'post_meta', 'Дополнительная информация')
			->where( 'post_type', '=', 'post' )
			->add_fields( [
				Field::make( 'text', 'post_author', 'Автор' ),
				Field::make( 'textarea', 'post_short_desc', 'Описание' ),
			] );
	}
	add_action('after_setup_theme', 'crb_load_post_meta');
	function crb_load_post_meta(){
		\Carbon_Fields\Carbon_Fields::boot();
	}