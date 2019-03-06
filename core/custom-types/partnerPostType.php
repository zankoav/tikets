<?php
	if (!defined( 'ABSPATH' )) exit();

	add_action('init', 'partners_init');
	function partners_init(){
		register_post_type('partner', array(
			'labels'             => array(
				'name'               => 'Партнеры', // Основное название типа записи
				'singular_name'      => 'Партнер', // отдельное название записи типа Book
				'add_new'            => 'Добавить партнера',
				'add_new_item'       => 'Добавить нового партнера',
				'edit_item'          => 'Редактировать партнера',
				'new_item'           => 'Новый партнер',
				'view_item'          => 'Посмотреть партнера',
				'search_items'       => 'Найти партнера',
				'not_found'          =>  'Партнер не найдено',
				'not_found_in_trash' => 'В корзине партнеров не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'Партнеры'

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'thumbnail'),
			'show_in_rest'       => true,
		) );
	}