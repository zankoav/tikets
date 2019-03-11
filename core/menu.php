<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/17/18
	 * Time: 3:07 PM
	 */
	
	
	if (!defined( 'ABSPATH' )) {
		exit();
	}
	
	add_filter( 'nav_menu_css_class', 'change_class_tag_li', 1, 3 );
	
	function change_class_tag_li($classes, $item, $args){
		if ($args->theme_location === 'main_menu') {
			if ($item->menu_item_parent == 0) {
//				var_dump($classes);
				$classes[] = 'header__menu-item';
				if (in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-parent', $classes )) {
					$classes[] = 'header__menu-item_active';
				}
			} else {
				$classes[] = 'header__sub-menu-item';
				if (in_array( 'current-menu-item', $classes )) {
					$classes[] = 'header__sub-menu-item_active';
				}
			}
			
		} elseif ($args->theme_location === 'right_menu') {
			$classes[] = 'header__categories-item';
			
			if (in_array( 'current-menu-item', $classes )) {
				$classes[] = 'header__categories-item_active';
			}
		} elseif ($args->theme_location === 'footer_menu') {
			$classes[] = 'footer__menu';
			$classes[] = 'footer__menu_list-item ';
			
			if (in_array( 'current-menu-item', $classes )) {
				$classes[] = 'footer__menu_active';
			}
		}
		return $classes;
	}
	
	//change classes  submenu
	add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );
	function change_wp_nav_menu($classes, $args, $depth){
		foreach($classes as $key => $class) {
			if ($class == 'sub-menu') {
				$classes[ $key ] = 'header__sub-menu-list';
			}
		}
		return $classes;
	}