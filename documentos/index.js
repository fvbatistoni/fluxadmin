var table;
var vm = new Vue({
    el: '#vm',
    data: {

        dados: null,
        clientes: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/Documentos/listar/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if(dados != null){
                self.dados = dados;
                }else{
                    self.dados =null;
                }
                reload_dt_vue();
            });
        },


        listarClientes: function () {
            var url = baseUri + '/Cliente/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
            }).then(function (dados) {
                self.clientes = dados;

                reload_dt_vue();
            });
        },
        render: function (dt) {
            window.open(baseUri + "/media/documentos/" + dt.documento_url);
        },
        mudar_status: function (dt) {

            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/indicador/altera_status/';
            var self = this;
            var _status = dt;
            $.post(url, { id: _status.indicador_id, indicador_status: _status.indicador_status }).then(function (rs) {
                if (rs == '') {
                    self.limpar();
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.documento_id;

            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/documentos/remover/';
            $.post(url_remove, { id: id }).then(function (rs) {
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
        this.listarClientes();

    }
});

// click do modal
$('#btn-remove').on('click', function () {
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$(document).ready(function () {

    $('.dropify').dropify({
        messages: {
            default: '<div>Clique aqui para selecionar um arquivo</div>',
            replace: '<div>Clique em remover para selecionar um novo arquivo</div>',
            remove: 'Remover',
            error: 'Ocorreu um erro ao alterar o arquivo'
        },
        error: {
            'fileSize': 'O tamanho máximo permitido é de: ({{ value }}).',
            'minWidth': 'The image width is too small ({{ value }}}px min).',
            'maxWidth': 'The image width is too big ({{ value }}}px max).',
            'minHeight': 'The image height is too small ({{ value }}}px min).',
            'maxHeight': 'The image height is too big ({{ value }}px max).',
            'imageFormat': 'Os formatos de imagem permitidos são: ({{ value }}).',
            'fileExtension': 'As extensões permitidas são: ({{ value }}).'
        }
    });


});