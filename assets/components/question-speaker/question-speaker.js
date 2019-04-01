import './question-speaker.scss';
import $ from 'jquery';
import {Validator} from "../../utils/_validator";

$('#question-speaker__form').submit(function (event) {
    event.preventDefault();
    let email = $(this).find("[name*='useremail']").val();
    let name = $(this).find("[name*='username']").val();
    let message = $(this).find("[name*='usermessage']").val();
    let spam = $(this).find("[name*='message']").val();
    let programName = $(this).find("[name*='programName']").val();
    let speakerName = $(this).find("[name*='speakerName']").val();


    if (name.length === 0) {
        console.log('username', Validator.ERROR_EMPTY_FIELD);
        $('.question-speaker__response').text('Поле "имя" обязательно для заполнения');
        $(this).find("[name*='username']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='username']").removeClass('input_error');
    }

    if (message.length === 0) {
        console.log('usermessage', Validator.ERROR_EMPTY_FIELD);
        $('.question-speaker__response').text('Поле "сообщение" обязательно для заполнения');
        $(this).find("[name*='usermessage']").addClass('textarea_error');
        return;
    } else {
        $(this).find("[name*='usermessage']").removeClass('textarea_error');
    }

    if (!Validator.email(email)) {
        console.log('useremail', Validator.ERROR_EMAIL_FIELD);
        $('.question-speaker__response').text('Некорректный e-mail');
        $(this).find("[name*='useremail']").addClass('input_error');
        return;
    } else {
        $(this).find("[name*='useremail']").removeClass('input_error');
    }

    let data = {
        action: 'questionSpeaker',
        name: name,
        email: email,
        message: message,
        spam: spam,
        programName: programName,
        speakerName: speakerName
    };

    $.ajax({
        type: 'POST',
        url: tikets_ajax.url,
        data: data,
        beforeSend: function () {
            $('.preloader').addClass('preloader_active');
        },
        success: function (response) {
            console.log(response);
            let resp = JSON.parse(response);
            if (resp.status === 1) {
                $('.question-speaker__response').text(resp.text);
            }
            if (resp.status === 0) {
                $('.question-speaker__response').text(resp.text);
            }
            $('#question-speaker__form')[0].reset();
            $('.preloader').removeClass('preloader_active');
        }
        ,
        error: function (x, y, z) {
            console.log(x);
            $('.preloader').removeClass('preloader_active');
            $('.question-speaker__response').text('ОШИБКА!');
        }
    })
    ;
});
