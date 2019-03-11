<?php
	
	$footerMenuArgs = [
		'theme_location' => 'footer_menu',
		'container'      => false,
		'menu_class'     => 'footer__menu footer__menu_list',
		'menu_id'        => '',
		'echo'           => true,
		'fallback_cb'    => 'wp_page_menu',
		'before'         => '',
		'after'          => '',
		'link_before'    => '',
		'link_after'     => '',
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'          => 1,
	];

?>

<div class="footer__menu">
	<div class="footer__title pt-05 pb-05 pt-sm-00 pb-sm-00">Меню</div>
	<?php
		if (has_nav_menu( 'footer_menu' )) {
			wp_nav_menu( $footerMenuArgs );
		}
	?>
</div>
