// Agenda
var vm = new Vue({
    el: "#APP",
    data: {
        servicos: [],
        clientes: [],
        horarioAgendamento: null,
        agendamentos: [],
        agendaOptionId: null,
        agendaStatus: null,
        consulta: null,
        dia: null,
        dias_hora: null,
        fim: null,
        hora: 00,
        min: 00,
        horas_ante: null,
        horarioAgendamentoRapido: null,
        backgroundColor: null,
        agendaEdit: null,
    },
    methods: {
        getClientesServicos: () => {
            //select de clientes
            var url = baseUri + "/cliente/lista/";
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    vm.clientes = dados;
                    vm.clientes.map((cliente) => {
                        $("#clientesSelect, #clientesSelectEdit").append(`
                            <option value='${cliente.id}'>${cliente.cliente_nome}</option>
                        `);
                    });
                } else {
                    $("#clientesSelect,  #clientesSelectEdit").append(`
                <option disabled>Não clientes há cadastrados</option>
            `);
                }
                reload_dt_vue();
            });

            //select de servicos
            var url = baseUri + "/servico/get_json/";
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    vm.servicos = dados;
                    vm.servicos.map((servico) => {
                        $("#servicoSelect, #servicoSelectEdit").append(`
                            <option value='${servico.id}'>${servico.nome}</option>    
                        `);
                    });
                } else {
                    $("#servicoSelect,  #servicoSelectEdit").append(`
                <option disabled'>Não há serviços cadastrados</option>    
            `);
                }
                reload_dt_vue();
            });
        },
        corServico: () => {
            $("#calendar").hide();
            var url = baseUri + "/configAgenda/getCorServico_json/";
            var self = this;
            //pega as cores dos servicos
            $.getJSON(url, {}, function (dados) {
                //var urlAgenda = baseUri + '/agenda/getAgenda/';
                // pega os servicos agendados

                //$.getJSON(urlAgenda, {}, function (agendamentos) {
                //dados.forEach(function (agend) {
                if (dados != null) {
                    dados.forEach((serv) => {
                        //pega cada agendamento e add a cor do serviço
                        // gridMes
                        var elementosMes = $(".fc-daygrid-event");
                        elementosMes.each(function (index) {
                            var titulo_evento = $(this)
                                .find(".fc-event-title")
                                .text();

                            if (serv.agenda_servico_cor.length <= 0) {
                                serv.agenda_servico_cor = "#1C7FCC";
                            }

                            if (serv.agenda_servico_nome == titulo_evento) {
                                $(this)
                                    .css(
                                        "background-color",
                                        serv.agenda_servico_cor
                                    )
                                    .fadeIn("slow");
                            }
                            if (titulo_evento == "Outros") {
                                $(this)
                                    .css("background-color", "#5D7399")
                                    .fadeIn("slow");
                            }
                        });
                        // gridSemana
                        var elementosSemana = $(".fc-timegrid-event");
                        elementosSemana.each(function (index) {
                            var titulo_evento = $(this)
                                .find(".fc-event-title")
                                .text();

                            if (serv.agenda_servico_cor.length <= 0) {
                                serv.agenda_servico_cor = "#1C7FCC";
                            }
                            if (serv.agenda_servico_nome == titulo_evento) {
                                $(this)
                                    .css({
                                        "background-color":
                                            serv.agenda_servico_cor,
                                        "border-color": serv.agenda_servico_cor,
                                    })
                                    .fadeIn("slow");
                            }
                            if (titulo_evento == "Outros") {
                                $(this)
                                    .css({
                                        "background-color": "#5D7399",
                                        "border-color": "#5D7399",
                                    })
                                    .fadeIn("slow");
                            }
                        });
                        // gridLIsta
                        var elementosLista = $(".fc-list-event");
                        elementosLista.each(function (index) {
                            var titulo_evento = $(this)
                                .find(".fc-list-event-title")
                                .text();
                            if (serv.agenda_servico_cor.length <= 0) {
                                serv.agenda_servico_cor = "#1C7FCC";
                            }
                            if (serv.agenda_servico_nome == titulo_evento) {
                                $(this)
                                    .find(
                                        ".fc-list-event-title , .fc-list-event-graphic , .fc-list-event-time"
                                    )
                                    .css({
                                        background: serv.agenda_servico_cor,
                                        "border-color": "#F1F1F1",
                                        cursor: "pointer",
                                    })
                                    .fadeIn("slow");
                            }
                            if (titulo_evento == "Outros") {
                                $(this)
                                    .find(
                                        ".fc-list-event-title , .fc-list-event-graphic , .fc-list-event-time"
                                    )
                                    .css({
                                        background: "#5D7399",
                                        "border-color": "#5D7399",
                                        cursor: "pointer",
                                    })
                                    .fadeIn("slow");
                            }
                        });
                    });
                }
            });
            $("#calendar").show();
        },
        agendar: () => {
            $(".load").show();
            let dados;
            vm.hora = $("#hora").val();
            vm.fim = $("#fim").val();
            let mes = new Date().getUTCMonth() + 1;
            let dia = new Date().getUTCDate();
            if (mes < 10) {
                mes = "0" + mes;
            }
            if (dia < 10) {
                dia = "0" + dia;
            }
            var dia_at = new Date().getUTCFullYear() + "-" + mes + "-" + dia;

            var hora_at = new Date().getHours() + ":" + new Date().getMinutes();

            if ($("#hora").val() == "") {
                $(".load").hide();
                alert_error("Insira um horário");
                return false;
            }
            if (vm.dia == dia_at && vm.hora < hora_at) {
                $(".load").hide();
                alert_error("Não é possivel agendar no passado.");
                return false;
            }

            if (vm.dia == dia_at && hora_at + vm.horas_ante < vm.hora) {
                $(".load").hide();
                alert_error(
                    "Não é possivel agendar com menos de " +
                        vm.horas_ante +
                        " horas de antecedência"
                );
                return false;
            } else {
                let inicio = vm.dia + "T" + vm.hora;
                let final = vm.dia + "T" + vm.fim;
                let url = baseUri + "/agenda/agendar";

                dados = {
                    titulo: $("#titulo").val(),
                    orcamento: $("#servicoSelect").val(),
                    horario: inicio,
                    fim: final,
                    obs: $("#observacao").val(),
                    paciente: $("#clientesSelect").val(),
                };
                $.post(url, dados, {}).then((res) => {
                    if (res == "") {
                        $(".modal").modal("hide");
                        vm.loadCalendar();
                        $(".load").hide();
                        alert_success("Agendado com sucesso");
                    } else {
                        $(".load").hide();
                        alert_error("Não foi possível agendar");
                    }
                });
            }
        },

        mostrarDadosConsulta: () => {
            let url = baseUri + "/agenda/getDadosAgenda";
            $.post(url, { agenda_id: vm.agendaOptionId }, {}).then((res) => {
                $("#modalOpcoesContent").html("");

                if (res != null) {
                    let resp = JSON.parse(res);
                    vm.consulta = resp[0];
                    if (vm.consulta.agenda_titulo == "")
                        vm.consulta.agenda_titulo = "Sem título";

                    $("#modalOpcoesContent .modal-title").text(
                        `${vm.consulta.agenda_titulo} em ${vm.consulta.inicio}`
                    );

                    if (vm.consulta.fim != null) {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-start pr-2" style="color:${vm.consulta.agenda_servico_cor}">
                            <i class="fa fa-square  fa-3x" aria-hidden="true"></i>
                            </div>
                            <div class="col-11 align-self-end pl-4">
                            <h4> ${vm.consulta.agenda_titulo}</h4>
                                <label>${vm.consulta.inicio}</label>
                                <label> até ${vm.consulta.fim}</label>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                                
                        `);
                    } else {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-start pr-2" style="color:${vm.consulta.agenda_servico_cor}">
                            <i class="fa fa-square  fa-3x" aria-hidden="true"></i>
                            </div>
                            <div class="col-11 align-self-end pl-4">
                            <h4> ${vm.consulta.agenda_titulo}</h4>
                                <label>${vm.consulta.inicio}</label>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                                
                        `);
                    }
                    if (vm.consulta.servico_nome != null) {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-center">
                            
                            <i class="fa fa-briefcase fa-2x" aria-hidden="true"></i>
                                </div>
                            <div class="col-11 align-self-center">
                            <label>Serviço</label>
                                <h5>${vm.consulta.servico_nome}</h5>
                                </div>
                                <div class="col-12">
                                <hr>
                                </div>
                            `);
                    } else {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-center">
                            
                            <i class="fa fa-briefcase fa-2x" aria-hidden="true"></i>
                                </div>
                            <div class="col-11">
                            <label>Serviço</label>
                                    <h5>Não há nenhum serviço atrelado</h5>
                             </div>
                             <div class="col-12">
                            <hr>
                            </div>
                            `);
                    }
                    if (vm.consulta.cliente_nome != null) {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-center">
                            <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                            </div>
                                <div class="col-11  align-self-center">
                                <label>Cliente</label>
                                    <h5>${vm.consulta.cliente_nome}</h5>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-1 align-self-center">
                                <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                                </div>
                                <div class="col-11 align-self-start">
                                <label>Email </label> 
                                <h5> ${vm.consulta.cliente_email}</h5>
                                </div>
                                </div>
                                <div class="col-12">
                                <hr>
                                </div>
                                <div class="col-1 align-self-center">
                                <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                                </div>
                                <div class="col-sm-5">
                                    <label>Telefone</label> 
                                    <h5>${vm.consulta.cliente_telefone}</h5>
                                </div>
                                <div class="col-12">
                                <hr>
                                </div>
                              
                        `);
                        if (vm.consulta.cliente_celular != null) {
                            $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-center">
                            <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                            </div>
                                <div class="col-sm-5 align-self-center">
                                    <label>Celular</label> 
                                    <h5>${vm.consulta.cliente_celular} </h5>
                                </div>
                            `);
                        }
                        if (vm.consulta.cliente_whats != null) {
                            $("#modalOpcoesContent").append(` 
                            <div class="col-1 align-self-center">
                            <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                            </div>
                                <div class="col-sm-5">
                                    <label>WhatsApp</label> 
                                    <h5>${vm.consulta.cliente_whats} </h5>
                                </div>
                                <div class="col-12">
                                <hr>
                            </div>
                            `);
                        }
                    } else {
                        $("#modalOpcoesContent").append(`
                                <div class="col-sm-12">
                                <hr>
                                    <strong>Não há ninguém com você nesse evento</strong>
                                </div>
                        `);
                    }
                    if (vm.consulta.usuario_nome != "") {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-center">
                            <i class="fa fa fa-users fa-2x" aria-hidden="true"></i>
                            </div>
                                <div class="col-sm-11">
                                    <label>Profissional</label>
                                    <h5>${vm.consulta.usuario_nome} </h5>
                                    </div>
                                    <div class="col-12">
                                    <hr>
                            </div>
                        `);
                    }
                    if (vm.consulta.agenda_obs != "") {
                        $("#modalOpcoesContent").append(`
                            <div class="col-1 align-self-center">
                            <i class="fa fa-list fa-2x" aria-hidden="true"></i>
                            </div>
                                <div class="col-sm-11">
                                    <label>Observação</label>
                                   <p> <strong>${vm.consulta.agenda_obs}</strong></p>
                                </div>
                                <div class="col-12">
                                <hr>
                            </div>
                        `);
                    }

                    if (
                        new Date().getTime() <
                        new Date(vm.consulta.agenda_data).getTime()
                    ) {
                        //ok
                        if (vm.consulta.agenda_status == 2) {
                            $("#btnModalEdit").show();
                            $("#btnCancelarConsulta").hide();
                        } else if (vm.consulta.agenda_status == 1) {
                            $("#btnCancelarConsulta").show();
                            $("#btnRecusar").hide();
                            $("#btnModalEdit").hide();
                        } else if (vm.consulta.agenda_status == 3) {
                            $("#btnCancelarConsulta").show();
                            $("#btnRecusar").hide();
                            $("#btnModalEdit").show();
                        } else {
                            $("#btnCancelarConsulta").show();
                            $("#btnRecusar").hide();
                            $("#btnModalEdit").show();
                        }
                    } else {
                        //atrasada
                        if (vm.consulta.agenda_status == 1) {
                            $("#btnRecusar").hide();
                            $("#btnModalEdit").hide();
                        } else if (vm.consulta.agenda_status == 3) {
                            $("#btnCancelarConsulta").show();
                            $("#btnRecusar").hide();
                            $("#btnModalEdit").hide();
                        } else {
                            $("#btnRecusar").hide();
                            $("#btnModalEdit").hide();
                        }
                    }
                }
            });

            vm.corServico();
        },
        removerAgenda: () => {
            $(".load").show();
            let url = baseUri + "/agenda/removeAgenda";

            $.post(url, { agenda_id: vm.agendaOptionId }, {}).then((res) => {
                $("#modalCancelamento").modal("hide");
                if (res == 1) {
                    alert_success("Evento cancelado com sucesso");
                    $(".load").hide();
                    vm.loadCalendar();
                } else {
                    $(".load").hide();
                    alert_error("Não foi possível cancelar o agendamento");
                }
            });
        },

        cancelEditAgenda: () => {
            vm.agendaEdit = null;
            vm.loadCalendar();
            $("#modalConfirmaEdit").modal("hide");
        },

        loadCalendar: () => {
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: "America/Sao_Paulo",
                initialView: "dayGridMonth",
                contentHeight: 700,
                editable: false,

                //horarios e dias ativos
                businessHours: [
                    {
                        daysOfWeek: vm.dias_hora.dias,
                        startTime: vm.dias_hora.inicio,
                        endTime: vm.dias_hora.inicio_almoco,
                    },

                    {
                        daysOfWeek: vm.dias_hora.dias,
                        startTime: vm.dias_hora.fim_almoco,
                        endTime: vm.dias_hora.fim,
                    },
                ],

                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
                },

                eventDidMount: function (info) {
                    //console.log('aqui' )
                    //  vm.corServico();
                },

                events: {
                    url: baseUri + "/agenda/getAgenda/",
                    type: "GET",
                },
                eventTimeFormat: {
                    // like '14:30:00'
                    hour: "2-digit",
                    minute: "2-digit",
                    //second: '2-digit',
                    meridiem: false,
                },

                eventClick: function (info) {
                    vm.corServico();
                    vm.agendaOptionId = info.event.extendedProps.agenda_id;
                    vm.agendaStatus = info.event.extendedProps.agenda_status;
                    vm.mostrarDadosConsulta();
                    $(".load").hide();

                    $("#modalOpcoes").modal("show");
                    if (vm.agendaStatus == 1) {
                        $("#btnConcluirConsulta").html(`
                            <i class="fa fa-clock"></i> Marcar novamente
                        `);
                    } else if (vm.agendaStatus == 3) {
                        $("#btnConcluirConsulta").html(`
                            <i class="fa fa-clock"></i> Marcar novamente
                        `);
                    } else if (vm.agendaStatus == 2) {
                        $("#btnConcluirConsulta").html(`
                            <i class="fa fa-clock"></i> Confirmar Agendamento
                        `);
                        $("#btnRecusar").show();
                    } else {
                        $("#btnConcluirConsulta").html(`
                            <i class="fa fa-check"></i> Concluir
                        `);
                    }
                },
                loading: function (bool) {
                    if (!bool) {
                        setTimeout(() => {
                            vm.corServico();
                            $(".fc-button").on("click", function () {
                                vm.corServico();
                            });
                        }, 200);
                    }
                },
            });
            calendar.setOption("locale", "pt-br");
            setTimeout(() => calendar.render(), 100);

            calendar.on("dateClick", function (info) {
                //verifica se é um dia ativo
                var tipo_dia = info.jsEvent.srcElement;
                tipo_dia = $(tipo_dia).attr("class");

                if (tipo_dia != "fc-non-business") {
                    // get dia atual
                    let diaAtual = new Date().getUTCDate();
                    if (diaAtual < 10) {
                        diaAtual = "0" + diaAtual;
                    }

                    let mesAtual = new Date().getUTCMonth() + 1;
                    if (mesAtual < 10) {
                        mesAtual = "0" + mesAtual;
                    }
                    let anoAtual = new Date().getUTCFullYear();

                    let horaAtual = new Date().getHours();
                    if (horaAtual < 10) {
                        horaAtual = "0" + horaAtual;
                    }

                    let minutoAtual = new Date().getMinutes();
                    if (minutoAtual < 10) {
                        minutoAtual = "0" + minutoAtual;
                    }

                    let segundoAtual = new Date().getSeconds();
                    if (segundoAtual < 10) {
                        segundoAtual = "0" + segundoAtual;
                    }

                    //pega o dia selecionado no calendario
                    // get dia atual
                    let diaSelecionado = info.date.getUTCDate();
                    if (diaSelecionado < 10) {
                        diaSelecionado = "0" + diaSelecionado;
                    }
                    let mesSelecionado = info.date.getUTCMonth() + 1;
                    if (mesSelecionado < 10) {
                        mesSelecionado = "0" + mesSelecionado;
                    }

                    let AnoSelecionado = info.date.getUTCFullYear();

                    let dataAtual =
                        "" +
                        anoAtual +
                        mesAtual +
                        diaAtual +
                        horaAtual +
                        minutoAtual +
                        segundoAtual;
                    let dataSelecionada =
                        "" +
                        AnoSelecionado +
                        mesSelecionado +
                        diaSelecionado +
                        "999999";

                    if (dataSelecionada > dataAtual) {
                        let dataHora = info.dateStr.split("T");
                        vm.dia = dataHora[0];
                        let diaAgendamento = dataHora[0].split("-");
                        $(".load").hide();
                        diaAgendamento =
                            diaAgendamento[2] +
                            "/" +
                            diaAgendamento[1] +
                            "/" +
                            diaAgendamento[0];
                        $("#modalAgendamentoNovo").modal("show");
                        $("#horarioAgendamento").html(`em ${diaAgendamento}`);
                    } else {
                        alert_error(
                            "Não é possível agendar um evento para uma data/horário que já passou"
                        );
                    }
                }
            });
        },
        funcionamento: () => {
            var url = baseUri + "/Agenda/horarioFuncionamento/";
            var self = this;
            $.getJSON(url, {}, function (dados) {
                splash_dt();
            }).then(function (dados) {
                if (dados != null) {
                    vm.dias_hora = dados;
                    vm.loadCalendar();
                }
                reload_dt_vue();
            });
        },

        verificaHorarioServico: (servico, campoInicio, campoFim) => {
            servico_id = servico.val();
            if (servico_id != null && servico_id != "") {
                var url = baseUri + "/agenda/verificaHorario/";
                $.post(url, { servico: servico_id }).then(function (rs) {
                    rs = JSON.parse(rs);

                    if (campoInicio.val() != "") {
                        let inicio = campoInicio.val().split(":");
                        hora = parseInt(inicio[0]) + rs.duracao;
                        vm.fim = hora + ":" + inicio[1];
                        campoFim.val(vm.fim);
                        vm.horas_ante = rs.horas_antecedencia;
                        //verificação dos horarios de expediente e almoço
                        if (
                            campoInicio.val() < vm.dias_hora.inicio ||
                            campoInicio.val() > vm.dias_hora.fim
                        ) {
                            campoInicio.val(vm.dias_hora.inicio);
                            alert_error(
                                "Este agendamento está fora do expediente"
                            );
                        } else if (vm.dias_hora.fim < campoFim.val()) {
                            alert_error(
                                "Este agendamento está fora do expediente"
                            );
                        } else if (
                            campoInicio.val() > vm.dias_hora.inicio_almoco &&
                            campoInicio.val() < vm.dias_hora.fim_almoco
                        ) {
                            campoInicio.val(vm.dias_hora.fim_almoco);
                            alert_error(
                                "Este agendamento está no período de almoço"
                            );
                        } else if (
                            campoFim.val() < vm.dias_hora.fim_almoco &&
                            campoFim.val() > vm.dias_hora.inicio_almoco
                        ) {
                            campoInicio.val(vm.dias_hora.fim_almoco);
                            alert_error(
                                "Este agendamento está no período de almoço"
                            );
                        }
                        //verifica se há um agendamento naquele horário
                        else {
                            var fim = campoFim.val();
                            var comeco = campoInicio.val();
                            if (comeco != null && comeco != "") {
                                var url =
                                    baseUri + "/agenda/HorarioporCliente/";
                                $.post(url, {
                                    inicio: comeco,
                                    fim: fim,
                                    dia: vm.dia,
                                }).then(function (rs) {
                                    if (rs == 1) {
                                        alert_error(
                                            "Há agendamento(s) neste período!"
                                        );
                                    }
                                });
                            }
                        }
                    }
                });
            } else {
                if (
                    campoInicio.val() < vm.dias_hora.inicio ||
                    campoInicio.val() > vm.dias_hora.fim
                ) {
                    campoInicio.val(vm.dias_hora.inicio);
                    alert_error("Este agendamento está fora do expediente");
                } else if (
                    campoInicio.val() > vm.dias_hora.inicio_almoco &&
                    campoInicio.val() < vm.dias_hora.fim_almoco
                ) {
                    campoInicio.val(vm.dias_hora.inicio);
                    alert_error("Este agendamento está no período de almoço");
                }
            }
        },

        verificaHorarioFinal: (campoInicio, campoFinal) => {
            //verificação dos horarios de expediente e almoço
            if (
                campoInicio.val() < vm.dias_hora.inicio ||
                campoInicio.val() > vm.dias_hora.fim
            ) {
                campoInicio.val(vm.dias_hora.inicio);
                alert_error("Este agendamento está fora do expediente");
            } else if (vm.dias_hora.fim < campoFinal.val()) {
                alert_error("Este agendamento está fora do expediente");
            } else if (
                campoInicio.val() > vm.dias_hora.inicio_almoco &&
                campoInicio.val() < vm.dias_hora.fim_almoco
            ) {
                alert_error("Este agendamento está no período de almoço");
            } else if (
                campoFinal.val() < vm.dias_hora.fim_almoco &&
                campoFinal.val() > vm.dias_hora.inicio_almoco
            ) {
                alert_error("Este agendamento está no período de almoço");
            }
            //verifica se há um agendamento naquele horário
            else {
                var fim = campoFinal.val();
                var comeco = campoInicio.val();
                if (comeco != null && comeco != "") {
                    var url = baseUri + "/agenda/HorarioporCliente/";
                    $.post(url, { inicio: comeco, fim: fim, dia: vm.dia }).then(
                        function (rs) {
                            if (rs == 1) {
                                alert_error("Há agendamento(s) neste período");
                            }
                        }
                    );
                }
            }
        },
    },
    created: function () {
        $(".load").hide();
        this.funcionamento();
        this.getClientesServicos();
    },
});

$("#btnAgendar").click(() => {
    $(".load").hide();
    vm.agendar();
});

$("#btnModalEdit").click(() => {
    $(".load").hide();
    $("#modalOpcoes").modal("hide");
    let idAgenda = vm.agendaOptionId;
    let url = baseUri + "/agenda/getDadosAgenda";
    $.post(url, { agenda_id: idAgenda }, {}).then((res) => {
        res = JSON.parse(res)[0];
        let inicio = res.agenda_data.split(" ");
        if (res.agenda_fim != null) {
            let fim = res.agenda_fim.split(" ");
            $("#fimEdit").val(fim[1].substring(0, 5));
        }
        $("#idEdit").val(res.agenda_id);
        $("#inicioEdit").val(inicio[1].substring(0, 5));
        $("#statusEdit").val(res.agenda_status);
        $("#novaDataEdit").val(vm.consulta.agenda_data.replace(" ", "T"));
        $("#servicoSelectEdit").val(res.agenda_orcamento);
        $("#clientesSelectEdit").val(res.agenda_paciente);
        $("#tituloEdit").val(res.agenda_titulo);
        $("#observacaoEdit").val(res.agenda_obs);
    });
    $("#modalConfirmaEdit").modal("show");
});

$("#btnAgendar2").click(() => {
    $(".load").hide();
    vm.agendar();
});

$("#btnConcluirConsulta").click(() => {
    $(".load").show();
    let url = baseUri + "/agenda/concluirConsulta";
    $.post(url, { agenda_id: vm.agendaOptionId }, {}).then((res) => {
        $("#modalOpcoes").modal("hide");
        if (res == "") {
            vm.loadCalendar();
            alert_success("Evento concluído com sucesso");
            $(".load").hide();
        } else {
            alert_error("Não foi possível concluir o evento");
            console.log(res);
            $(".load").hide();
        }
    });
});

$("#btnCancelarConsulta").click(() => {
    $("#modalOpcoes").modal("hide");
    $("#modalCancelamento").modal("show");
});

$("#btnRecusar").click(() => {
    let url = baseUri + "/agenda/concluirConsulta";

    $.post(
        url,
        { agenda_id: vm.agendaOptionId, agenda_status: vm.agendaStatus },
        {}
    ).then((res) => {
        $("#modalOpcoes").modal("hide");
        if (res == "") {
            vm.loadCalendar();
            alert_success("Evento recusado com sucesso");
        } else {
            alert_error("Não foi possível concluir o evento");
        }
    });
});

$("#btnRemoverConsulta").click(() => {
    vm.removerAgenda();
});

$("#btnCancelEdit").click(() => {
    vm.cancelEditAgenda();
});

$("#servicoSelect ,  #hora").on("change", function () {
    vm.verificaHorarioServico($("#servicoSelect"), $("#hora"), $("#fim"));
});
$("#servicoSelectEdit ,  #inicioEdit").on("change", function () {
    vm.verificaHorarioServico(
        $("#servicoSelectEdit"),
        $("#inicioEdit"),
        $("#fimEdit")
    );
});

$("#fim").on("change", function () {
    vm.verificaHorarioFinal($("#hora"), $("#fim"));
});

$("#fimEdit").on("change", function () {
    vm.verificaHorarioFinal($("#inicioEdit"), $("#fimEdit"));
});
