<?php
	if (!defined( 'ABSPATH' )) {
		exit();
	}
	
	get_header();
?>

<?php get_template_part( '/core/views/headerView' ); ?>
<main class="main">
	<div class="page404">
		<div class="container">
			<div class="page404__inner mt-40 mb-40 pb-20 pt-sm-20 pb-sm-40">
				<div class="row mb-20 mb-sm-00">
					<div class="col-12 col-sm-6 col-offset-md-1 col-md-5 col-offset-lg-2 pb-10 pb-sm-00 pr-sm-10 pr-md-20">
						<img class="page404__image" src="/wp-content/themes/tikets/src/icons/p404.c3287a.svg"
							 alt="page404" title=""/>
					</div>
					<div class="page404__mistake-wrapper col-12 col-sm-5 col-md-6 col-lg-5">
						<div class="page404__mistake">ошибка
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-offset-sm-5 col-sm-7 col-md-6 col-lg-7">
						<div class="page404__text">
							<p class="pb-10">УПС! Такой страницы не существует.</p>
							<p class="pb-05">Всю информацию можно найти &nbsp;<a class="page404__link" href="#">здесь
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_template_part( '/core/views/footerView' ); ?>

<?php
	get_footer();