<?php
	if (!defined( 'ABSPATH' )) exit();
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_home_page_settings' );
	function crb_home_page_settings(){
		Container::make( 'post_meta', "Список преимущств" )
			->where( 'post_type', '=', 'page' )
			->where( 'post_template', '=', 'template-home.php' )
			->add_fields(
				[
					Field::make( 'text', 'crb_benefit_1_text', 'Преимущество №1(текст)' )
						->set_width( 65 ),
					Field::make( 'image', 'crb_benefit_1_icon', 'Преимущество №1(иконка)' )
						->set_width( 35 )
						->set_value_type( 'url' ),
					Field::make( 'text', 'crb_benefit_2_text', 'Преимущество №2(текст)' )
						->set_width( 65 ),
					Field::make( 'image', 'crb_benefit_2_icon', 'Преимущество №2(иконка)' )
						->set_width( 35 )
						->set_value_type( 'url' ),
					Field::make( 'text', 'crb_benefit_3_text', 'Преимущество №3(текст)' )
						->set_width( 65 ),
					Field::make( 'image', 'crb_benefit_3_icon', 'Преимущество №3(иконка)' )
						->set_width( 35 )
						->set_value_type( 'url' ),
					Field::make( 'text', 'crb_benefit_4_text', 'Преимущество №4(текст)' )
						->set_width( 65 ),
					Field::make( 'image', 'crb_benefit_4_icon', 'Преимущество №4(иконка)' )
						->set_width( 35 )
						->set_value_type( 'url' ),
				] );
		
		Container::make( 'post_meta', "Отзывовы" )
			->where( 'post_type', '=', 'page' )
			->where( 'post_template', '=', 'template-home.php' )
			->add_fields( [
					Field::make( 'complex', 'crb_reviews', 'Слидер отзывов' )
						->add_fields( 'review', [
								Field::make( 'text', 'reviewer_name', __( 'Имя' ) )
									->set_width( 50 ),
								Field::make( 'text', 'reviewer_position', 'Должнасть' )
									->set_width( 50 ),
								Field::make( 'image', 'reviewer_image', __( 'Image' ) )
									->set_value_type( 'url' )
									->set_width( 50 ),
								Field::make( 'file', 'reviewer_video', __( 'Video' ) )
									->set_value_type( 'url' )
									->set_type( 'video' )
									->set_width( 50 ),
								Field::make( 'image', 'video_preview', 'Превью' )
									->set_value_type( 'url' )
									->set_width( 50 ),
							]
						),
				]
			);
		
		Container::make( 'post_meta', "Новости" )
			->where( 'post_type', '=', 'page' )
			->where( 'post_template', '=', 'template-home.php' )
			->add_fields( [
				Field::make( 'select', 'first_new_id', 'Выберите первую новость' )
					->add_options( 'news_selecting' ),
				Field::make( 'select', 'second_new_id', 'Выберите вторую новость' )
					->add_options( 'news_selecting' ),
				Field::make( 'select', 'third_new_id', 'Выберите третью новость' )
					->add_options( 'news_selecting' ),
			] );
	}
	
	add_action( 'after_setup_theme', 'crb_home_page_settings_load' );
	function crb_home_page_settings_load(){
		\Carbon_Fields\Carbon_Fields::boot();
	}
	
	function news_selecting() {
		$my_query = new WP_Query();
		$query_news =$my_query->query(['post_type' => 'post']);
		
		$news_list =[];
		foreach( $query_news  as $news ){
			$news_list[$news->ID] = $news->post_title;
		}
		return $news_list ;
	}