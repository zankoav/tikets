import './pay-type.scss';
import $ from 'jquery';

$('.pay-type__options-item-input').on('change', function () {
    let typeId = $(".pay-type__options-item-input:checked").attr("id");
    if (typeId == "1"){
        $(".promokod__button-chekout").css("display","block");
        $(".promokod__button-chekout-pay").css("display","none");
    }
    else {
        $(".promokod__button-chekout").css("display","none");
        $(".promokod__button-chekout-pay").css("display","block");
    }
});

