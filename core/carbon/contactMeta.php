<?php
	if (!defined( 'ABSPATH' )) exit();
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'crb_attach_contacts_meta' );
	function crb_attach_contacts_meta(){
		Container::make( 'post_meta', 'Контактая информация')
			->where( 'post_type', '=', 'page' )
			->where( 'post_template', '=', 'template-contacts.php' )
			->add_fields( [
				Field::make( 'text', 'contact_address', 'Адрес' ),
				Field::make( 'complex', 'crb_phones', 'Телефоны' )
					->add_fields( 'phone', [
							Field::make( 'text', 'phone_number', __( 'Phone' ) )
						]
					),
				Field::make( 'complex', 'crb_emails', 'Email' )
					->add_fields( 'email', [
							Field::make( 'text', 'email_value', __( 'Email' ) )
						]
					),
				Field::make( 'text', 'map_center', 'Центр карты' ),
				Field::make( 'text', 'marc_coordinate', 'Координаты метки' ),
				Field::make( 'text', 'marc_text', 'Текст метки' ),
			] );
	}
	add_action('after_setup_theme', 'crb_load_contacts_meta');
	function crb_load_contacts_meta(){
		\Carbon_Fields\Carbon_Fields::boot();
	}