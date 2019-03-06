<?php
	global $post;
	get_header();
	//var_dump($post);
?>

<!--	<div class="loader">-->
<!--		<div class="loader__spinner loader__spinner_egg"></div>-->
<!--	</div>-->
	<header class="header">Header</header>

<?= get_the_title(); ?>
<?= wpautop($post->post_content); ?>
	<main class="main">
		
		<?php get_template_part( '/core/views/partnersCarousel' ) ?>

	</main>

	<footer class="footer">Footer</footer>
<?php
	get_footer();
?>