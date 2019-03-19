<?php
	if (!defined( 'ABSPATH' )) exit();
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_attach_product_meta' );
	function crb_attach_product_meta(){
		Container::make( 'post_meta', 'Дополнительная информация' )
			->where( 'post_type', '=', 'product' )
			->add_fields( [
				Field::make( 'text', 'main_speaker', 'Главный спикер' ),
				Field::make( 'complex', 'crb_partners', 'Партнеры' )
					->add_fields( 'partner', [
							Field::make( 'select', 'id', 'Выберите партнера' )
								->add_options( 'my_computation_heavy_getter_function' )
								->set_width( 50 ),
							Field::make( 'checkbox', 'show_partner_site', __( 'Переход на сайт партнера' ) )
								->set_option_value( 'yes' )
								->set_width( 50 ),
						]
					),
			] );
		Container::make( 'post_meta', 'Табики' )
			->where( 'post_type', '=', 'product' )
			->add_tab( __( 'Программа' ), [
				Field::make( 'complex', 'crb_program_points', 'Пункты программы' )
					->add_fields( 'point', [
							Field::make( 'text', 'point_time', 'Время' )
								->set_width( 30 ),
							Field::make( 'text', 'point_title', 'Заголовок' )
								->set_width( 70 ),
							Field::make( 'textarea', 'desc', 'Описание' ),
						]
					),
			] )
			->add_tab( __( 'Спикеры' ), [
				Field::make( 'complex', 'spikers_list', 'Спикеры' )
					->add_fields( 'spiker', [
							Field::make( 'image', 'spiker_image', __( 'Photo' ) )
								->set_value_type( 'url' )
								->set_width( 30 ),
							Field::make( 'text', 'spiker_name', __('Name') )
								->set_width( 70 ),
							Field::make( 'rich_text', 'spiker_desc', 'Информация' ),
						]
					),
			] );
	}
	
	add_action( 'after_setup_theme', 'crb_load_product_meta' );
	function crb_load_product_meta(){
		\Carbon_Fields\Carbon_Fields::boot();
	}
	
	function my_computation_heavy_getter_function(){
		$my_query       = new WP_Query();
		$query_partners = $my_query->query( [ 'post_type' => 'partner' ] );
		
		$partners = [];
		foreach($query_partners as $partner) {
			$partners[ $partner->ID ] = $partner->post_title;
		}
		return $partners;
	}
