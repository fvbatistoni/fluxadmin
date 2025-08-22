$(function () {

    /*CHECK PERMISSOES MENU*/
    var url_check = baseUri + '/sessao/perms_list/';
    $.getJSON(url_check, {}, function (perms) {
        if (perms && perms != '*') {
            $('.menu-access').addClass('d-none').removeClass('granted');
            //if (window.location.href.indexOf('editar') != -1) {$('input').attr('disabled','disabled');}
            $.each(perms, function (k, v) {
                var ctrl = v.split(':');
                var mod = v.split(':');
                //console.log(v)
                $('[data-mod = "' + ctrl[0] + '"]').removeClass('d-none').addClass('granted');
                $('[data-id = "' + v + '"]').removeClass('d-none').addClass('granted');
                if (mod[1] == '*') {
                    $('[data-id = "' + ctrl[0] + ':G' + '"]').removeClass('d-none').addClass('granted');
                    $('[data-id = "' + ctrl[0] + ':L' + '"]').removeClass('d-none').addClass('granted');
                }
                //if (window.location.href.indexOf(ctrl[0]) != -1) {$('input').removeAttr('disabled');}
            });
            if ($('[data-mod="Cadastro"]').find('li').hasClass('granted')) {
                $('[data-mod="Cadastro"]').removeClass('d-none');
            }
        }
    });
    /*END CHECK PERMISSOES MENU*/

    setTimeout(function () {

        $('.cep').mask('99999-999');
        $(".moeda").mask('000.000.000.000.000,00', {reverse: true});
        $(".cnpj").mask("00.000.000/0000-00");
        $(".cpf").mask("000.000.000-00");
        $(".rg").mask("000000000999");
        $(".datar").mask("00/00/0000");
        $('.cep').keyup(function () {
            if ($(this).val().length >= 9) {
                completaEndereco($(this).val());
                if ($(".numero").length) {
                    $(".num").focus();
                } else {
                    $('.cep').blur();
                }
            }
        })


        var FoneMask = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            Options = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(FoneMask.apply({}, arguments), options);
                }
            };

        $('.fone').mask(FoneMask, Options);


        var cpfCnpj = function (val) {
                return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
            },
            cpfOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(cpfCnpj.apply({}, arguments), options);
                }
            };
        $('.cpfCnpj').mask(cpfCnpj, cpfOptions);

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle=\"tooltip\"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));;
    }, 100);
});


function scroll_to(target) {
    $('html, body').animate({
        scrollTop: $(target).offset().top
    }, 1000);
}

function alert_success(title, msg) {
    $.toast({
        heading: title,
        text: msg,
        position: 'top-right',
        //loaderBg: '#ff6849',
        icon: 'success',
        hideAfter: 3500,
        stack: 1
    });
}

function alert_error(title, msg) {
    $.toast({
        heading: title,
        text: msg,
        position: 'top-right',
        //loaderBg: '#ff6849',
        icon: 'error',
        hideAfter: 3500,
        stack: 1
    });
}

function alert_warning(title, msg) {
    $.toast({
        heading: title,
        text: msg,
        position: 'top-right',
        //loaderBg: '#ff6849',
        icon: 'warning',
        hideAfter: 3500,
        stack: 1
    });
}

function alert_error_center(title, msg) {
    $.toast({
        heading: title,
        text: msg,
        position: 'top-center',
        //loaderBg: '#1e88e5',
        showHideTransition: 'slide',
        icon: 'error',
        hideAfter: 7000,
        stack: 1
    });
}

/*ALERTAS SUCESS ERROR*/
if (window.location.href.indexOf("success") != -1) {
    alert_success('Ação realizada com sucesso!');
}
if (window.location.href.indexOf("error") != -1) {
    alert_error('Ação não pode ser realizada!');
}

/*MODAL REMOVE*/
$('#btn-remove').on('click', function () {
    if (typeof vm != 'undefined') {
        if (vm.$data.rm !== null) {
            vm.remove(vm.$data.rm);
        }
    }
});
$('#btn-altera-status').on('click', function () {
    if (typeof vm != 'undefined') {
        if (vm.$data.status !== null) {
            vm.altera_status();
        }
    }
});

/*MODAL REMOVE*/

function bindFoto(val) {
    if (val == 1) {
        $(".user-profile").hide();
        $("#menuButton").attr('onclick', 'bindFoto(2)');
    } else {
        $(".user-profile").show();
        $("#menuButton").attr('onclick', 'bindFoto(1)');
    }
}