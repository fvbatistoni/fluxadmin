<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="${baseUri}/view/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="${config_seo_author}">
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} - Geral</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icons/font-awesome/css/fontawesome.css">
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css
" rel="stylesheet">
    <style>
        html {
            font-size: 1rem !important;
        }
        @include media-breakpoint-up(sm) {
            html {
                font-size: 1.2rem !important;
            }
        }

        @include media-breakpoint-up(md) {
            html {
                font-size: 1.4rem !important;
            }
        }

        @include media-breakpoint-up(lg) {
            html {
                font-size: 1.6rem !important;
            }
        }
        span.colorpicker-input-addon i{
            width: 50px!important;
            min-height: 38px!important;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
           
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
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar ${tema_menu_admin}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Configurações</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Aparência</a></li>
                            <li class="breadcrumb-item active">${tema_menu_admin}</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                </div>
                <!-- Start Page Content -->
                <div class="row" id="vm">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-globe"></i></div>
                            <div class="card-body">

                                <form method="post" action="${baseUri}/configuracao/gravar/return/tema/">
                                    <input type="hidden" name="config_id" value="1">
                                    <section>
                                        <div>
                                            <h4 class="separator-line">Selecione abaixo o tema no qual seu site irá
                                                usar</h4>
                                            <h6 class="text-info"><i class="fa fa-info-circle"></i> Alguns recursos do
                                                painel podem estar desabilitados dependendo do tema</h6>
                                            <hr>
                                        </div>
                                        <br>
                                        <!-- Visualização em lista -->
                                        <!-- <div class="col-4">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action " v-for="tema in temas" :id="tema.tema_id" data-toggle="list" :href="'#' + tema.tema_nome" role="tab" :aria-controls="tema.tema_nome">{{tema.tema_nome}}</a>

                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show " :id="tema.tema_id" v-for="tema in temas" role="tabpanel" :aria-labelledby="tema.tema_nome">
                                                {{tema.tema_desc}}
                                            </div>

                                        </div>
                                    </div> -->
                                        <div class="row el-element-overlay ">
                                            <div class="col-md-6 col-lg-4 col-sm-12" v-for="tema in temas">
                                                <div class="card">

                                                    <img style="height: 15vmax!important; object-fit:cover" :src="'${baseUri}/view/tema/' + tema.tema_path + '/admin/cover.png'" class="img-responsive" :alt="tema.tema_nome + ' - ' + tema.tema_desc">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{tema.tema_nome}}</h5>
                                                        <p class="card-text">{{tema.tema_desc}}</p>
                                                        <a v-if="tema.tema_id != ${config_tema_id}" class="btn btn-primary text-center text-white" v-on:click="trocaTema(tema)" href="javascript:;">Usar Tema</a>
                                                        <span v-else>
                                                            <a disabled="disabled" class="btn btn-warning  text-white disabled"><i class="fa fa-check"></i> Tema Atual</a>
                                                            <a v-show="tema.tema_color == 1" class="btn btn-primary text-center text-white float-end" v-on:click="trocaTema(tema)" href="javascript:;">
                                                            <i class="fa fa-cog" aria-hidden="true"></i>    
                                                            Configurações</a>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="modal-altera-tema" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="mySmallModalLabel">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Alterar Tema</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 text-center">

                                        <div class="row" v-show="tema_color == 1">
                                            <div class="col-12">
                                                <h5>Alterar cores do tema <strong id="novo_nome">{{tema_nome}}</strong>.
                                                </h5>
                                                <hr>
                                            </div>
                                            <div class="col-6">
                                                <div class="cp-container text-left" id="cp3-container">
                                                    <label>Cor de Fundo</label>
                                                    <div class="input-group" title="Using input value">

                                                        <input id="cp3" type="text" class="form-control" value="" autocomplete="off" />
                                                        <div class="">
                                                            <span  class="colorpicker-input-addon">
                                                                <i id="cpp3"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="cp-container text-left" id="cp2-container">
                                                    <label>Cor da Fonte</label>
                                                    <div class="input-group" title="Using input value">
                                                        <input id="cp2" type="text" class="form-control" value="" autocomplete="off" />
                                                        <div class="">
                                                            <span class="colorpicker-input-addon">
                                                                <i id="cpp2"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-show="tema_color != 1">
                                            <div class="col-12">
                                                Tem certeza que deseja alterar o tema do site?
                                                <h6 class="text-danger"><i class="fa fa-info-circle"></i> Alguns recursos do
                                                    painel podem estar desabilitados dependendo do tema</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar
                                    </button>
                                    <button v-on:click="confirmaNovoTema()" id="btn-altera-tema-confirmar" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check-circle"></i> Atualizar
                                    </button>
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
    </div>
    <!-- All Jquery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/js/vue.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="${baseUri}/view/admin/config/tema.js"></script>
    <script type="text/javascript">
    $('.menu-aparencia').addClass('active');
    $('.menu-temas').addClass('active');
</script>
</body>

</html>