var vm = new Vue({
    el: '#vm',
    data:{
        anexos: null,
        rm: null,
        url: null,
    },
    methods:{
        listar: function (){
            var url = baseUri + '/os/lista_anexos/'+ os_id + '/';
            var _this = this;
            $.getJSON(url,{os_id:os_id}, function (dados) {
                if ( $.fn.DataTable.isDataTable('#datatable') ) {
                    $('#tbl-div').hide().promise().done($('#tbl-splash').show());
                    $('#datatable').DataTable().destroy();
                }
                _this.anexos = dados;
            }).then(function (dados) {
                //  Fill datatable
                setTimeout(function () {
                    $('#tbl-splash').hide().promise().done($('#tbl-div').show());
                    $('#datatable').DataTable({
                        language: datatable_ptbr,
                        aaSorting: [],
                        retrieve: true,
                        responsive: true,
                        "displayLength": 10
                    });
                    setTimeout(draw_buttons(), 500);
                }, 500);
            });
        },
        editar: function (anexo) {
            this.limpar();
            $('.anexo-acao').html('Alterar');
            $('#os_id').val(os_id);
            $('#os_anexo_id').val(anexo.id);
            $('#os_anexo_nome').val(anexo.nome);
            new bootstrap.Modal(document.getElementById('modal-anexo')).show();
        },
        limpar: function () {
            $('.anexo-acao').html('Incluir');
            $('#os_id').val(os_id);
            $('#os_anexo_id').val('');
            $('#os_anexo_nome').val('');
            $('#os_anexo_url').val('');
        },
        remover: function (dt) {
            vm.$data.rm = dt.id;
            vm.$data.url = dt.url;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id, url) {
            var url_remove = baseUri + '/os/remover_anexo/';
            $.post(url_remove, {id: id, url: url}).then(function (rs) {
                if(rs == 1){
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                }else{
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
    if(vm.$data.rm !== null){
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$('#novo-anexo').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-anexo')).show();
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