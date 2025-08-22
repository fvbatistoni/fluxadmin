var table;
var vm = new Vue({
    el: '#vm',
    data:{
        remove_a :false,
        videogalerias: null,
        selected:false,
        categorias: null,
        rm: null,
        url: null,
        data_remove: new Array(),
    },
    methods:{
        listar: function (){
            var url = baseUri + '/videogaleria/lista_img_videogaleria/id/' + id_videogaleria;
            var _this = this;
            $.getJSON(url, function (dados) {
                $('#tbl-div').hide().promise().done($('#tbl-splash').show());
                $('#datatable').DataTable().destroy();
                _this.videogalerias = dados;
              if(dados ==  null){
                  _this.remove_a = false;
              }
              else{
                  _this.remove_a = true;
              }
            }).then(function (dados) {
                setTimeout(function () {
                    $('#tbl-splash').hide().promise().done($('#tbl-div').show());
                }, 500);
            });

           
        },

        remove_img: function () {
        
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
      
    },

        editar: function (videogaleria) {
            this.limpar();
            $('.videogaleria-acao').html('Alterar');
            new bootstrap.Modal(document.getElementById('modal-videogaleria')).show();
        },
        limpar: function () {
            $('.videogaleria-acao').html('Incluir');
        },
     
        add_class_remove: function (item) {
          
            var ele = $('#img-videogaleria-id-'+ item.media_videogaleria_id);
            ele.toggleClass('border3px');

            // if(ele.hasClass('border3px')){
            //     alert_warning('Foto foi marcada para remoção');
            // }else{
            //     alert_warning('Foto foi desmarcada para remoção');
            // }


            var remove = $('.border3px');
                var _this = this;
                _this.$data.data_remove = new Array();
                if(remove.length > 0){
                    remove.each(function (index, element) {
                        var obj = {
                            'id': $(element).data('remove'),
                            'url': $(element).data('url')
                        };
                        _this.$data.data_remove.push(obj);
                    });
                   this.selected = true;
                }else{
                  
                   this.selected = false;
                }

            
        },
        remover: function () {
            var _this = this;
            var url = baseUri + '/videogaleria/remove_img/';
            $.post(url, {videogaleria_id: id_videogaleria, data:_this.$data.data_remove}).then(function (rs) {
                if(parseInt(rs) == 0){
                    alert_success('Fotos apagadas com sucesso!');
                    var remove = $('.border3px');
                    remove.each(function (index, element) {
                        $(element).removeClass('border3px');
                    });
                    window.location.reload(false);
                    // _this.listar();
                }else{
                    alert_success('Fotos não puderam ser apagadas');
                }
            });
        },
        remove_all: function () {
            var _this = this;
            var url = baseUri + '/videogaleria/remove_all_img_videogaleria/';
            $.post(url, {videogaleria_id: id_videogaleria}).then(function (rs) {
                if(parseInt(rs) == 0){
                    alert_success('Fotos apagadas com sucesso!');
                    _this.listar();
                }else{
                    alert_success('Fotos não puderam ser apagadas');
                }
            });
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
$('#nova-videogaleria').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-videogaleria')).show();
});

$(document).ready(function () {
    // PLAYER VIDEO
    var $videoSrc;
    $('.video-btn').click(function () {
        $videoSrc = $(this).data("src");
        mudasrc();
    });
    function mudasrc(){
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        setTimeout(function () {
            new bootstrap.Modal(document.getElementById('modal-video')).show();
        },350);
    }
    $('#modal-video').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',$videoSrc);
    });
    // END PLAYER VIDEO

    var el = document.getElementById('sort');
    var sortable = Sortable.create(el, {
        animation: 750,
        easing: "cubic-bezier(1, 0, 0, 1)",
        onChange: function(evt) {
            var id = $(evt.item).data('id');
            var data = new Array();
            var div = $(evt.to).children();
            div.each(function (index, element) {
                var obj = {
                    'pos': index+1,
                    'media_id': $(element).data('id')
                };
                data.push(obj);
            });
            var url = baseUri + '/videogaleria/ordena_img/';
            $.post(url, {videogaleria_id:id_videogaleria, data:data}).then(function (rs) {
                if(parseInt(rs) == 0){
                    alert_success('Posição Atualizada');
                }else{
                    alert_error('Não foi possível atualizar posição');
                }
            });
        }
    });
});

$('#btn-remove').on('click', function () {
    new bootstrap.Modal(document.getElementById('modal-remove')).hide();
    vm.remover();
});

$('#btn-remove-all').on('click', function () {
    new bootstrap.Modal(document.getElementById('modal-remove-all')).hide();
    vm.remove_all();
});