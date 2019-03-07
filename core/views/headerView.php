<?php
	if (!defined( 'ABSPATH' )) exit();
	$logo = carbon_get_theme_option( 'crb_logo_img' ) ;
?>
<header class="header">
	<div class="container">
		<div class="header__inner row">
			<div class="col-5 col-sm-2 col-md-3 col-hd-2">
				<a class="header__logo-link" href="/">
					<img class="header__logo-img" src="<?= $logo; ?>" alt="Seminar4U" title=""/>
				</a>
			</div>
			<div class="col-7 col-sm-10 col-md-9 col-hd-10">
				<nav class="header__navigation">
					<div class="header__menu">
						<?php get_template_part( "/core/views/mainMenu" ); ?>
						<div class="header__search-and-login">
							<a class="header__search" href="#">
								<div class="header__search-title">Поиск</div>
								<img class="header__search-icon header__search-icon_mobile"
									 src="/wp-content/themes/tikets/src/icons/search-mobile.f5e714.svg" alt="Search"
									 title=""/>
								<img class="header__search-icon"
									 src="/wp-content/themes/tikets/src/icons/search.a0811e.svg" alt="Search" title=""/>
							</a>
							<a class="header__login" href="#">
								<div class="header__login-title">Личный кабинет </div>
								<img class="header__login-icon header__login-icon_mobile"
									 src="/wp-content/themes/tikets/src/icons/login-mobile.17d2d1.svg" alt="Login"
									 title=""/>
								<img class="header__login-icon"
									 src="/wp-content/themes/tikets/src/icons/login.bf9d84.svg" alt="Login" title=""/>
							</a>
						</div>
					</div>
					<div class="header__categories">
						<?php get_template_part( "/core/views/rightMenu" ); ?>
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
