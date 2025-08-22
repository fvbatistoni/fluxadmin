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
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} - Slides</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables.net/rowReorder.dataTables.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
</head>
<style>
    form .dropify-wrapper .dropify-preview .dropify-render img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /*imagem preenche o input*/
    }

    form .dropify-wrapper {
        object-fit: cover;
        width: 100%;
        height: 350px;
        -webkit-box-shadow: 0px 0px 88px -45px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 0px 88px -45px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 0px 88px -45px rgba(0, 0, 0, 0.75);
    }
</style>

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
                    <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Slideshow</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Site</a></li>
                        <li class="breadcrumb-item active">Gerenciar Slideshow</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a href="${baseUri}/slide-lista/" data-id="Slide:L"
                           class="btn btn-primary waves-effect waves-light text-white menu-access">
                            <i class="fa fa-arrow-circle-left"></i> Slides
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
                            <div id="tbl-splash" class="spinner-border"
                                 style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%"
                                 role="status"></div>
                            <form action="${baseUri}/slide/gravar/" method="post" enctype="multipart/form-data"
                                  id="form-sub">
                                <input type="hidden" name="slide_id" id="slide_id" value="${slide_id}">
                                <div class="row pb-4">
                                    <div class="col-md-12 col-xs-12 col-sm-12" id="slide_img_div">
                                            <span class="float-end"><i class="fa fa-info-circle"></i>
                                            Tamanho ideal da imagem (1900 X 500)</span>
                                        <label for="input-file-now-custom-1">Selecione uma Imagem</label>
                                        <input type="file" id="input-file-now-custom-1" name="slide_img"
                                            <?php if (isset($data['slide']->slide_img) && !empty($data['slide']->slide_img)): ?>
                                                data-default-file="${baseUri}/media/slides/${slide_img}"
                                            <?php else: ?>
                                                required
                                            <?php endif; ?>
                                               data-allowed-file-extensions="jpg jpeg png" class="dropify"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6  col-sm-12">
                                        <div class="mb-3">
                                            <label for="slide_url">Link</label>
                                            <span class="float-end pt-1"><i class="fa fa-info-circle"></i> Ao clicar no botão o usuário será redirecionado para este link</span>
                                            <input type="text" class="form-control" id="slide_url" name="slide_url"
                                                   value="${slide_url}" placeholder="http://exemplo.com.br/"
                                                   maxlength="250">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="slide_titulo">Texto do Botão</label>
                                            <input type="text" class="form-control" id="slide_titulo"
                                                   value="${slide_titulo}" name="slide_titulo"
                                                   placeholder="Insira um texto para o botão" maxlength="150">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="slide_texto">Texto do Slide </label>
                                            <input type="text" class="form-control" id="slide_texto"
                                                   value="${slide_texto}" name="slide_texto"
                                                   placeholder="Insira um breve texto." maxlength="250">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i
                                                    class="fa fa-check-circle"></i> Salvar
                                        </button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @(admin.layout.footer)
        </div>
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
    <script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="slide/index.js"></script>
    <script type="text/javascript">
        $('.menu-home').addClass('active');
        $('.menu-slide').addClass('active');
        $('#slide_url').on('change', function () {
            if ($.trim($('#slide_url').val()) == "") {
                $('#slide_titulo').removeAttr('required');
            } else {
                $('#slide_titulo').attr('required', 'required');
            }
        })
    </script>
</body>

</html>