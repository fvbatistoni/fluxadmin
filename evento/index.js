var vm = new Vue({
    el: '#vm',
    data: {
        evento: null,
        rm: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/evento/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                // splash_dt();
            }).then(function (dados) {
                if(dados !=null){
                self.evento = dados;
                }
                else{
                    self.evento = null;
                }
                reload_dt_vue();
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.evento_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/evento/remover/';
            var self = this;
            $.post(url_remove, {id: id}).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
                self.listar();
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },
        mudar_status: function (obj) {
            var self = this;
            var id = obj.evento_id;
            var status = obj.evento_status;
            if(parseInt(id) > 0){
                var url = baseUri + '/evento/altera_status/';
                $.post(url,{id: id, status: status}).then(function (rs) {
                    if (rs == 1) {
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
        vm.remove(vm.$data.rm);
    }
});