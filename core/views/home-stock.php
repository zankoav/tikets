<?php
	$aside_banner      = carbon_get_post_meta( get_the_ID(), 'aside_banner' );
	$aside_banner_link = carbon_get_post_meta( get_the_ID(), 'aside_banner_link' );
	$discount_articles = carbon_get_post_meta( get_the_ID(), 'discount_articles' );
?>


<div class="stock">
	<div class="container">
		<div class="stock__content row">
			<div class="col-12 col-md-3 pb-40 pb-sm-00 col-offset-1 col-offset-md-0">
				<a href="<?= esc_url( $aside_banner_link ); ?>">
					<img class="stock__banner" src="<?= $aside_banner ?>" alt="banner" title=""/>
				</a>
			</div>
			<div class="col-6 col-sm-6 col-hd-5 col-offset-3 col-offset-sm-6 col-offset-md-2 col-offset-lg-3 col-offset-hd-4">
				<div class="stock__text">акции
				</div>
				<div class="stock__text stock__text_mr-l">недели
				</div>
			</div>
			<div class="col-12 col-md-9 col-offset-md-3 pt-40 pt-sm-00">
				<div class="stock__container swiper-container">
					<div class="stock__wrapper swiper-wrapper">
						<?php foreach($discount_articles as $item) :
							$postId = $item[ 'first_new_id' ];
							$current_post = get_post( $postId );
							$desc = carbon_get_post_meta( $postId, 'post_short_desc' );
							$attachment_url = get_the_post_thumbnail_url( $postId );
							?>
							<div class="stock__slide swiper-slide">
								<img class="stock__image" src="<?= $attachment_url; ?>"
									 alt="people" title=""/>
								<div class="stock__envelope pt-20">
									<div class="stock__title"><?= $current_post->post_title; ?></div>
									<div class="stock__description pt-05 pb-10"><?= $desc; ?></div>
									<a href="<?= get_permalink( $postId ); ?>" class="button-with-balls">подробнее
										<span class="button-with-balls__ball"></span>
										<span class="button-with-balls__ball"></span>
										<span class="button-with-balls__ball"></span>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="stock__pagination-wrapper pt-20 pb-20 pt-sm-00 pb-sm-00">
						<div class="stock__pagination swiper-pagination">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>