<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit();
	}
	get_header();
?>
<main class="p404">
    <h1 class="p404__title"><?= __( 'Error 404!', 'zankoav' ); ?></h1>
    <h2 class="p404__subtitle"><?= __( 'Page not found', 'zankoav' ); ?></h2>
</main>
<?php get_footer(); ?>
