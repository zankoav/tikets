<?php
	get_header();
?>

<div class="loader">
	<div class="loader__spinner loader__spinner_egg"></div>
</div>
<header class="header">Header</header>
<main class="main">

<?php get_template_part('/core/views/partnersCarousel')?>

</main>
<footer class="footer">Footer</footer>
<?php
get_footer();
?>