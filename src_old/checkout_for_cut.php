<!DOCTYPE html>
<html>
<head></head>
<body class="body_overflow_hidden app">


<form class="checkout__form" action="/" method="post" data-program-id="<?= $productID; ?>">

    <div class="checkout-form-group row">
        <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
            <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-phone">Промокод</label>
        </div>
        <div class="col-12 col-sm-8 col-hd-9">
            <input class="checkout-form-group__input" id="user-promocode" type="text" name="user-promocode" />
            <div class="checkout-form-group__message">
            </div>
        </div>
        <a class="promokod__button-chekout" href="" id="check_coupone">check-coupone</a>
    </div>

    <div class="checkout-form-group row">
        <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
            <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-phone">Телефон</label>
        </div>
        <div class="col-12 col-sm-8 col-hd-9">
            <input class="checkout-form-group__input" id="user-phone" type="text" name="user-phone"
                   required="required"/>
            <div class="checkout-form-group__message">
            </div>
        </div>
    </div>
    <div class="checkout-form-group row">
        <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
            <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-name">Имя</label>
        </div>
        <div class="col-12 col-sm-8 col-hd-9">
            <input class="checkout-form-group__input" id="user-name" type="text" name="user-name"
                   required="required"/>
            <div class="checkout-form-group__message">
            </div>
        </div>
    </div>
    <div class="checkout-form-group row">
        <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
            <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-email">Email</label>
        </div>
        <div class="col-12 col-sm-8 col-hd-9">
            <input class="checkout-form-group__input" id="user-email" type="email" name="user-email"
                   required="required"/>
            <div class="checkout-form-group__message">
            </div>
        </div>
    </div>
    <div class="checkout-form-group row">
        <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
            <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-tariff">Тариф</label>
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
        <div class="checkout-form-group__message"></div>
    </div>
    <div class="checkout-form-group row">
        <div class="col-12 col-sm-3 col-offset-sm-1 col-hd-2">
            <label class="checkout-form-group__label mb-05 mb-sm-00" for="user-comment">Комментарий</label>
        </div>
        <div class="col-12 col-sm-8 col-hd-9">
						<textarea class="checkout-form-group__textarea" id="user-comment" name="user-comment"
                                  rows="4"></textarea>
        </div>
        <div class="checkout-form-group__message">
        </div>
    </div>
    <div class="wrapp-overflow">
        <textarea class="textarea" name="message" placeholder=""></textarea>
    </div>
    <div class="promokod pt-10 pb-10 pt-sm-20 py-md-40">
        <div class="row">
            <div class="col-12 col-sm-11 col-offset-sm-1 mb-20 mb-lg-40 pb-hd-10">
                <div class="promokod__counter">
                    <div class="promokod__iterator">
                        <div class="promokod__results-count">
                            <a class="promokod__minus" href="#">&ndash;</a>
                            <div class="promokod__result">1
                            </div>
                            <a class="promokod__add" href="#">+</a>
                        </div>
                        <div class="promokod__iterator-subtitle">Билет
                        </div>
                    </div>
                    <div class="promokod__counter-description">на сумму
                        <div class="promokod__price">
                            <?= $currentTariff[ '$price' ]; ?>
                        </div>
                        рублей
                    </div>
                </div>

                <div class="pay-type">
                    <div class="pay-type__program">
                        <p class="pay-type__program-title">Программа лояльности
                        </p>
                        <p class="pay-type__program-description">Авторизуйтесь, чтобы воспользоваться
                            скидкой по программе лояльности
                        </p>
                    </div>
                    <div class="pay-type__options">
                        <p class="pay-type__options-title">Способ оплаты
                        </p>
                        <div class="pay-type__options-item">
                            <label class="pay-type__options-item-label">
                                <input class="pay-type__options-item-input" name="type" type="radio"
                                       id="1" checked/>
                                <span class="pay-type__options-item-check"></span>
                                <label class="pay-type__options-item-label-text">Онлайн-оплата картой
                                </label>
                            </label>
                            <label class="pay-type__options-item-label">
                                <input class="pay-type__options-item-input" name="type" type="radio"
                                       id="2"/>
                                <span class="pay-type__options-item-check"></span>
                                <label class="pay-type__options-item-label-text">Безналичный платеж
                                </label>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-offset-sm-5 col-sm-6 mb-10 mb-md-20">
                <a class="promokod__button-chekout" href="">Оплатить</a>
                <a class="promokod__button-chekout-pay"
                   href="<?= esc_url(get_permalink( $cashless_page_link ))  ;?>">Оплатить
                </a>
            </div>
            <div class="col-12 col-sm-11">
                <p class="promokod__description">
                    Нажимая на кнопку “Оплатить”, Вы принимаете условия
                    <a href="<?= esc_url( $public_offer_link ) ?>" target="_blank">Публичной оферты</a>
                </p>
            </div>
        </div>
    </div>
</form>


</body>
</html>