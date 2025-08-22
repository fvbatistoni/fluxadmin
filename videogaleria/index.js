var table;
var vm = new Vue({
    el: '#vm',
    data: {
        videogalerias: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/videogaleria/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    self.videogalerias = dados;
                } else {
                    self.videogalerias = null;
                }
                reload_dt_vue();
            });
        },
        editar: function (videogaleria) {
            this.limpar();
            $('.videogaleria-acao').html('Alterar');
            $('#videogaleria_id').val(videogaleria.videogaleria_id);
            $('#videogaleria_status').val(videogaleria.videogaleria_status);
            $('#videogaleria_tipo').val(videogaleria.videogaleria_tipo);
            $('#videogaleria_nome').val(videogaleria.videogaleria_nome);
            new bootstrap.Modal(document.getElementById('modal-videogaleria')).show();
        },
        limpar: function () {
            $('.videogaleria-acao').html('Incluir');
            $('#videogaleria_id').val('');
            $('#videogaleria_status').val(1);
            $('#videogaleria_tipo').val(1);
            $('#videogaleria_nome').val('');
        },
        remover: function (dt) {
            vm.$data.rm = dt.videogaleria_id;
            vm.$data.url = dt.videogaleria_img;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id, url) {
            var url_remove = baseUri + '/videogaleria/remover/';
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
            var id = obj.videogaleria_id;
            var status = obj.videogaleria_status;

            if (parseInt(id) > 0) {
                var url = baseUri + '/videogaleria/altera_status/';
                $.post(url, { id: id, status: status }).then(function (rs) {

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
$('#nova-videogaleria').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-videogaleria')).show();
});

$(document).ready(function () {
    $('.dropify').dropify({
        messages: {
            default: 'Clique aqui para selecionar um arquivo',
            replace: 'Clique em remover para selecionar um novo arquivo',
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