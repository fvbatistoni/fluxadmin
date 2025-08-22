$(function () {
    $('.btn-tipo-cadastro').on('click', function () {

        var tipo = $(this).data('tipo');
        if (tipo == 'pessoa-juridica') {
            $('#tit_form').html('Dados Empresariais');
            $("#label_nome").html('Razão Social');
            $("#pessoa-fisica").hide();
            $("#pessoa-juridica").removeClass('hide').show();
            $("#pessoa-fisica").find('input').val('');
            $("#funcionario_tipo").val(2);
            $("#funcionario_nascimento").removeAttr('required');
            $("#funcionario_cnpj").attr('required', 'required');
            $("#funcionario_estado_civil").removeAttr('required');
            $("#funcionario_cpf").removeAttr('required');
            $('#cpf_error').html('');
            $('#cnpj_error').html('');
            $('#email_error').html('');
            $('#idade').html('');
            
        } else {
            $('#tit_form').html('Dados Pessoais');
            $("#label_nome").html('Nome Completo');
            $("#pessoa-fisica").removeClass('hide').show();
            $("#pessoa-juridica").hide();
            $("#pessoa-juridica").find('input').val('');
            $("#funcionario_tipo").val(1);
            $("#funcionario_estado_civil").attr('required','required');
            $("#funcionario_nascimento").attr('required', 'required');
            $("#funcionario_cpf").attr('required', 'required');
            $("#funcionario_cnpj").removeAttr('required');
            $('#cpf_error').html('');
            $('#cnpj_error').html('');
            $('#email_error').html('');
            $('#idade').html('');
        }
    });

    var tipos = $('#funcionario_tipo').val();
    if (tipos == 1) {
       
       
        $("#pessoa-fisica").show();
        $("#pessoa-juridica").hide();
        $("#pessoa-juridica").find('input').val('');
        $("#funcionario_tipo").val(1);
        $("#funcionario_cpf").attr('required', 'required');
        $("#funcionario_estado_civil").attr('required','required');
        $("#funcionario_cnpj").removeAttr('required');
        $("#funcionario_sexo").attr('required', 'required');
        $("#funcionario_nascimento").attr('required', 'required');
        $('#cpf_error').html('');
        $('#cnpj_error').html('');
        $('#email_error').html('');
        $('#idade').html('');
        $('#r-pessoa-juridica').attr('checked', false);
        $('#r-pessoa-fisica').attr('checked', true);
       
    }
    else {
       
        $("#pessoa-juridica").show();
        $("#pessoa-fisica").hide();
        $("#pessoa-fisica").find('input').val('');
        $("#funcionario_nascimento").removAttr('required');
        $("#funcionario_tipo").val(2);
        $("#funcionario_sexo").removeAttr('required');
        $("#funcionario_estado_civil").removeAttr('required');
        $("#funcionario_cnpj").attr('required', 'required');
        $("#funcionario_cpf").removeAttr('required');
        $('#cpf_error').html('');
        $('#cnpj_error').html('');
        $('#email_error').html('');
        $('#idade').html('');
        $('#r-pessoa-juridica').attr('checked', true);
        $('#r-pessoa-fisica').attr('checked', false);
        
    }



    $('#funcionario_nascimento').on('blur', function () {
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
                    $('#funcionario_nascimento').val('');
                    $('#funcionario_nascimento').focus();
                }
            } else {
                $('#idade').html('');
                $('#funcionario_nascimento').val('');
                $('#funcionario_nascimento').focus();
            }
        } else {
            $('#idade').html('');
            $('#funcionario_nascimento').val('');
        }
    });

    $('#funcionario_cpf').on('blur', function () {
        var cpf = $('#funcionario_cpf').val();
        if(cpf.length > 0) {
            if (validarCPF(cpf)) {
                var url = baseUri + '/funcionario/checa_cpf/';
                $.post(url, {cpf: cpf}).then(function (rs) {
                    rs = parseInt(rs);
                    switch (rs) {
                        case -1:
                            $('#cpf_error').html('<span class="text-center text-danger bold"><strong>CPF Já cadastrado!</strong></span>');
                            $('#funcionario_cpf').val('');
                            $('#funcionario_cpf').focus();
                            break;
                        case 0:
                            $('#cpf_error').html('<span class="text-center text-danger bold"><strong>CPF inválido!</strong></span>');
                            $('#funcionario_cpf').val('');
                            $('#funcionario_cpf').focus();
                            break;
                        case 1:
                            $('#cpf_error').html('');
                            break;
                    }
                });
            } else {
                $('#cpf_error').html('<span class="text-center text-danger bold"><strong>CPF inválido!</strong></span>');
                $('#funcionario_cpf').val('');
                $('#funcionario_cpf').focus();
            }
        }
    });

    $('#funcionario_cnpj').on('blur', function () {
        var cnpj = $('#funcionario_cnpj').val();
        if(cnpj.length > 0) {
            if (validarCNPJ(cnpj)) {
                var url = baseUri + '/funcionario/checa_cnpj/';
                $.post(url, {cnpj: cnpj}).then(function (rs) {
                    rs = parseInt(rs);
                    switch (rs) {
                        case -1:
                            $('#cnpj_error').html('<span class="text-center text-danger bold"><strong>CNPJ Já cadastrado!</strong></span>');
                            $('#funcionario_cnpj').val('');
                            $('#funcionario_cnpj').focus();
                            break;
                        case 0:
                            $('#cnpj_error').html('<span class="text-center text-danger bold"><strong>CNPJ inválido!</strong></span>');
                            $('#funcionario_cnpj').val('');
                            $('#funcionario_cnpj').focus();
                            break;
                        case 1:
                            $('#cnpj_error').html('');
                            break;
                    }
                });
            } else {
                $('#cnpj_error').html('<span class="text-center text-danger bold"><strong>CNPJ inválido!</strong></span>');
                $('#funcionario_cnpj').val('');
                $('#funcionario_cnpj').focus();
            }
        }
    });

    $('#funcionario_email').on('blur', function () {
        var email = $('#funcionario_email').val();
        var vazio = parseInt(email.length);
        if (vazio > 0) {
            if (validarEmail(email)) {
                var url = baseUri + '/funcionario/checa_email/';
                $.post(url, {email: email}).then(function (rs) {
                    rs = parseInt(rs);
                    switch (rs) {
                        case -1:
                            $('#email_error').html('<span class="text-center text-danger bold"><strong>Já cadastrado!</strong></span>');
                            $('#funcionario_email').val('');
                            $('#funcionario_email').focus();
                            break;
                        case 0:
                            $('#email_error').html('<span class="text-center text-danger bold"><strong>E-mail inválido!</strong></span>');
                            $('#funcionario_email').val('');
                            $('#funcionario_email').focus();
                            break;
                        case 1:
                            $('#email_error').html('');
                            break;
                    }
                });
            } else {
                $('#email_error').html('<span class="text-center text-danger bold"><strong>E-mail inválido!</strong></span>');
                $('#funcionario_email').val('');
                $('#funcionario_email').focus();
            }
        } else {
            $('#email_error').html('');
        }
    });

});

$('#funcionario_foto').dropify({
    messages: {
        default: '<div>Clique aqui para selecionar um arquivo </div>',
        replace: '<div>Clique em remover para selecionar um novo arquivo</div>',
        remove: 'Remover',
        error: 'Ocorreu um erro ao alterar o arquivo'
    },
    error: {
        'fileSize': 'O tamanho máximo permitido é de: ({{ value }}).',
        'minWidth': 'The image width is too small ({{ value }}}px min).',
        'maxWidth': 'The image width is too big ({{ value }}}px max).',
        'minHeight': 'The image height is too small ({{ value }}}px min).',
        'maxHeight': 'The image height is too big ({{ value }}px max).',
        'imageFormat': 'Os formatos de imagem permitidos são: ({{ value }}).',
        'fileExtension': 'As extensões permitidas são: ({{ value }}).'
    }
});
$('.money').mask("#.##0,00", {reverse: true});