<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

add_action( 'after_setup_theme', 'zankoav_theme_init' );

function zankoav_theme_init() {
	/**
	 * add title tag auto
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * add thumbnails for all post types
	 */
	add_theme_support( 'post-thumbnails' );

//		add_image_size( 'partner', 140, 70, false );
//		add_image_size( 'project-card-m', 300, 200, true );
	add_image_size( 'tikets-main-speaker-lg', 900, 600, true );
	add_image_size( 'tikets-main-speaker-md', 644, 430, true );
	add_image_size( 'tikets-main-speaker-m', 440, 294, true );
	
	
	/**
	 * add custom-logo in customizer
	 */
	add_theme_support( 'custom-logo' );
	
	add_theme_support( 'menus' );
	
	register_nav_menus( [
			                    'main_menu'  => 'Main Menu',
			                    'right_menu' => 'Right Menu',
			                    'footer_menu' => 'Footer Menu',
	                    ] );
	
	/**
	 * add html5 support
	 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
	function empty_content($str) {
		return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
	}
	
//-----------------------------------------------------------------woocommerce support
	
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,
		
		'product_grid'          => array(
			'default_rows'    => 3,
			'min_rows'        => 2,
			'max_rows'        => 8,
			'default_columns' => 4,
			'min_columns'     => 2,
			'max_columns'     => 5,
		),
	) );
}