<?php
	$prod_date_time    = carbon_get_post_meta( get_the_ID(), 'prod_date_time' );
	$prod_address      = carbon_get_post_meta( get_the_ID(), 'prod_address' );
	$reviewer_name     = carbon_get_post_meta( get_the_ID(), 'reviewer_name' );
	$reviewer_image    = carbon_get_post_meta( get_the_ID(), 'reviewer_image' );
	$reviewer_position = carbon_get_post_meta( get_the_ID(), 'reviewer_position' );
	$reviewer_video    = carbon_get_post_meta( get_the_ID(), 'reviewer_video' );
	$video_preview     = carbon_get_post_meta( get_the_ID(), 'video_preview' );
	
	//	var_dump($prod_date_time );
	$dateTime = new DateTime( $prod_date_time );
	$day      = $dateTime->format( 'j' );
	$month    = getMonthNameRu( $dateTime->format( 'm' ) );
	$year     = $dateTime->format( 'Y' );
	$time     = $dateTime->format( ' G:i' );
?>
<div class="video-promo">
	<div class="container">
		<div class="video-promo__inner row mt-20 mt-md-30 mb-40">
			<div class="col-12 col-sm-6">
				<div class="video-promo__date-time">
					<div class="video-promo__day"><?= $day; ?></div>
					<div class="video-promo__date">
						<div class="video-promo__mounth"><?= $month; ?></div>
						<div class="video-promo__year"><?= $year; ?></div>
					</div>
				</div>
				<div class="video-promo__start-time my-10 my-sm-20"><?= $time; ?></div>
				<p class="video-promo__location mb-20 mb-hd-20"><?= $prod_address; ?></p>
			</div>
			<div class="col-12 col-sm-6 col-lg-5 col-hd-4">
				<div class="video-review">
					<div class="video-review__man mb-05">
						<img class="video-review__image" src="<?= $reviewer_image; ?>" alt="speaker" title=""/>
						<div class="video-review__wrapper">
							<h2 class="video-review__title"><?= $reviewer_name; ?></h2>
							<p class="video-review__position"><?= $reviewer_position; ?></p>
						</div>
					</div>
					<div class="video-review__video">
						<video class="video-review__sorce-video" controls poster="<?= $video_preview; ?>">
							<source src="<?= $reviewer_video; ?>" type="video/mp4">
						</video>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>