<?php
	if (!defined( 'ABSPATH' )) exit();
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'crb_attach_partner_meta' );
	function crb_attach_partner_meta(){
		Container::make( 'post_meta', 'Ссылка на сайт партнера')
			->where( 'post_type', '=', 'partner' )
			->add_fields( [
				Field::make( 'text', 'partner_site_link', 'Ссылка' )
			] );
	}
	add_action('after_setup_theme', 'crb_load_partner_meta');
	function crb_load_partner_meta(){
		\Carbon_Fields\Carbon_Fields::boot();
	}