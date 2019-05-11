jQuery(function ($) {
    var promokod_result = [];
    var status = null;
    var text = null;
    var discount_type = null;
    var coupon_amount = null;


    function clearFocus() {
        let $parent = $(this).parent().parent();
        if ($parent.hasClass('checkout-form-group_error')) {
            $parent.removeClass('checkout-form-group_error');
        }
    }

    function promokodTest() {

        let $applyButton = $('.checkout-form-group__apply');
        let $promokod = $('[name="user-promokod"]');
        let user_promocode = $("#user-promokod").val();
        let user_prod_id = $("[data-program-id]").data("program-id");
        let user_prod_tariff_id = $("#user-tariff").find(":selected").val();

        let data = {
            action: 'checkCoupone',
            user_promocode: user_promocode,
            user_prod_tariff_id: user_prod_tariff_id,
            user_prod_id: user_prod_id,
        };

        console.log(data);

        $applyButton.on('click', function (event) {
            event.preventDefault();

            let promokod = user_promocode;

            data.user_promocode= $("#user-promokod").val();

            console.log(promokod);

            console.log(data);

            $.ajax({
                type: 'POST',
                url: tikets_ajax.url,
                data: data,
                success: function (response) {
                    console.log("Promocode test");
                    console.log(response);
                    let resp = JSON.parse(response);
                    console.log(resp);
                    promokod_result = resp;
                    status = promokod_result["status"];
                    text = promokod_result["text"];
                    discount_type = promokod_result["discount_type"];
                    coupon_amount = promokod_result["coupon_amount"];
                    if (status === 0) {
                        let $parent = $promokod.parent().parent();
                        $parent.addClass('checkout-form-group_error');
                        $parent.find('.checkout-form-group__message').html(text);
                        return;
                    }

                    else {
                        let $parent = $promokod.parent().parent();
                        $parent.addClass('checkout-form-group_green');
                        $parent.find('.checkout-form-group__message').html(text);
                        return;
                    }

                },
                error: function (x, y, z) {
                    console.log(x);
                    if (promokod.length === 0) {
                        let $parent = $promokod.parent().parent();
                        $parent.addClass('checkout-form-group_error');
                        $parent.find('.checkout-form-group__message').html(Validator.ERROR_EMPTY_PROMOCODE_FIELD);
                        return;
                    }
                }
            });

        });

        $promokod.on('focus', clearFocus);
    }
    promokodTest();
});
