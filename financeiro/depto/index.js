// departamento
var vm = new Vue({
    el: '#APP',
    data: {
        dados: null,
        rm: null,
        status: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/departamento/lista/';
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
            var url_remove = baseUri + '/departamento/remover/';
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
        editar: function (dt) {
            $('#departamento_id').val(dt.id);
            $('#departamento_nome').val(dt.nome);
            $('#departamento-acao').html('Atualizar');
            new bootstrap.Modal(document.getElementById('modal-departamento')).show();
        },
        limpar: function () {
            $('#form-departamento input').val('');
            $('#departamento-acao').html('Cadastrar');
            vm.$data.rm = null;
            vm.$data.status = null;
        },
        gravar: function () {
            var url = baseUri + '/departamento/gravar/';
            var dados = $('#form-departamento').serialize();
            var self = this;
            $.post(url, {dados: dados}).then(function (rs) {
                new bootstrap.Modal(document.getElementById('modal-departamento')).hide();
                console.log(rs);
                alert_success('Procedimento realizado com sucesso!');
                self.listar();
                self.limpar();
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
    if (vm.$data.rm !== null) {
        vm.remove(vm.$data.rm);
    }
});
