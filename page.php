<?php
	get_header();
	get_template_part( '/core/views/headerView' );

?>
<?php
	if (is_woocommerce()) {
		woocommerce_content();
	} else {
		while(have_posts()) : the_post();
			the_content();
		endwhile;
	}
?>
<?php
	get_footer();
