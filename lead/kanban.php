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
    <title>${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="lead/kanban.css">
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Lead</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Lead</a></li>
                        <li class="breadcrumb-item active">Kanban</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
            </div>

            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class="fa fa-rocket"></i></div>
                        <div class="card-body">


                            <div class="content overflow-hidden " style=" min-height: 550px">

                                <div class="row" id="cards">
                                    <div class="col-md-2 col-step" id="s1">
                                        <h4>
                                            <span class="float-start opaco">
                                            <i class="fa fa-envelope"></i>
                                        </span>

                                            Aguardando
                                        </h4>
                                        <ul id="sortable1" data-name="Aguardando" class="connectedSortable">
                                            <li class="ui-state-default" data='{"name":"João das Coves", "id":"55"}'>
                                    <span><i class="fa fa-user-circle"></i> João das Coves
                                        <span class="float-end"><i class="fa fa-star"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> jcoves@gmail.com <br>
                                                <i class="fa fa-phone"></i> (11) 95555-8888 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                            <li class="ui-state-default" data='{"name":"Manuel Português", "id":"55"}'>
                                   <span><i class="fa fa-user-circle"></i> Manuel Português
                                        <span class="float-end"><i class="fa fa-star-o"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> mano@el.pt <br>
                                                <i class="fa fa-phone"></i> (11) 97777-6666 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                            <li class="ui-state-default" data='{"name":"Chico Pinheiro", "id":"55"}'>
                                   <span><i class="fa fa-user-circle"></i> Chico Pinheiro
                                        <span class="float-end"><i class="fa fa-star-o"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> chicop@gmail.com <br>
                                                <i class="fa fa-phone"></i> (13) 98877-4444 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s2">
                                        <h4><span class="float-start opaco"><i class="fa fa-envelope-open"></i></span>
                                            Proposta enviada
                                        </h4>
                                        <ul id="sortable2" data-name="Proposta Enviada" class="connectedSortable">
                                            <li class="ui-state-default" data='{"name":"Chuck Norris", "id":"55"}'>
                                   <span><i class="fa fa-user-circle"></i> Chuck Norris
                                        <span class="float-end"><i class="fa fa-star"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> cnorris@gmail.com <br>
                                                <i class="fa fa-phone"></i> (13) 98877-4444 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s3">
                                        <h4><span class="float-start opaco"><i class="fa fa-users"></i></span>
                                            Negociação
                                        </h4>
                                        <ul id="sortable3" data-name="Negociação" class="connectedSortable"></ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s4">
                                        <h4><span class="float-start opaco"><i class="fa  fa-bullseye"></i></span>
                                            Proposta Aceita
                                        </h4>
                                        <ul id="sortable4" data-name="Proposta Aceita" class="connectedSortable"></ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s5">
                                        <h4><span class="float-start opaco"><i class="fa  fa-code"></i></span>
                                            Desenvolvendo
                                        </h4>
                                        <ul id="sortable5" class="connectedSortable"></ul>
                                    </div id=>
                                    <div class="col-md-2 col-step" id="s6">
                                        <h4><span class="float-start opaco"><i class="fa fa-code-branch"></i></span>
                                            Testes
                                        </h4>
                                        <ul id="sortable6" class="connectedSortable"></ul>
                                    </div>
                                    <!-- ETAPA FUTURA -->
                                    <div class="col-md-2 col-step hide" id="s7">
                                        <h4><span class="float-end opaco"><i class="fa fa-cloud-upload"></i></span>
                                            Entrega
                                        </h4>
                                        <ul id="sortable7" class="connectedSortable"></ul>
                                    </div>
                                    <div class="col-md-2 col-step hide" id="s8">
                                        <h4 class="text-center"><span class="float-end opaco"><i
                                                        class="fa fa-barcode"></i></span>
                                            Faturamento
                                        </h4>
                                        <ul id="sortable7" class="connectedSortable"></ul>
                                    </div>
                                </div>

                            </div>


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
<!-- Style switcher -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script type="text/javascript" src="assets/plugins/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="lead/kanban.js"></script>

</body>
</html>