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
    <title>${config_site_title} - O.S</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Consultar O.S</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ordem de Serviço</a></li>
                        <li class="breadcrumb-item active">Consultar O.S</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light menu-access"
                           data-id="Os:G"
                           href="${baseUri}/os/nova/">
                            <i class="fa fa-plus-circle"></i> Nova  <span
                                    class="hidden-xs-down">O.S</span>
                        </a>
                    </h6>
                </div>
            </div>

            <!-- Start Page Content -->
            <div class="row" id="vm">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-th-list"></i>

                            <span class="float-rights">
                                <select class="selectpickers" id="data-table-cols" data-width="380px"
                                        title="Selecione aqui colunas que deseja exibir na tela"
                                        multiple
                                        data-style="form-control btn-darks">
                                    <option value="0">Identificação</option>
                                    <option value="1">Cliente</option>
                                    <option value="2">Técnico</option>
                                    <option value="3">Solicitação</option>
                                    <option value="4">Data de Vistoria</option>
                                    <option value="5">Data de Finalização</option>
                                    <option value="6">Data de Entrega</option>
                                    <option value="7">Prazo</option>
                                    <option value="8">Conta</option>
                                    <option value="9">Status</option>
                                </select>
                            </span>

                        </div>
                        <div class="card-body">
                            <div id="tbl-splash" class="spinner-border" style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%" role="status"></div>
                            <div id="tbl-div" class="table-responsive m-ts-40">
                                <table id="datatable" class="datatable display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Identificação</th>
                                        <th class="hidden-xs-down">Cliente</th>
                                        <th class="hidden-xs-down">Técnico</th>
                                        <th class="hidden-xs-down">Solicitação</th>
                                        <th class="hidden-xs-down">Vistoria</th>
                                        <th class="hidden-xs-down">Finalização</th>
                                        <th class="hidden-xs-down">Entrega</th>
                                        <th class="hidden-xs-down">Prazo</th>
                                        <th class="hidden-xs-down">Proponente</th>
                                        <th class="hidden-xs-down">Status</th>
                                        <th class="d-print-none text-right">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="cli in os" class="os-editar" :id="cli.os_id">
                                        <td>{{cli.os_identificacao}}</td>
                                        <td class="hidden-xs-down">{{cli.cliente_nome}}</td>
                                        <td class="hidden-xs-down">{{cli.tecnico_nome}}</td>
                                        <td class="hidden-xs-down text-center" v-html="cli.os_dt_solicitacao"></td>
                                        <td class="hidden-xs-down text-center" v-html="cli.os_dt_visita"></td>
                                        <td class="hidden-xs-down text-center" v-html="cli.os_dt_finalizado"></td>
                                        <td class="hidden-xs-down text-center" v-html="cli.os_dt_entrega"></td>
                                        <td class="hidden-xs-down text-center" v-html="cli.os_prazo"></td>
                                        <td class="hidden-xs-down">{{cli.os_proponente}}</td>
                                        <td class="hidden-xs-down">{{cli.status_nome}}</td>
                                        <td class="d-print-none text-right" width="140">
                                            <a class="btn btn-sm btn-primary waves-effect waves-light"
                                               data-toggle="tooltip" title="editar OS"
                                               :href="'${baseUri}/os/editar/id/'+cli.os_id + '/'">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="hidden-xs-down btn btn-sm btn-info waves-effect waves-light"
                                               :href="'${baseUri}/os/anexo/id/'+cli.os_id + '/'"
                                               title="anexar arquivos" data-toggle="tooltip">
                                                <i class="fas fa-folder-open"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger menu-access"
                                                    data-id="Os:G"
                                                    data-toggle="tooltip" title="remover OS"
                                                    v-on:click="remover(cli)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Footer import-->
        @(admin.layout.footer)
        <!-- End Footer -->
    </div>
    <!-- End Page wrapper  -->
    <!-- Modal Remove -->
    @(admin.layout.modal-remove)
</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->

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
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
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
<script src="os/index.js?v=2"></script>
<script type="text/javascript">
    $('.menu-os').addClass('active');
</script>
</body>
</html>