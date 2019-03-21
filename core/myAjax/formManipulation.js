jQuery(function ($) {
    $(document).on('click', "#submit-button", function (e) {
        e.preventDefault();

        let form_product_id = $("#product_id").text();
        let form_ticket_type = $( "#ticket_type option:selected" ).text();
        let form_item_name = $("[name='wsb_invoice_item_name[0]']").val();
        let form_item_price = $("[name='wsb_invoice_item_price[0]']").val();
        let form_item_quantity = $("[name='wsb_invoice_item_quantity[0]']").val();
        let form_customer_name = $("[name='wsb_customer_name']").val();
        let form_customer_address = $("[name='wsb_customer_address']").val();
        let form_wsb_email = $("[name='wsb_email']").val();

        let data = {
            action: 'sendForm',
            product_id: form_product_id,
            item_name: form_item_name,
            item_price: form_item_price,
            item_quantity: form_item_quantity,
            customer_name: form_customer_name,
            customer_address: form_customer_address,
            ticket_type: form_ticket_type,
            wsb_email: form_wsb_email,

        };

        console.log(data );
        // jQuery.post( landing_ajax['url'], data, function(response) {
        //     $('.form-result').html(response);
        // });
    })
});
