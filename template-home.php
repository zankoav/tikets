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
		<div class="reviews">
			<div class="container">
				<h2 class="title title_white mb-40 mb-sm-20">Отзывы</h2>
				<div class="reviews__inner row">
					<div class="col-offset-0 col-offset-sm-2 col-12 col-sm-9 pos-r pb-15 pb-sm-20 pt-sm-20">
						<div class="reviews__swiper swiper-container">
							<div class="reviews__swiper-wrapp swiper-wrapper">
								<div class="reviews__slide swiper-slide">
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
											<iframe src="https://www.youtube.com/embed/nmt0DQPUM_M" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
										</div>
									</div>
								</div>
								<div class="reviews__slide swiper-slide">
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
											<iframe src="https://www.youtube.com/embed/nmt0DQPUM_M" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
										</div>
									</div>
								</div>
								<div class="reviews__slide swiper-slide">
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
											<iframe src="https://www.youtube.com/embed/nmt0DQPUM_M" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
										</div>
									</div>
								</div>
								<div class="reviews__slide swiper-slide">
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
											<iframe src="https://www.youtube.com/embed/nmt0DQPUM_M" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
										</div>
									</div>
								</div>
								<div class="reviews__slide swiper-slide">
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
											<iframe src="https://www.youtube.com/embed/nmt0DQPUM_M" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="reviews__button-next swiper-button-next">
						</div>
						<div class="reviews__button-prev swiper-button-prev">
						</div>
						<div class="reviews__pagination-wrapper pos-a">
							<div class="reviews__pagination swiper-pagination">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
