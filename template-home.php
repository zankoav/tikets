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
		<div class="features">
			<div class="container features_mobile">
				<div class="features__inner">
					<?php get_template_part( '/core/views/home','benefits' ); ?>
					<div class="features__pagination-wrapper pos-a">
						<div class="features__pagination swiper-pagination">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('/core/views/home','seminarforu')?>
		<?php get_template_part('/core/views/home','reviews')?>
		<?php get_template_part('/core/views/home','news')?>
	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
