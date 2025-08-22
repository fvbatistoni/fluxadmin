var table;
var vm = new Vue({
    el: '#vm',
    data: {
        categorias: null,
    },
    methods: {
        lista_categorias: function () {
            var url = baseUri + '/FaqAdmin/lista_categoria/';
            var _this = this;
            $.getJSON(url).then(function (rs) {
                if(rs != null){
                _this.categorias = rs;
                }
            });
        }
    },
    created: function () {
        this.lista_categorias();
    }
});

$('#faq_categoria').on('change', function () {
    if ($(this).val() == 'x') {
        new bootstrap.Modal(document.getElementById('modal-categoria')).show();
        let url = $('#modal-categoria form').attr('action');
        url += '/?return=faq-novo-post';
        $('#modal-categoria').find('form').attr('action', url);
    }
})

