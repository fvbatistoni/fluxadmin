<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="${baseUri}/view/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="${config_site_description}">
    <meta name="author" content="${config_site_author}">
    <meta name="keywords" content="${config_site_keywords}">
    <meta name="author" content="${config_seo_author}">
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} | Depoimento</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/plugins/datatables.net/rowReorder.dataTables.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
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
        @(admin.layout.topo)
        @(admin.layout.topo-menu)
        <div class="page-wrapper" id="vm" data-url="depoimento">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar  ${depoimento_menu_admin}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Post's</a></li>
                            <li class="breadcrumb-item active">Gerenciar  ${depoimento_menu_admin}</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a id="novo-slide" data-id="Depoimento:G" class="btn btn-primary waves-effect waves-light text-white menu-access" href="${baseUri}/depoimento-novo/">
                                <i class="fa fa-plus-circle"></i> Novo
                                <span class="d-none d-xl-inline-block"> ${depoimento_singular}</span>
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="row" id="vm">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                            <div class="card-body">
                                <div id="tbl-splash" class="spinner-border" style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%" role="status"></div>
                                <div id="tbl-div" class="table-responsive m-ts-40">
                                    <table id="datatable" class="datatable display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <td title="Arraste o slide para ordenar" data-toggle="tooltip"><small>
                                                        <i class="fa fa-info-circle" style="font-size:15px!important;"></i></small>
                                                    Posição 
                                                </td>
                                                <!--<th class="">Avatar <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>-->
                                                <th class="">Nome <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>
                                                <th class="">Profissão <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>
                                                <th class="">Depoimento <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>
                                                <th class="hidden-xs-down">Status</th>

                                                <th class="d-print-none text-right">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="post in depoimentos" :class="'depoimento-editar-' + post.depoimento_id" :id="'depoimento-id-' + post.depoimento_id">
                                            <td class="text-center" width="110" style="cursor: crosshair "><i class="fa fa-list pt-2"></i></td>

                                            <!--<td class="text-center" width="120px"> 
                                              <img :src="'${baseUri}/media/depoimento/'+post.depoimento_avatar" 
                                                    class="rounded-circle img-responsive img-fluid" width="70px"/>
                                            </td>-->
                                            <td class="">{{post.depoimento_nome}}</td>
                                                <td class="">{{post.depoimento_profissao}}</td>
                                                <td class="" style="max-width: 35ch;overflow: hidden;text-overflow: ellipsis; white-space: nowrap;">
                                                    {{post.depoimento_texto}}</td>
                                                <td width="50" class="text-center">
                                                    <a v-on:click="mudar_status(post)" style="cursor: pointer" data-id="Depoimento:G" data-toggle="tooltip" :title="post.depoimento_status_nome">
                                                        <span v-if="post.depoimento_status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
                                                        <span v-else><i class="fa fa-toggle-off fa-2x text-primary"></i></span>
                                                    </a>
                                                </td>
                                                <td class="d-print-none text-right" width="140">
                                                    <a class="btn btn-sm text-white btn-primary waves-effect waves-light  menu-acces" title="editar Depoimento" data-toggle="tooltip" data-id="Depoimento:G" :href="'${baseUri}/depoimento-editar/id/' + post.depoimento_id">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger menu-access" data-id="Depoimento:G" data-toggle="tooltip" title="remover" v-on:click="remover(post)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row " id="mob-tbl">
                                    <div class="row" v-if="depoimentos == null">
                                        <div class="col-12 text-center">
                                            <label>Nenhum registro encontrado</label>
                                        </div>
                                    </div>
                                    <div v-for="post in depoimentos" :id="'depoimento-id-' + post.depoimento_id" v-else>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-10 align-self-center">
                                                    <h3>{{post.depoimento_nome}}</h3>
                                                    <label>{{post.depoimento_profissao}} </label>
                                                    <br>
                                                    <label style="max-width: 35ch;overflow: hidden;text-overflow: ellipsis; white-space: nowrap;">
                                                        {{post.depoimento_texto}} </label>
                                                </div>
                                                <div class="col-2 align-self-start pt-0 mt-0 text-right">
                                                    <div class="row align-items-start">
                                                        <div class="col-12 align-self-start pb-4">
                                                            <div class="dropdown">
                                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" :href="'${baseUri}/depoimento-editar/id/' + post.depoimento_id" data-id="Depoimento:G">
                                                                        <i class="fas fa-edit"></i>
                                                                        Editar</a>
                                                                    <a class="dropdown-item" v-on:click="remover(post)" data-id="Depoimento:G">
                                                                        <i class="fas fa-trash"></i>
                                                                        Excluir</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 align-self-end">
                                                            <a v-on:click="mudar_status(post)" style="cursor: pointer" data-id="Depoimento:G" data-toggle="tooltip" :title="post.depoimento_status_nome">
                                                                <span v-if="post.depoimento_status == 1"><i class="fa fa-2x fa-toggle-on text-primary"></i></span>
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
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- start - This is for export functionality only -->
    <script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-button/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
    <script src="assets/plugins/datatables-button/jszip.min.js"></script>
    <script src="assets/plugins/datatables-button/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables-button/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-button/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-button/buttons.print.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="assets/js/jquery.slimscroll.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="depoimento/index.js"></script>
    <script src="app-js/table-actions.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
            $('.menu-depoimento').addClass('active');
            $('.menu-cliente').addClass('active');
            setTimeout(() => {
            $('.wysihtml5-sandbox').addClass('editor_texto');
        }, 500);
        });
        
       
    </script>
</body>

</html>