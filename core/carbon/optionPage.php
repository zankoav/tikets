<?php
	if (!defined( 'ABSPATH' )) exit();
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
	function crb_attach_theme_options(){
		Container::make( 'theme_options', __( 'Theme Options Carbon' ) )
			->set_page_file( 'theme-options' )
			->set_page_menu_title( 'Custom Options' )
			->set_icon( 'dashicons-carrot' )
			->add_fields( [
				Field::make( 'text', 'crb_link_to_search_page', 'ССылка на строку поиска' ),
				Field::make( 'image', 'crb_logo_img', __( 'Image' ) )
					->set_value_type( 'url' ),
				Field::make( 'complex', 'crb_test' )
					->add_fields( array(
						Field::make( 'text', 'name' ),
						Field::make( 'text', 'job_title' ))),
				Field::make( 'complex', 'crb_job' )
					->add_fields( 'driver', array(
						Field::make( 'text', 'name' ),
						Field::make( 'text', 'drivers_license_id' ),
					))
					->add_fields( 'teacher', array(
						Field::make( 'image', 'name' ),
						Field::make( 'image', 'years_of_experience' ),
					))
			] );
	}
	add_action('after_setup_theme', 'crb_load');
	function crb_load(){
		\Carbon_Fields\Carbon_Fields::boot();
	}