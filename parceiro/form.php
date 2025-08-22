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
    <title>${config_site_title} - Parceiro</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
</head>
<style>
    form .dropify-wrapper .dropify-preview .dropify-render img {

        object-fit: cover;
        /*imagem preenche o input*/
    }

    form .dropify-wrapper {


        display: block;
        position: relative;
        cursor: pointer;
        border-radius: 10px;
        object-fit: cover;
        width: 200px;
        height: 200px;
        overflow: hidden;
        max-width: 100%;
        font-size: 14px;
        line-height: 22px;
        color: #777;
        background-color: #FFF;
        border: 2px solid #E5E5E5;
        -webkit-transition: border-color .15s linear;
        transition: border-color .15s linear
    }
</style>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Parceria</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Parceria</a></li>
                            <li class="breadcrumb-item active">Gerenciar Parceria</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/parceiros-lista/" data-id="Parceiro:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> Parceria
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
                                <div class="content">
                                    <form autocomplete="off" id="parceiro" method="post" action="${baseUri}/parceiros/gravar/" enctype="multipart/form-data">
                                        <input type="hidden" name="parceiro_id" id="parceiro_id" value="${parceiro_id}">
                                        <input type="text" hidden name="parceiro_logo" id="parceiro_logo" value="${parceiro_logo}">
                                        <section id="parceiro">
                                            <div class="row ">
                                                <div class="col-md-2 col-lg-2 col-sm-12">
                                                    <div class="row ">
                                                        <div class="col-12 pt-3">
                                                            <input type="file" id="input-file-now-custom-1" name="parceiro_logo" required data-default-file="${baseUri}/media/parceria/${parceiro_logo}" data-allowed-file-extensions="jpg jpeg png" class="dropify" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-12 align-self-end pt-2">

                                                    <div class="row">
                                                        <div class="col-md-12 col-xs-12 col-sm-12 align-self-center">
                                                            <div class="mb-3">
                                                                <label for="autor_parceiro">Nome
                                                                    <span id="idf-info" class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" name="parceiro_nome" id="parceiro_nome" class="form-control" value="${parceiro_nome}" required placeholder="Informe o nome do parceiro" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 col-xs-12 col-sm-12 align-self-center">
                                                            <div class="mb-3">
                                                                <label for="autor_parceiro">Link</label>
                                                                <input type="text" name="parceiro_link" id="parceiro_link" class="form-control" value="${parceiro_link}" placeholder="Informe um link para o seu parceiro" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-none">
                                                        <div class="col-md-3 col-xs-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="parceiro_status">Parceiro ativo?</label>
                                                                <select class="form-control" name="parceiro_status" id="parceiro_status">
                                                                    <option value="1" selected>Sim</option>
                                                                    <option value="0">Não</option>
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 text-center menu-access" data-id="Parceiro:G">
                                                            <div class="mb-3">
                                                                <button id="btn-send" class="btn btn-primary btn-block"><i class="fas fa-check-circle"></i> Gravar Dados
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </section>
                                    </form>
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
    </div>
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
    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <!-- start - This is for export functionality only -->
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- PRINCIPAL JS -->
    <!-- CALENDAR JS -->
    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/moment/pt-br.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="app-js/datepicker.js"></script>
    <!-- CALENDAR -->
    <!--TEXTO-->
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <!--TEXTO-->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>

    <script type="text/javascript">
        //$('.menu-home').addClass('active');
        $('.menu-perceiros').addClass('active');
        $('#input-file-now-custom-1').dropify({
            messages: {
                default: '<div>Selecione a logo do seu parceiro (260 x 225)</div>',
                replace: '<div>Selecione a logo do seu parceiro (260 x 225)</div>',
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
            }
        });
    </script>
</body>
</html>