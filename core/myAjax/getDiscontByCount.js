jQuery(function ($) {
    function getDiscontByCount() {
        var buff = [];
        console.log("check_coupone");

        let user_prod_id = $("[data-program-id]").data("program-id");

        let data = {
            action: 'getDiscontByCount',
            user_prod_id: user_prod_id,
        };

        $.ajax({
            type: 'POST',
            url: tikets_ajax.url,
            data: data,
            success: function (response) {
                buff = JSON.parse(response);
            },
            error: function (x, y, z) {
                console.log(x);
                $('.partnership__response').text('ОШИБКА!');
            }
        });
        return buff;
    }
    var disconts = getDiscontByCount();
    // console.log(disconts);
});
