<?php
	/**
	 * Template Name: Home Template
	 */
	get_header();
	
	//$oembed = carbon_get_theme_option('crb_oembed');
	//var_dump($oembed);
	//	echo wp_oembed_get($oembed);
?>
<div class="app">
	<?php get_template_part( '/core/views/headerView' ); ?>
	<main class="main">
		<?php get_template_part( '/core/views/home', 'slider' ) ?>
		<?php get_template_part( '/core/views/home', 'benefits' ); ?>
		<?php get_template_part( '/core/views/home', 'stock' ) ?>
		<?php //get_template_part( '/core/views/home', 'seminarforu' ) ?>
		<?php get_template_part( '/core/views/home', 'reviews' ) ?>
		<?php get_template_part( '/core/views/home', 'news' ) ?>
		<?php get_template_part( '/core/views/home', 'partnership' ) ?>
	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
