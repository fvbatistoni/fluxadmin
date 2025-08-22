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
            var url = baseUri + '/PaginaAdmin/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados) {
                    self.posts = dados;

                } else {
                    self.posts = null;
                }
                reload_dt_vue();
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.pagina_id;
            vm.$data.url = dt.pagina_capa;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id, url) {
            var url_remove = baseUri + '/PaginaAdmin/remover/';
            $.post(url_remove, { id: id, img: url }).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },

        mudar_status: function (obj) {
            var self = this;
            var id = obj.pagina_id;
            var status = obj.pagina_status;
            if (parseInt(id) > 0) {
                var url = baseUri + '/paginaAdmin/altera_status/';
                $.post(url, { id: id, pagina_status: status }).then(function (rs) {
                    if (rs == '') {
                        // alert_success('Ação realizada com sucesso!', 'Item removido');
                    } else {
                        alert_error('Ação não pode ser realizada!');
                    }
                    self.listar();
                });
            }
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
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});


