var table;
var vm = new Vue({
    el: '#vm',
    data: {
        indicadores: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/Indicador/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                // splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    self.indicadores = dados;
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
                    self.indicadores = null;
                }
                reload_dt_vue();
            });
        },

        editar: function (indicador) {
            this.limpar();
            $('.anexo-acao').html('Alterar');
            $('#indicador_id').val(indicador.indicador_id);
            $('#indicador_status').val(indicador.indicador_status);
            $('#indicador_nome').val(indicador.indicador_nome);
            $('#indicador_quantidade').val(indicador.indicador_quantidade);
            new bootstrap.Modal(document.getElementById('modal-indicador')).show();
        },
        limpar: function () {
            $('.anexo-acao').html('Incluir');
            $('#indicador_id').val('');
            $('#indicador_status').val(1);
            $('#indicador_nome').val();
        },

        mudar_status: function (dt) {
            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/indicador/altera_status/';
            var self = this;
            var _status = dt;
            $.post(url, { id: _status.indicador_id, indicador_status: _status.indicador_status })
            .then(function (rs) {
                if (rs == '') {
                    self.limpar();
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.indicador_id;
            vm.$data.url = dt.indicador_img;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id, url) {
            var url_remove = baseUri + '/indicador/remover/';
            $.post(url_remove, { id: id, img: url }).then(function (rs) {
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
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$('#novo-indicador').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-indicador')).show();
});

$(document).ready(function () {
    setTimeout(function () {
        table.on('row-reorder', function (e, diff, edit,) {
            var url = baseUri + '/indicador/ordenar/';
            if (diff.length > 0) {
                $.post(url, { diff: JSON.stringify(diff) }).then(function (rs) {
                    vm.listar();
                });
            }
        });

    }, 1200);

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