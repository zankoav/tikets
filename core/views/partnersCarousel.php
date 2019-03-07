<?php
	global $post;
	$args  = [ 'post_type' => 'partner' ];
	$query = new WP_Query( $args );
?>
<div class="partners">
	<div class="container">
		<div class="partners__inner row">
			<div class="col-offset-1 col-10 col-sm-10 col-md-10 col-lg-10">
				<div class="partners__container swiper-container">
					<div class="partners__wrapper swiper-wrapper">
						<?php if ($query->have_posts()):
							while($query->have_posts()):
								$query->the_post();
								$partner_link = '';
								$image_url    = wp_get_attachment_url( get_post_thumbnail_id() );
								if (empty_content( get_the_content() )) {
									$partner_link = carbon_get_the_post_meta( 'partner_site_link' );
								} else {
									$partner_link = get_permalink( get_the_ID() );
								}
								?>
								<div class="partners__slide swiper-slide">
									<a class="partners__link"
									   href="<?= empty_content( get_the_content() ) ? esc_url( $partner_link ) : $partner_link; ?>">
										<img class="partners__img"
											 src="<?= $image_url; ?>"
											 alt="<?= get_the_title(); ?>"
											 title="<?= get_the_title(); ?>"/>
									</a>
								</div>
							<?php
							endwhile;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="partners__button-next swiper-button-next">
		</div>
		<div class="partners__button-prev swiper-button-prev">
		</div>
	</div>
</div>