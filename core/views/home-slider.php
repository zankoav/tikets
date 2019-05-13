<?php
	$crb_slides = carbon_get_post_meta( get_the_ID(), 'crb_slides' );
?>


<div class="main-slider mb-30">
    <div class="main-slider__swiper swiper-container">
        <div class="main-slider__wrapper swiper-wrapper">
            <?php foreach($crb_slides as $crb_slide) :
                $main_speaker = $crb_slide['main_speaker'];
                $slide_title = $crb_slide['slide_title'];
                $slide_day = $crb_slide['slide_day'];
                $slide_month = $crb_slide['slide_month'];
                $slide_year = $crb_slide['slide_year'];
                $slide_address = $crb_slide['slide_address'];
                $slide_link = $crb_slide['slide_link'];
                $slide_image = $crb_slide['slide_image'];
            ?>
            <div class="slide swiper-slide">
                <div class="container">
                    <div class="row sl">
                        <div class="slide__order-1 col-12 col-sm-7 col-lg-6 col-hd-7 text text_image">
                            <div class="slide__img-wrapper">
                                <img class="slide__img"
                                     src="<?= $slide_image; ?>" alt=""
                                     role="presentation"/>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 col-lg-6 col-hd-5 text_content">
                            <div class="pl-sm-10 pl-md-20 pl-lg-40">
                                <div class="slide__autor my-10 my-sm-20 mt-md-40"><?= $main_speaker;?></div>
                                <h1 class="slide__title mb-10 mb-md-20"><?= $slide_title; ?></h1>
                                <div class="slide__date-time mb-10 mb-md-20">
                                    <div class="slide__day"><?= $slide_day; ?></div>
                                    <div class="slide__date">
                                        <div class="slide__mounth"><?= $slide_month; ?></div>
                                        <div class="slide__year"><?= $slide_year?></div>
                                    </div>
                                </div>
                                <p class="slide__location mb-10 mb-hd-20"><?= $slide_address; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="main-slider__pagination swiper-pagination">
    </div>
</div>