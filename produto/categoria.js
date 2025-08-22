var table;
var vm = new Vue({
    el: '#vm',
    data:{
        categoria: null,
        rm: null,
        url: null,
    },
    methods:{
        listar: function () {
            var url = baseUri + '/ProdutosAdmin/lista_categoria/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if(dados != null){
                self.categoria = dados;
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
                    self.categoria =  null;
                }
                reload_dt_vue();
            });
        },
        editar: function (cat) {
            this.limpar();
            $('.categoria-acao').html('Alterar');
            new bootstrap.Modal(document.getElementById('modal-categoria')).show();
            $('#categoria_produto_nome').val(cat.categoria_produto_nome);
            $('#categoria_produto_id').val(cat.categoria_produto_id);
        },
        limpar: function () {
            $('.categoria-acao').html('Incluir');
            $('#categoria_produto_nome').val('');
            $('#categoria_produto_id').val('');
        },
        remover: function (dt) {
            vm.$data.rm = dt.categoria_produto_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/ProdutosAdmin/remover_categoria/';
            $.post(url_remove, {id: id}).then(function (rs) {
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
$('#nova-categoria').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-categoria')).show();
});

$(document).ready(function () {
    setTimeout(function () {
        table.on('row-reorder', function (e, diff, edit,) {
            var url = baseUri + '/produtosAdmin/ordenar/';
            if (diff.length > 0) {
                $.post(url, { diff: JSON.stringify(diff) }).then(function (rs) {
                    vm.listar();
                });
            }
        });

    }, 1200);

})