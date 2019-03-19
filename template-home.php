<?php
	/**
	 * Template Name: Home Template
	 */
	get_header();
	
	//$oembed = carbon_get_theme_option('crb_oembed');
	//var_dump($oembed);
	//	echo wp_oembed_get($oembed);
?>
<div class="app">
	<?php get_template_part( '/core/views/headerView' ); ?>
	<main class="main">

		<?php get_template_part('/core/views/home','slider')?>
		<div class="features">
			<div class="container features_mobile">
				<div class="features__inner">
					<?php get_template_part( '/core/views/home','benefits' ); ?>
					<div class="features__pagination-wrapper pos-a">
						<div class="features__pagination swiper-pagination">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('/core/views/home','stock')?>
		<?php get_template_part('/core/views/home','seminarforu')?>
		<?php get_template_part('/core/views/home','reviews')?>
		<?php get_template_part('/core/views/home','news')?>
		<div class="mb-40">
			<div class="partnership">
				<div class="container">
					<div class="partnership__inner">
						<h2 class="title title_grey">ПАРТНЕРСТВО</h2>
						<div class="mt-20 mb-20 mt-sm-40 mb-sm-40 pt-md-15"><a class="partnership__download pb-05 pb-sm-10" href="http://tut.by/sdvbsjbdv.pdf">скачайте коммерческое предложение для партнеров скачайте коммерческое предложение для партнеров</a><a class="partnership__download" href="http://tut.by/sdvbsjbdv.pdf">скачайте коммерческое предложение для партнеров</a>
						</div>
					</div>
					<form id="partnership__form" method="POST" action="/">
						<div class="row">
							<div class="col-12 col-sm-5 pb-sm-00">
								<div class="partnership__input pb-10">
									<input class="input" type="text" name="username" placeholder="имя">
								</div>
								<div class="partnership__input pb-10 pb-sm-00">
									<input class="input" type="text" name="useremail" placeholder="почта">
								</div>
							</div>
							<div class="col-12 col-sm-7 pb-20 pb-sm-00">
								<div class="partnership__textarea">
									<textarea class="textarea" name="usermessage" placeholder="CООБЩЕНИЕ"></textarea>
								</div>
							</div>
							<div class="partnership__textarea partnership__textarea_oh">
								<textarea class="textarea" name="message" placeholder=""></textarea>
							</div>
							<div class="col-12 col-sm-6 col-offset-sm-2 pt-sm-20 pt-md-40">
								<div class="partnership__button">
									<button class="button button__color_red" type="submit" name="userbutton">Записаться</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
