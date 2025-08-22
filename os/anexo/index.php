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
    <title>${config_site_title} - Anexos - O.S</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Anexos O.S</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="${baseUri}/os/">Ordem de Serviço</a></li>
                        <li class="breadcrumb-item active">Anexos da O.S</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <button id="novo-anexo" data-id="Os:G" class="btn btn-primary waves-effect waves-light text-white menu-access">
                            <i class="fa fa-plus-circle"></i> Novo  <span
                                    class="hidden-xs-down">Anexo</span>
                        </button>

                        <a href="${baseUri}/os/editar/id/${os}/" class="btn btn-info waves-effect waves-light text-white">
                            <i class="fa fa-edit"></i> Ir Para OS
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
                                        <th>Indentificação</th>
                                        <th class="hidden-xs-down">Extensão</th>
                                        <th class="hidden-xs-down">Data Criação</th>
                                        <th class="hidden-xs-down">Data Alteração</th>
                                        <th class="d-print-none" width="12%">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="cli in anexos">
                                        <td>{{cli.nome}}</td>
                                        <td class="hidden-xs-down">.{{cli.extensao}}</td>
                                        <td class="hidden-xs-down">{{cli.created}}</td>
                                        <td class="hidden-xs-down">{{cli.updated}}</td>
                                        <td class="d-print-none text-center" width="12%">
                                            <a class="btn btn-sm text-white btn-info waves-effect waves-light"
                                               title="visualizar anexo" data-toggle="tooltip"
                                               :href="'${baseUri}/media/os_anexo/' + cli.url" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm text-white btn-primary waves-effect waves-light  menu-acces"
                                               title="editar anexo" data-toggle="tooltip"
                                               data-id="Os:G"
                                               v-on:click="editar(cli)">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger menu-access"
                                                    data-id="Os:G"
                                                    title="remover anexo" data-toggle="tooltip"
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

    <div id="modal-anexo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="${baseUri}/os/grava_anexo/" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="mySmallModalLabel"><span class="anexo-acao">Inlcuir</span> Anexo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="os" value="${os}" id="os_id">
                        <input type="hidden" name="os_anexo_id" id="os_anexo_id">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="mb-3">
                                <label for="os_anexo_nome">Título do anexo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="os_anexo_nome" name="os_anexo_nome" maxlength="100">
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <label for="input-file-now-custom-1">Selecione um arquivo</label>
                                    <input type="file" id="input-file-now-custom-1"
                                           name="os_anexo_url"
                                           data-allowed-file-extensions="jpg jpeg png gif pdf doc docx xls xlx txt ppt pptx zip rar"
                                           class="dropify"
                                    />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check-circle"></i> Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>var os_id = '${os}';</script>
<!-- All Jquery -->
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
<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>

<!-- start - This is for export functionality only -->
<script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-button/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables-button/jszip.min.js"></script>
<script src="assets/plugins/datatables-button/pdfmake.min.js"></script>
<script src="assets/plugins/datatables-button/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-button/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-button/buttons.print.min.js"></script>

<!-- PRINCIPAL JS -->
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="${baseUri}/view/admin/os/anexo/index.js"></script>
<script type="text/javascript">
    $('.menu-os').addClass('active');
</script>
</body>
</html>