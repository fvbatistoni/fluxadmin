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
    <title>Contas a Receber | ${config_site_title}</title>
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
    <div class="page-wrapper">
        <!-- Container fluid  -->
        <div class="container-fluid" id="vm">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Contas a Receber</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Financeiro</a></li>
                        <li class="breadcrumb-item"><a href="${baseUri}/receber/">Contas a Receber</a></li>
                        <li class="breadcrumb-item active">Cadastrar / Atualizar</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center menu-access" data-mod="Financeiro:G">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a href="${baseUri}/receber/" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-chevron-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>
            </div>
            <!-- Start Page Content -->
            <div class="row">

                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-edit"></i></div>
                        <div class="card-body">
                            <form action="${baseUri}/receber/save/" method="post" id="pagar-form">
                                <input type="hidden" id="id" name="id" value="${movimentacao_id}"/>
                                <input type="hidden" id="tipo" name="movimentacao_tipo" value="2"/>

                                <div class="rowss">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="mb-3">
                                                <label>Título da Cobrança <span class="text-danger">*</span></label>
                                                <span class="help float-end">
                                                <small><i class="fa fa-info-circle"></i> ex: Conta de Luz</small>
                                            </span>
                                                <input type="text" name="movimentacao_titulo" id="titulo"
                                                       class="form-control"
                                                       value="${movimentacao_titulo}"
                                                       required
                                                       placeholder="Informe uma descrição ou título"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Valor <span class="text-danger">*</span> </label>
                                                <input type="text" name="movimentacao_valor" id="valor"
                                                       class="form-control moeda"
                                                       value="${movimentacao_valor}" required
                                                       placeholder="valor da movimentação"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Vencimento <span class="text-danger">*</span> </label>
                                                <input type="text" name="movimentacao_vencto" id="vencto"
                                                       class="form-control date-calendar"
                                                       value="${movimentacao_vencto}"
                                                       placeholder="data de vencimento" required/>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Cliente</label>
                                                <span class="help float-end" data-toggle="tooltip"
                                                      title="Quem fará o pagamento">
                                                    <small><i class="fa fa-question-circle"></i></small>
                                                </span>
                                                <select class="selectpickerss form-control" id="cliente"
                                                        name="movimentacao_cliente"
                                                        data-style="form-control btn-primary">
                                                    <option value="">Selecione um cliente...</option>
                                                    <option :value="cli.id" v-for="cli in clientes">
                                                        {{cli.nome}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Banco - Conta de Recebimento</label>
                                                <span class="help float-end" data-toggle="tooltip"
                                                      title="Conta que será utilizada para o recebimento.">
                                                    <small><i class="fa fa-question-circle"></i></small>
                                                </span>
                                                <select class="selectpickerss form-control" id="conta"
                                                        name="movimentacao_conta"
                                                        data-style="form-control btn-primary">
                                                    <option value="">Selecione um banco...</option>
                                                    <option :value="cont.conta_id" v-for="cont in contas">
                                                        {{cont.banco_nome}} - {{cont.conta_nome}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Forma de Pagamento </label>
                                                <select class="form-control" id="forma" name="movimentacao_forma">
                                                    <option value="">Selecione uma forma...</option>
                                                    <option value="1">Boleto</option>
                                                    <option value="2">Bitcoin / Altcoin</option>
                                                    <option value="3">Débito automático</option>
                                                    <option value="4">DDA</option>
                                                    <option value="5">Dinheiro</option>
                                                    <option value="6">DOC</option>
                                                    <option value="7">Cartão Crédito</option>
                                                    <option value="8">Cartão Débito</option>
                                                    <option value="9">Cheque</option>
                                                    <option value="10">Carnê</option>
                                                    <option value="11">Pagto Eletrônico (paypal, pagseguro)</option>
                                                    <option value="12">Permuta</option>
                                                    <option value="13">TED</option>
                                                    <option value="14">Outros</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Departamento</label>
                                                <span class="help float-end" data-toggle="tooltip"
                                                      title="Destino do recebimento.">
                                                    <small><i class="fa fa-question-circle"></i></small>
                                                </span>
                                                <select class="selectpickerss form-control" id="depto"
                                                        name="movimentacao_depto"
                                                        data-style="form-control btn-primary">
                                                    <option value="">Selecione um depto...</option>
                                                    <option :value="depto.depto_id" v-for="depto in deptos">
                                                        {{depto.depto_nome}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Status </label>
                                                <select class="form-control" id="status" name="movimentacao_status"
                                                        required>
                                                    <option value="" disabled>Selecione um status...</option>
                                                    <option value="1">Pendente</option>
                                                    <option value="2">Agendado</option>
                                                    <option value="3">Recebido</option>
                                                    <option value="4">Cancelado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Data Recebimento </label>
                                                <span class="help float-end" data-toggle="tooltip"
                                                      title="Se informada, muda Status para RECEBIDO automaticamente">
                                                    <small><i class="fa fa-question-circle"></i></small>
                                                </span>
                                                <input type="text" name="movimentacao_datarecbo" id="datarecbo"
                                                       class="form-control date-calendar"
                                                       value="${movimentacao_datarecbo}"
                                                       placeholder="data do recebimento"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Baixa Automática </label>
                                                <span class="help float-end" data-toggle="tooltip"
                                                      title="Muda o status para RECEBIDO automaticamente na data do Vencimento">
                                                    <small><i class="fa fa-question-circle"></i></small>
                                                </span>
                                                <select class="form-control" id="baixa" name="movimentacao_baixa">
                                                    <option value="" disabled>Selecione uma opção...</option>
                                                    <option value="1">Não</option>
                                                    <option value="2">Sim</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-none">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="mb-3">
                                                <label for="movimentacao_demons1">Demonstrativo Linha 01</label>
                                                <input type="text" name="movimentacao_demons1" id="demons1"
                                                       class="form-control text-uppercases" autocomplete="off"
                                                       value="${movimentacao_demons1}"
                                                       placeholder="texto demonstrativo no boleto"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="mb-3">
                                                <label for="movimentacao_demons2">Demonstrativo Linha 02</label>
                                                <input type="text" name="movimentacao_demons2" id="demons2"
                                                       class="form-control text-uppercases" autocomplete="off"
                                                       value="${movimentacao_demons2}"
                                                       placeholder="Não receber após 30 dias do vencimento"/>
                                            </div>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Valor da NF </label>
                                                <input type="text" name="movimentacao_nf_valor" id="movimentacao_nf_valor"
                                                       class="form-control moeda"
                                                       value="${movimentacao_nf_valor}"
                                                       placeholder="valor da NF"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Data Recebimento NF </label>
                                                <input type="text" name="movimentacao_nf_dt" id="movimentacao_nf_dt"
                                                       class="form-control date-calendar"
                                                       value="${movimentacao_nf_dt}"
                                                       placeholder="Data NF"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xs-12">
                                            <div class="mb-3">
                                                <label>Observações NF </label>
                                                <input type="text" name="movimentacao_nf_obs" id="movimentacao_nf_obs"
                                                       class="form-control"
                                                       value="${movimentacao_nf_obs}"
                                                       placeholder="Observações sobre a NF"/>
                                            </div>
                                        </div>
                                    </div>
                                    -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label>Observações <span
                                                            class="help d-none"> ex "Conta de Telefone"</span></label>
                                                <span class="help float-end">
                                                <small><i class="fa fa-info-circle"></i> observações internas</small>
                                            </span>
                                                <textarea name="movimentacao_obs" id="obs" class="form-control"
                                                          placeholder="Inclua observações internas">${movimentacao_obs}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light"><i
                                                class="fa fa-check-circle"></i> Gravar Dados
                                    </button>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        @(admin.layout.footer)
    </div>
</div>
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
<script src="app-js/datepicker.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<!-- CALENDAR -->
<script src="assets/js/vue.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="financeiro/receber/index.js"></script>
<script type="text/javascript">
    $(function () {
        $('.menu-financeiro').addClass('active');
        setTimeout(function () {
            $('#conta').val('${movimentacao_conta}');
            $('#status').val('${movimentacao_status}');
            $('#fornecedor').val('${movimentacao_fornecedor}');
            $('#depto').val('${movimentacao_depto}');
            $('#forma').val('${movimentacao_forma}');
            $('#baixa').val('${movimentacao_baixa}');
        }, 500)
    })
</script>
</body>
</html>