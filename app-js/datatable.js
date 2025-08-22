var datatable_ptbr = {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "<small>Mostrando de _START_ até _END_ de _TOTAL_ registros</small>",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "MENU resultados por página",
    "sLengthMenu": "",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próx.",
        "sPrevious": "Ant.",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
};

var datatable_buttons = [
    {
        extend: 'csv',
        className: 'btn-sm',
        text: '<i class="fas fa-file-code"></i> <span class="hidden-xs-down">CSV</span>'
    },
    {
        extend: 'excel',
        className: 'btn-sm',
        text: '<i class="fas fa-file-excel"></i> <span class="hidden-xs-down">Excel</span>'
    },
    {
        extend: 'pdf',
        className: 'btn-sm',
        text: '<i class="fas fa-file-pdf"></i> <span class="hidden-xs-down">PDF</span>',
        exportOptions: {
            //columns: ':visible',
            /*
            format: {
                body: function (data, row, column, node) {
                    if (node.className == 'd-print-none') {
                        return ''
                    }
                    return node.innerText;
                }
            }*/
        },
        customize: function (win) {
            //$('#datatable').DataTable().columns('.d-print-none').visible(false);
            //console.log($('#datatable').DataTable().columns('.d-print-none'))
        }
    },
    {
        extend: 'print',
        className: 'btn-sm',
        exportOptions: {
            //columns: ':visible',
            //stripHtml: false
        },
        text: '<i class="fas fa-print"></i> <span class="hidden-xs-down">Imprimir</span>',
        customize: function (win) {
            //$(win.document.body).find('.d-print-none').remove();
            /*
            $(win.document.body).addClass('white-bg');
            $(win.document.body).css('font-size', '10px');
            $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
            */
        }
    }];

function draw_buttons() {
    $('.dataTables_filter LABEL').css('margin-right', '0px').css('font-weight', 'bold').css('color', '#333');
    $('.dataTables_filter INPUT').css('margin-left', '0px');
    $('.dataTables_filter INPUT').css('padding-left', '0px');
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle=\"tooltip\"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));;
}


/*RELOAD DATATABLE -> VUE LOAD*/
var dtable;
var column;
reload_dt_vue = function () {
    $('#tbl-splash').hide().promise().done($('#tbl-div').show());
    if($('#datatable').length > 0) {
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary btn-lg mx-1 ';
        setTimeout(function () {
            $('#tbl-splash').hide().promise().done($('#tbl-div').show());
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary btn-lg mx-1 ';
            dtable = $('#datatable').DataTable({
                language: datatable_ptbr,
                retrieve: true,
                responsive: true,
                dom: 'Bfrtip',
                order: [],
                buttons: datatable_buttons,
                "displayLength": 10
            });
            $('button.toggle-vis').on('click', function (e) {
                e.preventDefault();
                column = dtable.column($(this).attr('data-column'));
                column.visible(!column.visible());
            });
            setTimeout(draw_buttons(), 500);
        }, 500);
    }
}

/* load splash Datatable*/
splash_dt = function () {
    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#tbl-div').hide().promise().done($('#tbl-splash').show());
        $('#datatable').DataTable().destroy();
    }
}
