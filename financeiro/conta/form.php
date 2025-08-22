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
    <title>Contas - ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="app-css/fix-select.css" id="theme" rel="stylesheet">
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
    <!-- Page wrapper  -->
    <div class="page-wrapper" id="APP" data-url="conta">
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Contas</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Financeiro</a></li>
                        <li class="breadcrumb-item"><a href="${baseUri}/conta/">Contas</a></li>
                        <li class="breadcrumb-item active">Cadastrar / Atualizar</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px" data-id="Conta:G">
                        <a href="${baseUri}/conta/" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-chevron-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>
            </div>
        </div>

        <!-- Start Page Content -->
        <div id="APP-BANCO">
            <div class="col-12">
                <div class="card card-outline-primary">
                    <div class="card-header"><i class="text-white fas fa-edit"></i></div>
                    <div class="card-body">

                        <form action="${baseUri}/conta/gravar/" method="post">
                            <input type="hidden" id="conta_id" name="conta_id" value="${conta_id}">

                            <div class="rowss">
                                <div class="row">

                                    <div class="col-md-5 col-xs-12">
                                        <div class="mb-3">
                                            <label for="conta_banco">Banco</label>
                                            <span class="text-danger">*</span>
                                            <select name="conta_banco" id="conta_banco"
                                                    data-live-search="true" class="form-control select3 sselectpicker"
                                                    required>
                                                <option value="" data-icon="fa fa-building">Selecione um banco...
                                                </option>
                                                <option v-for="bc in bancos" :value="bc.id">{{bc.nome}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-7 col-xs-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="conta_nome">Nome da Conta</label>
                                            <span class="text-danger">*</span>
                                            <span class="help float-end">
                                                <small><i class="fa fa-info-circle"></i> Ex: Despesas Fixas</small>
                                            </span>
                                            <input type="text" name="conta_nome" id="conta_nome"
                                                   class="form-control"
                                                   placeholder="Nome da conta" required
                                                   value="${conta_nome}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 col-xs-12">
                                        <div class="mb-3">
                                            <label for="conta_titular">Titular da Conta</label>
                                            <span class="text-danger"></span>
                                            <input type="text" name="conta_titular" id="conta_titular"
                                                   class="form-control"
                                                   placeholder="Titular da Conta"
                                                   value="${conta_titular}"/>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-xs-12">
                                        <div class="mb-3">
                                            <label for="conta_titular">Documento do Titular</label>
                                            <span class="text-danger"></span>
                                            <input type="text" name="conta_documento" id="conta_documento"
                                                   class="form-control cpfCnpj"
                                                   placeholder="Documento CPF / CNPJ"
                                                   value="${conta_documento}"/>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <div class="mb-3">
                                            <label for="conta_ag">Agência</label>
                                            <span class="text-danger"></span>
                                            <input type="text" name="conta_ag" id="conta_ag"
                                                   class="form-control"
                                                   placeholder="Número da Agência"
                                                   value="${conta_ag}"/>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="conta_cc">Conta Corrente</label>
                                            <span class="text-danger"></span>
                                            <input type="text" name="conta_cc" id="conta_cc"
                                                   class="form-control"
                                                   placeholder="Conta e Dígito"
                                                   value="${conta_cc}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 col-xs-12">
                                        <div class="mb-3">
                                            <label for="conta_saldo">Saldo (R$)</label>
                                            <input type="text" name="conta_saldo" id="conta_saldo"
                                                   class="form-control moeda"
                                                   placeholder="Saldo da Conta"
                                                   value="${conta_saldo}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="mb-3">
                                            <label for="conta_obs">Observações</label>
                                            <input type="text" name="conta_obs" id="conta_obs"
                                                   class="form-control"
                                                   placeholder="Observações"
                                                   value="${conta_obs}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="text-white fas fa-save"></i> Gravar Dados
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
    @(admin.layout.footer)
    <!-- End Footer -->
</div>
<!-- Modal Remove -->
@(admin.layout.modal-remove)
@(admin.servico.modal-editar)
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
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
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
<script src="app-js/datatable.js"></script>
<script src="app-js/main.js"></script>
<script src="app-js/bancos.js"></script>
<script type="text/javascript">
    $(function () {
        $('.menu-financeiro').addClass('active');
        setTimeout(function () {
            $('.select3').selectpicker({
                noneResultsText: 'Nenhum resultado encontrado!',
                noneSelectedText: 'Selecione um Banco...'
            });
            $('#conta_banco').selectpicker('val', '${conta_banco}');
        }, 800)
    });
</script>
</body>
</html>