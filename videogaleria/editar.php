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
    <title>${config_site_title} - Galerias</title>
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
    <link rel="stylesheet" href="assets/plugins/lightbox/css/lightbox.css">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
    <style>
        .border3px {
            border: 3px solid;
            border-color: #dc3545 !important;
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
                        <h3 class="text-themecolor m-b-0 m-t-0">${galeria_menu_admin}: ${videogaleria_nome}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="${baseUri}/videogaleria/">Gerenciar ${galeria_menu_admin}</a></li>
                            <li class="breadcrumb-item active">${galeria_menu_admin}: ${videogaleria_nome}</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/videogaleria/" data-id="Parceiro:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> Voltar
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
                                <div id="tbl-splash" class="spinner-border" style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%" role="status"></div>
                                <div id="">
                                    <form action="${baseUri}/videogaleria/gravar/" method="post" enctype="multipart/form-data">


                                        <input type="hidden" name="videogaleria_id" id="videogaleria_id" value="${videogaleria_id}">

                                        <div class="row">
                                            <div class="col-md-10 col-lg-10 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="videogaleria_nome">Título do Album</label>
                                                    <input type="text" class="form-control" id="videogaleria_nome" value="${videogaleria_nome}" name="videogaleria_nome" maxlength="150" required>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-lg-2 col-sm-12 align-self-center">
                                                <button type="submit" class="btn btn-primary waves-effect btn-block waves-light"><i class="fa fa-check-circle"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="${baseUri}/videogaleria/enviar_img/" method="post" id="form-videogaleria-img">
                                    <div class="row">
                                      
                                            <div class="col-10">
                                                <div class="mb-3">
                                                    <label for="media_videogaleria_link">Adicionar Vídeo <span class="fa fa-info-circle text-info" title="Insira a URL do vídeo (YouTube ou Vimeo)"></span></label>
                                                    <input type="text" class="form-control" name="media_videogaleria_link" id="media_videogaleria_link" required>
                                                    <input type="hidden" name="media_videogaleria_videogaleria" value="${videogaleria_id}">
                                                </div>
                                            </div>
                                            <div class="col-2 align-self-center">
                                                <button class="btn btn-primary btn-block"><i class="fa fa-video"></i> Gravar vídeo</button>
                                            </div>
                                       <div class="col-12">
                                           <hr>
                                       </div>
                                    </div>
                                    </form>
                                    <div class="row align-items-center">
                                        <div class="col-sm-12 col-lg-3 col-md-3 pb-4">
                                            <h2>Seus Vídeos</h2>
                                        </div>
                               
                            </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12 text-lg-right">
                                            <h6 class="float-end">


                                                <button id="btn-remove-img" data-id="Videogaleria:G" v-show="selected" v-on:click="remove_img()" class="btn btn-warning waves-effect waves-light text-white menu-access">
                                                    <i class="fa fa-trash"></i> Remover vídeo selecionadas
                                                </button>

                                                <button id="remove-all" data-id="Videogaleria:G" data-target="#modal-remove-all" v-show="remove_a" data-toggle="modal" class="btn btn-danger waves-effect waves-light text-white menu-access">
                                                    <i class="fa fa-trash"></i> Remover todos <span class="d-none d-xl-inline-block">os vídeos</span>
                                                </button>
                                            </h6>
                                        </div>
                                    </div>
                                    <label><i class="fa fa-info-circle"></i> Arraste para ordenar e dois cliques para selecionar uma imagem
                                <hr>
                            </label>
                                    <div class="row el-element-overlay" id="sort" v-if="videogalerias != null">
                                        <div class="col-lg-3 col-md-3" v-for="gale in videogalerias" v-if="videogalerias != null" :id="'foto-videogaleria-'+gale.media_videogaleria_id" :data-id="gale.media_videogaleria_id" :data-position="gale.media_videogaleria_pos" v-on:dblclick="add_class_remove(gale)">
                                            <div class="cardX">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1" style="height: 100%!important;width:100%px!important;">
                                                        <img :src="'${baseUri}/media/thumbnails/videos/'+gale.media_videogaleria_img" alt="user" :id="'img-videogaleria-id-'+gale.media_videogaleria_id" :data-url="gale.media_videogaleria_url" :data-remove="gale.media_videogaleria_id" />
                                                        <div class="el-overlay">
                                                            <ul class="el-info">
                                                                <li>
                                                                    <a v-if="gale.media_videogaleria_desc === 'vimeo'" class="btn default btn-outline image-popup-vertical-fit video-btn" :data-src="'https://player.vimeo.com/video/'+gale.media_videogaleria_url+'?badge=0'">
                                                                        <i class="icon-magnifier"></i>
                                                                    </a>

                                                                    <a v-else class="btn default btn-outline image-popup-vertical-fit video-btn" :data-src="'https://www.youtube.com/embed/'+gale.media_videogaleria_url">
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
                                    <div class="row pt-4" v-else>
                                        <div class="col-12 text-center">
                                            <i class="fa fa-camera-retro fa-4x"></i>
                                            <br> <br>
                                            <h5> Você não cadastrou nenhum vídeo</h5>
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
        <!-- Modal video -->
        <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal video -->
        @(admin.layout.modal-remove)

    </div>
    <script>
        var id_videogaleria = '${videogaleria_id}';
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
    <script src="assets/plugins/lightbox/js/lightbox.js"></script>
    <script src="assets/plugins/sortable/Sortable.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="videogaleria/editar.js"></script>
    <script type="text/javascript">
    $('.menu-galeria').addClass('active');
    $('.menu-conteudo').addClass('active');
    $('.menu-videos').addClass('active');
    </script>
</body>

</html>