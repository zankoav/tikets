jQuery(function ($) {
    $(document).on('click', '#send_partnership', function (e) {
        e.preventDefault();

        let username = $("[name='username']").val();
        let useremail = $("[name='useremail']").val();
        let usermessage = $("[name='usermessage']").val();

        let data = {
            action: 'sendForm',
            username: username,
            useremail: useremail,
            usermessage: usermessage,
        };
        jQuery.post( mailAjax, data, function(response) {
            $('.form-result').html(response);
            console.log('done');
        });
    })
});
