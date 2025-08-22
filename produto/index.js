var table;
var vm = new Vue({
    el: '#vm',
    data: {
        posts: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/ProdutosAdmin/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    self.posts = dados;
                } else {
                    self.posts = null;
                }
                reload_dt_vue();
            });
        },
        mudar_status: function (dt) {

            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/produtosAdmin/altera_status/';
            var self = this;
            var _status = dt;
            $.post(url, { id: _status.produto_id, produto_status: _status.produto_status }).then(function (rs) {

                if (rs == '') {

                    alert_success('Procedimento realizado com sucesso!');
                    $('[data-toggle="tooltip"]').tooltip('dispose');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.produto_id;
            vm.$data.url = dt.produto_capa;
            vm.$data.file = dt.produto_arquivo;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id, url, file) {
            var url_remove = baseUri + '/ProdutosAdmin/remover/';
            $.post(url_remove, { id: id, img: url, file: file }).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        }
    },
    created: function () {
        $('#tbl-div').hide().promise().done($('#tbl-splash').show());
        this.listar();
    }
});
// click do modal
$('#btn-remove').on('click', function () {
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm, vm.$data.url, vm.$data.file);
    }
});
