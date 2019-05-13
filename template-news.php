<?php
    /**
     * Template Name: News Archive Template
     */

    get_header();
    get_template_part('/core/views/headerView');

//    $news_args = [
//        'post_type' => 'post',
//
//    ];
    $query     = new WP_Query('category_name=news');
?>
<main class="main">
    <div class="news-all">
        <div class="news-all__inner container">
            <h1 class="title title_grey title_default mt-20 mt-sm-40"><?= get_the_title(); ?></h1>
            <div class="news-all__content row">
                <div class="news-all__container">
                    <div class="row">
                        <?php
                            if ($query->have_posts()):
                                while ($query->have_posts()):
                                    $query->the_post(); ?>
                                    <div class="news-all__slide col-12 col-sm-6 col-lg-4">
                                        <?php the_post_thumbnail( "news_in_archive", ["class" => "news-all__image"] ); ?>
                                        <div class="news-all__envelope pt-20">
                                            <div class="news-all__title"><?= the_title(); ?></div>
                                            <div class="news-all__description pt-05 pb-10">
                                                <?= carbon_get_post_meta(get_the_ID(), "post_short_desc");?>
                                            </div>
                                            <a href="<?= get_permalink(); ?>" class="button-with-balls">подробнее
                                                <span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
                                                <span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
                                                <span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_orange"></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; endif; wp_reset_postdata();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    get_template_part('/core/views/footerView');
    get_footer();
?>

