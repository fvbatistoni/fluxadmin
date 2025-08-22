<!DOCTYPE html>
<html lang="en">
<head>
    <base href="${baseUri}/view/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="${config_seo_author}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} - Fornecedor</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet">
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
    <div class="page-wrapper" id="APP" data-url="fornecedor">
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Fornecedores</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Cadastros</a></li>
                        <li class="breadcrumb-item active">Fornecedores</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light menu-access"
                           data-id="Fornecedor:G"
                           href="${baseUri}/fornecedor/novo/">
                            <i class="fa fa-plus-circle"></i> Novo <span
                                    class="hidden-xs-down">Fornecedor</span>
                        </a>
                    </h6>
                </div>
            </div>

            <!-- Start Page Content -->
            <div class="row" id="vm">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                        <div class="card-body">
                            <div id="tbl-splash" class="spinner-border" style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%" role="status"></div>
                            <div id="tbl-div" class="table-responsive m-ts-40">

                                <table id="datatable"
                                       class="datatable display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <span class="hidden-sm-up">Nome</span>
                                            <span class="hidden-xs-down">Fornecedor / Parceiro</span>
                                        </th>
                                        <th class="hidden-xs-down">Telefone</th>
                                        <th class="hidden-xs-down">Email</th>
                                        <th>
                                            <span class="hidden-xs-down">Cidade / UF</span>
                                            <span class="hidden-sm-up">Local</span>
                                        </th>
                                        <th>Status</th>
                                        <th class="d-print-none text-right">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="dt in dados" :id="'fornecedor-' + dt.id">
                                        <td>{{dt.nome}}</td>
                                        <td class="hidden-xs-down">{{dt.telefone}}</td>
                                        <td class="hidden-xs-down">{{dt.email}}</td>
                                        <td>{{dt.cidade}} / {{dt.uf}}</td>
                                        <td>
                                            <a v-on:click="mudar_status(dt)" style="cursor: pointer"
                                               class="switch-access"
                                               data-mod="Fornecedor:G"
                                               data-toggle="tooltip" :title="dt.status_nome">
                                                <span v-if="dt.status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
                                                <span v-else><i class="fa fa-toggle-on fa-2x text-danger"></i></span>
                                            </a>
                                        </td>
                                        <td class="d-print-none text-right" width="120">
                                            <a class="btn btn-sm btn-primary waves-effect waves-light text-white"
                                               data-toggle="tooltip" title="editar"
                                               :href="'${baseUri}/fornecedor/editar/id/'+dt.id">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger menu-access"
                                                    data-id="Fornecedor:G"
                                                    data-toggle="tooltip" title="remover"
                                                    v-on:click="remover(dt)">
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
<!-- start - This is for export functionality only -->
<script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-button/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables-button/jszip.min.js"></script>
<script src="assets/plugins/datatables-button/pdfmake.min.js"></script>
<script src="assets/plugins/datatables-button/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-button/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-button/buttons.print.min.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<!-- CALENDAR JS -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/moment/pt-br.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- END CALENDAR -->
<!-- PRINCIPAL JS -->
<script src="assets/js/vue.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="app-js/table-actions.js"></script>
<script type="text/javascript">
    $('.menu-cadastro').addClass('active');
</script>
</body>
</html>