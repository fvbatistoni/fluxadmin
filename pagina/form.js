var table;
var vm = new Vue({
    el: '#vm',
    data: {
        categorias: null,
        subcategorias: null,
    },
    methods: {
        lista_categorias: function () {
            var url = baseUri + '/PaginaAdmin/lista_categoria/';
            var _this = this;
            $.getJSON(url).then(function (rs) {
                if (rs != null) {
                    _this.categorias = rs;
                }
            });
        },
        lista_subcategorias: function (cat) {
            var url = baseUri + '/PaginaAdmin/lista_subcategoria_from_cat/id/' + parseInt(cat);
            var _this = this;
            $.getJSON(url).then(function (rs) {
                _this.subcategorias = rs;
                if (_this.subcategorias == null) {
                    $('#sbcateg').hide();
                }
                else {
                    $('#sbcateg').show();
                }
            });
        }
    },
    created: function () {
        this.lista_categorias();
        this.lista_subcategorias();
    }
});

$(document).ready(function () {
    setTimeout(() => {
        let image = $(".dropify-render");
        image = image.html();
        $("#img_facebook").html(image);
        $("#img_facebook").find('img').addClass('card-img-top')
        $("#img_facebook").find('img').css({
            "width": "100%",
            "height": "200px",
            "object-fit": "cover"
        })
    }, 500);

    $('#pagina_categoria').on('change', function () {
        if ($(this).val() == 'x') {
            new bootstrap.Modal(document.getElementById('modal-categoria')).show();
            let url = $('#modal-categoria form').attr('action');
            url += '/?return=nova-pagina';
            $('#modal-categoria').find('form').attr('action', url);
        }
        else {
            let url = baseUri + "/paginaAdmin/url";
            let value = $(this.selectedOptions).text();
            $.post(url, { value: value }, {})
                .then(res => {
                    app.cat_url = res;
                    app.link = baseUri + '/pagina/' + app.cat_url + '/' + app.pagina_url;
                })
        }
    })

    $('#input-file-now-custom-1').on('change', function () {
        setTimeout(() => {
            let image = $(".dropify-render");
            image = image.html();
            $("#img_facebook").html(image);
            $("#img_facebook").find('img').addClass('card-img-top')
            $("#img_facebook").find('img').css({
                "width": "100%",
                "height": "200px",
                "object-fit": "cover"
            })
        }, 500);


    });
    $('#pagina_titulo').on('blur', function () {
        let url = baseUri + "/paginaAdmin/url";
        let value = $(this).val();
        $.post(url, { value: value }, {})
            .then(res => {
                app.pagina_url = res;
                app.link = baseUri + '/pagina/' + app.cat_url + '/' + app.pagina_url;
                app.titulo = value;
            })
    })

    // $('#pagina_categoria').on('change', function () {
    //     var cat = $(this).val();
    //     vm.lista_subcategorias(cat);
    //     console.log($(this.val()))
    // });

    if (categoria_edit > 0) {
        vm.lista_subcategorias(categoria_edit);
        $('#pagina_subcategoria').val(sub_cat_id);
    }

    $('.dropify').dropify({
        messages: {
            default: '<div>Selecione uma imagem para a página (260 x 225)</div>',
            replace: '<div>Selecione uma imagem para a página (260 x 225)</div>',
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

$('#add_cat').on('click', function () {
    new bootstrap.Modal(document.getElementById('modal-categoria')).show();
    let url = $('#modal-categoria form').attr('action');
    url += '/?return=nova-pagina';
    $('#modal-categoria').find('form').attr('action', url);
})
