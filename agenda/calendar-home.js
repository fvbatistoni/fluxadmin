

// Agenda
var vm = new Vue({
    el: '#APP',
    methods: {
        corServico: () => {
            $("#calendar").hide();
            var url = baseUri + '/configAgenda/getCorServico_json/';
            var self = this;
            //pega as cores dos servicos
            $.getJSON(url, {}, function (dados) {
                if (dados != null) {
                    dados.forEach(serv => {
                        //pega cada agendamento e add a cor do serviço
                        // gridMes
                        var elementosMes = $(".fc-daygrid-event");
                        elementosMes.each(function (index) {
                            var titulo_evento = $(this).find('.fc-event-title').text();
                            if (serv.agenda_servico_cor.length <= 0) {
                                serv.agenda_servico_cor = '#1C7FCC';
                            }
                            if (serv.agenda_servico_nome == titulo_evento) {
                                $(this).css('background-color', serv.agenda_servico_cor).fadeIn("slow");
                            }
                            if (titulo_evento == "Outros") {
                                $(this).css('background-color', '#5D7399').fadeIn("slow");
                            }
                        });
                        // gridSemana
                        var elementosSemana = $(".fc-timegrid-event");
                        elementosSemana.each(function (index) {
                            var titulo_evento = $(this).find('.fc-event-title').text();
                            if (serv.agenda_servico_cor.length <= 0) {
                                serv.agenda_servico_cor = '#1C7FCC';
                            }
                            if (serv.agenda_servico_nome == titulo_evento) {
                                $(this).css({ 'background-color': serv.agenda_servico_cor, 'border-color': serv.agenda_servico_cor }).fadeIn("slow");

                            }

                            if (titulo_evento == 'Outros') {
                                $(this).css({ 'background-color': '#5D7399', 'border-color': '#5D7399' }).fadeIn("slow");

                            }
                        });

                        // gridLIsta
                        var elementosLista = $(".fc-list-event");
                        elementosLista.each(function (index) {
                            var titulo_evento = $(this).find('.fc-list-event-title').text();
                            if (serv.agenda_servico_cor.length <= 0) {
                                serv.agenda_servico_cor = '#1C7FCC';
                            }
                            if (serv.agenda_servico_nome == titulo_evento) {
                                $(this).find('.fc-list-event-title , .fc-list-event-graphic , .fc-list-event-time').css({ 'background': serv.agenda_servico_cor, 'border-color': '#F1F1F1', 'cursor': 'pointer' }).fadeIn("slow");
                            }
                            if (titulo_evento == 'Outros') {
                                $(this).find('.fc-list-event-title , .fc-list-event-graphic , .fc-list-event-time').css({ 'background': '#5D7399', 'border-color': '#5D7399', 'cursor': 'pointer' }).fadeIn("slow");
                            }
                        });
                    });
                };

            })
            $("#calendar").show();
        },

        loadCalendar: () => {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'America/Sao_Paulo',
                initialView: 'listMonth',
                contentHeight: 250,
                editable: false,
                headerToolbar: {
                    right: 'prev,next today',
                    left: 'title'
                },
                events: {
                    url: baseUri + "/agenda/getAgenda/",
                    type: 'GET',

                },
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    //second: '2-digit',
                    meridiem: false
                },
                loading: function (bool) {
                    if (!bool) {
                        setTimeout(() => {
                            vm.corServico();
                            $('.fc-button').on('click', function () {
                                vm.corServico();
                            })
                        }, 200);
                    }
                },
            });
            calendar.setOption('locale', 'pt-br');
            setTimeout(() => calendar.render(), 100);
        },
        funcionamento: () => {
            var url = baseUri + '/Agenda/horarioFuncionamento/';
            var self = this;
            $.getJSON(url, {}, function (dados) {
            }).then(function (dados) {
                if (dados != null) {
                    vm.dias_hora = dados;
                    vm.loadCalendar();
                }
            });
        },
    },
    created: function () {
        $(".load").hide();
        this.funcionamento();
    }
});

