var table;
var vm = new Vue({
    el: "#vm",
    data: {
        categoria: null,
        categoria_primaria: null,
        subcategorias: null,
        subcategorias_filha: null,
        rm: null,
        url: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + "/Servico/lista_subcategoria_filha/";
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {console.log(dados);
                if (dados != null) {
                    self.categoria = dados;
                    setTimeout(function () {
                        $("#tbl-splash")
                            .hide()
                            .promise()
                            .done($("#tbl-div").show());
                        table = $("#datatable").DataTable({
                            language: datatable_ptbr,
                            aaSorting: [],
                            retrieve: true,
                            responsive: true, 
                            rowReorder: true,
                            displayLength: 100,
                            pageLength: 100,
                        });
                        reload_dt_vue();
                    }, 500);
                } else {
                    self.categoria = null;
                }
                reload_dt_vue();
            });
        },
        listar_categorias:function(){
            let url = baseUri + "/Servico/lista_categoria/";
            let self = this;
            $.getJSON(url).then(function (dados) {
                //console.log(dados);
                if (dados != null) {
                    self.categoria_primaria = dados;
                } else {
                    self.categoria_primaria = null;
                }
                reload_dt_vue();
            });
        },
        listar_subcategorias_by_categoria:function(){
            let url = baseUri + "/Servico/lista_sub_by_categoria/";
            let categoria_id = $('#subcategoria_servico_categoria').val();
            let self = this;
            $.getJSON(url,{categoria:categoria_id}).then(function (dados) {
                console.log(dados);
                if (dados != null) {
                    self.subcategorias = dados;
                } else {
                    self.subcategorias = null;
                }
                reload_dt_vue();
            });
        },
        editar: function (cat) {
            this.limpar();
            $(".categoria-acao").html("Alterar");
            $("#modal-categoria").modal("show");
            $("#subcategoria_servico_nome").val(cat.subcategoria_filha_servico_nome);
            $("#subcategoria_filha_servico_id").val(cat.subcategoria_filha_servico_id);
            $("#subcategoria_servico_categoria").val(cat.categoria_servico_id).change();
            setTimeout(() => {
                $("#subcategoria_servico_subcategoria").val(cat.subcategoria_filha_servico_subcategoria_pai);
            }, 500);
            
        },
        limpar: function () {
            $(".categoria-acao").html("Incluir");
            $("#subcategoria_servico_nome").val('');
            $("#subcategoria_filha_servico_id").val('');
            $("#subcategoria_servico_categoria").val('')
            $("#subcategoria_servico_subcategoria").val('');
        },
        remover: function (dt) {
            vm.$data.rm = dt.subcategoria_filha_servico_id;
            $("#modal-remove").modal("show");
        },
        remove: function (id) {
            var url_remove = baseUri + "/Servico/remover_subcategoria_filha/";
            $.post(url_remove, { id: id }).then(function (rs) {console.log(rs);
                if (rs == 1) {
                    alert_success(
                        "Ação realizada com sucesso!",
                        "Item removido"
                    );
                    vm.listar();
                } else {
                    alert_error("Ação não pode ser realizada!");
                }
            });
            $("#modal-remove").modal("hide");
        },
    },
    created: function () {
        $("#tbl-div").hide().promise().done($("#tbl-splash").show());
        this.listar();
        this.listar_categorias();
    },
});
// click do modal
$("#btn-remove").on("click", function () {
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$("#nova-categoria").on("click", function () {
    vm.limpar();
    $("#modal-categoria").modal("show");
});

$(document).ready(function () {
    $('#subcategoria_servico_categoria').on('change',function(){
        vm.listar_subcategorias_by_categoria();
    });
    /*setTimeout(function () {
        table.on("row-reorder", function (e, diff, edit) {
            var url = baseUri + "/Servico/ordenar/";
            if (diff.length > 0) {
                $.post(url, { diff: JSON.stringify(diff) }).then(function (rs) {
                    vm.listar();
                });
            }
        });
    }, 1200);*/
});