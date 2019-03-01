<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit();
	}
	get_header();
?>
<main class="default">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="default__title">
				<h1 class="title title_default"><?= get_the_title(); ?></h1>
			</div>
			<div class="default__container editor-content">
				<?= get_the_content(); ?>
			</div>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
