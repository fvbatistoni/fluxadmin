var vm = new Vue({
    el: '#vm',
    data: {
        os: null,
        rm: null,
    },
    methods: {
        listar: function () {
            var url = baseUri + '/os/lista/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                self.os = dados;
                reload_dt_vue();
            });
        },
        remover: function (dt) {
            vm.$data.rm = dt.os_id;
            new bootstrap.Modal(document.getElementById('modal-remove')).show();
        },
        remove: function (id) {
            var url_remove = baseUri + '/os/remover/';
            var self = this;
            $.post(url_remove, {id: id}).then(function (rs) {
                if (rs == 1) {
                    alert_success('Ação realizada com sucesso!', 'Item removido');
                } else {
                    alert_error('Ação não pode ser realizada!');
                }
                self.listar();
            });
            new bootstrap.Modal(document.getElementById('modal-remove')).hide();
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


$('.selectpickers').selectpicker({
    //noneSelectedText: "Selecione as colunas...",
    multipleSeparator: " | ",
    selectedTextFormat: 'static',
    //tickIcon: 'glyphicon-remove',
    //actionsBox: true,
});
var uri = baseUri + '/os/';
$('#data-table-cols').on('change', function () {
    var optn = $('#data-table-cols option').length;
    var vals = $(this).val();
    var opts = [];
    var cols = [];
    $.each(vals, function (k, v) {
        opts.push(v);
    });
    for (i = 0; i <= optn - 1; i++) {
        cols.push(i);
    }
    $.each(cols, function (k, v) {
        var column = dtable.column(v);
        column.visible(false);
    });
    $.each(opts, function (k, v) {
        var column = dtable.column(v);
        column.visible(true);
    });
    $.cookie('grid-opt', opts, {path: uri});
});

setTimeout(function () {
    if ($.cookie('grid-opt') && $.cookie('grid-opt').length > 0) {
        var optU = $.cookie('grid-opt').split(",");
        if (optU.length > 0)
            $('#data-table-cols').val(optU).trigger('change');
    }
}, 800);

$("#datatable").on('dblclick', '.os-editar', function () {
    var id = $(this).attr('id');
    var url = baseUri + '/os/editar/id/' + id;
    window.location = url;
});
