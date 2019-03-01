<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/17/18
	 * Time: 3:07 PM
	 */


	if ( ! defined( 'ABSPATH' ) ) {
		exit();
	}

	add_filter( 'nav_menu_css_class', 'change_class_tag_li', 1, 3 );

	function change_class_tag_li( $classes, $item, $args ) {
		if ( $args->theme_location === 'main-menu' ) {

			$classes[] = 'menu__item';

			if ( in_array( 'current-menu-item', $classes ) ) {
				$classes[] = 'menu__item_active';
			}

		}

		if ( $args->theme_location === 'left-menu' ) {

			$classes[] = 'menu-left__item';

			if ( in_array( 'current-menu-item', $classes ) ) {
				$classes[] = 'menu-left__item_active';
			}
		}

		return $classes;
	}
