var table;
var vm = new Vue({
    el: '#vm',
    data: {

        dados: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/Modulo/getModulos/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if(dados != null){
                self.dados = dados;
                }
                reload_dt_vue();
            });
        },
     
        remover: function (dt) {
            vm.$data.rm = dt.modulo_cod;

            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/Modulo/excluir/';
            $.post(url_remove, { modulo_cod: id }).then(function (rs) {
                if (rs == '') {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },
        limpar: function () {
            $('.anexo-acao').html('Incluir');
            $('#modulo_nome').val('');
            
        },
        mudar_status: function (obj) {
            var self = this;
            var id = obj.modulo_id;
            var status = obj.modulo_status;
            if(parseInt(id) > 0){
                var url = baseUri + '/modulo/altera_status/';
                $.post(url,{id: id, modulo_status: status}).then(function (rs) {
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
$('#novo-modulo').on('click', function () {
vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-modulo')).show();
});

// click do modal
$('#btn-remove').on('click', function () {
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
