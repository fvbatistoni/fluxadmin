var table;
var vm = new Vue({
    el: '#vm',
    data: {
        remove_a: false,
        selected: false,
        galerias: null,
        categorias: null,
        rm: null,
        url: null,
        capa: "",
        data_remove: new Array(),
    },
    methods: {
        listar: function () {
            var url = baseUri + '/galeria/lista_img_galeria/id/' + id_galeria;
            var _this = this;
            $.getJSON(url, function (dados) {

                $('#tbl-div').hide().promise().done($('#tbl-splash').show());
                $('#datatable').DataTable().destroy();
                if (dados != null) {
                    _this.galerias = dados;
                }
                if (dados == null) {
                    _this.remove_a = false;
                }
                else {
                    _this.remove_a = true;
                }
            }).then(function (dados) {
                setTimeout(function () {
                    $('#tbl-splash').hide().promise().done($('#tbl-div').show());
                }, 500);
            });


        },
        editar: function (galeria) {
            this.limpar();
            $('.galeria-acao').html('Alterar');
            new bootstrap.Modal(document.getElementById('modal-galeria')).show();
        },
        limpar: function () {
            $('.galeria-acao').html('Incluir');
        },


        add_class_remove: function (item) {

            var ele = $('#img-galeria-id-' + item.foto_galeria_id);
            ele.toggleClass('border3px');

            var remove = $('.border3px');
            var _this = this;
            _this.$data.data_remove = new Array();
            if (remove.length > 0) {
                remove.each(function (index, element) {
                    var obj = {
                        'id': $(element).data('remove'),
                        'url': $(element).data('url')
                    };
                    _this.$data.data_remove.push(obj);
                });
                this.selected = true;
            } else {

                this.selected = false;
            }


        },
        remove_img: function () {

            new bootstrap.Modal(document.getElementById('modal-remove')).show();

        },


        remover: function () {
            var _this = this;
            var url = baseUri + '/galeria/remove_img/';
            $.post(url, { galeria_id: id_galeria, data: _this.$data.data_remove }).then(function (rs) {
                if (parseInt(rs) == 0) {

                    alert_success('Fotos apagadas com sucesso!');
                    var remove = $('.border3px');

                    remove.each(function (index, element) {
                        $(element).removeClass('border3px');
                    });

                    window.location.reload();
                    _this.listar();
                    _this.selected = false;

                } else {
                    alert_success('Fotos não puderam ser apagadas');
                }
            });
        },
        lista_categotias: function () {
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
        remove_all: function () {
            var _this = this;
            var url = baseUri + '/galeria/remove_all_img_galeria/';
            $.post(url, { galeria_id: id_galeria }).then(function (rs) {
                if (parseInt(rs) == 0) {
                    alert_success('Fotos apagadas com sucesso!');
                    window.location.reload();
                    this.selected = false;
                    _this.listar();
                } else {
                    alert_success('Fotos não puderam ser apagadas');
                }
            });
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
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm, vm.$data.url);
    }
});
$('#nova-galeria').on('click', function () {
    vm.limpar();
    new bootstrap.Modal(document.getElementById('modal-galeria')).show();
});

Dropzone.autoDiscover = false;
Dropzone.prototype.defaultOptions.dictDefaultMessage = "Clique aqui ou arraste fotos";
// upload foto campo
dropzoneFotos = $("#form-galeria-img").dropzone({
    url: $("#form-galeria-img").attr('action'),
    accept: function (file, done) {
        done();
    },
    complete: function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

            setTimeout(function () {
                if (file.status == "success") {
                    var msg = 'Fotos enviadas com sucesso!';
                    alert_success(msg);
                    vm.listar();
                } else {
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
$(document).ready(function () {
    var el = document.getElementById('sort');
    var sortable = Sortable.create(el, {
        animation: 750,
        easing: "cubic-bezier(1, 0, 0, 1)",
        onChange: function (evt) {
            var id = $(evt.item).data('id');
            var data = new Array();
            var div = $(evt.to).children();
            div.each(function (index, element) {
                var obj = {
                    'pos': index + 1,
                    'foto_id': $(element).data('id')
                };
                data.push(obj);
            });
            var url = baseUri + '/galeria/ordena_img/';
            $.post(url, { galeria_id: id_galeria, data: data }).then(function (rs) {
                if (parseInt(rs) == 0) {
                    alert_success('Posição Atualizada');
                } else {
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

