var vm = new Vue({
    el: '#vm',
    data: {
        usuario: null,
        rm: null,
        status: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/usuario/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    self.usuario = dados;
                }
                else {
                    self.usuario = null;
                }
                reload_dt_vue();
            });
        },

        remover: function (dt) {
            vm.$data.rm = dt.usuario_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/usuario/remove/';
            $.post(url_remove, { id: id }).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },
        mudar_status: function (dt) {
            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/usuario/altera_status/';
            var self = this;
            $.post(url, { id: dt.usuario_id, status: dt.usuario_status }).then(function (rs) {
                if (rs == '') {
                    alert_success('Procedimento realizado com sucesso!');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
        }
    },
    created: function () {
        $('#tbl-div').hide().promise().done($('#tbl-splash').show());
        this.listar();
    }
});
