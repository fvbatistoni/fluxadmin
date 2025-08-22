var table;
var app = new Vue({
    el: '#vm',
    data: {
        parceiros: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/Parceiros/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if(dados != null){
                self.parceiros = dados;
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
                }, 100);
                }
                else{
                    self.parceiros = null;
                }
                reload_dt_vue();
            });
        },
     
        remover: function (dt) {
            app.$data.rm = dt.parceiro_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/parceiros/remover/';
            var self = this;
            $.post(url_remove, {id: id}).then(function (rs) {
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
            $('#parceiro input').val('');

            app.$data.rm = null;
            app.$data.status = null;
        },
        mudar_status: function (dt) {

            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/parceiros/altera_status/';
            var self = this;
            var _status = dt;
            $.post(url, { id: _status.parceiro_id, parceiro_status: _status.parceiro_status }).then(function (rs) {
                if (rs == '') {
                    self.limpar();
                    alert_success('Procedimento realizado com sucesso!');
                    $('[data-toggle="tooltip"]').tooltip('dispose');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        },
    },
    created: function () {
        $('#tbl-div').hide().promise().done($('#tbl-splash').show());
        this.listar();
    }
});

// click do modal
$('#btn-remove').on('click', function () {
    if (app.$data.rm !== null) {
    app.remove(app.$data.rm);
    }
});

$(document).ready(function () {
    setTimeout(function () {
        table.on('row-reorder', function (e, diff, edit,) {
            var url = baseUri + '/parceiros/ordenar/';
            if (diff.length > 0) {
                $.post(url, { diff: JSON.stringify(diff) }).then(function (rs) {
                    if(rs == ''){
                        app.listar();
                    }
                   
                });
            }
        });
    }, 1200);
});