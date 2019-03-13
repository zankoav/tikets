<?php
	get_header();
//	get_template_part( '/core/views/headerView' );

?>
<?php

?>
	<div class="app">
		<header class="header">
			<div class="container">
				<div class="header__inner row">
					<div class="col-5 col-sm-2 col-md-3 col-hd-2">
						<a class="header__logo-link" href="/">
							<img class="header__logo-img" src="/wp-content/themes/tikets/src/icons/logo.ef168d.png"
								 alt="Seminar4U" title=""/>
						</a>
					</div>
					<div class="col-7 col-sm-10 col-md-9 col-hd-10">
						<nav class="header__navigation">
							<div class="header__menu">
								<ul class="header__menu-list">
									<li class="header__menu-item header__menu-item_active">
										<a href="#">О компании</a>
										<ul class="header__sub-menu-list">
											<li class="header__sub-menu-item header__sub-menu-item_active">
												<a href="#">О компании</a>
											</li>
											<li class="header__sub-menu-item">
												<a href="#">Календарь семинаров</a>
											</li>
											<li class="header__sub-menu-item">
												<a href="#">Магазин</a>
											</li>
										</ul>
									</li>
									<li class="header__menu-item">
										<a href="#">Календарь семинаров</a>
									</li>
									<li class="header__menu-item">
										<a href="#">Магазин</a>
									</li>
								</ul>
								<div class="header__search-and-login">
									<a class="header__search" href="#">
										<div class="header__search-title">Поиск
										</div>
										<img class="header__search-icon header__search-icon_mobile"
											 src="/wp-content/themes/tikets/src/icons/search-mobile.f5e714.svg"
											 alt="Search" title=""/>
										<img class="header__search-icon"
											 src="/wp-content/themes/tikets/src/icons/search.a0811e.svg" alt="Search"
											 title=""/>
									</a>
									<a class="header__login" href="#">
										<div class="header__login-title">Личный кабинет
										</div>
										<img class="header__login-icon header__login-icon_mobile"
											 src="/wp-content/themes/tikets/src/icons/login-mobile.17d2d1.svg"
											 alt="Login" title=""/>
										<img class="header__login-icon"
											 src="/wp-content/themes/tikets/src/icons/login.bf9d84.svg" alt="Login"
											 title=""/>
									</a>
								</div>
							</div>
							<div class="header__categories">
								<ul class="header__categories-list">
									<li class="header__categories-item header__categories-item_active">
										<a href="#">О компании</a>
									</li>
									<li class="header__categories-item">
										<a href="#">Календарь семинаров</a>
									</li>
									<li class="header__categories-item">
										<a href="#">Магазин</a>
									</li>
								</ul>
								<a class="header__categories-button" href="#">Список семинаров</a>
							</div>
							<a class="header__burger" href="#">
								<span></span>
								<span></span>
							</a>
						</nav>
					</div>
				</div>
			</div>
		</header>
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
		<footer class="footer pt-10 pb-10 pt-sm-40 pb-sm-40">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-3">
						<a class="footer__logo footer__logo_link" href="/">
							<img class="footer__logo footer__logo_link-image"
								 src="/wp-content/themes/tikets/src/icons/footer-logo.fcd590.png" alt="Seminar4U"
								 title=""/>
						</a>
					</div>
					<div class="col-12 col-sm-3 pt-10 pt-sm-00">
						<div class="footer__menu">
							<div class="footer__title pt-05 pb-05 pt-sm-00 pb-sm-00">Меню
							</div>
							<ul class="footer__menu footer__menu_list">
								<li class="footer__menu footer__menu_list-item footer__menu_active">
									<a href="#">О компании</a>
								</li>
								<li class="footer__menu footer__menu_list-item">
									<a href="#">Календарь семинаров</a>
								</li>
								<li class="footer__menu footer__menu_list-item">
									<a href="#">Магазин</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-sm-3 pt-10 pt-sm-00">
						<div class="footer__contacts">
							<div class="footer__title pt-05 pb-05 pt-sm-00 pb-sm-00">Контакты
							</div>
							<div class="footer__contacts footer__contacts_text">
								<img class="footer__contacts footer__contacts_text-image"
									 src="/wp-content/themes/tikets/src/icons/velcom.09a78e.png" alt="Velcom" title=""/>
								<a href="tel:+375293404483">+375 (29) 340 44 83</a>
							</div>
							<div class="footer__contacts footer__contacts_text">
								<img class="footer__contacts footer__contacts_text-image"
									 src="/wp-content/themes/tikets/src/icons/mts.a15c83.png" alt="Velcom" title=""/>
								<a href="tel:+375333004483">+375 (33) 300 44 83</a>
							</div>
							<div class="footer__contacts footer__contacts_text">
								<img class="footer__contacts footer__contacts_text-image"
									 src="/wp-content/themes/tikets/src/icons/email.84b8e5.png" alt="Velcom" title=""/>
								<a href="tel:info@spplaw.by">info@spplaw.by</a>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-3 pt-10 pt-sm-00">
						<div class="footer__address">
							<div class="footer__title pt-05 pb-05 pt-sm-00 pb-sm-00">Адрес
							</div>
							<div class="footer__address footer__address_text">Республика Беларусь, 220034, г. Минск, ул.
								Фрунзе, 3, комн. 203.
							</div>
						</div>
					</div>
				</div>
				<div class="footer__copyright pt-10 pt-sm-20">
					<div class="footer__copyright footer__copyright_text">© 2019. Все права защищены. УНП 805090058
					</div>
					<a class="footer__copyright footer__copyright_development" href="#">
						<span class="footer__copyright footer__copyright_development-text">Разработка сайта</span>
						<img class="footer__copyright footer__copyright_development-image"
							 src="/wp-content/themes/tikets/src/icons/develop.b811c0.svg" alt="mastak" title=""/>
					</a>
				</div>
			</div>
		</footer>
	</div>

<?php
	get_footer();
