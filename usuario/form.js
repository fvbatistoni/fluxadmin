$(function () {


    $('.date-calendar').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY',
        lang: 'pt-br',
        weekStart: 0,
        cancelText: 'Cancelar',
        time: false
    });

    $('.btn-tipo-cadastro').on('click', function () {
        var tipo = $(this).data('tipo');

        if (tipo == 'pessoa-juridica') {
            $("#pessoa-fisica").hide();
            $("#pessoa-juridica").removeClass('hide').show();
            $("#pessoa-fisica").find('input').val('');
            $("#cliente_tipo").val(2);
            $("#cliente_cnpj").attr('required', 'required');
            $("#cliente_cpf").removeAttr('required');
            $('#cpf_error').html('');
            $('#cnpj_error').html('');
            $('#email_error').html('');
            $('#idade').html('');
        } else {
            $("#pessoa-fisica").removeClass('hide').show();
            $("#pessoa-juridica").hide();
            $("#pessoa-juridica").find('input').val('');
            $("#cliente_tipo").val(1);
            $("#cliente_cpf").attr('required', 'required');
            $("#cliente_cnpj").removeAttr('required');
            $('#cpf_error').html('');
            $('#cnpj_error').html('');
            $('#email_error').html('');
            $('#idade').html('');
        }
    });


    var tipos = $('#cliente_tipo').val();
    if (tipos == 1) {
        $("#pessoa-fisica").removeClass('hide').show();
        $("#pessoa-juridica").hide();
        $("#pessoa-juridica").find('input').val('');
        $("#cliente_tipo").val(1);
        $("#cliente_cpf").attr('required', 'required');
        $("#cliente_cnpj").removeAttr('required');
        $('#cpf_error').html('');
        $('#cnpj_error').html('');
        $('#email_error').html('');
        $('#idade').html('');
        $('#r-pessoa-juridica').attr('checked', false);
        $('#r-pessoa-fisica').attr('checked', true);
    } else {
        $("#pessoa-fisica").hide();
        $("#pessoa-juridica").removeClass('hide').show();
        $("#pessoa-fisica").find('input').val('');
        $("#cliente_tipo").val(2);
        $("#cliente_cnpj").attr('required', 'required');
        $("#cliente_cpf").removeAttr('required');
        $('#cpf_error').html('');
        $('#cnpj_error').html('');
        $('#email_error').html('');
        $('#idade').html('');
        $('#r-pessoa-juridica').attr('checked', true);
        $('#r-pessoa-fisica').attr('checked', false);
    }

    $('#cliente_nascimento').on('blur', function () {
        $('#idade').html('');
        var data = $(this).val();
        if (data && data != '//') {
            data = data.split('/');
            var dia = data[0];
            var mes = data[1];
            var ano = data[2];
            var now = new Date();
            var dia_corrente = now.getUTCDate();
            var mes_corrente = (now.getUTCMonth() + 1);
            var ano_corrente = now.getUTCFullYear();
            var idade = '';
            if (dia <= 31 && mes <= 12 && ano <= ano_corrente) {
                if (mes_corrente >= mes) {
                    if (mes_corrente > mes) {
                        idade = ano_corrente - ano;
                    }
                    if (mes_corrente == mes) {
                        if (dia_corrente >= dia) {
                            idade = ano_corrente - ano;
                        } else {
                            idade = (ano_corrente - ano) - 1;
                        }
                    }
                } else {
                    idade = (ano_corrente - ano) - 1;
                }
                if (idade < 100) {
                    var resp = '<span class="text-info">&nbsp;&nbsp;' + idade + '&nbsp;Anos&nbsp;</span>';
                    $(resp).appendTo('#idade');
                } else {
                    $('#idade').html('');
                    $('#cliente_nascimento').val('');
                    $('#cliente_nascimento').focus();
                }
            } else {
                $('#idade').html('');
                $('#cliente_nascimento').val('');
                $('#cliente_nascimento').focus();
            }
        } else {
            $('#idade').html('');
            $('#cliente_nascimento').val('');
        }
    });

    $('#cliente_cpf').on('blur', function () {
        var cpf = $('#cliente_cpf').val();
        if(cpf.length > 0) {
            if (validarCPF(cpf)) {
                var url = baseUri + '/cliente/checa_cpf/';
                $.post(url, {cpf: cpf}).then(function (rs) {
                    rs = parseInt(rs);
                    switch (rs) {
                        case -1:
                            $('#cpf_error').html('<span class="text-center text-danger bold"><strong>CPF Já cadastrado!</strong></span>');
                            $('#cliente_cpf').val('');
                            $('#cliente_cpf').focus();
                            break;
                        case 0:
                            $('#cpf_error').html('<span class="text-center text-danger bold"><strong>CPF inválido!</strong></span>');
                            $('#cliente_cpf').val('');
                            $('#cliente_cpf').focus();
                            break;
                        case 1:
                            $('#cpf_error').html('');
                            break;
                    }
                });
            } else {
                $('#cpf_error').html('<span class="text-center text-danger bold"><strong>CPF inválido!</strong></span>');
                $('#cliente_cpf').val('');
                $('#cliente_cpf').focus();
            }
        }
    });

    $('#cliente_cnpj').on('blur', function () {
        var cnpj = $('#cliente_cnpj').val();
        if(cnpj.length > 0) {
            if (validarCNPJ(cnpj)) {
                var url = baseUri + '/cliente/checa_cnpj/';
                $.post(url, {cnpj: cnpj}).then(function (rs) {
                    rs = parseInt(rs);
                    switch (rs) {
                        case -1:
                            $('#cnpj_error').html('<span class="text-center text-danger bold"><strong>CNPJ Já cadastrado!</strong></span>');
                            $('#cliente_cnpj').val('');
                            $('#cliente_cnpj').focus();
                            break;
                        case 0:
                            $('#cnpj_error').html('<span class="text-center text-danger bold"><strong>CNPJ inválido!</strong></span>');
                            $('#cliente_cnpj').val('');
                            $('#cliente_cnpj').focus();
                            break;
                        case 1:
                            $('#cnpj_error').html('');
                            break;
                    }
                });
            } else {
                $('#cnpj_error').html('<span class="text-center text-danger bold"><strong>CNPJ inválido!</strong></span>');
                $('#cliente_cnpj').val('');
                $('#cliente_cnpj').focus();
            }
        }
    });

    $('#cliente_email').on('blur', function () {
        var email = $('#cliente_email').val();
        var vazio = parseInt(email.length);
        if (vazio > 0) {
            if (validarEmail(email)) {
                var url = baseUri + '/cliente/checa_email/';
                $.post(url, {email: email}).then(function (rs) {
                    rs = parseInt(rs);
                    switch (rs) {
                        case -1:
                            $('#email_error').html('<span class="text-center text-danger bold"><strong>Já cadastrado!</strong></span>');
                            $('#cliente_email').val('');
                            $('#cliente_email').focus();
                            break;
                        case 0:
                            $('#email_error').html('<span class="text-center text-danger bold"><strong>E-mail inválido!</strong></span>');
                            $('#cliente_email').val('');
                            $('#cliente_email').focus();
                            break;
                        case 1:
                            $('#email_error').html('');
                            break;
                    }
                });
            } else {
                $('#email_error').html('<span class="text-center text-danger bold"><strong>E-mail inválido!</strong></span>');
                $('#cliente_email').val('');
                $('#cliente_email').focus();
            }
        } else {
            $('#email_error').html('');
        }
    });

});