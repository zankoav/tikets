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

                <div class="envelope">
                    <div class="envelope__inner"><img class="envelope__img" src="/wp-content/themes/tikets/src/icons/envelope.e9ab12.svg" alt="envelope" title=""/>
                        <div class="envelope__text">подпишись на рассылку</div>
                        <form id="envelope__form" method="POST" action="/">
                            <?= do_shortcode('[mc4wp_form id="340"]');?>
                        </form>
                    </div>
                </div>

			</div>
		</div>
	</div>
</div>


<div class="news mb-40 pb-md-20 mt-40 mt-sm-20 mt-md-40">
    <div class="container">
        <h2 class="title title_red mb-20 mb-md-40 pb-lg-40">Новости</h2>
        <div class="row">
            <div class="col-12 col-sm-6 col-hd-5">
                <div class="news-type-1">
                    <div class="news-type-1__image-wrapp"><img class="news-type-1__image" src="/wp-content/themes/tikets/src/icons/man.4b4954.png" alt="man" title=""/>
                    </div>
                    <div class="news-type-1__text-wrapp">
                        <h3 class="news__title news__title_red">Lorem ipsum dolor sit amet</h3>
                        <p class="news-type-1__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eaque enim itaque labore laboriosam maxime nesciunt sapiente? Asperiores ea, exercitationem quasi recusandae sint suscipit voluptate? Assumenda eligendi facere optio voluptates.
                        </p>
                    </div>
                </div>
                <div class="red-news">
                    <h3 class="news__title">Lorem ipsum dolor sit amet</h3>
                    <p class="red-news__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eaque enim itaque labore laboriosam maxime nesciunt sapiente? Asperiores ea, exercitationem quasi recusandae sint suscipit voluptate? Assumenda eligendi facere optio voluptates.
                    </p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-hd-5 col-offset-hd-2">
                <div class="news-type-2"><img class="news-type-2__image mb-20" src="/wp-content/themes/tikets/src/icons/preloader.98dd08.jpg" alt="type-2" title=""/>
                    <h3 class="news__title news__title_red">Lorem ipsum dolor sit</h3>
                    <p class="news-type-2__description mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eaque enim itaque labore laboriosam maxime nesciunt sapiente? Asperiores ea, exercitationem quasi recusandae sint suscipit voluptate? Assumenda eligendi facere optio voluptates.
                    </p>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-lg-7 col-offset-sm-4 col-offset-lg-5 col-offset-hd-6">
                <div class="envelope">
                    <div class="envelope__inner"><img class="envelope__img" src="/wp-content/themes/tikets/src/icons/envelope.e9ab12.svg" alt="envelope" title=""/>
                        <div class="envelope__text">подпишись на рассылку
                        </div>
                        <form id="envelope__form" method="POST" action="/">
                            <div class="envelope__content">
                                <div class="envelope__title">введите e-mail
                                </div>
                                <div class="envelope__input">
                                    <input class="input-type-2" type="text" name="useremail" placeholder="">
                                </div>
                                <div class="envelope__response">
                                </div>
                                <div class="envelope__button">Записаться
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>