<?php
	if (!defined( 'ABSPATH' )) exit();
	
	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	
	add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
	function crb_attach_theme_options(){
		$basic_options_container = Container::make( 'theme_options', __( 'Настройки темы' ) )
			->set_page_file( 'theme-options' )
			->set_page_menu_title( 'Настройки темы' )
			->set_icon( 'dashicons-carrot' )
			->add_fields( [
				Field::make( 'image', 'crb_logo_img', __( 'Logo' ) )
					->set_value_type( 'url' )
					->set_width( 50 ),
				Field::make( 'image', 'crb_footer_logo_img', 'Логотип в подвале' )
					->set_value_type( 'url' )
					->set_width( 50 ),
				Field::make( 'text', 'crb_phone_vel', 'Номер телефон(velcom)' )
					->set_width( 50 ),
				Field::make( 'text', 'crb_phone_mts', 'Номер телефон(МТС)' )
					->set_width( 50 ),
				Field::make( 'text', 'crb_email', 'Email' ),
				Field::make( 'text', 'crb_address', __('Address') ),
				Field::make( 'text', 'crb_unp', 'УНП' ),
				
				Field::make( 'separator', 'crb_404_link_op_sep', __( 'Страница 404' ) ),
				Field::make( 'text', 'crb_404_link', 'Ссылка на странице 404' ),
				
				Field::make( 'separator', 'programm_page_banner_op_sep', __( 'Баннер на страницах категории' ) ),
				Field::make( 'image', 'prod_cat_banner_img', 'Баннер' )
					->set_value_type( 'url' ),
				Field::make( 'text', 'prod_cat_banner_link', 'Ссылка банера' ),
				
				//Field::make( 'oembed', 'crb_oembed', __( 'oEmbed' ) )
			] );
		
		// Add second options page under 'Basic Options'
		Container::make( 'theme_options', 'Настройки WEBPAY' )
			->set_page_parent( $basic_options_container ) // reference to a top level container
			->add_fields( array(
				
				Field::make( 'text', 'wsb_store','wsb_store' )
					->set_required( true ),
				Field::make( 'text', 'wsb_secret_key','secret key' )
					->set_required( true ),
				Field::make( 'text', 'wsb_storeid','wsb_storeid' )
					->set_required( true ),
				Field::make( 'select', 'wsb_return_url', 'Выберите страницу для удачного заказа' )
					->add_options( 'page_selecting' )
					->set_required( true ),
				Field::make( 'select', 'wsb_cancel_return_url','Выберите страницу для неудачного заказа' )
					->add_options( 'page_selecting' )
					->set_required( true ),
				Field::make( 'select', 'wsb_notify_url','Выберите страницу для извещения о оплате' )
					->add_options( 'page_selecting' )
					->set_required( true ),
			) );
	}
	
	add_action( 'after_setup_theme', 'crb_load' );
	function crb_load(){
		\Carbon_Fields\Carbon_Fields::boot();
	}
	
	function page_selecting() {
		$my_query = new WP_Query();
		$query_news =$my_query->query(['post_type' => 'page']);
		
		$news_list =[];
		foreach( $query_news  as $news ){
			$news_list[$news->ID] = $news->post_title;
		}
		return $news_list ;
	}