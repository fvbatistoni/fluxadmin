<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="${baseUri}/view/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="${config_site_description}">
    <meta name="author" content="${config_site_author}">
    <meta name="keywords" content="${config_site_keywords}">
    <meta name="author" content="${config_seo_author}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} - Agenda</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="agenda/index.css" rel="stylesheet">
    <!--CALENDAR -->
    <link href="assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="assets/plugins/fullcalendar/main.css" rel="stylesheet">
    </script>
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">
        <!-- TOPO import -->
        @(admin.layout.topo)
        <!-- MENU import -->
        @(admin.layout.topo-menu)
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Agenda</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Clientes</a></li>
                            <li class="breadcrumb-item active">Gerenciar Agendar</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a class="btn btn-primary waves-effect waves-light menu-access" data-id="Cliente:G" href="${baseUri}/ConfigAgenda">
                                <i class="fa fa-calendar-minus"></i> Configurações
                            </a>
                        </h6>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                            <div class="card-body">
                                <div class="content">
                                    <form autocomplete="off" id="novo-tratamento" method="post" action="${baseUri}/tratamento/gravar/" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" 
                                        value="${tratamento_id}">
                                        <section id="agenda">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id='calendar'></div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->

                <div class="modal fade" tabindex="-1" role="dialog" id="modalOpcoes">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Dados do Agendamento</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="modalOpcoesContent">
                                </div>
                                <p id="modalOpcoesContent">
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <span class="load">
                                                <svg class="circular" viewBox="25 25 50 50">
                                                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                                                </svg>
                                            </span>
                                            <button id="btnConcluirConsulta" type="button" class="btn btn-primary"> <i class="fa fa-check"></i> Concluir</button>
                                            <button id="btnCancelarConsulta" type="button" class="btn btn-danger"> <i class="fa fa-trash"></i> Excluir</button>
                                            <button id="btnRecusar" type="button" class="btn btn-danger"> <i class="fa fa-trash"></i> Recusar</button>
                                            <button type="button" class="btn btn-primary" id="btnModalEdit"> <i class="fa fa-edit"></i> Editar</button>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modalAgendamento">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalTitle">Dados do agendamento</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="modalAgendamentoContent">

                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btnAgendar">Agendar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modalCancelamento">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cancelar evento</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="modalCancelamentoContent">
                                    Tem certeza de que deseja remover esta agendamento? Essa ação não poderá ser desfeita.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="btnRemoverConsulta">Remover</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modalAgendamentoNovo">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-titlea">Novo Agendamento <span id="horarioAgendamento"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label> Título</label>
                                            <input name="titulo" id="titulo" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label>Início</label>
                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" autocomplete="off" class="form-control" id="hora" value="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label>Fim</label>
                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" autocomplete="off" class="form-control" id="fim" value="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>

                                    <div class="col-md-6 col-xs-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="servico">Se quiser, adicione um serviço</label>
                                            <select class="form-control" style="width: 100%" id="servicoSelect" required>
                                                <option value="" selected disabled>Selecione um serviço</option>
                                                <option value="">Outros</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="cliente">Se quiser, adicione um cliente</label>
                                            <select class="form-control" style="width: 100%" id="clientesSelect" required>
                                                <option value="" selected disabled>Selecione um Cliente</option>
                                                <option value="">Sem clientes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pt-2">
                                        <div class="mb-3">
                                            <label for="observacao">Observação</label>
                                            <textarea aria-required="true" rows="3" cols="45" name="observacao" id="observacao" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span class="load">
                                    <svg class="circular" viewBox="25 25 50 50">
                                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                                    </svg>
                                </span>
                                <div class="col-sm-12 col-md-6 text-right">
                                    <button type="button" class="btn btn-primary" id="btnAgendar2">Agendar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modalConfirmaEdit">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="${baseUri}/agenda/editaDataAgenda">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Alteração no agendamento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="text" hidden autocomplete="off" id="novaDataEdit" name="novaDataEdit">
                                        <input type="text" hidden autocomplete="off" id="idEdit" name="idEdit">
                                        <input type="text" hidden autocomplete="off" id="statusEdit" name="statusEdit">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label>Título</label>
                                                <input type="text" class="form-control" name="tituloEdit" id="tituloEdit">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label>Início</label>
                                            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <input type="text" autocomplete="off" class="form-control" id="inicioEdit" name="inicioEdit" value="">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label>Fim</label>
                                            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <input type="text" autocomplete="off" class="form-control" id="fimEdit" name="fimEdit" value="">
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="servico">Serviço</label>
                                                <select class="form-control" style="width: 100%" id="servicoSelectEdit" name="servicoSelectEdit">
                                                    <option value="" selected disabled>Selecione um serviço</option>
                                                    <option value="">Outros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="cliente">Cliente</label>
                                                <select class="form-control" style="width: 100%" id="clientesSelectEdit" name="clientesSelectEdit">
                                                    <option value="" selected disabled>Selecione um Cliente</option>
                                                    <option>Sem clientes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-2">
                                            <div class="mb-3">
                                                <label for="observacaoEdit">Observação</label>
                                                <textarea aria-required="true" rows="3" cols="45" name="observacaoEdit" id="observacaoEdit" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                    <button type="button" class="btn btn-secondary" id="btnCancelEdit" data-dismiss="modal">Cancelar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer import-->
        @(admin.layout.footer)
        <!-- End Footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- All Jquery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/popper/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <!-- Style switcher -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- This is data table -->
    <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- start - This is for export functionality only -->
    <script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-button/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables-button/jszip.min.js"></script>
    <script src="assets/plugins/datatables-button/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables-button/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-button/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-button/buttons.print.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/moment/pt-br.js"></script>
    <script src="assets/plugins/fullcalendar/main.min.js"></script>
    <script src="assets/plugins/fullcalendar/locales-all.js"></script>
    <script src="${baseUri}/view/admin/app-js/validacoes.js"></script>
    <script src="${baseUri}/view/admin/agenda/index.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.menu-agenda').addClass('active');
            $('.menu-cliente').addClass('active');
            $('.clockpicker').clockpicker();
        });
    </script>
</body>

</html>