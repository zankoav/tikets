<?php
	if (!defined( 'ABSPATH' )) exit();
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_attach_product_cat_meta' );
	function crb_attach_product_cat_meta(){
		Container::make( 'term_meta', 'Цвет категории' )
			->where( 'term_taxonomy', '=', 'product_cat' )
			->add_fields( [
				Field::make( 'color', 'circle_color', 'Выберите цвет' )
//					->set_palette( [ '#FF0000', '#00FF00', '#0000FF' ] ),
			] );
	}
	
	add_action( 'after_setup_theme', 'crb_load_product_cat_meta' );
	function crb_load_product_cat_meta(){
		\Carbon_Fields\Carbon_Fields::boot();
	}