import 'jquery-mask-plugin'

$('.ui-form button, .box-form button').unwrap()
$('.ui-form br, .box-form form br').remove()

const behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},

options = {
    onKeyPress: function (val, e, field, options) {
        field.mask(behavior.apply({}, arguments), options);
    }
};

$('input[type=tel]').mask(behavior, options);
$('.cnpj').mask('00.000.000/0000-00');