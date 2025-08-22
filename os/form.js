var vm = new Vue({
    el: '#vm',
    data: {
        clientes: null,
        tecnicos: null,
        fornecedor: null,
        status: null,
        servicos: null,
        tipos: null,
    },
    methods: {
        get_clientes: function () {
            var url = baseUri + '/cliente/get_json/';
            var self = this;
            $.getJSON(url).then(function (rs) {
                self.clientes = rs;
            });
        },
        get_tecnicos: function () {
            var url = baseUri + '/tecnico/get_nomes/';
            var self = this;
            $.getJSON(url).then(function (rs) {
                self.tecnicos = rs;
            });
        },
        get_fornecedores: function () {
            var url = baseUri + '/fornecedor/get_nomes/';
            var self = this;
            $.getJSON(url).then(function (rs) {
                self.fornecedor = rs;
            });
        },
        get_status: function () {
            var url = baseUri + '/status/lista_ativos/';
            var self = this;
            $.getJSON(url).then(function (rs) {
                self.status = rs;
            });
        },
        get_servicos: function () {
            var url = baseUri + '/servico/get_json/';
            var self = this;
            $.getJSON(url).then(function (rs) {
                self.servicos = rs;
            });
        },
        get_tipos: function () {
            var url = baseUri + '/tipo/lista_ativos/';
            var self = this;
            $.getJSON(url).then(function (rs) {
                self.tipos = rs;
            });
        },
    },
    created: function () {
        this.get_clientes();
        this.get_status();
        this.get_tecnicos();
        this.get_fornecedores();
        this.get_servicos();
        this.get_tipos();
    }
});

$(".data").mask("00/00/0000");

var old_idf = $('#os_identificacao').val();
$('#os_identificacao').on('change', function () {
    var idf = $.trim($(this).val());
    var id = $.trim($('#os_id').val());
    var url = baseUri + '/os/get_num_os/';
    if (idf != '') {
        $.post(url, {idf: idf, id: id}).then(function (rs) {
            if (rs == '1') {
                $('#idf-info').text(': Já exsite na base de dados!');
                $('#os_identificacao').val(old_idf);
                $('#os_identificacao').focus();
            } else {
                $('#idf-info').text('');
            }
        });
    }
});

$('#os_dt_solicitacao').on('blur', function () {
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
            if (idade < 500) {

            } else {
                $('#os_dt_solicitacao').val('');
                $('#os_dt_solicitacao').focus();
            }
        } else {
            $('#os_dt_solicitacao').val('');
            $('#os_dt_solicitacao').focus();
        }
    } else {
        $('#os_dt_solicitacao').val('');
    }
});
$('#os_dt_visita').on('blur', function () {
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
        if (dia <= 31 && mes <= 12) {
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
            if (idade < 500) {

            } else {
                $('#os_dt_visita').val('');
                $('#os_dt_visita').focus();
            }
        } else {
            $('#os_dt_visita').val('');
            $('#os_dt_visita').focus();
        }
    } else {
        $('#os_dt_visita').val('');
    }
});
$('#os_dt_entrega').on('blur', function () {
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
        if (dia <= 31 && mes <= 12) {
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
            if (idade < 500) {

            } else {
                $('#os_dt_entrega').val('');
                $('#os_dt_entrega').focus();
            }
        } else {
            $('#os_dt_entrega').val('');
            $('#os_dt_entrega').focus();
        }
    } else {
        $('#os_dt_entrega').val('');
    }
});
$('#os_dt_finalizado').on('blur', function () {
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
        if (dia <= 31 && mes <= 12) {
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
            if (idade < 500) {

            } else {
                $('#os_dt_finalizado').val('');
                $('#os_dt_finalizado').focus();
            }
        } else {
            $('#os_dt_finalizado').val('');
            $('#os_dt_finalizado').focus();
        }
    } else {
        $('#os_dt_finalizado').val('');
    }
});

$(function () {
    $('#os_uf').on('change', function () {
        var uf = $(this).val();
        var url = baseUri + '/fornecedor/get_nomes_by_uf/uf/' + uf;
        $.getJSON(url).then(function (rs) {
            vm.fornecedor = rs;
        });
    });
})
