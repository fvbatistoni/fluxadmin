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
    <title>${config_site_title} - Geral</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    form .dropify-wrapper .dropify-preview .dropify-render img {
        object-fit: cover;
    }

    form .dropify-wrapper {
        display: block;
        position: relative;
        cursor: pointer;
        border-radius: 10px;
        object-fit: cover;
        width: 300px;
        height: 300px;
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Logo</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configurações</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Aparência</a></li>
                        <li class="breadcrumb-item active">Logo e Screen Login</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-globe"></i></div>
                        <div class="card-body">
                            <section>
                                <br>
                                <div class="container">
                                    <div class="row align-items-center text-center">
                                        <div class="col-md-4 col-sm-12 align-self-center">
                                            <form method="post" action="${baseUri}/configuracao/logo_upload/"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="config_id" value="1">
                                                <div class="row  px-3">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                        <label for="input-file-now-custom-1">Selecione uma logo</label>
                                                        <input type="file" id="input-file-now-custom-1" name="logo"
                                                               data-allowed-file-extensions="png jpeg jpg"
                                                               class="dropify "
                                                               data-default-file="${baseUri}/media/site/${config_site_logo}"/>
                                                    </div>
                                                </div>
                                                <div class="row py-3">
                                                    <div class="col-12">
                                                        <button type="submit" id="btn-send" class="btn btn-primary"><i
                                                                    class="fas fa-check-circle"></i> Atualizar Logo
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 col-sm-12 align-items-center">
                                            <form method="post" action="${baseUri}/configuracao/favicon_upload/"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="config_id" value="1">
                                                <div class="row px-3">
                                                    <div class="col-12 text-center">
                                                        <label for="input-file-now-custom-1">Selecione o
                                                            favicon</label>
                                                        <input type="file" id="input-file-now-custom-1" name="favicon"
                                                               data-allowed-file-extensions="png jpeg jpg"
                                                               class="dropify"
                                                               data-default-file="${baseUri}/media/site/${config_site_favicon}"/>
                                                    </div>
                                                </div>
                                                <div class="row py-3 text-center">
                                                    <div class="col-12">
                                                        <button type="submit" id="btn-send" class="btn btn-primary"><i
                                                                    class="fas fa-check-circle"></i> Atualizar Favicon
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 col-sm-12 align-items-center">
                                            <form method="post" action="${baseUri}/configuracao/login_upload/"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="config_id" value="1">
                                                <div class="row px-3">
                                                    <div class="col-12">
                                                        <label for="input-file-now-custom-1">Selecione uma login
                                                            screen</label>
                                                        <input type="file" id="input-file-now-custom-1" name="login"
                                                               data-allowed-file-extensions="png jpeg jpg"
                                                               class="dropify"
                                                               data-default-file="${baseUri}/media/site/${config_site_loginscreen}"/>
                                                    </div>
                                                </div>

                                                <div class="row py-3 text-center">
                                                    <div class="col-12">
                                                        <button type="submit" id="btn-send" class="btn btn-primary"><i
                                                                    class="fas fa-check-circle"></i> Atualizar Login
                                                            Screen
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Content -->
            <!-- Config Tema botão float import -->
            @(admin.layout.config-tema)
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
<script src="assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="assets/js/custom.min.js"></script>
<!-- Style switcher -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<!-- PRINCIPAL JS -->
<script src="assets/js/vue.min.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $('.menu-aparencia').addClass('active');
    $('.menu-logo').addClass('active');

    $('.dropify').dropify({
        messages: {
            default: 'Clique aqui para selecionar uma imagem',
            replace: 'Clique em remover para selecionar uma nova imagem',
            remove: 'Remover',
            error: 'Ocorreu um erro ao alterar a imagem'
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