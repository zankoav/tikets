<?php
	$benefit_1_text = carbon_get_post_meta( get_the_ID(), 'crb_benefit_1_text' );
	$benefit_2_text = carbon_get_post_meta( get_the_ID(), 'crb_benefit_2_text' );
	$benefit_3_text = carbon_get_post_meta( get_the_ID(), 'crb_benefit_3_text' );
	$benefit_4_text = carbon_get_post_meta( get_the_ID(), 'crb_benefit_4_text' );
	
	$benefit_1_icon = carbon_get_post_meta( get_the_ID(), 'crb_benefit_1_icon' );
	$benefit_2_icon = carbon_get_post_meta( get_the_ID(), 'crb_benefit_2_icon' );
	$benefit_3_icon = carbon_get_post_meta( get_the_ID(), 'crb_benefit_3_icon' );
	$benefit_4_icon = carbon_get_post_meta( get_the_ID(), 'crb_benefit_4_icon' );
	?>

<div class="features__swiper swiper-container">
	<div class="features__swiper-wrapp swiper-wrapper">
		<div class="features__slide features__slide_1 swiper-slide">
			<div class="feature">
				<img class="feature__image" src="<?= $benefit_1_icon;?>" alt="icon" title=""/>
				<h3 class="feature__title feature__title_blue"><?= $benefit_1_text;?></h3>
			</div>
		</div>
		<div class="features__slide features__slide_2 swiper-slide">
			<div class="feature">
				<img class="feature__image"
				     src="<?= $benefit_2_icon;?>" alt="icon"
				     title=""/>
				<h3 class="feature__title feature__title_red"><?= $benefit_2_text;?></h3>
			</div>
		</div>
		<div class="features__slide features__slide_3 swiper-slide">
			<div class="feature">
				<img class="feature__image"
				     src="<?= $benefit_3_icon;?>" alt="icon"
				     title=""/>
				<h3 class="feature__title feature__title_gray"><?= $benefit_3_text;?></h3>
			</div>
		</div>
		<div class="features__slide features__slide_4 swiper-slide">
			<div class="feature">
				<img class="feature__image" src="<?= $benefit_4_icon;?>"
				     alt="icon" title=""/>
				<h3 class="feature__title feature__title_orange"><?= $benefit_4_text;?></h3>
			</div>
		</div>
	</div>
</div>