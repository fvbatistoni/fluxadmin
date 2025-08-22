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
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Informações do Site</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Configurações</a></li>
                            <li class="breadcrumb-item active">Informações do Site</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                </div>

                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-globe"></i></div>
                            <div class="card-body">

                                <form method="post" action="${baseUri}/configuracao/gravar/return/seo/">
                                    <input type="hidden" name="config_id" value="1">
                                    <section >
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Configurações de ferramentas de busca</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="config_site_ga_code">Google Maps API</label>
                                                    <input type="text" name="config_site_ga_maps" id="config_site_ga_maps" class="form-control" placeholder="informe o código do Google Analytics" value="${config_site_ga_maps}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="config_site_author">Meta Author</label>
                                                    <input type="text" name="config_site_author" id="config_site_author" class="form-control" placeholder="informe o meta author" value="${config_site_author}" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="config_site_ga_code">Código Google Analytics</label>
                                                    <textarea name="config_site_ga_code" id="config_site_ga_code" class="form-control" placeholder="informe o código do Google Analytics" rows="6" value="${config_site_ga_code}">${config_site_ga_code}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="mb-3">
                                                    <br>
                                                    <button type="submit" id="btn-send" class="btn btn-primary"><i class="fas fa-check-circle"></i> Atualizar Dados
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
                <!-- Config Tema botão float import -->
            </div>
            <!-- Footer import-->
            @(admin.layout.footer)
            <!-- End Footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- All Jquery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    
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
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script type="text/javascript">
        $('.menu-aparencia').addClass('active');
        $('.menu-informacoes').addClass('active');
    </script>
</body>

</html>