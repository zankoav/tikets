<?php
	if (!defined( 'ABSPATH' )) exit();

	add_action('init', 'programs_init');
	function programs_init(){
		register_post_type('program', array(
			'labels'             => array(
				'name'               => 'Программы', // Основное название типа записи
				'singular_name'      => 'Программа', // отдельное название записи типа Book
				'add_new'            => 'Добавить программу',
				'add_new_item'       => 'Добавить нового программу',
				'edit_item'          => 'Редактировать программу',
				'new_item'           => 'Новая программа',
				'view_item'          => 'Посмотреть программу',
				'search_items'       => 'Найти программу',
				'not_found'          =>  'Программа не найдено',
				'not_found_in_trash' => 'В корзине программ не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'Программы'

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