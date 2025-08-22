var table;
var vm = new Vue({
    el: "#vm",
    data: {
        categorias: [],
        subcategorias: [],
    },
    methods: {
        lista_categorias: function () {
            var url = baseUri + "/ProdutosAdmin/lista_categoria_combo/";
            var _this = this;
            $.getJSON(url).then(function (rs) {
                if (rs != null) {
                    _this.categorias = rs;
                }
            });
        },
        lista_subcategorias: function () {
            var categoria = $("#produto_categoria").val();
            var url = baseUri + "/ProdutosAdmin/lista_sub_by_categoria/";
            var _this = this;
            $.getJSON(url, { categoria: categoria }).then(function (rs) {
                console.log(rs)
                if (rs != null) {
                    _this.subcategorias = rs;
                }
            });
        },
    },
    created: function () {
        this.lista_categorias();
    },
});

$("#produto_categoria").on("change", function () {
    if ($(this).val() == "x") {
        $("#modal-categoria").modal("show");
    } else {
        let url = baseUri + "/produtosAdmin/url";
        let value = $(this.selectedOptions).text();
        $.post(url, { value: value }, {}).then((res) => {
            app.cat_url = res;
            app.link =
                baseUri + "/pagina/" + app.cat_url + "/" + app.pagina_url;
        });
        vm.lista_subcategorias();
        /*var cat = $(this).val();
        var suburl = baseUri + "/ProdutosAdmin/lista_sub_by_categoria/";
        $.getJSON(suburl, { categoria: cat }).then(function (rs) {
            if (rs != null) {
                vm.$data.subcategorias = rs;
            }
        });*/
    }
});

$("#add_cat_submit").on("click", function () {
    var url = baseUri + "/produtosAdmin/gravar_categoria/?rapido=true";
    $.post(
        url,
        {
            categoria_produto_url: $("#categoria_produto_url").val(),
            categoria_produto_nome: $("#categoria_produto_nome").val(),
        },
        {}
    ).then((res) => {
        if (res == 1) {
            vm.lista_categorias();
            $("#modal-categoria").modal("hide");
            alert_success(
                $("#categoria_barco_modelo").val() +
                    " foi cadastrado com sucesso!"
            );
        } else {
            alert_error("Erro ao cadastrar categoria!");
        }
    });
});
$(document).ready(function () {
    setTimeout(() => {
        let image = $(".dropify-render");
        image = image.html();
        $("#img_facebook").html(image);
        $("#img_facebook").find("img").addClass("card-img-top");
        $("#img_facebook").find("img").css({
            width: "100%",
            height: "200px",
            "object-fit": "cover",
        });
    }, 500);
    $("#input-file-now-custom-1").on("change", function () {
        setTimeout(() => {
            let image = $(".dropify-render");
            image = image.html();
            $("#img_facebook").html(image);
            $("#img_facebook").find("img").addClass("card-img-top");
            $("#img_facebook").find("img").css({
                width: "100%",
                height: "200px",
                "object-fit": "cover",
            });
        }, 500);
    });
    $("#produto_titulo").on("blur", function () {
        let url = baseUri + "/produtosAdmin/url";
        let value = $(this).val();
        $.post(url, { value: value }, {}).then((res) => {
            app.pagina_url = res;
            app.link =
                baseUri + "/produtos/ver/" + app.cat_url + "/" + app.pagina_url;
            app.titulo = value;
        });
    });

    $("#produto_keywords").tagsinput({
        confirmKeys: [32],
        delimiter: ",",
    });

    $("#input-file-now-custom-1").dropify({
        messages: {
            default:
                "<div>Clique aqui para selecionar um arquivo </div>",
            replace:
                "<div>Clique em remover para selecionar um novo arquivo</div>",
            remove: "Remover",
            error: "Ocorreu um erro ao alterar o arquivo",
        },
        error: {
            fileSize: "O tamanho máximo permitido é de: ({{ value }}).",
            minWidth: "The image width is too small ({{ value }}}px min).",
            maxWidth: "The image width is too big ({{ value }}}px max).",
            minHeight: "The image height is too small ({{ value }}}px min).",
            maxHeight: "The image height is too big ({{ value }}px max).",
            imageFormat: "Os formatos de imagem permitidos são: ({{ value }}).",
            fileExtension: "As extensões permitidas são: ({{ value }}).",
        },
    });

    $("#anexo").dropify({
        messages: {
            default:
                "<div>Clique aqui para selecionar um arquivo (.png, .jpeg, .jpg, .pdf, .doc, .docx, .xls, .xlsx)</div>",
            replace:
                "<div>Clique em remover para selecionar um novo arquivo</div>",
            remove: "Remover",
            error: "Ocorreu um erro ao alterar o arquivo",
        },
        error: {
            fileSize: "O tamanho máximo permitido é de: ({{ value }}).",
            minWidth: "The image width is too small ({{ value }}}px min).",
            maxWidth: "The image width is too big ({{ value }}}px max).",
            minHeight: "The image height is too small ({{ value }}}px min).",
            maxHeight: "The image height is too big ({{ value }}px max).",
            imageFormat: "Os formatos de imagem permitidos são: ({{ value }}).",
            fileExtension: "As extensões permitidas são: ({{ value }}).",
        },
    });
});
