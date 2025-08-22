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
    <title>${config_site_title} - Usuários</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Usuários</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configurações</a></li>
                        <li class="breadcrumb-item active">Usuários</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/usuario/novo/">
                            <i class="fa fa-plus-circle"></i> Novo <span
                                    class="hidden-xs-down">Usuário</span>
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
                                <table id="datatable" class="datatable display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class="hidden-xs-down">Email</th>
                                        <!--<th class="hidden-xs-down">Nível de Acesso</th> -->
                                        <th class="hidden-xs-down">Status</th>
                                        <th class="d-print-none" width="100">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="usu in usuario">
                                        <td>{{usu.usuario_nome}}</td>
                                        <td class="hidden-xs-down">{{usu.usuario_email}}</td>
                                        <!-- <td class="hidden-xs-down">{{usu.usuario_level}}</td> -->
                                        <td>
                                            <a v-on:click="mudar_status(usu)" style="cursor: pointer"
                                               data-toggle="tooltip" :title="usu.status_nome">
                                                <span v-if="usu.usuario_status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
                                                <span v-else><i class="fa fa-toggle-off fa-2x"></i></span>
                                            </a>
                                        </td>
                                        <td class="d-print-none text-center"  width="100">
                                            <a class="btn btn-sm btn-primary waves-effect waves-light"
                                               data-toggle="tooltip" title="editar"
                                               :href="'${baseUri}/usuario/editar/id/'+usu.usuario_id + '/'">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger"
                                                    data-toggle="tooltip" title="remover"
                                                    v-on:click="remover(usu)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row " id="mob-tbl">
                                    <div class="row" v-if="usuario == null">
                                        <div class="col-12 text-center">
                                            <label>Nenhum registro encontrado</label>
                                        </div>
                                    </div>
                                    <div v-for="usu in usuario" v-else>
                                        <div class="col-12">
                                            <div class="row">
                                              
                                                <div class="col-10 align-self-center">
                                                    <h5 style="max-width: 35ch;overflow: hidden;text-overflow: ellipsis; white-space: nowrap;">{{usu.usuario_nome}}</h5>
                                                    <label>{{usu.usuario_email}}</label>
                                                </div>
                                                <div class="col-2 align-self-start pt-0 mt-0 text-right">
                                                    <div class="row align-items-start">
                                                        <div class="col-12 align-self-start pb-1">
                                                            <div class="dropdown">
                                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" :href="'${baseUri}/usuario/editar/id/'+usu.usuario_id + '/'">
                                                                        <i class="fas fa-edit"></i>
                                                                        Editar</a>

                                                                    <a class="dropdown-item"   v-on:click="remover(usu)">
                                                                        <i class="fas fa-trash"></i>
                                                                        Excluir</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 align-self-end">
                                                        <a v-on:click="mudar_status(usu)" style="cursor: pointer"
                                               data-toggle="tooltip" :title="usu.status_nome">
                                                <span v-if="usu.usuario_status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
                                                <span v-else><i class="fa fa-toggle-off fa-2x "></i></span>
                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Remove -->
            @(admin.layout.modal-remove)
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
<!-- <script src="assets/js/jquery.slimscroll.js"></script> -->
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
<script src="assets/js/jquery.slimscroll.js"></script>
<!-- PRINCIPAL JS -->
<script src="assets/js/vue.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="usuario/index.js"></script>
<script type="text/javascript">
    $('.menu-usuario').addClass('active');
</script>
</body>
</html>