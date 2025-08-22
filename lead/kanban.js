$(function () {
    $(".menu-lead").addClass('active');
    $(".connectedSortable").sortable({
        connectWith: ".connectedSortable",
        start: function (event, ui) {
            ui.item.css('transform', 'rotate(5deg)');
            ui.item.css('-webkit-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.3');
            ui.item.css('-moz-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.3');
            ui.item.css('box-shadow', '0 15px 20px rgba(0, 0, 0, 0.3');
        },
        stop: function (event, ui) {
            ui.item.css('transform', 'rotate(0deg)');
            ui.item.css('-webkit-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.1');
            ui.item.css('-moz-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.1');
            ui.item.css('box-shadow', '0 15px 20px rgba(0, 0, 0, 0.1');
        },
        over: function (event, ui) {
            var step_id = $(this).attr('id');
            $("#" + step_id).css('background-color', 'rgba(0, 0, 0, 0.2)');
        },
        out: function (event, ui) {
            var step_id = $(this).attr('id');
            $("#" + step_id).css('background-color', '#DFE1E6');
        },
        receive: function (event, ui) {
            var step_id = $(this).attr('id');
            $("#" + step_id).css('background-color', '#DFE1E6');
            var data = JSON.parse(ui.item[0].attributes.data.value);
            var step = $(this).data('name');
            $("#" + step_id).effect('highlight', {}, 1000, function () {
                //alert('Cliente ' + data.name + ' movido para ' + step)
            });
        },
        update: function (event, ui) {
            var step_id = $(this).attr('id');

        }
    }).disableSelection();
});