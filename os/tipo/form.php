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
    <title>Tipo | ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

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
                    <h3 class="text-themecolor m-b-0 m-t-0">Tipo</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ordem de Serviço</a></li>
                        <li class="breadcrumb-item"><a href="${baseUri}/tipo/">Tipos</a></li>
                        <li class="breadcrumb-item active">Dados</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/tipo/">
                            <i class="fas fa-arrow-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>
            </div>
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Cadastro do Tipos</span>
                        </div>
                        <div class="card-body">
                            <div class="content">
                                <form autocomplete="off" method="post" action="${baseUri}/tipo/gravar/">
                                    <input type="hidden" name="tipo_id" value="${tipo_id}"/>

                                    <section>
                                        <section class="clear d-none">
                                            <div class="mb-3">
                                                <h4 class="separator-line">Nome </h4>
                                                <hr>
                                            </div>
                                        </section>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="tipo_nome">Nome / Tipo</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" name="tipo_nome" id="tipo_nome"
                                                           class="form-control" required
                                                           placeholder="informe o nome ou descrição"
                                                           value="${tipo_nome}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tipo_cpf">Observações
                                                    </label>
                                                        <span class="float-end"><small> <i class="fa fa-exclamation-circle"></i> Observações Internas</small></span>
                                                    <textarea name="tipo_obs" id="tipo_obs"
                                                           class="form-control"
                                                           placeholder="Observações Internas">${tipo_obs}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </section>


                                    <div class="col-xs-12 text-center menu-access" data-id="Tecnico:G">
                                        <div class="mb-3 text-center">
                                            <br/>
                                            <button type="submit" id="btn-send" class="btn btn-primary"><i
                                                        class="fas fa-check-circle"></i> Gravar Dados
                                            </button>
                                        </div>
                                    </div>
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
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="assets/js/custom.min.js"></script>
<script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
<!-- Style switcher -->
<!-- CALENDAR JS -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/moment/pt-br.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- END CALENDAR -->
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script type="text/javascript">
    $('.menu-tipo').addClass('active');
</script>
</body>

</html>