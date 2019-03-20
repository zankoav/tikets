<?php
	if (!defined( 'ABSPATH' )) { exit; }
	get_header();
	$checkoutLink = getCheckoutPermaLink();
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
					
					get_template_part( '/core/views/product', 'welcom' ); ?>
					<div class="video-promo">
						<div class="container">
							<div class="video-promo__inner row mt-20 mt-md-30 mb-40">
								<div class="col-12 col-sm-6">
									<div class="video-promo__date-time">
										<div class="video-promo__day">15
										</div>
										<div class="video-promo__date">
											<div class="video-promo__mounth">Марта
											</div>
											<div class="video-promo__year">2019
											</div>
										</div>
									</div>
									<div class="video-promo__start-time my-10 my-sm-20">16:00
									</div>
									<p class="video-promo__location mb-20 mb-hd-20">Минск, Рокоссовского, 158, гостиница
										"Салют"
									</p>
								</div>
								<div class="col-12 col-sm-6 col-lg-5 col-hd-4">
									<div class="video-review">
										<div class="video-review__man mb-05">
											<img class="video-review__image"
												 src="/wp-content/themes/tikets/src/icons/speker.6e0d00.png"
												 alt="speaker" title=""/>
											<div class="video-review__wrapper">
												<h2 class="video-review__title">Иван Петров
												</h2>
												<p class="video-review__position">Компания SkyWall, CE Copy 3
												</p>
											</div>
										</div>
										<div class="video-review__video">
											<video class="video-review__sorce-video" controls
												   poster="/wp-content/themes/tikets/src/icons/preloader.98dd08.jpg">
												<source src="/wp-content/themes/tikets/src/video/v.8e418f.mp4"
														type="video/mp4">
											</video>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tabs">
						<div class="container">
							<div class="tabs__wrapper-list">
								<a class="tabs__button" href="#"></a>
								<ul class="tabs__list">
									<li class="tabs__list-tab" data-content="0">
										<a class="tabs__tab-button" href="#">Программа</a>
									</li>
									<li class="tabs__list-tab tabs__list-tab_active" data-content="1">
										<a class="tabs__tab-button" href="#">О спикере</a>
									</li>
									<li class="tabs__list-tab" data-content="2">
										<a class="tabs__tab-button" href="#">О чем курс</a>
									</li>
									<li class="tabs__list-tab" data-content="3">
										<a class="tabs__tab-button" href="#">Тарифы</a>
									</li>
<!--									<li class="tabs__list-tab" data-content="4">-->
<!--										<a class="tabs__tab-button" href="#">Онлайн-трансляция</a>-->
<!--									</li>-->
								</ul>
							</div>
							<?php get_template_part( '/core/views/product', 'program' ); ?>
							<?php get_template_part( '/core/views/product', 'spiker' ); ?>
							<?php get_template_part( '/core/views/product', 'about_program' ); ?>
							<?php get_template_part( '/core/views/product', 'variatation' ); ?>
<!--							<div class="tabs__content">Content Онлайн-трансляция</div>-->
						</div>
					</div>
					<?php get_template_part( '/core/views/home', 'seminarforu' ) ?>
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

