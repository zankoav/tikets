<?php
	
	if (!defined( 'ABSPATH' )) {
		exit; // Exit if accessed directly
	}
	get_header();
	$checkoutLink = getCheckoutPermaLink();
?>
	<div class="app">
		<?php get_template_part( '/core/views/headerView' ); ?>
		<main class="main">
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				//do_action( 'woocommerce_before_main_content' );
				
				while(have_posts()) : the_post();
					$main_speaker  = carbon_get_post_meta( get_the_ID(), 'main_speaker' );
					$attachment_id = get_post_thumbnail_id();
					$attach_src    = wp_get_attachment_image_url( $attachment_id, 'tikets-main-speaker-lg' );
					$attach_srcset = wp_get_attachment_image_srcset( $attachment_id, 'tikets-main-speaker-lg' );
					$attach_sizes  = wp_get_attachment_image_sizes( $attachment_id, 'tikets-main-speaker-lg' );
					
					get_template_part( '/core/views/product', 'welcom' ); ?>
					<div class="video-promo">
						<div class="container">
							<div class="video-promo__inner row mt-20 mt-md-30 mb-40">
								<div class="col-12 col-sm-6">
									<div class="video-promo__date-time">
										<div class="video-promo__day">15
										</div>
										<div class="video-promo__date">
											<div class="video-promo__mounth">Марта
											</div>
											<div class="video-promo__year">2019
											</div>
										</div>
									</div>
									<div class="video-promo__start-time my-10 my-sm-20">16:00
									</div>
									<p class="video-promo__location mb-20 mb-hd-20">Минск, Рокоссовского, 158, гостиница
										"Салют"
									</p>
								</div>
								<div class="col-12 col-sm-6 col-lg-5 col-hd-4">
									<div class="video-review">
										<div class="video-review__man mb-05">
											<img class="video-review__image"
												 src="/wp-content/themes/tikets/src/icons/speker.6e0d00.png"
												 alt="speaker" title=""/>
											<div class="video-review__wrapper">
												<h2 class="video-review__title">Иван Петров
												</h2>
												<p class="video-review__position">Компания SkyWall, CE Copy 3
												</p>
											</div>
										</div>
										<div class="video-review__video">
											<video class="video-review__sorce-video" controls
												   poster="/wp-content/themes/tikets/src/icons/preloader.98dd08.jpg">
												<source src="/wp-content/themes/tikets/src/video/v.8e418f.mp4"
														type="video/mp4">
											</video>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tabs">
						<div class="container">
							<div class="tabs__wrapper-list">
								<a class="tabs__button" href="#"></a>
								<ul class="tabs__list">
									<li class="tabs__list-tab" data-content="0">
										<a class="tabs__tab-button" href="#">Программа</a>
									</li>
									<li class="tabs__list-tab tabs__list-tab_active" data-content="1">
										<a class="tabs__tab-button" href="#">О спикере</a>
									</li>
									<li class="tabs__list-tab" data-content="2">
										<a class="tabs__tab-button" href="#">О чем курс</a>
									</li>
									<li class="tabs__list-tab" data-content="3">
										<a class="tabs__tab-button" href="#">Тарифы</a>
									</li>
									<li class="tabs__list-tab" data-content="4">
										<a class="tabs__tab-button" href="#">Онлайн-трансляция</a>
									</li>
								</ul>
							</div>
							<?php get_template_part( '/core/views/product', 'program' ); ?>
							<?php get_template_part( '/core/views/product', 'spiker' ); ?>
							<div class="tabs__content">
								<div class="block-with-label">
									<div class="container">
										<div class="block-with-label__inner mt-20 mb-20 mt-lg-40 mb-lg-40">
											<h2 class="title title_grey">О ЧЕМ КУРС</h2>
											<div class="block-with-label__wrapper mt-20 mt-sm-20 mt-md-40">
												<div class="row">
													<div class="block-with-label__label">
														<p class="block-with-label__label-title col-12 col-sm-11 col-offset-sm-1">
															Этот мастер-класс — самый эффективный тренинг по маркетингу.
															Он для тех, кому всё время чего-то не хватает: рук, знаний,
															времени… Вы придете — и мы с вами всё сделаем.
														</p>
														<div class="editor-content col-12 col-sm-10 col-offset-sm-2">
															<h3>ОН ИНТЕРАКТИВНЫЙ</h3>
															<p>Это не лекция - два спикера постоянно работают с
																аудиторией: мозговые штурмы, тесты, чек-листы, задания,
																упражнения, проверка, рекомендации…</p>
															<h3>ОН СИСТЕМНЫЙ</h3>
															<p>Вы увидите, что у вас сделано (что есть), что сделано
																хорошо и что плохо, что вам нужно сделать (чего у вас
																еще нет). В мастер-классе очень много полезных знаний, и
																вы их получаете по понятной системе — от простого к
																сложному.</p>
															<h3>ОН ПРАКТИЧНЫЙ</h3>
															<p>40% нужных вещей мы сделаем прямо в аудитории, другие вы
																сможете сделать в следующие 7 дней по чек-листам,
																которые мы вам передадим.</p>
														</div>
														<div class="block-with-label__label-content pt-20 pb-20 pb-sm-40 col-sm-9 col-offset-sm-1">
															<div class="block-with-label__label-content-inner">
																<div class="block-with-label__label-content-inner-title">
																	Программа разделена на четыре части — от «подготовки
																	к старту» до «выхода на орбиту».
																</div>
																<div class="block-with-label__label-content-inner-text">
																	На каждом этапе вы получите все нужные знания,
																	умения, навыки и инструменты для старта/перезапуска
																	необходимых для бизнеса маркетинговых инструментов.
																</div>
																<div class="block-with-label__label-content-inner-promo">
																	Программа тренинга по маркетингу представлена в
																	pdf-файле (обязательно ознакомьтесь)
																</div>
																<div class="block-with-label__label-content-inner-button">
																	<a class="orange-button orange-button__type_1"
																	   href="#">Скачать
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="block-without-label">
									<div class="container">
										<div class="block-without-label__inner mt-20 mb-20 mt-lg-40 mb-lg-40">
											<h2 class="title title_grey">кому посетить</h2>
											<div class="block-without-label__wrapper mt-20 mt-sm-20 mt-md-40">
												<div class="row">
													<div class="block-without-label__label">
														<p class="block-without-label__label-title col-12 col-sm-11 col-offset-sm-1">
															Маркетинг нужен всем, а не только тем, кто производит и
															продаёт
														</p>
														<div class="editor-content col-12 col-sm-10 col-offset-sm-2">
															<h3>РУКОВОДИТЕЛЮ</h3>
															<p>Важно разбираться во всех точках контакта с клиентами,
																использовать нужные инструменты, не тратя огромный
																бюджет на рекламу. Бизнес - это цифры. Важно следить за
																показателями, знать, на каком этапе находится клиент.
																Понимать стратегию комплексного маркетинга компании.</p>
															<h3>МАРКЕТОЛОГУ</h3>
															<p>На фундаменте имеющихся знаний и опыта, овладеть
																комплексным видением всей стратегии построения компании.
																Грамотно выстраивать бренд компании. Получить новые
																инструменты, генерирующие поток заявок и клиентов.</p>
															<h3>НАЧИНАЮЩЕМУ СПЕЦИАЛИСТУ</h3>
															<p>Программы в ВУЗ не адаптированы под изменения в
																экономике. Можно самостоятельно изучать, как строить
																воронку продаж, настраивать трафик. НО! Для приобретения
																основных знаний необходимо овладеть стратегией
																комплексного маркетинга.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs__content">
								<div class="tariffs">
									<div class="container">
										<div class="tariffs__inner">
											<h2 class="title title_grey">тарифы</h2>
											<div class="row">
												<div class="col-12 col-sm-10 col-offset-sm-2">
													<div class="tariffs__description">Выберите наиболее подходящий
														формат участия
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-11 col-sm-5">
													<div class="standard">
														<div class="standard__title">стандарт
														</div>
														<ul class="standard__list">
															<li class="standard__list-item">Рабочий материал для
																обучения
															</li>
															<li class="standard__list-item">Места с середины зала
															</li>
															<li class="standard__list-item">Общий нетворкинг
															</li>
															<li class="standard__list-item">Фотоотчет события
															</li>
															<li class="standard__list-item">Файл с презентацией тренинга
															</li>
															<li class="standard__list-item">2 кофе-брейка
															</li>
														</ul>
														<div class="button-with-balls">узнать цену
															<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
															<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
															<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_orange"></span>
														</div>
													</div>
													<div class="vip">
														<div class="vip__title">vip
														</div>
														<ul class="vip__list">
															<li class="vip__list-item">Рабочий материал для обучения
															</li>
															<li class="vip__list-item">Места с середины зала
															</li>
															<li class="vip__list-item">Общий нетворкинг
															</li>
															<li class="vip__list-item">Фотоотчет события
															</li>
															<li class="vip__list-item">Файл с презентацией тренинга
															</li>
															<li class="vip__list-item">2 кофе-брейка
															</li>
															<li class="vip__list-item">Рабочий материал для обучения
															</li>
															<li class="vip__list-item">Места с середины зала
															</li>
															<li class="vip__list-item">Общий нетворкинг
															</li>
															<li class="vip__list-item">Фотоотчет события
															</li>
															<li class="vip__list-item">Файл с презентацией тренинга
															</li>
															<li class="vip__list-item">2 кофе-брейка
															</li>
															<li class="vip__list-item">Рабочий материал для обучения
															</li>
															<li class="vip__list-item">Места с середины зала
															</li>
															<li class="vip__list-item">Общий нетворкинг
															</li>
														</ul>
														<div class="vip__price">400 Br
														</div>
														<a class="orange-button orange-button__vip" href="#">
															записаться
														</a>
													</div>
												</div>
												<div class="col-11 col-sm-5 col-offset-sm-2">
													<div class="business">
														<div class="business__title">business
														</div>
														<ul class="business__list">
															<li class="business__list-item">Рабочий материал для
																обучения
															</li>
															<li class="business__list-item">Места с середины зала
															</li>
															<li class="business__list-item">Общий нетворкинг
															</li>
															<li class="business__list-item">Фотоотчет события
															</li>
															<li class="business__list-item">Файл с презентацией тренинга
															</li>
															<li class="business__list-item">2 кофе-брейка
															</li>
															<li class="business__list-item">Рабочий материал для
																обучения
															</li>
															<li class="business__list-item">Места с середины зала
															</li>
															<li class="business__list-item">Общий нетворкинг
															</li>
															<li class="business__list-item">Фотоотчет события
															</li>
															<li class="business__list-item">Файл с презентацией тренинга
															</li>
														</ul>
														<div class="business__price">200 Br
														</div>
														<a class="orange-button orange-button__vip" href="#">
															записаться
														</a>
													</div>
													<div class="platinum">
														<div class="platinum__title">platinum
														</div>
														<ul class="platinum__list">
															<li class="platinum__list-item">Рабочий материал для
																обучения
															</li>
															<li class="platinum__list-item">Места с середины зала
															</li>
															<li class="platinum__list-item">Общий нетворкинг
															</li>
															<li class="platinum__list-item">Фотоотчет события
															</li>
															<li class="platinum__list-item">Файл с презентацией тренинга
															</li>
															<li class="platinum__list-item">2 кофе-брейка
															</li>
															<li class="platinum__list-item">Рабочий материал для
																обучения
															</li>
															<li class="platinum__list-item">Места с середины зала
															</li>
															<li class="platinum__list-item">Общий нетворкинг
															</li>
															<li class="platinum__list-item">Фотоотчет события
															</li>
															<li class="platinum__list-item">Файл с презентацией тренинга
															</li>
														</ul>
														<div class="button-with-balls button-with-balls__white">узнать
															цену
															<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
															<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
															<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_white"></span>
														</div>
														<!--start second option-->
														<div class="platinum__price">400 Br
														</div>
														<a class="orange-button orange-button__vip" href="#">
															записаться
														</a>
														<!--end-->
													</div>
												</div>
											</div>
											<div class="seminarforu">
												<div class="container mb-30 mb-sm-40 pb-lg-40">
													<div class="row">
														<div class="col-12 col-sm-7">
															<img class="seminarforu__image d-b"
																 src="/wp-content/themes/tikets/src/icons/hand.6babc4.png"
																 alt="hand" title=""/>
															<div class="d-b pos-r">
																<span class="seminarforu__line d-b pos-a"></span>
															</div>
														</div>
														<div class="col-12 col-sm-5 mt-10 pos-sm-r">
															<div class="seminarforu__sign pos-sm-a">Запишись</div>
														</div>
													</div>
													<div class="row mt-20 mt-sm-40 pt-md-40 pt-lg-00 pt-hd-20">
														<div class="col-12 col-sm-6">
															<div class="seminarforu__list">
																<a class="seminarforu__list-current d-b" href="#">
																	Выбрать семинар
																</a>
																<div class="pos-r">
																	<ul class="seminarforu__list-items pos-a">
																		<li class="seminarforu__item">
																			<a class="seminarforu__item-link" href="#"
																			   data-id="1">
																				<span class="seminarforu__item-link-point mr-10"
																					  style="background-color:#f00"></span>
																				<p class="seminarforu__item-link-title">
																					как улучшить маркетинг в компании за
																					3 рабочих недели
																				</p></a>
																		</li>
																		<li class="seminarforu__item">
																			<a class="seminarforu__item-link" href="#"
																			   data-id="2">
																				<span class="seminarforu__item-link-point mr-10"
																					  style="background-color:#ff0"></span>
																				<p class="seminarforu__item-link-title">
																					как улучшить маркетинг в компании за
																					3 рабочих недели
																				</p></a>
																		</li>
																		<li class="seminarforu__item">
																			<a class="seminarforu__item-link" href="#"
																			   data-id="3">
																				<span class="seminarforu__item-link-point mr-10"
																					  style="background-color:#f0f"></span>
																				<p class="seminarforu__item-link-title">
																					как улучшить маркетинг в компании за
																					3 рабочих недели
																				</p></a>
																		</li>
																		<li class="seminarforu__item">
																			<a class="seminarforu__item-link" href="#"
																			   data-id="4">
																				<span class="seminarforu__item-link-point mr-10"
																					  style="background-color:#0f0"></span>
																				<p class="seminarforu__item-link-title">
																					как улучшить маркетинг в компании за
																					3 рабочих недели
																				</p></a>
																		</li>
																		<li class="seminarforu__item">
																			<a class="seminarforu__item-link" href="#"
																			   data-id="5">
																				<span class="seminarforu__item-link-point mr-10"
																					  style="background-color:#0ff"></span>
																				<p class="seminarforu__item-link-title">
																					как улучшить маркетинг в компании за
																					3 рабочих недели
																				</p></a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="col-12 col-sm-6 mt-10 mt-sm-00">
															<a class="seminarforu__button-sign d-b" href="#" target="_blank">Запиcаться</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
<!--							<div class="tabs__content">Content Онлайн-трансляция</div>-->
						</div>
					</div>
					<?php get_template_part( '/core/views/home', 'seminarforu' ) ?>
					<?php //wc_get_template_part( 'content', 'single-product' ); ?>
				
				<?php endwhile; // end of the loop. ?>
			
			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				//do_action( 'woocommerce_after_main_content' );
			?>
			<?php
				get_template_part( '/core/views/product', 'partnersCarousel' );
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				//		do_action( 'woocommerce_sidebar' );
			?>

		</main>
		<?php get_template_part( '/core/views/footerView' ); ?>

	</div>
<?php
	get_footer();

