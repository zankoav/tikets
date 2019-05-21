<?php
	/**
	 * Template Name: Checkout Order Template
	 */
	
	$productID  = $_GET[ 'seminar' ];
	$tariffID   = $_GET[ 'tariff' ];
	$_product   = wc_get_product( $productID );
	$prod_exist = empty( $_product ) ? false : true;
	
	if (!$prod_exist) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		get_template_part( 404 );
		exit();
	}
	
	get_header();
	$wsb_store             = carbon_get_theme_option( 'wsb_store' );
	$wsb_storeid           = carbon_get_theme_option( 'wsb_storeid' );
	$wsb_return_url        = carbon_get_theme_option( 'wsb_return_url' );
	$wsb_cancel_return_url = carbon_get_theme_option( 'wsb_cancel_return_url' );
	$wsb_notify_url        = carbon_get_theme_option( 'wsb_notify_url' );
	$public_offer_link     = carbon_get_theme_option( 'public_offer_link' );
	$cashless_page_link     = carbon_get_theme_option( 'cashless_page_link' );
    $discount_and_sail      = carbon_get_theme_option("discount_and_sail");
    $discount_and_sail_text      = carbon_get_theme_option("discount_and_sail_text");
	
	$main_speaker = carbon_get_post_meta( $productID, 'main_speaker' );
	
	$prodName   = $_product->get_title();
	$variations = $_product->get_available_variations();
	
	$variations_select = [];
	$currentTariff     = [];
	foreach($variations as $variation) {
        $buff_variation = '';
        foreach ($variation[ "attributes" ] as $item) {
            $buff_variation = $item;
//            var_dump($buff_variation );
            break;
        }
		$variations_select[] = [
			'variation'    => $buff_variation,
			'$price'       => $variation[ 'display_regular_price' ],
			'variation_id' => (int)$variation[ 'variation_id' ],
		];

//set current tariff
		if (!empty( $tariffID ) && $variation[ 'variation_id' ] == $tariffID) {
            $buff_variation = '';
            foreach ($variation[ "attributes" ] as $item) {
                $buff_variation = $item;
//                var_dump($buff_variation );
                break;
            }
			$currentTariff = [
				'variation'    => $buff_variation ,
				'$price'       => $variation[ 'display_regular_price' ],
				'variation_id' => (int)$variation[ 'variation_id' ],
			];
		}
	}
	if (empty( $currentTariff )) {
		$currentTariff = $variations_select[ 0 ];
	}

	get_template_part( '/core/views/headerView' ); ?>
