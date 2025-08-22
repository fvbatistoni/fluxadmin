var table;
var vm = new Vue({
    el: '#vm',
    data:{
        galerias: null,
        categorias: null,
        rm: null,
        url: null,
    },
    methods:{
        listar: function (){
            var url = baseUri + '/galeria/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if(dados != null){
                self.galerias = dados;
                }else{
                    self.galerias = null;
                }
                reload_dt_vue();
            });
        },
        
        lista_categotias: function(){
            var url = baseUri + '/galeria/lista_categoria/';
            var _this = this;
            $.getJSON(url, function (dados) {
                _this.categorias = dados;
            });
        },
        editar: function (galeria) {
            this.limpar();
            $('.galeria-acao').html('Alterar');
            $('#galeria_id').val(galeria.galeria_id);
            $('#galeria_categoria').val(galeria.galeria_categoria);
            $('#galeria_status').val(galeria.galeria_status);
            $('#galeria_tipo').val(galeria.galeria_tipo);
            $('#galeria_nome').val(galeria.galeria_nome);
            new bootstrap.Modal(document.getElementById('modal-galeria')).show();
        },
        limpar: function () {
            $('.galeria-acao').html('Incluir');
            $('#galeria_id').val('');
            $('#galeria_categoria').val('');
            $('#galeria_status').val(1);
            $('#galeria_tipo').val(1);
            $('#galeria_nome').val('');
        },
        remover: function (dt) {
            vm.$data.rm = dt.galeria_id;
            vm.$data.url = dt.galeria_img;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id, url) {
            var url_remove = baseUri + '/galeria/remover/';
            $.post(url_remove, {id: id, img: url}).then(function (rs) {
                if(rs == 1){
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    vm.listar();
                }else{
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },

        mudar_status: function (obj) {
            var self = this;
            var id = obj.galeria_id;
            var status = obj.galeria_status;
            if(parseInt(id) > 0){
                var url = baseUri + '/galeria/altera_status/';
                $.post(url,{id: id, status: status}).then(function (rs) {
                    if (rs == 1) {
                        // alert_success('Ação realizada com sucesso!', 'Item removido');
                    } else {
                        alert_error('Ação não pode ser realizada!');
                    }
                    self.listar();
                });
            }
        }
    },
    created: function () {
        $('#tbl-div').hide().promise().done($('#tbl-splash').show());
        this.listar();
        this.lista_categotias();
    }
});
// click do modal
$('#btn-remove').on('click', function () {
    if(vm.$data.rm !== null){
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$('#nova-galeria').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-galeria')).show();
});



Dropzone.autoDiscover = false;
Dropzone.prototype.defaultOptions.dictDefaultMessage = "Selecione ou arraste uma imagem para fazer upload";
// upload foto campo
dropzoneFotos = $("#form-galeria-img").dropzone({
    url: $("#form-galeria-img").attr('action'),
    accept: function (file, done) {
        done();
    },
    complete: function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
            new bootstrap.Modal(document.getElementById('modal-galeria')).hide();
            setTimeout(function () {
                if (file.status == "success" && file.xhr.response == 0) {
                    var msg = 'Fotos enviadas com sucesso!';
                    alert_success(msg);
                    vm.listar();
                }else{
                    alert_error('Erro ao enviar fotos para a galeria')
                }
                Dropzone.forElement("#form-galeria-img").removeAllFiles(true);
            }, 300);
        }
    },
    sending: function (file, xhr, formData) {
    },
    error: function (file, response) {
        alert_error('Falha ao enviar arquivo (s)!', 'Verifique as imagens e tente novamente.');
        setTimeout(function () {
        }, 3000);
    },
    success: function (file, response) {
    },
    totaluploadprogress: function () {
    }
});

$('#galeria_categoria').on('change', function () {
    if ($(this).val() == 'x') {
        new bootstrap.Modal(document.getElementById('modal-categoria')).show();
        let url = $('#modal-categoria form').attr('action');
        url += '/?return=galeria';
        $('#modal-categoria').find('form').attr('action', url);
    }
})
$(document).ready(function () {
    $('.dropify').dropify({
        messages: {
            default: 'Clique aqui para selecionar um arquivo',
            replace: 'Clique em remover para selecionar um novo arquivo',
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


