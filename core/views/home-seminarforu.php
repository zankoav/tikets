<?php
	
	//	$reviews = carbon_get_post_meta(get_the_ID(),'crb_reviews');
	$myQuery = new WP_Query( [ 'post_type' => 'product' ] );

?>

<div class="seminarforu">
	<div class="container mb-30 mb-sm-40 pb-lg-40">
		<div class="row">
			<div class="col-12 col-sm-7">
				<img class="seminarforu__image d-b" src="/wp-content/themes/tikets/src/icons/hand.6babc4.png" alt="hand"
					 title=""/>
				<div class="d-b pos-r">
					<span class="seminarforu__line d-b pos-a"></span>
				</div>
			</div>
			<div class="col-12 col-sm-5 mt-10 pos-sm-r">
				<div class="seminarforu__sign pos-sm-a">Запишись
				</div>
			</div>
		</div>
		<div class="row mt-20 mt-sm-40 pt-md-40 pt-lg-00 pt-hd-20">
			<div class="col-12 col-sm-6">
				<div class="seminarforu__list">
					<a class="seminarforu__list-current d-b" href="#">Выбрать семинар</a>
					<div class="pos-r">
						<ul class="seminarforu__list-items pos-a">
							<?php if ($myQuery->have_posts()):
								while($myQuery->have_posts()):
									$myQuery->the_post();
									$terms = wp_get_post_terms( get_the_ID(), 'product_cat', [ 'fields' => 'ids' ] );
									$term_color ='';
									foreach($terms  as $item) {
										$term_color =  carbon_get_term_meta( $item, 'circle_color' );
										break;
									}
									?>
									<li class="seminarforu__item">
										<a class="seminarforu__item-link" href="#" data-id="<?= get_the_ID(); ?>">
									<span class="seminarforu__item-link-point mr-10"
										  style="background-color:<?= $term_color; ?>"></span>
											<p class="seminarforu__item-link-title">
												<?= get_the_title();?>
											</p></a>
									</li>
								<?php
								endwhile;
								wp_reset_postdata();
								endif;
								?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 mt-10 mt-sm-00">
				<a class="seminarforu__button-sign d-b" href="#" target="_blank">Запиcаться</a>
			</div>
		</div>
	</div>
</div>