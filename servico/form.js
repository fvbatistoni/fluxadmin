var vm = new Vue({
    el: "#inputs",
    data: {
        categorias: [],
        subcategorias: [],
        subcategorias_filha: [],
    },
    methods: {
        listar_categorias:function(){
            let url = baseUri + "/Servico/lista_categoria_combo/";
            let self = this;
            $.getJSON(url).then(function (dados) {
                //console.log(dados);
                if (dados != null) {
                    self.categorias = dados;
                } else {
                    self.categorias = null;
                }
                reload_dt_vue();
            });
        },
        listar_subcategorias_by_categoria:function(){
            let url = baseUri + "/Servico/lista_sub_by_categoria/";
            let categoria_id = $('#servico_categoria').val();
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
        listar_subcategorias_filhas_by_subcategoria:function(){
            let url = baseUri + "/Servico/lista_subcategoria_filha_by_subcategoria/";
            let subcategoria_id = $('#servico_subcategoria').val();
            let self = this;
            $.getJSON(url,{subcategoria:subcategoria_id}).then(function (dados) {
                console.log(dados);
                if (dados != null) {
                    self.subcategorias_filha = dados;
                } else {
                    self.subcategorias_filha = null;
                }
                reload_dt_vue();
            });
        },
    },
    created: function () {
        this.listar_categorias();
    },
});



var drEvent = $('.dropify').dropify();
drEvent.on('dropify.afterClear', function (event, element) {
    $("#servico_iconee").val('');
});
$('#btn-remove').on('click', function () {
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm);
    }
});

$('#servico_icone').dropify({
    messages: {
        default: '<div>Clique aqui para selecionar um arquivo </div>',
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
$('#servico_categoria').on('change',function(){
    vm.listar_subcategorias_by_categoria();
});
$('#servico_subcategoria').on('change',function(){
    vm.listar_subcategorias_filhas_by_subcategoria();
});
$(document).ready(function() {

    
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
    $('#servico_icone').on('change', function () {
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
    $('#servico_nome').on('blur', function () {
        let url = baseUri + "/servico/url";
        let value = $(this).val();
        $.post(url, { value: value }, {})
            .then(res => {
                app.pagina_url = res;
                app.link = baseUri + '/servicos/ver/' + app.pagina_url;
                app.titulo = value;
            })
    })
    $('#servico_desc_full').summernote({
        placeholder: '',
        lang: 'pt-BR',
        minHeight: 300,
        maxHeight: 550,
        disableDragAndDrop: true,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol']],
            ['size', ['paragraph', 'height', 'fontsize']],
            ['table', ['table']],
            ['misc', ['undo', 'redo']],
            ['insert', ['link', 'picture', 'video','hr']],
            ['view', ['fullscreen', 'codeview']],
        ]
    });
    $('.menu-servico').addClass('active');
})



init_colorpicker_fn('#cor_servico', 'hex');

function init_colorpicker_fn(id_str, format_str = 'hex') {
    if (!id_str.startsWith('#')) {
        id_str = '#' + id_str;
    }
    var $picker_el = jQuery(id_str);
    $picker_el.colorpicker({
        format: format_str,
        horizontal: true,
        popover: {
            container: id_str + '-container'
        },
        template: '<div class="colorpicker">' +
            '<div class="colorpicker-saturation"><i class="colorpicker-guide"></i></div>' +
            '<div class="colorpicker-hue"><i class="colorpicker-guide"></i></div>' +
            '<div class="colorpicker-alpha">' +
            '	<div class="colorpicker-alpha-color"></div>' +
            '	<i class="colorpicker-guide"></i>' +
            '</div>' +
            '<div class="colorpicker-bar">' +
            '	<div class="input-group">' +
            '		<input class="form-control input-block color-io" />' +
            '	</div>' +
            '</div>' +
            '</div>'
    }).on('colorpickerUpdate', function (e) {

        if (e.currentTarget.id) {
            $picker_el.parent().find('.colorpicker-input-addon>i').css('background-color', $('#' + e.currentTarget.id).val());
        }

    }).on('colorpickerCreate', function (e) {

        if (e.currentTarget.id) {
            $picker_el.parent().find('.colorpicker-input-addon>i').css('background-color', $('#' + e.currentTarget.id).val());
        }



    }).on('colorpickerCreate', function (e) {

        resize_color_picker_fn($picker_el);
    })
        .on('colorpickerHide', function (e) {
            var cpInput_el = e.colorpicker.popupHandler.popoverTip.find('.color-io');
            cpInput_el.off('change keyup');
        }).on('colorpickerChange', function (e) {
            var cpInput_el = e.colorpicker.popupHandler.popoverTip.find('.color-io');

            if (e.value === cpInput_el.val() || !e.color || !e.color.isValid()) {
                resize_color_picker_fn($picker_el);
                return;
            }

            cpInput_el.val(e.color.string());
            resize_color_picker_fn($picker_el);
        });

    $picker_el.parent().find('.colorpicker-input-addon>i').on('click', function (e) {
        $picker_el.colorpicker('colorpicker').show();
    });

    jQuery(window).resize(function (e) {
        resize_color_picker_fn($picker_el);
    });
}

function resize_color_picker_fn($picker_el) {
    var rem_int = parseInt(getComputedStyle(document.documentElement).fontSize),
        width_int = $picker_el.parent().width() - ((rem_int * .75) * 2) - 2,
        colorPicker_obj = $picker_el.colorpicker('colorpicker'),
        slider_obj = colorPicker_obj.options.slidersHorz;

    slider_obj.alpha.maxLeft = width_int;
    slider_obj.alpha.maxTop = 0;

    slider_obj.hue.maxLeft = width_int;
    slider_obj.hue.maxTop = 0;

    slider_obj.saturation.maxLeft = width_int;
    slider_obj.saturation.maxTop = 150;

    colorPicker_obj.update();
}