<main class="main">
	<div class="checkout">
		<div class="container">
			<h2 class="title title_default title_grey mt-20 mb-20 mt-md-40 mb-lg-40">Оформление заказа</h2>
			<p class="title-autor "><?= $main_speaker; ?></p>
			<div class="row">
				<div class="col-12 col-md-10 col-lg-8 col-hd-7">
					<p class="sub-title mb-20 mb-40"><?= $prodName; ?></p>
				</div>
			</div>

            <div class="types">
                <div class="container">
                    <div class="types__wrapper-list">
                        <a class="types__button" href="#"></a>
                        <ul class="types__list">
                            <li class="types__list-tab" data-content="0">
                                <a class="types__tab-button" href="#">Физическое лицо</a>
                            </li>
                            <li class="types__list-tab types__list-tab_active" data-content="1">
                                <a class="types__tab-button" href="#">Юридическое лицо</a>
                            </li>
                        </ul>
                    </div>
                    <div class="types__content types__content types__content_active">

                        <form class="types__form" action="/" method="post" data-program-id="<?= $productID; ?>">
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-phone">Телефон
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9">
                                    <input class="checkout-form-group__input" id="user-phone" type="text"
                                           name="user-phone" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-name">ФИО
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9">
                                    <input class="checkout-form-group__input" id="user-name" type="text"
                                           name="user-name" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-email">Email
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9">
                                    <input class="checkout-form-group__input" id="user-email" type="email"
                                           name="user-email" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-tariff">Тариф
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9">
                                    <select class="checkout-form-group__select" id="user-tariff" name="user-tariff">
                                        <?php foreach($variations_select as $item) :
                                            $variation_name = $item[ 'variation' ];
                                            $price = $item[ '$price' ];
                                            $variation_id = $item[ 'variation_id' ];
                                            $is_current_tariff = '';
                                            if (!empty( $currentTariff ) && $variation_id == $currentTariff[ 'variation_id' ]) {
                                                $is_current_tariff = 'selected';
                                            }
                                            ?>
                                            <option value="<?= $variation_id; ?>" <?= $is_current_tariff; ?>
                                                    data-price="<?= $price; ?>"><?= $variation_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="checkout-form-group__message">
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-comment">
                                        Комментарий
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9">
                                    <textarea class="checkout-form-group__textarea" id="user-comment"
                                              name="user-comment" rows="4"></textarea>
                                </div>
                                <div class="checkout-form-group__message">
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-promokod">
                                        Промокод
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5 col-hd-7">
                                    <input class="checkout-form-group__input" id="user-promokod" type="text"
                                           name="user-promokod"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                                <div class="col-7 col-offset-5 col-offset-sm-0 col-sm-3 col-hd-2">
                                    <a class="checkout-form-group__apply mt-10 mt-sm-00" href="">Применить</a>
                                </div>
                            </div>
                            <div class="wrapp-overflow">
                                <textarea class="textarea" name="message" placeholder=""></textarea>
                            </div>
                            <div class="promokod pt-10 pb-10 pt-sm-20 py-md-40">
                                <div class="row">
                                    <div class="col-12 col-sm-11 col-offset-sm-1">
                                        <?php if(!empty($discount_and_sail)){?>
                                        <a href="<?= esc_url($discount_and_sail); ?>" class="promokod__program-description"><?= $discount_and_sail_text; ?></a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-11 col-offset-sm-1 mb-20 mb-lg-40 pb-hd-10">
                                        <div class="promokod__counter">
                                            <div class="promokod__iterator">
                                                <div class="promokod__results-count">
                                                    <a class="promokod__minus" href="#">&ndash;</a>
                                                    <div class="promokod__result"
                                                         style="
                                                         -webkit-touch-callout: none;
                                                         -webkit-user-select: none;
                                                         -khtml-user-select: none;
                                                         -moz-user-select: none;
                                                         -ms-user-select: none;
                                                         user-select: none;">1</div>
                                                    <a class="promokod__add" href="#">+</a>
                                                </div>
                                                <div class="promokod__iterator-subtitle">Билет
                                                </div>
                                            </div>
                                            <div class="promokod__counter-description">на сумму
                                                <div class="promokod__price"><?= $currentTariff[ '$price' ]; ?></div>
                                                рублей
                                            </div>
                                        </div>
                                        <div class="pay-type">
                                            <div class="pay-type__program">
                                                <p class="pay-type__program-title">Программа лояльности
                                                </p>
                                                <p class="pay-type__program-description">Авторизуйтесь, чтобы
                                                    воспользоваться скидкой по программе лояльности
                                                </p>
                                            </div>
                                            <div class="pay-type__options">
                                                <p class="pay-type__options-title">Способ оплаты
                                                </p>
                                                <div class="pay-type__options-item">
                                                    <label class="pay-type__options-item-label">
                                                        <input class="pay-type__options-item-input" name="type"
                                                               type="radio" id="1"/>
                                                        <span class="pay-type__options-item-check"></span>
                                                        <label class="pay-type__options-item-label-text">Онлайн-оплата
                                                            картой
                                                        </label>
                                                    </label>
                                                    <label class="pay-type__options-item-label">
                                                        <input class="pay-type__options-item-input" name="type"
                                                               type="radio" id="2"/>
                                                        <span class="pay-type__options-item-check"></span>
                                                        <label class="pay-type__options-item-label-text">Безналичный
                                                            платеж
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-offset-sm-5 col-sm-6 mb-10 mb-md-20">
                                        <a class="promokod__button-chekout" href="#">Оплатить</a>
                                        <a class="promokod__button-chekout-pay"
                                           href="<?= esc_url(get_permalink( $cashless_page_link ))  ;?>">Оплатить</a>
                                    </div>
                                    <div class="col-12 col-sm-11">
                                        <p class="promokod__description">Нажимая на кнопку “Оплатить”, Вы принимаете условия
                                            <a class="promokod__link" href="<?= esc_url( $public_offer_link ) ?>" target="_blank">Публичной оферты</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="types__content">
                        <form class="types__form" action="/" method="post" data-program-id="<?= $productID; ?>" id="form2">
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="name">ФИО
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9"><input class="checkout-form-group__input" id="name" type="text" name="name" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="komp">Название организации
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9"><input class="checkout-form-group__input" id="komp" type="text" name="komp" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="phone">Телефон
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9"><input class="checkout-form-group__input" id="phone" type="text" name="phone" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="email">Email
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9"><input class="checkout-form-group__input" id="email" type="email" name="email" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form-group row">
                                <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
                                    <label class="checkout-form-group__label mb-05 mb-sm-00" for="col">Количество билетов
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8 col-hd-9"><input class="checkout-form-group__input" id="col" type="text" name="col" required="required"/>
                                    <div class="checkout-form-group__message">
                                    </div>
                                </div>
                            </div>
                            <div class="wrapp-overflow">
                                <textarea class="textarea" name="message" placeholder=""></textarea>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 col-offset-sm-6 col-sm-6 mb-10 mb-md-20">
                                <a class="types__button-chekout" href="#">Заказать</a>
                            </div>
                            <div class="col-12 col-sm-12">
                                <p class="types__description">Нажимая на кнопку “Оплатить”, Вы принимаете условия
                                    <a class="types__link" href="<?= esc_url( $public_offer_link ) ?>"  target="_blank">Публичной оферты</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="bit_item"></button>
                </div>
            </div>
		</div>
        <div class="preloader">
            <div class="preloader__spinner preloader__spinner_egg"></div>
        </div>
	</div>
</main>
<?php get_template_part( '/core/views/footerView' );
	get_footer();