<?php

	if (!defined( 'ABSPATH' )) {
		exit; // Exit if accessed directly
	}
	get_header();

	$query_obj = get_queried_object();

	$prod_cat_banner_img     = carbon_get_theme_option( 'prod_cat_banner_img');
	$prod_cat_banner_link     = carbon_get_theme_option( 'prod_cat_banner_link');
?>
	<div class="app">
		<?php get_template_part( '/core/views/headerView' ); ?>
		<main class="main">
			<div class="realty">
				<div class="container">
					<div class="realty__inner">
						<div class="realty__title"><?= $query_obj->name; ?></div>
						<div class="realty__list">
							<?php if (have_posts()): while(have_posts()):
								the_post();
								$main_speaker     = carbon_get_post_meta( get_the_ID(), 'main_speaker' );
								$prod_address     = carbon_get_post_meta( get_the_ID(), 'prod_address' );
								$prod_date_time   = carbon_get_post_meta( get_the_ID(), 'prod_date_time' );
								$main_speaker_img = carbon_get_post_meta( get_the_ID(), 'main_speaker_img' );

								$dateTimeToStr = '';
								if (!empty( $prod_date_time )) {
									$dateTime = new DateTime( $prod_date_time );
									$day      = $dateTime->format( 'j' );
									if (!empty( $day ))
										$dateTimeToStr .= $day . " ";
									$month = getMonthNameRu( $dateTime->format( 'm' ) );
									if (!empty( $month ))
										$dateTimeToStr .= $month . " ";
									$year = $dateTime->format( 'Y' );
									if (!empty( $year ))
										$dateTimeToStr .= $year;
									$time = $dateTime->format( ' G:i' );
									if (!empty( $time ))
										$dateTimeToStr .= ", " . $time;
								}

								?>
                                <div class="realty__item">
                                    <div class="realty__speaker">
                                        <?php if (!empty($main_speaker_img)):?>
                                            <img class="realty__image" src="<?= $main_speaker_img; ?>" alt="realty" title=""/>
                                        <?php endif;?>
                                    </div>
                                    <div class="realty__content">
                                        <div class="realty__shell">
                                            <div class="realty__envelope">
                                                <div class="realty__name"><?= $main_speaker; ?>
                                                </div>
                                                <div class="realty__description"><?= get_the_title(); ?></div>
                                            </div>
                                            <div class="realty__wrapper">
                                                <div class="realty__date"><?= $dateTimeToStr; ?></div>
                                                <div class="realty__address"><?= $prod_address; ?></div>
                                            </div><img class="realty__plus" src="/wp-content/themes/tikets/src/icons/PlusIcon.1aca68.svg" alt="plus" title=""/>
                                        </div>
                                        <div class="realty__cover">
                                            <div class="realty__text"><?= get_the_content(); ?></div>
                                            <a class="orange-button " href="<?= get_permalink(); ?>">подробнее</a>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<a class="banner" href="<?= esc_url($prod_cat_banner_link); ?>">
					<img class="banner__image" src="<?= esc_url($prod_cat_banner_img);?>" alt="banner"
						 title=""/>
				</a>
			</div>
		</main>
		<?php get_template_part( '/core/views/footerView' ); ?>
	</div>
<?php
	get_footer();
