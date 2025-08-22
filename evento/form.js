var vm = new Vue({
    el: '#vm',
    data: {
        clientes: null,
        tecnicos: null,
        fornecedor: null,
        status: null,
        servicos: null,
        tipos: null,
    },
    methods: {},
    created: function () {}
});
$(".data").mask("00/00/0000");
$('.money').mask("#.##0,00", {reverse: true});
$(document).ready(function () {
    $('.dropify').dropify({
        messages: {
            default: '<div>Selecione uma Imagem para a capa do evento (470 x 400)</div>',
            replace: '<div>Selecione uma Imagem para a capa do evento (470 x 400)</div>',
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
