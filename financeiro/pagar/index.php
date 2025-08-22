<!DOCTYPE html>
<html lang="pt-br">
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
    <title>Contas a Pagar | ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <style>table.tr {
            padding: 10px;
        }</style>
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
        <div class="container-fluid" id="vm">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Contas a Pagar</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Financeiro</a></li>
                        <li class="breadcrumb-item active">Contas a Pagar</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center menu-access" data-mod="Financeiro:G">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a href="${baseUri}/pagar/novo/" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-plus-circle"></i> Nova <span
                                    class="hidden-xs-down">Movimentação</span>
                        </a>
                    </h6>
                </div>
            </div>
            <!-- Start Page Content -->
            <div class="row">

                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-th-list"></i>
                            <span class="float-rights">
                                <select class="selectpickers" id="data-table-cols" data-width="380px"
                                        title="Selecione aqui colunas que deseja exibir na tela"
                                        multiple
                                        data-style="form-control btn-darks">
                                    <option value="0">Descrição</option>
                                    <option value="1">Fornecedor / Prestador</option>
                                    <option value="2">Valor</option>
                                    <option value="3">Data de Vencimento</option>
                                    <option value="4">Data de Pagamento</option>
                                    <option value="5">Conta</option>
                                    <option value="6">Status</option>
                                </select>
                            </span>
                        </div>
                        <div class="card-body">
                            <div id="tbl-splash" class="spinner-border"
                                 style="width: 5rem; height: 5rem; margin-top: 5%; margin-left: 50%"
                                 role="status"></div>
                            <div id="tbl-div" class="table-responsive m-ts-40">
                                <table id="datatable"
                                       class="datatable display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" cellpadding="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th data-toggle="tooltip" title="Descrição do Pagamento">Descrição</th>
                                        <th data-toggle="tooltip" title="Fornecedor">Fornecedor / Prestador</th>
                                        <th data-toggle="tooltip" title="Valor a Pagar">Valor</th>
                                        <th data-toggle="tooltip" title="Data de Vencimento" class="hidden-xs-down">
                                            Vencimento
                                        </th>
                                        <th data-toggle="tooltip" title="Data de Pagamento">Pagamento</th>
                                        <th data-toggle="tooltip" title="Conta de Pagamento" class="hidden-xs-down">
                                            Conta
                                        </th>
                                        <th data-toggle="tooltip" title="Status do Pagamento">Status</th>
                                        <th class="d-print-none menu-access text-right" width="120"
                                            data-id="Financeiro:G">Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="mov in movs">
                                        <td>{{mov.movimentacao_titulo}}</td>
                                        <td class="hidden-xs-down">{{mov.fornecedor_nome}}</td>
                                        <td>{{mov.movimentacao_valor}}</td>
                                        <td>{{mov.movimentacao_vencto}}</td>
                                        <td class="hidden-xs-down">{{mov.movimentacao_datapagto}}</td>
                                        <td class="hidden-xs-down"><span data-toggle="tooltip" :title="mov.banco_nome">{{mov.conta_nome}}</span>
                                        </td>
                                        <td :id="mov.movimentacao_id" width="20">
                                        <span :class="'badge p-2 d-block text-center badge-'+mov.movimentacao_status_color"
                                              v-on:click="alter_status(mov)" style="cursor: pointer"
                                              data-toggle="tooltip" title="Alterar Status">
                                             <i :class="'fa fa-'+mov.movimentacao_status_ico"></i>
                                            {{mov.movimentacao_status_txt}}
                                        </span>
                                        </td>
                                        <td class="d-print-none menu-access text-right" data-id="Financeiro:G">
                                            <a class="btn btn-sm btn-primary waves-effect waves-light"
                                               data-toggle="tooltip" title="editar"
                                               :href="'${baseUri}/pagar/editar/'+mov.movimentacao_id">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger menu-access"
                                                    data-id="Financeiro:G"
                                                    data-toggle="tooltip" title="remover"
                                                    v-on:click="remover(mov)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer import-->
        @(admin.layout.footer)
    </div>
    <!-- End Page wrapper  -->
    <!-- Modal Remove -->
    @(admin.layout.modal-remove)
    <!-- Modal Remove -->
    <div id="modal-status" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Status da Movimentação</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form" id="modal-form-status">
                        <input type="hidden" name="id" id="id"/>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" disabled>Selecione um status...</option>
                                <option value="1">Pendente</option>
                                <option value="2">Agendado</option>
                                <option value="3">Pago</option>
                                <option value="4">Cancelado</option>
                            </select>
                        </div>
                        <div class="mb-3 d-none" id="dv-datapagto">
                            <label>Data de Pagamento</label>
                            <input type="text" name="datapagto" id="datapagto"
                                   placeholder="Informe a data do pagamento"
                                   class="form-control date-calendar"/>
                        </div>
                        <div class="mb-3">
                            <label>Observações</label>
                            <textarea name="obs" id="obs" class="form-control"
                                      placeholder="Inclua observações, se houverem."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal"><i
                                class="fa fa-times-circle"></i> Cancelar
                    </button>
                    <button id="btn-altera-status" type="button"
                            data-id="Financeiro:G"
                            class="btn btn-dark menu-access waves-effect waves-light"><i class="fa fa-check-circle"></i>
                        Atualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
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
<!-- CALENDAR JS -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/moment/pt-br.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- CALENDAR -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vue.min.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="app-js/main.js"></script>
<script src="financeiro/pagar/index.js"></script>
<script type="text/javascript">
    $('.menu-financeiro').addClass('active');
</script>
</body>
</html>