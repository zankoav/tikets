jQuery(function ($) {
    $(document).on('click', '#check_coupone', function (e) {
        e.preventDefault();
        console.log("check_coupone");

        let check_coupone = $("#check_coupone").val();

        let data = {
            action: 'checkCoupone',
            check_coupone: check_coupone,

        };

        $.ajax({
            type: 'POST',
            url: tikets_ajax.url,
            data: data,
            success: function (response) {
                console.log(response);
                let resp = JSON.parse(response);
                if(resp.status === 1) {
                    $('.partnership__response').text(resp.text);
                }
                if(resp.status === 0) {
                    $('.partnership__response').text(resp.text);
                }
            },
            error: function (x, y, z) {
                console.log(x);
                $('.partnership__response').text('ОШИБКА!');
            }
        });
    })
});
