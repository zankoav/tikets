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
					
					get_template_part( '/core/views/product', 'welcom' ); ?>
					<?php get_template_part( '/core/views/product', 'promo' ) ?>
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
					<?php //get_template_part( '/core/views/product', 'seminarforu' ) ?>
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

	</div >
	<div style=" display: none; ">
		<?php ifPaymentWasCorrect();?>
	</div>
<?php
	
	get_footer();
