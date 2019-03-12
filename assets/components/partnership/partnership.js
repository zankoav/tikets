import './partnership.scss';
import $ from 'jquery';
import {Validator} from "../../utils/_validator";

$('#partnership__form').submit(function (event) {
    event.preventDefault();
    let email = $(this).find("[name*='useremail']").val();
    let name = $(this).find("[name*='username']").val();
    let spam = $(this).find("[name*='usermessage']").val();

    if(name.length === 0) {
        console.log(Validator.ERROR_EMPTY_FIELD);
    } else {
        console.log(name);
    }

    if (Validator.email(email)) {
        console.log(email);
    } else {
        console.log(Validator.ERROR_EMAIL_FIELD);
    }

    $.ajax({
        type: $(this).attr('method'),
        url:  $(this).attr('action'),
        data:  $(this).serialize()
    }).done(function() {
        console.log('success');
    }).fail(function() {
        console.log('fail');
    });
});
