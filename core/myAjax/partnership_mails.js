jQuery(function ($) {
    $(document).on('click', '#send_partnership', function (e) {
        e.preventDefault();

        let username = $("[name='username']").val();
        let useremail = $("[name='useremail']").val();
        let usermessage = $("[name='usermessage']").val();
        let message = $("[name='message']").val();

        let data = {
            action: 'sendForm',
            username: username,
            useremail: useremail,
            usermessage: usermessage,
            message: message,
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
