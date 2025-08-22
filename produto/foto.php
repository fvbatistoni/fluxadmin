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
    <title>${config_site_title} - Fotos</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/datatables.net/rowReorder.dataTables.min.css">
    <!-- You can change the theme colors from here -->
    <!-- IMG UPLOAD -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/dropzone-master/dist/dropzone.css">
    <link rel="stylesheet" href="assets/plugins/lightbox/css/lightbox.css">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
    <style>
        .border3px {
            border: 3px solid;
            border-color: #dc3545 !important;
        }

        .dropify-wrapper,
        .dropify-wrapper .dropify-clear {
            font-family: 'Poppins';
        }

        .dropify-wrapper .dropify-preview .dropify-render img {
            width: 100%;
            min-height: 900px;
        }
    </style>
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
        <div class="page-wrapper" id="vm">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">${produto_menu_admin}: Fotos</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CRM</a></li>
                            <li class="breadcrumb-item"><a href="${baseUri}/produtos-lista">${produto_menu_admin}</a></li> 
                            <li class="breadcrumb-item active">Gerenciar Fotos</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/produtos-lista/" data-id="Parceiro:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> Voltar
                            </a>
                        </h6>
                    </div>
                </div>

                <!-- Start Page Content -->

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary ">
                            <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">${categoria_produto_nome}</li>
                                <li class="breadcrumb-item">${subcategoria_produto_nome}</li> 
                                <li class="breadcrumb-item active">${produto_titulo}</li>
                            </ol>
                            <div class="card-body ">

                                <!--<form action="${baseUri}/galeria/gravar/" method="post" enctype="multipart/form-data">


                                    <input type="hidden" name="galeria_id" id="galeria_id" value="${galeria_id}">
                                    <input type="text" hidden name="galeria_img_capa" id="galeria_img_capa" value="${galeria_img_capa}">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12 col-sm-6">
                                            <div class="mb-3">
                                                <label for="galeria_nome">Título da Galeria</label>
                                                <input type="text" class="form-control" id="galeria_nome" name="galeria_nome" value="${galeria_nome}" maxlength="150" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-6">
                                            <div class="mb-3">
                                                <label for="galeria_desc">Descrição da Galeria</label>
                                                <input type="text" class="form-control" id="galeria_desc" name="galeria_desc" value="${galeria_desc}" maxlength="150" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-12 col-sm-4">
                                            <div class="mb-3">
                                                <label for="galeria_categoria">Categoria<span class="text-danger">*</span></label>
                                                <select name="galeria_categoria" id="galeria_categoria" class="form-control" required>
                                                    <option value="" disabled selected>Selecione uma categoria</option>
                                                    <option v-for="cat in categorias" selected :value="cat.categoria_galeria_id">{{cat.categoria_galeria_nome}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-xs-12 col-sm-12  mb-3 align-self-end">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-block"><i class="fa fa-check-circle"></i> Salvar</button>
                                        </div>
                                    </div>
                                </form>--> 
                                <hr>
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-3 col-sm-12">

                                        <h2>Suas Fotos</h2>
                                       
                                    </div>
                                 
                                    <div class="col-lg-9 col-md-9 col-sm-12 text-lg-right">
                                        <h6 class="float-end">
                                            <button id="nova-galeria" data-id="Galeria:G" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                                <i class="fa fa-plus-circle"></i> <span class="d-none d-xl-inline-block">Adicionar Fotos</span>
                                            </button>

                                            <button id="btn-remove-img" data-id="Galeria:G" v-show="selected == true" v-on:click="remove_img()" class="btn btn-warning waves-effect waves-light text-white menu-access">
                                                <i class="fa fa-trash"></i> Remover imagens selecionadas
                                            </button>

                                            <button id="remove-all" data-id="Galeria:G" data-target="#modal-remove-all" v-show="remove_a" data-toggle="modal" class="btn btn-danger waves-effect waves-light text-white menu-access">
                                                <i class="fa fa-trash"></i> Remover todas <span class="d-none d-xl-inline-block">as imagens</span>
                                            </button>

                                        </h6>
                                    </div>
                                </div>
                              
                                <!-- lista de imagens -->
                                <div id="tbl-splash" class="spinner-border" role="status"></div>
                                <label><i class="fa fa-info-circle"></i> Arraste para ordenar e dois cliques para selecionar uma imagem
                                <hr>
                                 </label>
                               
                                <div id="">

                                    <div class="row el-element-overlay" id="sort" v-show="galerias != null">
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-12" v-for="gale in galerias" v-on:dblclick="add_class_remove(gale)" :id="'foto-galeria-'+gale.foto_id" :data-id="gale.foto_id" :data-position="gale.foto_pos">
                                            <div class="cardX">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1" style="height: 100%!important;width:100%px!important;">
                                                        <img :src="'${baseUri}/media/galeria/'+ gale.foto_url" alt="user" :id="'img-galeria-id-'+gale.foto_id" :data-url="gale.foto_url" :data-remove="gale.foto_id" style="object-fit: cover;  height: 350px;width: 350px" />
                                                        <div class="el-overlay">
                                                            <ul class="el-info">
                                                                <li>
                                                                    <a class="btn default btn-outline image-popup-vertical-fit" data-lightbox="img" :href="'${baseUri}/media/galeria/'+ gale.foto_url">
                                                                        <i class="icon-magnifier"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" v-else>
                                        <div class="col-12 text-center">
                                            <i style="font-size:70px" class="fa fa-camera-retro"></i>
                                            <br> <br>
                                            <h5> Você não cadastrou nenhuma imagem</h5>
                                        </div>
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
    <div id="modal-galeria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="${baseUri}/galeria/enviar_img/id/${produto_id}/" enctype="multipart/form-data" class="form text-center dropzone" method="post" id="form-galeria-img">
                        <div class="fallback">
                            <input name="file" id="file-mass" type="file" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- End Page wrapper  -->
    <!-- Modal Remove all-->
    <div id="modal-remove-all" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Remover todos os registros</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 text-center">
                        <i class="text-warning fa fa-4x fa-exclamation-triangle"></i>
                        <br></br>
                        <h2 class="text-center">Atenção!</h2>
                        <p style="color: black">Você está prestes à remover todos registros dessa galeria e esta ação não pode ser desfeita.
                            Deseja realmente prosseguir ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                    <button id="btn-remove-all" type="button" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i> Remover</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Remove -->
    @(admin.layout.modal-remove)

    </div>
    <script>
        var produto_id = '${produto_id}';
    </script>
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
    <script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- start - This is for export functionality only -->
    <script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- FILE UPLOAD -->
    <script src="assets/plugins/dropzone-master/dist/dropzone.js"></script>
    <script src="assets/plugins/lightbox/js/lightbox.js"></script>
    <script src="assets/plugins/sortable/Sortable.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="produto/foto.js"></script>
    <script type="text/javascript">
        $('.menu-galeria').addClass('active');
        $('.menu-conteudo').addClass('active');
        $('.menu-fotos').addClass('active');

        function rem_capa() {
            $("#galeria_img_capa").val("");
        }
        $(document).ready(function() { 
            $('.dropify').dropify({
                messages: {
                    default: 'Clique aqui para selecionar um arquivo',
                    replace: 'Clique para selecionar um novo arquivo',
                    remove: 'Remover',
                    error: 'Ocorreu um erro ao alterar o arquivo'
                },
                error: {
                    'fileSize': 'O tamanho máximo permitido é de: ({{ value }}).',
                    'minWidth': 'The image width is too small ({{ value }}}px min).',
                    'maxWidth': 'The image width is too big ({{ value }}}px max).',
                    'minHeight': 'The image height is too small ({{ value }}}px min).',
                    'maxHeight': 'The image height is too big ({{ value }}px max).',
                    'imageFormat': 'Os formatos de imagem permitidos são: ({{ value }}).',
                    'fileExtension': 'As extensões permitidas são: ({{ value }}).'
                },

                tpl: {
                    clearButton: '<button type="button" class="dropify-clear" onclick="rem_capa()" >{{ remove }}</button>'
                }
            });
        });
    </script>
</body>

</html>