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
    <title>${config_site_title} - ${produto_menu_admin} - Categorias</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables.net/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Subcategorias</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CRM</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">${produto_menu_admin}</a></li> 
                            <li class="breadcrumb-item active">Gerenciar Subcategorias</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <button id="nova-categoria" data-id="ProdutosAdmin:G" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-plus-circle"></i> Nova
                                <span class="d-none d-xl-inline-block">subcategoria</span>
                            </button>
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
                                    <table id="datatable" class="datatable display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>                                                       
                                                <th>
                                                    Categoria <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i>
                                                </th>           

                                                <th>
                                                    Subcategoria <i class="fa fa-sort" aria-hidden="true" style="cursor: pointer"></i></th>                                     
                                                <th class="d-print-none text-right">Ações</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <tr v-for="cat in categoria" :class="'categoria-editar-' + cat.categoria_produto_id" :id="'categoria-id-' + cat.categoria_produto_id">
                                                <td class="pt-4">{{cat.categoria_produto_nome}}</td>
                                                <td class="pt-4">{{cat.subcategoria_produto_nome}}</td>
                                                <td class="d-print-none text-right pt-4" width="140">
                                                    <a class="btn btn-sm text-white btn-primary waves-effect waves-light  menu-acces" title="editar categoria" data-toggle="tooltip" data-id="ProdutosAdmin:G" v-on:click="editar(cat)">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger menu-access" data-id="categoria:G" data-toggle="tooltip" title="remover categoria" v-on:click="remover(cat)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row " id="mob-tbl">
                                    <div class="row" v-if="categoria == null">
                                        <div class="col-12 text-center">
                                            <label>Nenhum registro encontrado</label>
                                        </div>
                                    </div>
                                    <div v-for="cat in categoria" :class="'categoria-editar-' + cat.categoria_produto_id" :id="'categoria-id-' + cat.categoria_produto_id" v-else>
                                        <div class="col-12">
                                            <div class="row  align-items-center">
                                                <div class="col-10 align-self-end pt-2">
                                                    <h4>{{cat.subcategoria_produto_nome}}</h4>
                                                </div>
                                                <div class="col-2 align-self-start text-right">
                                                    <div class="row align-items-start">
                                                        <div class="col-12 align-self-start">
                                                            <div class="dropdown">
                                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" v-on:click="editar(cat)" data-id="categoria:G">
                                                                        <i class="fas fa-edit"></i>
                                                                        Editar</a>
                                                                    <a class="dropdown-item" v-on:click="remover(cat)" data-id="categoria:G">
                                                                        <i class="fas fa-trash"></i>
                                                                        Excluir</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="${baseUri}/ProdutosAdmin/gravar_subcategoria/" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel"><span class="categoria-acao">Inlcuir</span> categoria</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="subcategoria_produto_id" id="subcategoria_produto_id">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="subcategoria_produto_nome">Nome da subcategoria <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subcategoria_produto_nome" name="subcategoria_produto_nome" maxlength="200" required> 
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="subcategoria_produto_categoria">Categoria Principal<span id="idf-info" class="text-danger">*</span></label>
                                    <select name="subcategoria_produto_categoria" id="subcategoria_produto_categoria" class="form-control" required>
                                        <option value="" selected>
                                            Selecione uma categoria
                                        </option>
                                        <option v-for="cat in categoria_primaria" :value="cat.categoria_produto_id">
                                            {{cat.categoria_produto_nome}}
                                        </option>
                                    </select>
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
    <script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="produto/subcategoria.js"></script>
    <script type="text/javascript">
        $('.menu-produtos').addClass('active');
        $('.menu-produtos-subcategorias').addClass('active');
        
    </script>
</body>

</html>