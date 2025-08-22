<!DOCTYPE html>
<html lang="pt-br">

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
    <title>Amamentação e uso de medicamentos | ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css
" rel="stylesheet">
    <link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/datatables.net/rowReorder.dataTables.min.css">
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
        <div class="page-wrapper" id="APP" data-url="servico">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Amamentação e uso de medicamentos</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CRM</a></li>
                            <li class="breadcrumb-item active">Gerenciar Amamentação e uso de medicamentos</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end menu-access" style="padding-top: 20px" data-id="Servico:G">
                            <a href="${baseUri}/amamentacao-novo/" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-plus-circle"></i> Novo <span class="d-none d-xl-inline-block">${servico_singular}</span>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            <!-- Start Page Content -->
            <div class="servico-vue" id="APP">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                        <div class="card-body">
                            <div id="tbl-splash" class="spinner-border" style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%" role="status"></div>
                            <div id="tbl-div" class="table-responsive m-ts-40">
                                <table id="datatable" class="datatable display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                Título
                                                <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i>
                                            </th>
                                            <th class="hidden-xs-down">Categoria <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>
                                            <th class="hidden-xs-down">Subcategoria <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>
                                            <th class="hidden-xs-down">Subcategoria Secundária <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>
                                            <th class="hidden-xs-down">Status</th>
                                            <th class="d-print-none text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="dt in dados" :class=" 'servico-editar-' + dt.id" :id="'servico-id-' + dt.id">
                                            <td>{{dt.nome}}</td>
                                            <td>{{dt.categoria_servico_nome}}</td>
                                            <td>{{dt.subcategoria_servico_nome}}</td>
                                            <td>{{dt.subcategoria_filha_servico_nome}}</td>
                                            <td width="80">
                                                <a v-on:click="mudar_status(dt)" style="cursor: pointer" data-toggle="tooltip" :title="dt.status_nome">
                                                    <span v-if="dt.status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
                                                    <span v-else><i class="fa fa-toggle-off fa-2x text-primary"></i></span>
                                                </a>
                                            </td>
                                            <td class="d-print-none text-right" width="120">
                                                <a class="btn btn-sm btn-primary waves-effect waves-light text-white" data-toggle="tooltip" title="editar" :href="'${baseUri}/amamentacao-editar/'+dt.id+'/'">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger menu-access" data-id="Servico:G" data-toggle="tooltip" title="remover" v-on:click="remover(dt)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row " id="mob-tbl">
                                <div class="row" v-if="dados == null">
                                    <div class="col-12 text-center">
                                        <label>Nenhum registro encontrado</label>
                                    </div>
                                </div>
                                <div v-for="dt in dados" :id="'servico-' + dt.id" v-else>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-10 align-self-center">
                                                <h3>{{dt.nome}}</h3>
                                                <h6>{{dt.categoria_servico_nome}}</h6>
                                                <h6>&nbsp; {{dt.subcategoria_servico_nome}}</h6>
                                                <h6 v-if="dt.subcategoria_filha_servico_nome">&nbsp;&nbsp;&nbsp;{{dt.subcategoria_filha_servico_nome}}</h6>
                                            </div>
                                            <div class="col-2 align-self-start pt-0 mt-0 text-right">
                                                <div class="row align-items-start">
                                                    <div class="col-12 align-self-start pb-4">
                                                        <div class="dropdown">
                                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" data-id="Servico:G" :href="'${baseUri}/amamentacao-editar/'+dt.id+'/'">
                                                                    <i class="fas fa-edit"></i>
                                                                    Editar</a>
                                                                <a class="dropdown-item" v-on:click="remover(dt)" data-id="Servico:G">
                                                                    <i class="fas fa-trash"></i>
                                                                    Excluir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 align-self-end">
                                                        <a v-on:click="mudar_status(dt)" style="cursor: pointer" data-toggle="tooltip" :title="dt.status_nome">
                                                            <span v-if="dt.status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
                                                            <span v-else><i class="fa fa-toggle-off fa-2x text-primary"></i></span>
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!-- This is data table -->
    <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
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
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="servico/index.js"></script>
    <script type="text/javascript">
        var tipo_sessao = 1;
        $('.menu-servico').addClass('active');
        $('.menu-servico-gerenciar').addClass('active');
    </script>
</body>

</html>