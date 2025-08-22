<!DOCTYPE html>
<html lang="en">
<head>
    <base href="${baseUri}/view/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="${config_seo_author}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>Departamentos - ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="main-wrapper">
    <!-- TOPO import -->
    @(admin.layout.topo)
    <!-- MENU import -->
    @(admin.layout.topo-menu)
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Departamentos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Financeiro</a></li>
                        <li class="breadcrumb-item"><a href="${baseUri}/departamento/">Departamentos</a></li>
                        <li class="breadcrumb-item active">Cadastrar / Atualizar</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px" data-id="Servico:G">
                        <a href="${baseUri}/departamento/" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-chevron-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>
            </div>
        </div>
        <!-- Start Page Content -->
        <div class="departamento-vue" id="departamento">
            <div class="col-12">
                <div class="card card-outline-primary">
                    <div class="card-header"><i class="text-white fas fa-edit"></i> </div>
                    <div class="card-body">

                        <form action="${baseUri}/departamento/gravar/" method="post" id="form-departamento">
                            <input type="hidden" id="depto_id" name="depto_id" value="${depto_id}">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <div class="mb-3">
                                            <label for="depto_nome">Nome do Departamento</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" name="depto_nome" id="depto_nome"
                                                   class="form-control"
                                                   placeholder="Nome do departamento" required
                                                   value="${depto_nome}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12">
                                        <div class="mb-3">
                                            <label for="depto_obs">Observações</label>
                                            <input type="text" name="depto_obs" id="depto_obs"
                                                   class="form-control"
                                                   placeholder="Observações sobre departamento"
                                                   value="${depto_obs}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="text-white fas fa-save"></i> Gravar Dados
                                    </button>
                                </div>
                            </div>
                        </form>

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
<!-- Modal Remove -->
@(admin.layout.modal-remove)
@(admin.departamento.modal-editar)
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
<!-- start - This is for export functionality only -->
<script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-button/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables-button/jszip.min.js"></script>
<script src="assets/plugins/datatables-button/pdfmake.min.js"></script>
<script src="assets/plugins/datatables-button/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-button/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-button/buttons.print.min.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<!-- PRINCIPAL JS -->
<script src="assets/js/vue.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="departamento/index.js"></script>
<script type="text/javascript">
    $('.menu-departamento').addClass('active');
</script>
</body>
</html>