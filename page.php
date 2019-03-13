<?php
	get_header();
//	get_template_part( '/core/views/headerView' );

?>
<?php

?>
	<div class="app">
		<?php get_template_part( '/core/views/headerView' ); ?>
		<main class="main">
			<div class="container">
				<h1 class="title title_grey title_default mt-20 mt-sm-40"><?= get_the_title(); ?></h1>
				<div class="row mt-20 mb-30 mt-sm-40 mb-sm-40 pb-sm-40">
					<div class="col-12 col-offset-lg-2 col-lg-8">
						<div class="editor-content">
							<?php
								if (is_woocommerce()) {
									woocommerce_content();
								} else {
									while(have_posts()) : the_post();
										the_content();
									endwhile;
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php get_template_part( '/core/views/footerView' ); ?>
	</div>

<?php
	get_footer();
