var table;
var vm = new Vue({
    el: '#vm',
    data:{
        subcategoria: null,
        categoria: null,
        rm: null,
        url: null,
    },
    methods:{



        listar: function () {
            var url = baseUri + '/PaginaAdmin/lista_subcategoria/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if(dados != null){
                self.subcategoria = dados;
                }else{
                    self.subcategoria = null;
                }
                reload_dt_vue();
            });
        },
      
        lista_categorias: function (){
            var url = baseUri + '/PaginaAdmin/lista_categoria/';
            var _this = this;
            $.getJSON(url).then(function (dados) {
                _this.categoria = dados;
            });
        },
        editar: function (cat) {
            this.limpar();
            $('.subcategoria-acao').html('Alterar');
            new bootstrap.Modal(document.getElementById('modal-subcategoria')).show();
            $('#subcategoria_pagina_nome').val(cat.subcategoria_pagina_nome);
            $('#subcategoria_pagina_categoria').val(cat.subcategoria_pagina_categoria);
            $('#subcategoria_pagina_id').val(cat.subcategoria_pagina_id);
        },
        limpar: function () {
            $('.subcategoria-acao').html('Incluir');
            $('#subcategoria_pagina_nome').val('');
            $('#subcategoria_pagina_categoria').val('');
            $('#subcategoria_pagina_id').val('');
        },
        remover: function (dt) {
            vm.$data.rm = dt.subcategoria_pagina_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/PaginaAdmin/remover_subcategoria/';
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
        this.lista_categorias();
    }
});
// click do modal
$('#btn-remove').on('click', function () {
    if(vm.$data.rm !== null){
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$('#nova-subcategoria').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-subcategoria')).show();
});