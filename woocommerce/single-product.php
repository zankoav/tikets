<?php
	
	if (!defined( 'ABSPATH' )) {
		exit; // Exit if accessed directly
	}
	get_header();
	$checkoutLink = getCheckoutPermaLink();
//	$wsb_notify_url = carbon_get_theme_option( 'wsb_notify_url' );

?>
	<div class="app">
		<?php get_template_part( '/core/views/headerView' ); ?>
		<main class="main">
			
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				//do_action( 'woocommerce_before_main_content' );
				
				while(have_posts()) : the_post();
					$main_speaker  = carbon_get_post_meta( get_the_ID(), 'main_speaker' );
					$attachment_id = get_post_thumbnail_id();
					$attach_src    = wp_get_attachment_image_url( $attachment_id, 'tikets-main-speaker-lg' );
					$attach_srcset = wp_get_attachment_image_srcset( $attachment_id, 'tikets-main-speaker-lg' );
					$attach_sizes  = wp_get_attachment_image_sizes( $attachment_id, 'tikets-main-speaker-lg' );
					?>

					<div class="welcome">
						<div class="container">
							<div class="row">
								<div class="welcome__content">
									<div class="col-12 col-sm-7 pb-10 pb-sm-00">
										<div class="welcome__inner pt-sm-30">
											<div class="welcome__image-wrapper pb-10 pb-sm-20">
												<img class="welcome__image"
													 src="<?= $attach_src; ?>"
													 srcset="<?= $attach_srcset; ?>"
													 sizes="<?= $attach_sizes; ?>"
													 alt="mann"
													 title=""/>
											</div>
											<div class="welcome__opportunity-list">
												<a class="welcome__opportunity col-4" href="#">
													<img class="welcome__opportunity-image pb-10"
														 src="/wp-content/themes/tikets/src/icons/Star.455496.svg"
														 alt="Star"
														 title=""/>
													<span class="welcome__opportunity-text">Добавить в избранное</span>
												</a>
												<a class="welcome__opportunity col-4" href="#">
													<img class="welcome__opportunity-image pb-10"
														 src="/wp-content/themes/tikets/src/icons/calendar.a80e12.svg"
														 alt="calendar" title=""/>
													<span class="welcome__opportunity-text">Добавить в календарь</span>
												</a>
												<a class="welcome__opportunity col-4" href="#">
													<img class="welcome__opportunity-image pb-10"
														 src="/wp-content/themes/tikets/src/icons/printing-tool.bd4350.svg"
														 alt="printing-tool" title=""/>
													<span class="welcome__opportunity-text">Печать</span>
												</a>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-5 pt-sm-40">
										<div class="welcome__envelope">
											<div class="welcome__author pb-10 pb-sm-20"><?= $main_speaker; ?></div>
											<div class="welcome__title pb-20"><?= get_the_title(); ?></div>
											<div class="welcome__description pb-20">
												<?= get_the_content(); ?>
											</div>
											<a class="orange-button" href="<?=$checkoutLink.'?id='.get_the_ID()?>">записаться</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php //wc_get_template_part( 'content', 'single-product' ); ?>
				
				<?php endwhile; // end of the loop. ?>
			
			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				//do_action( 'woocommerce_after_main_content' );
			?>
			<?php
				get_template_part( '/core/views/product', 'partnersCarousel' );
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				//		do_action( 'woocommerce_sidebar' );
			?>

		</main>
		<?php get_template_part( '/core/views/footerView' ); ?>

	</div>
<?php
	get_footer();

