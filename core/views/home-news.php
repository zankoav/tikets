<?php
	$first_news_id  = carbon_get_post_meta( get_the_ID(), 'first_new_id' );
	$second_news_id = carbon_get_post_meta( get_the_ID(), 'second_new_id' );
	$third_news_id  = carbon_get_post_meta( get_the_ID(), 'third_new_id' );
?>
<div class="news mb-40 pb-md-20 mt-40 mt-sm-20 mt-md-40">
	<div class="container">
		<h2 class="title title_red mb-20 mb-md-40 pb-lg-40">Новости</h2>
		<div class="row">
			<div class="col-12 col-sm-6 col-hd-5">
				<?php if (!empty( $first_news_id )):
					$first_news = get_post( $first_news_id );
					$attachment_id = get_post_thumbnail_id( $first_news_id );
					$attach_src = wp_get_attachment_image_url( $attachment_id, 'tikets-main-speaker-lg' );
					$desc = carbon_get_post_meta( $first_news_id, 'post_short_desc' );
					?>
					<div class="news-type-1">
						<?php if (!empty( $attachment_id )) { ?>
							<div class="news-type-1__image-wrapp">
								<img class="news-type-1__image" src="<?= $attach_src; ?>" alt="man" title=""/>
							</div>
						<?php } ?>
						<div class="news-type-1__text-wrapp">
                            <a href="<?= get_permalink($first_news_id); ?>">
                                <h3 class="news__title news__title_red"><?= $first_news->post_title; ?></h3>
                            </a>
							<p class="news-type-1__description"><?= $desc; ?></p>
						</div>
					</div>
				<?php endif;
					
					if (!empty( $second_news_id )):
						$second_news = get_post( $second_news_id );
						$desc = carbon_get_post_meta( $second_news_id, 'post_short_desc' );
						?>
						<div class="red-news">
                            <a href="<?= get_permalink($second_news_id);?>">
                                <h3 class="news__title"><?= $second_news->post_title; ?></h3>
                            </a>
							<p class="red-news__description"><?= $desc; ?></p>
						</div>
					<?php endif; ?>
			</div>
			<div class="col-12 col-sm-6 col-hd-5 col-offset-hd-2">
				<?php if (!empty( $third_news_id )):
					$third_news = get_post( $third_news_id );
					$attachment_id = '';
					$attachment_id = get_post_thumbnail_id( $third_news_id );
					$attach_src = wp_get_attachment_image_url( $attachment_id, 'tikets-main-speaker-lg' );
					$desc = carbon_get_post_meta( $third_news_id, 'post_short_desc' );
					?>
					<div class="news-type-2">
						<?php if (!empty( $attachment_id )) { ?>
							<img class="news-type-2__image mb-20" src="<?= $attach_src; ?>" alt="type-2" title=""/>
						<?php } ?>
                        <a href="<?= get_permalink($third_news_id);?>">
                            <h3 class="news__title news__title_red"><?= $third_news->post_title; ?></h3>
                        </a>

						<p class="news-type-2__description mt-20"><?= $desc; ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>