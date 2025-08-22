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
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="${baseUri}/view/admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
          rel="stylesheet">
    <link href="assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/plugins/fullcalendar/main.css" rel="stylesheet">
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<div id="main-wrapper">
    @(admin.layout.topo)
    @(admin.layout.topo-menu)
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                @(admin.layout.topo-info)
            </div>
            <div class="row">
                <!--
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="social-widget">
                                    <div class="soc-header bg-dark"><i class="fa fa-archive"
                                                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="soc-content">
                                        <div class="col-12 b-r">
                                            <h3 class="font-medium counter"><?= $data['produtos'] ?></h3>
                                            <h5 class="text-muted">Produtos</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="social-widget">
                                    <div class="soc-header bg-dark"><i class="fa fa-cog" aria-hidden="true"></i>
                                    </div>
                                    <div class="soc-content">
                                        <div class="col-12 b-r">
                                            <h3 class="font-medium counter"><?= $data['servicos'] ?></h3>
                                            <h5 class="text-muted">Serviços</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="social-widget">
                                    <div class="soc-header bg-dark"><i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="soc-content">
                                        <div class="col-12 b-r">
                                            <h3 class="font-medium counter"><?= $data['clientes'] ?></h3>
                                            <h5 class="text-muted">Clientes</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="col">
                    <div class="card" style="min-height: 428px">
                        <div class="card-body">
                            <h4 class="card-title">Indicadores</h4>
                            <div id="morris-donut-chart"></div>
                        </div>
                    </div>
                </div>
                <?php if (isset($data['modulos']) && $data['modulos']->agenda_status == 1 && $data['modulos']->cliente_status == 1): ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Agenda</h4>
                                <section id="agenda">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id='calendar'></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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
<script src="assets/plugins/popper/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/morrisjs/morris.js"></script>
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/vue.min.js"></script>
<script src="assets/js/waypoint.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/plugins/fullcalendar/main.min.js"></script>
<script src="assets/plugins/fullcalendar/locales-all.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="${baseUri}/view/admin/agenda/calendar-home.js"></script>
</body>
<script>
    setTimeout(() => {
        $('.counter').counterUp({
            time: 1000
        });
    }, 100);
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [
            {
                label: "${servico_menu_admin}",
                value: '<?= $data['servicos'] ?>',
            }, {
                label: "${cliente_menu_admin}",
                value: '<?= $data['clientes'] ?>'
            }, {
                label: "${produto_menu_admin}",
                value: '<?= $data['produtos']?>'
            }, {
                label: "${blog_menu_admin}",
                value: '<?= $data['posts']?>'
            }, {
                label: "${evento_menu_admin}",
                value: '<?= $data['evento']?>'
            }, {
                label: "${agenda_menu_home}",
                value: '<?= $data['agenda']?>'
            }
        ],
        resize: true,
        colors: ['#009efb', '#55ce63', '#2f3d4a', '#39B580', 'orange', 'red', 'brow']
    });
</script>

</html>