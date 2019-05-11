jQuery(function ($) {
    $(document).on('click', '#check_coupone', function (e) {
        e.preventDefault();
        console.log("check_coupone");

        let user_promocode = $("#user-promocode").val();
        let user_prod_id = $("[data-program-id]").data("program-id");
        let user_prod_tariff_id = $("#user-tariff").find(":selected").val();

        let data = {
            action: 'checkCoupone',
            user_promocode: user_promocode,
            user_prod_tariff_id: user_prod_tariff_id,
            user_prod_id: user_prod_id,
        };

        $.ajax({
            type: 'POST',
            url: tikets_ajax.url,
            data: data,
            success: function (response) {
                console.log(response);
                let resp = JSON.parse(response);
                console.log(resp);
            },
            error: function (x, y, z) {
                console.log(x);
                $('.partnership__response').text('ОШИБКА!');
            }
        });
    })
});
