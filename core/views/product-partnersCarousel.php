<?php
	$query_partners = carbon_get_post_meta( get_the_ID(), 'crb_partners' );
	if (!empty( $query_partners )):
		?>

		<div class="partners">
			<div class="container mb-20 mb-sm-30 mb-lg-40 pb-lg-20">
				<div class="partners__inner row">
					<div class="col-offset-1 col-10 col-sm-10 col-md-10 col-lg-10">
						<div class="partners__container swiper-container">
							<div class="partners__wrapper swiper-wrapper">
								<?php
									foreach($query_partners as $query_partner) :
										
										$buff = get_post( $query_partner[ 'id' ] );
										
										$url       = $query_partner[ 'crb_show_content' ] ? '' : '';
										$name      = $buff->post_title;
										$image_url = wp_get_attachment_url( get_post_thumbnail_id( $query_partner[ 'id' ] ) );
										$url       = carbon_get_post_meta( $query_partner[ 'id' ], 'partner_site_link' );
										$flag      = $query_partner[ 'show_partner_site' ];
										?>
										<div class="partners__slide swiper-slide">

											<a class="partners__link"
											   href="<?= $flag ? esc_url( $url ) : get_permalink( $query_partner[ 'id' ] ); ?>">
												<img class="partners__img"
													 src="<?= $image_url; ?>"
													 alt="<?= $name; ?>" title="<?= $name; ?>"/>
											</a>
										</div>
									<?php endforeach; ?>
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
	
	<?php endif; ?>