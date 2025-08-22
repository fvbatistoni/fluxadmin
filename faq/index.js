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
            var url = baseUri + '/FaqAdmin/lista/';
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
        remover: function (dt) {
            vm.$data.rm = dt.faq_id;

            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/FaqAdmin/remover/';
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
