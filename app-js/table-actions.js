var vm = new Vue({
    el: '#APP',
    data: {
        dados: null,
        rm: null,
        status: null,
        modUrl: null
    },
    methods: {
        listar: function () {
            var url = baseUri + '/' + this.modUrl + '/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                self.dados = dados;
                reload_dt_vue();
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/' + this.modUrl + '/remover/';
            var self = this;
            $.post(url_remove, {id: id}).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
        },

        mudar_status: function (dt) {
            $('[data-toggle="tooltip"]').tooltip('dispose');
            var url = baseUri + '/' + this.modUrl + '/altera_status/';
            var self = this;    
            $.post(url, {id: dt.id, status: dt.status}).then(function (rs) {
                if (rs == '') {
                    alert_success('Procedimento realizado com sucesso!');
                    $('[data-toggle="tooltip"]').tooltip('dispose');
                    self.listar();
                } else {
                    alert_error('Ação não pode ser realizada ou você não tem permissão!');
                }
            });
        },

        doc_exist: function (data) {
            var url = baseUri + '/valida/doc_exist/';
            $.post(url, {data: data}, function (rs) {
                console.log(rs)
            })
        },
        email_exist: function (data) {
            var url = baseUri + '/valida/email_exist/';
            $.post(url, {data: data}, function (rs) {
                console.log(rs)
            })
        }
    },
    created: function () {
        this.modUrl = $('#APP').data('url');
        if (this.modUrl != "") {
            $('#btn-remove').on('click', function () {
                if (vm.$data.rm !== null) {
                    vm.remove(vm.$data.rm);
                }
            });
            $('#tbl-div').hide().promise().done($('#tbl-splash').show());
            this.listar();
        }
    }
});


/*
$('#tecnico_documento').on('blur', function () {
    var doc = $('#tecnico_documento').val();
    if (validaDocumento(doc)) {
        var url = baseUri + '/tecnico/checa_documento/';
        $.post(url, {doc: doc}).then(function (rs) {
            rs = parseInt(rs);
            switch (rs) {
                case -1:
                    $('#documento_error').html('<span class="text-center text-danger bold"><strong>Documento Já cadastrado!</strong></span>');
                    $('#tecnico_documento').val('');
                    $('#tecnico_documento').focus();
                    break;
                case 0:
                    $('#documento_error').html('<span class="text-center text-danger bold"><strong>Documento inválido!</strong></span>');
                    $('#tecnico_documento').val('');
                    $('#tecnico_documento').focus();
                    break;
                case 1:
                    $('#documento_error').html('');
                    break;
            }
        });
    } else {
        $('#documento_error').html('<span class="text-center text-danger bold"><strong>Documento inválido!</strong></span>');
        $('#tecnico_documento').val('');
        //$('#tecnico_documento').focus();
    }
});
$('#tecnico_email').on('blur', function () {
    var email = $('#tecnico_email').val();
    var vazio = parseInt(email.length);
    if (vazio > 0) {
        if (validarEmail(email)) {
            var url = baseUri + '/tecnico/checa_email/';
            $.post(url, {email: email}).then(function (rs) {
                rs = parseInt(rs);
                switch (rs) {
                    case -1:
                        $('#email_error').html('<span class="text-center text-danger bold"><strong>Já cadastrado!</strong></span>');
                        $('#tecnico_email').val('');
                        $('#tecnico_email').focus();
                        break;
                    case 0:
                        $('#email_error').html('<span class="text-center text-danger bold"><strong>E-mail inválido!</strong></span>');
                        $('#tecnico_email').val('');
                        $('#tecnico_email').focus();
                        break;
                    case 1:
                        $('#email_error').html('');
                        break;
                }
            });
        } else {
            $('#email_error').html('<span class="text-center text-danger bold"><strong>E-mail inválido!</strong></span>');
            $('#tecnico_email').val('');
            $('#tecnico_email').focus();
        }
    } else {
        $('#email_error').html('');
    }
});
*/

