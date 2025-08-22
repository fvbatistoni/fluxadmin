var vm = new Vue({
    el: '#vm',
    data: {
        temas: null,
        tema_id: null,
        tema_img: null,
        tema_nome: null,
        tema_color: null,
        tema_color_back: null,
        tema_color_text: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/tema/lista/';
            var self = this;
            $.getJSON(url).then(function (dados) {
                self.temas = dados;
            });
        },

        trocaTema: function (tema) {
            this.tema_color_back = "";
            this.tema_color_text = ""
            this.tema_id = tema.tema_id;
            this.tema_path = tema.tema_path;
            this.tema_nome = tema.tema_nome;
            this.tema_color = tema.tema_color;
            this.tema_color_back = $('#cp3').val(tema.tema_color_back);
            this.tema_color_text = $('#cp2').val(tema.tema_color_text);
            $('#novo_desc').html(tema.tema_desc);
            this.tema_img = baseUri + '/view/admin/config/tema-img/template-' + tema.tema_path + '.png';
            // //inserindo a cor atual no colorpicker-input-addon
            $('#cpp3').css('background-color', tema.tema_color_back);
            $('#cpp2').css('background-color', tema.tema_color_text);          
            new bootstrap.Modal(document.getElementById('modal-altera-tema')).show();
        },
        confirmaNovoTema: function () {
            this.tema_color_back = $('#cp3').val();
            this.tema_color_text = $('#cp2').val()
            new bootstrap.Modal(document.getElementById('modal-altera-tema')).hide();
            var url = baseUri + '/tema/mudar/';
            var _this = this;
            $.post(url, {
                tema_id: this.tema_id,
                tema_path: this.tema_path,
                tema_color_back: this.tema_color_back,
                tema_color_text: this.tema_color_text
            }).then(function (rs) {
                document.location = baseUri + '/configuracao/tema/?success=' + _this.tema_path;


            });
        },
    },
    created: function () {
        this.listar();
    }
});


init_colorpicker_fn('#cp2', 'hex');

init_colorpicker_fn('#cp3', 'hex');

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

        if (e.currentTarget.id == 'cp3') {
            $picker_el.parent().find('.colorpicker-input-addon>i').css('background-color', $('#cp3').val());

        } else {
            $picker_el.parent().find('.colorpicker-input-addon>i').css('background-color', $('#cp2').val());
        }


    }).on('colorpickerCreate', function (e) {

    if (e.currentTarget.id == 'cp3') {
        $picker_el.parent().find('.colorpicker-input-addon>i').css('background-color', $('#cp3').val());

    } else {
        $picker_el.parent().find('.colorpicker-input-addon>i').css('background-color', $('#cp2').val());
    }

       

    }).on('colorpickerCreate', function (e) {
        resize_color_picker_fn($picker_el);
    })
    // .on('colorpickerShow', function (e) {
    //     var cpInput_el = e.colorpicker.popupHandler.popoverTip.find('.color-io');
    //     resize_color_picker_fn($picker_el);
    //     cpInput_el.val(e.color.string());

    //     cpInput_el.on('change keyup', function () {
    //         e.colorpicker.setValue(cpInput_el.val());
    //     });

        
    // })
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