var vm = new Vue({
    el: '#vm',
    data: {
        movs: null,
        contas: null,
        fornecedores: null,
        deptos: null,
        rm: null,
        status: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/pagar/get_json';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
                self.movs = dados;
            }).then(function (dados) {
                reload_dt_vue();
            });
        },
        contas_get: function () {
            var url = baseUri + '/conta/get_json';
            var self = this;
            $.getJSON(url, function (dados) {
                self.contas = dados;
            }).then(function (contas) {
            });
        },
        fornecedores_get: function () {
            var url = baseUri + '/fornecedor/get_json';
            var self = this;
            $.getJSON(url, function (dados) {
                self.fornecedores = dados;
            }).then(function (fornecedores) {
            });
        },
        deptos_get: function () {
            var url = baseUri + '/departamento/get_json';
            var self = this;
            $.getJSON(url, function (dados) {
                self.deptos = dados;
            }).then(function (deptos) {
            });
        },
        remove: function (id) {
            var url_remove = baseUri + '/pagar/remover/';
            $.post(url_remove, {id: id}).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },
        remover: function (mov) {
            vm.$data.rm = mov.movimentacao_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        alter_status: function (mov) {
            var id = mov.movimentacao_id;
            var st = mov.movimentacao_status;
            var dp = mov.movimentacao_datapagto;
            $('#modal-status #id').val(id);
            $('#modal-status #status').val(st);
            $('#modal-status #datapagto').val(dp);
            $('#modal-status #status').trigger('change');
            new bootstrap.Modal(document.getElementById('modal-status')).show();
        },
        set_status: function (data) {
            var url = baseUri + '/pagar/status/';
            var self = this;
            $.post(url, {data: data}).then(function (rs) {
                new bootstrap.Modal(document.getElementById('modal-status')).hide();
                if (rs == '') {
                    alert_success('Procedimento realizado com sucesso!');
                    $('[data-toggle="tooltip"]').tooltip('dispose');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        }
    },
    created: function () {
        $('#tbl-div').hide().promise().done($('#tbl-splash').show());
        this.listar();
        this.contas_get();
        this.deptos_get();
        this.fornecedores_get();
        setTimeout(function () {
            $('#btn-altera-status').on('click', function () {
                var data_form = $('#modal-status #modal-form-status').serialize();
                vm.set_status(data_form);
            });
        }, 1000);
    }
});


/*ALTER STATUS*/
$('#modal-status #status').on('change', function () {
    var st = $('#modal-status #status').val();
    if (st == 3) {
        $('#modal-status #dv-datapagto').removeClass('d-none');
        if ($('#modal-status #datapagto').val() == "") {
            var today = new Date().toLocaleDateString('pt-BR');
            var time = new Date().getHours() + ":" + new Date().getMinutes();
            $('#modal-status #datapagto').val(today);
        }
    } else {
        $('#modal-status #dv-datapagto').addClass('d-none');
        $('#modal-status #datapagto').val('');
    }
});

$('#btn-remove').on('click', function () {
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm);
    }
});
$('#datapagto').on('change', function () {
    var bc = $('#status').css('border-color');
    $('#status').css('border-color', 'red');
    setTimeout(function () {
        $('#status').css('border-color', bc);
    }, 2000);
    $('#status').val(3)
});

$('#status').on('change', function () {
    var olddt = $('#datapagto').val();
    var dt;
    if ($(this).val() != 3) {
        $('#datapagto').val('');
    } else {
        if (olddt != '') {
            dt = olddt;
        } else {
            dt = new Date().toLocaleDateString('pt-BR');
            let bc = $('#datapagto').css('border-color');
            $('#datapagto').css('border-color', 'red');
            setTimeout(function () {
                $('#datapagto').css('border-color', bc);
            }, 2000);
        }
        $('#datapagto').val(dt);
    }
    if ($('#status').val() == 2) {
        $('#baixa').val(2);
        var bc = $('#baixa').css('border-color');
        $('#baixa').css('border-color', 'red');
        setTimeout(function () {
            $('#baixa').css('border-color', bc);
        }, 2000);
    }
});


$(function () {


    $('.selectpickers').selectpicker({
        //noneSelectedText: "Selecione as colunas...",
        multipleSeparator: " | ",
        selectedTextFormat: 'static',
        //tickIcon: 'glyphicon-remove',
        //actionsBox: true,
    });

    var uri = baseUri + '/pagar/';
    $('#data-table-cols').on('change', function () {
        var optn = $('#data-table-cols option').length;
        var vals = $(this).val();
        var opts = [];
        var cols = [];
        $.each(vals, function (k, v) {
            opts.push(v);
        });
        for (i = 0; i <= optn - 1; i++) {
            cols.push(i);
        }
        $.each(cols, function (k, v) {
            var column = dtable.column(v);
            column.visible(false);
        });
        $.each(opts, function (k, v) {
            var column = dtable.column(v);
            column.visible(true);
        });
        $.cookie('grid-opt', opts, {path: uri});
    });

    setTimeout(function () {
        if ($.cookie('grid-opt') && $.cookie('grid-opt').length > 0) {
            var optU = $.cookie('grid-opt').split(",");
            if (optU.length > 0)
                $('#data-table-cols').val(optU).trigger('change');
        }
    }, 700);


});


