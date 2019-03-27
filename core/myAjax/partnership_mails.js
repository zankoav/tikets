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
        jQuery.post( tikets_ajax['url'], data, function(response) {
           // $('.form-result').html(response);
            let a = JSON.parse(response);
            if(a.status == 1){
                console.log(a.text);
            }
            if(a.status == 1){
                console.log(a.text);
            }
            console.log(JSON.parse(response));
        });
    })
});
