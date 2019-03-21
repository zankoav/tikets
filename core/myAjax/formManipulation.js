jQuery(function ($) {
    $(document).on('change', "#submit-button", function (e) {
        e.preventDefault();

        let name = $(".form_name").val();
        let phone = $(".form_tel").val();
        let email = $(".form_email").val();
        let agree = $(".form_agree").prop( "checked" );

        let data = {
            action: 'sendForm',
            name: name,
            phone: phone,
            email: email,
            agree: agree,
        };

        jQuery.post( landing_ajax['url'], data, function(response) {
            $('.form-result').html(response);
        });
    })
});
