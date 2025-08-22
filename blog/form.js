var table;
var vm = new Vue({
    el: '#vm',
    data: {
        categorias: null,
    },
    methods: {
        lista_categorias: function () {
            var url = baseUri + '/BlogAdmin/lista_categoria/';
            var _this = this;
            $.getJSON(url).then(function (rs) {
                _this.categorias = rs;
            });
        }
    },
    created: function () {
        this.lista_categorias();
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
    }
});



$('#blog_categoria').on('change', function () {
    if ($(this).val() == 'x') {
        new bootstrap.Modal(document.getElementById('modal-categoria')).show();
   
    }
    else {
        let url = baseUri + "/blogAdmin/url";
        let value = $(this.selectedOptions).text();
        $.post(url, { value: value }, {})
            .then(res => {
                app.cat_url = res;
                app.link = baseUri + '/blog/ler/' + app.cat_url + '/' + app.pagina_url;
            })
    }
})




$('#add_cat_submit').on('click', function () {
    var url = baseUri + "/blogAdmin/gravar_categoria/?rapido=true";
    $.post(url, {
        categoria_blog_url: $('#categoria_blog_url').val(),
        categoria_blog_nome: $('#categoria_blog_nome').val(),
    }, {}).then((res) => {
        if (res == 1) {
            vm.lista_categorias();
            new bootstrap.Modal(document.getElementById('modal-categoria')).hide();
            alert_success($('#categoria_blog_nome').val() + ' foi cadastrado com sucesso!');
        } else {

            alert_error('Erro ao cadastrar categoria!');
        }
    });
});


$('#blog_titulo').on('blur', function () {
    let url = baseUri + "/blogAdmin/url";
    let value = $(this).val();
    $.post(url, { value: value }, {})
        .then(res => {
            app.pagina_url = res;
            app.link = baseUri + '/blog/ler/' + app.cat_url + '/' + app.pagina_url;
            app.titulo = value;
        })
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

$(document).ready(function () {

    $('#blog_keywords').tagsinput({
        confirmKeys: [32],
        delimiter: ',',
    });

    $('.dropify').dropify({
        messages: {
            default: '<div>Selecione uma imagem para a capa do post</div>',
            replace: '<div>Selecione uma imagem para a capa do post</div>',
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