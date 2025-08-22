var table;
// servico
var vm = new Vue({
    el: '#APP',
    data: {
        dados: null,
        rm: null,
        status: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/ServicoGestacao/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
            }).then(function (dados) {
                if(dados != null ){
                self.dados = dados;
                setTimeout(function () {
                    $('#tbl-splash').hide().promise().done($('#tbl-div').show());
                    table = $('#datatable').DataTable({
                        language: datatable_ptbr,
                        aaSorting: [],
                        retrieve: true,
                        responsive: true,
                        rowReorder: true,
                        "displayLength": 100,
                        "pageLength": 100,
                    });
                    reload_dt_vue();
                }, 500);
            }else{
                self.dados = null;
                reload_dt_vue();
            }
            });
        
        },
        mudar_status: function (dt) {
            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/servico/altera_status/';
            var self = this;
            var _status = dt;
            $.post(url, { id: _status.servico_id, servico_status: _status.servico_status }).then(function (rs) {
                if (rs == '') {
                    self.limpar();
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/servico/remover/';
            var self = this;
            $.post(url_remove, { id: id }).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },

        limpar: function () {
            $('#form-servico input').val('');
            $('#servico-acao').html('Cadastrar');
            vm.$data.rm = null;
            vm.$data.status = null;
        },
        gravar: function () {
            var url = baseUri + '/servico/gravar/';
            var dados = $('#form-servico').serialize();
            var self = this;
            $.post(url, { dados: dados }).then(function (rs) {
                new bootstrap.Modal(document.getElementById('modal-servico')).hide();
                alert_success('Procedimento realizado com sucesso!');
                self.listar();
                self.limpar();
            });
        },
        mudar_status: function (dt) {
            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/servico/altera_status/';
            var self = this;
            var _status = dt;
            $.post(url, { id: _status.id, status: _status.status }).then(function (rs) {
                if (rs == '') {
                    self.limpar();
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
    }
});
$(document).ready(function() {
    setTimeout(function () {
        
        table.on('row-reorder', function (e, diff, edit,) {
            var url = baseUri + '/servico/ordenar/';
            if (diff.length > 0) {
                $.post(url, { diff: JSON.stringify(diff) }).then(function (rs) {
                    vm.listar();
                });
            }
        });

    }, 1200);

})

