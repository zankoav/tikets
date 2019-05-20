<?php
    /**
     * Template Name: Home Template
     */
    get_header();

?>
<?php get_template_part('/core/views/headerView'); ?>
<main class="main">
    <div class="home-wrapper">
        <?php get_template_part('/core/views/home', 'slider') ?>
        <?php get_template_part( '/core/views/home', 'benefits' ); ?>
        <?php get_template_part( '/core/views/home', 'stock' ) ?>
        <?php //get_template_part( '/core/views/home', 'seminarforu' ) ?>
        <?php get_template_part( '/core/views/home', 'reviews' ) ?>
        <?php get_template_part( '/core/views/home', 'news' ) ?>
        <?php get_template_part( '/core/views/home', 'partnership' ) ?>
    </div>
</main>
<?php get_template_part('/core/views/footerView'); ?>

<?php
    get_footer();
?>
