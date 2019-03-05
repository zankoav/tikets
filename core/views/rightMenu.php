<?php

	$rightMenuArgs = [
		'theme_location' => 'right_menu',
		'container'      => false,
		'menu_class'     => 'header__list',
		'menu_id'        => '',
		'echo'           => true,
		'fallback_cb'    => 'wp_page_menu',
		'before'         => '',
		'after'          => '',
		'link_before'    => '',
		'link_after'     => '',
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'          => 5,
	];
?>

<?php
	if (has_nav_menu( 'right_menu' )) {
		wp_nav_menu( $rightMenuArgs );
	}
?>