<?php
	
	$reviews = carbon_get_post_meta(get_the_ID(),'crb_reviews');
	
	?>
<div class="reviews">
	<div class="container">
		<h2 class="title title_white mb-40 mb-sm-20">Отзывы</h2>
		<div class="reviews__inner row">
			<div class="col-offset-0 col-offset-sm-2 col-12 col-sm-9 pos-r pb-15 pb-sm-20 pt-sm-20">
				<div class="reviews__swiper swiper-container">
					<div class="reviews__swiper-wrapp swiper-wrapper">
						<?php foreach($reviews as $review) :
							$name = $review['reviewer_name'];
							$position = $review['reviewer_position'];
							$image = $review['reviewer_image'];
							$video = $review['reviewer_video'];
							?>
							<div class="reviews__slide swiper-slide">
								<div class="video-review">
									<div class="video-review__man mb-05">
										<img class="video-review__image" src="<?= $image; ?>" alt="speaker" title=""/>
										<div class="video-review__wrapper">
											<h2 class="video-review__title"><?= $name; ?></h2>
											<p class="video-review__position"><?= $position; ?></p>
										</div>
									</div>
									<?= $video;?>
									<div class="video-review__video">
										<iframe src="https://www.youtube.com/embed/nmt0DQPUM_M" frameborder="0"
												allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
												allowfullscreen></iframe>
									</div>
								</div>
							</div>
						<?php endforeach;?>
					</div>
				</div>
				<div class="reviews__button-next swiper-button-next"></div>
				<div class="reviews__button-prev swiper-button-prev"></div>
				<div class="reviews__pagination-wrapper pos-a">
					<div class="reviews__pagination swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>
