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
    <title>Ordem de Serviço - ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme col-12 col-md-autoors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!-- Date Range -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Range Slide-->
    <link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinModern.css" rel="stylesheet">
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
        <div class="container-fluid">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="row page-titles">
                <div class="col-12 col-md-auto-md-5 col-12 col-md-auto-8 align-self-center">
                    <h3 class="text-themecol-12 col-md-autoor m-b-0 m-t-0">Relatórios</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="${baseUri}/os/">Ordem de Serviço</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Relatórios</a></li>
                    </ol>
                </div>
                @(admin.layout.topo-info)
            </div>

            <!-- Start Page Content -->
            <div class="row" id="vm">
                <div class="col-12 col-md-auto-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class="fas fa-filter"></i> <span class="hidden-sm-up">Relatórios</span>
                        </div>
                        <div class="card-body">
                            <div class="content">
                                <form autocomplete="off" id="form-relatorio">
                                    <section id="filtro-dados">

                                        <h3>Dados da OS</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="identificacao">Identificação</label>
                                                    <input class="form-control" type="text" name="identificacao"
                                                           id="identificacao" placeholder="Identificação da OS">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">Todos</option>
                                                        <option v-for="stat in status" :value="stat.id">
                                                            {{stat.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="imovel">Tipo</label>
                                                    <select class="form-control" name="imovel" id="imovel">
                                                        <option value="">Todos</option>
                                                        <option v-for="tipo in tipos" :value="tipo.id">{{tipo.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="avaliacao">Avaliação</label>
                                                    <select class="form-control" name="avaliacao" id="avaliacao">
                                                        <option value="">Todos</option>
                                                        <option v-for="servico in servicos" :value="servico.id">
                                                            {{servico.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="cliente">Cliente</label>
                                                    <select name="cliente" id="cliente" class="form-control">
                                                        <option value="">Todos</option>
                                                        <option v-for="cliente in clientes" :value="cliente.id">
                                                            {{cliente.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="tecnico">Executado por</label>
                                                    <select name="tecnico" id="tecnico" class="form-control">
                                                        <option value="">Todos</option>
                                                        <option v-for="tecnico in tecnicos" :value="tecnico.id">
                                                            {{tecnico.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="fornecedor">Parceiro</label>
                                                    <select name="fornecedor" id="fornecedor" class="form-control">
                                                        <option value="">Todos</option>
                                                        <option v-for="fornecedor in fornecedores"
                                                                :value="fornecedor.id">{{fornecedor.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12 col-md-2">
                                                <div class="mb-3">
                                                    <label for="nf">Nota Fiscal? </label>
                                                    <select class="form-control" name="nf" id="nf">
                                                        <option value="">Indiferente</option>
                                                        <option value="1">Sim</option>
                                                        <option value="2">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-1">
                                                <div class="mb-3">
                                                    <label for="nf_num">Nº da Nota </label>
                                                    <input type="text" class="form-control" name="nf_num"
                                                           id="nf_num">
                                                </div>
                                            </div>
                                            <!--
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="retificacao">Retificação?</label>
                                                    <select class="form-control" name="retificacao"
                                                            id="retificacao">
                                                        <option value="">Indiferente</option>
                                                        <option value="1">Sim</option>
                                                        <option value="2">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </section>
                                    <section id="filtro-enderecos">
                                        <h3>Endereço</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="cep">CEP </label>
                                                    <input type="text" name="cep" id="cep"
                                                           class="form-control cep"
                                                           placeholder="Informe o cep"
                                                           value=""
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="bairro">Bairro</label>
                                                    <input type="text" name="bairro" id="bairro"
                                                           value=""
                                                           class="form-control bairro"
                                                           placeholder="Informe o nome do bairro"/>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="cidade">Cidade</label>
                                                    <input type="text" name="cidade" id="cidade"
                                                           value=""
                                                           class="form-control cidade"
                                                           placeholder="Informe o nome da cidade"/>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="uf">UF</label>
                                                    <select id="uf" name="uf" class="form-control uf">
                                                        <option value="">Selecione um estado...</option>
                                                        <option value="AC">Acre</option>
                                                        <option value="AL">Alagoas</option>
                                                        <option value="AP">Amapá</option>
                                                        <option value="AM">Amazonas</option>
                                                        <option value="BA">Bahia</option>
                                                        <option value="CE">Ceará</option>
                                                        <option value="DF">Distrito Federal</option>
                                                        <option value="ES">Espírito Santo</option>
                                                        <option value="GO">Goiás</option>
                                                        <option value="MA">Maranhão</option>
                                                        <option value="MT">Mato Grosso</option>
                                                        <option value="MS">Mato Grosso do Sul</option>
                                                        <option value="MG">Minas Gerais</option>
                                                        <option value="PA">Pará</option>
                                                        <option value="PB">Paraíba</option>
                                                        <option value="PR">Paraná</option>
                                                        <option value="PE">Pernambuco</option>
                                                        <option value="PI">Piauí</option>
                                                        <option value="RJ">Rio de Janeiro</option>
                                                        <option value="RN">Rio Grande do Norte</option>
                                                        <option value="RS">Rio Grande do Sul</option>
                                                        <option value="RO">Rondônia</option>
                                                        <option value="RR">Roraima</option>
                                                        <option value="SC">Santa Catarina</option>
                                                        <option value="SP">São Paulo</option>
                                                        <option value="SE">Sergipe</option>
                                                        <option value="TO">Tocantins</option>
                                                        <option value="EX">Estrangeiro</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="filtro-data">
                                        <h3>Datas</h3>
                                        <hr>
                                        <div class="row">

                                            <div class="col-12 col-md-2">
                                                <div class="mb-3">
                                                    <label for="dt-vistoria">Vistoria</label>
                                                    <input type="text" name="dt_vistoria" id="dt_vistoria"
                                                           class="form-control dateranges" value=""/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="dt-solicitacao">Solicitação</label>
                                                    <input type="text" name="dt_solicitacao" id="dt_solicitacao"
                                                           class="form-control dateranges" value=""/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-2">
                                                <div class="mb-3">
                                                    <label for="dt-entrega">Entrega</label>
                                                    <input type="text" name="dt_entrega" id="dt_entrega"
                                                           class="form-control dateranges" value=""/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-2">
                                                <div class="mb-3">
                                                    <label for="dt-prazo">Prazo</label>
                                                    <input type="text" name="dt_prazo" id="dt_prazo"
                                                           class="form-control dateranges" value=""/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="mb-3">
                                                    <label for="dt-finalizacao">Finalização</label>
                                                    <input type='text' class="form-control dateranges"
                                                           name="dt_finalizacao" id="dt_finalizacao" value=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="filtro-valor">
                                        <br>
                                        <h3 class="text-center">Faixa de Valores</h3>
                                        <hr>
                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <div class="p-10">
                                                    <h4 class="card-title">Valor Serviço</h4>
                                                    <div id="vl_servico"></div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="p-10">
                                                    <h4 class="card-title">Valor Parceiro</h4>
                                                    <div id="vl_parceiro"></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="valor_servico" id="valor_servico"/>
                                            <input type="hidden" name="valor_parceiro" id="valor_parceiro"/>
                                        </div>
                                    </section>
                                    <br>
                                    <div class="col-12 col-md-auto text-center">
                                        <div class="mb-3 text-center">
                                            <br/>
                                            <a id="btn-send" class="btn btn-primary text-white"
                                               v-on:click="filtrar_dados()"><i class="fas fa-check-circle"></i>
                                                Filtrar Dados</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="grid-resultados" class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                        <div class="card-body">
                            <div id="tbl-div" class="table-responsive m-ts-40">
                                <table id="datatable"
                                       class="datatable display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Identificação</th>
                                        <th class="hidden-xs-down">Cliente</th>
                                        <th class="hidden-xs-down">Técnico</th>
                                        <th class="hidden-xs-down">Proponente</th>
                                        <th class="hidden-xs-down">Solicitação</th>
                                        <th class="hidden-xs-down">Status</th>
                                        <th class="d-print-none" width="12%">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="cli in os">
                                        <td>{{cli.os_identificacao}}</td>
                                        <td class="hidden-xs-down">{{cli.cliente_nome}}</td>
                                        <td class="hidden-xs-down">{{cli.tecnico_nome}}</td>
                                        <td class="hidden-xs-down">{{cli.os_proponente}}</td>
                                        <td class="hidden-xs-down">{{cli.os_dt_solicitacao}}</td>
                                        <td class="hidden-xs-down">{{cli.status_nome}}</td>
                                        <td class="d-print-none text-center" width="12%">
                                            <a target="_blank" class="btn btn-sm btn-primary waves-effect waves-light"
                                               data-toggle="tooltip" title="editar OS"
                                               :href="'${baseUri}/os/editar/id/'+cli.os_id + '/'">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
    <!-- Modal Remove -->
    @(admin.layout.modal-remove)
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
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<!-- Date range -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
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
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>

<script src="assets/plugins/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="${baseUri}/view/admin/app-js/endereco.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>

<script type="text/javascript">
    $(function () {
        $('.menu-os').addClass('active');
        var vm = new Vue({
            el: '#vm',
            data: {
                vl_parceiro_min: 0,
                vl_parceiro_max: 20000,
                vl_servico_min: 0,
                vl_servico_max: 20000,
                clientes: null,
                tecnicos: null,
                fornecedores: null,
                status: null,
                servicos: null,
                tipos: null,
                os: null,
            },
            methods: {
                get_clientes: function () {
                    var url = baseUri + '/cliente/get_json/';
                    var self = this;
                    $.getJSON(url).then(function (rs) {
                        self.clientes = rs;
                    });
                },
                get_tecnicos: function () {
                    var url = baseUri + '/tecnico/get_nomes/';
                    var self = this;
                    $.getJSON(url).then(function (rs) {
                        self.tecnicos = rs;
                    });
                },
                get_fornecedores: function () {
                    var url = baseUri + '/fornecedor/get_nomes/';
                    var self = this;
                    $.getJSON(url).then(function (rs) {
                        self.fornecedores = rs;
                    });
                },
                get_status: function () {
                    var url = baseUri + '/status/lista_ativos/';
                    var self = this;
                    $.getJSON(url).then(function (rs) {
                        self.status = rs;
                    });
                },
                get_servicos: function () {
                    var url = baseUri + '/servico/get_json/';
                    var self = this;
                    $.getJSON(url).then(function (rs) {
                        self.servicos = rs;
                    });
                },
                get_tipos: function () {
                    var url = baseUri + '/tipo/lista_ativos/';
                    var self = this;
                    $.getJSON(url).then(function (rs) {
                        self.tipos = rs;
                    });
                },
                filtrar_dados: function () {
                    $('#datatable').DataTable().destroy();
                    $('#grid-resultados').show().promise().done($('#result-splash').show());
                    var self = this;
                    var form = $('#form-relatorio').serialize();
                    var url = baseUri + '/os/normaliza_filtro/';
                    $.post(url, {form: form}, function (dados) {
                        splash_dt();
                        dados = JSON.parse(dados);
                        self.os = dados;
                    }).then(function (dados) {
                        reload_dt_vue();
                        $('#result-splash').hide();
                    });
                },
            },
            created: function () {
                this.get_clientes();
                this.get_tecnicos();
                this.get_fornecedores();
                this.get_status();
                this.get_servicos();
                this.get_tipos();
            }
        });


        $("#vl_parceiro").ionRangeSlider({
            type: "double",
            grid: true,
            drag_interval: true,
            min: 0,
            max: vm.$data.vl_parceiro_max,
            step: 50,
            from: 0,
            to: 5000,
            prefix: "R$",
            onChange: function (data) {
                var vl_p = data.from + ',' + data.max
                $('#valor_parceiro').val(vl_p);
            },
            onStart: function (data) {
                var vl_p = data.from + ',' + data.max
                $('#valor_parceiro').val(vl_p);
            }
        });

        $("#vl_servico").ionRangeSlider({
            type: "double",
            grid: true,
            drag_interval: true,
            min: 0,
            max: vm.$data.vl_servico_max,
            step: 10,
            from: 0,
            to: 5000,
            prefix: "R$",
            onChange: function (data) {
                var vl_s = data.from + ',' + data.max
                $('#valor_servico').val(vl_s);
            },
            onStart: function (data) {
                var vl_s = data.from + ',' + data.max
                $('#valor_servico').val(vl_s);
            }
        });

        $('#grid-resultados').hide();

        $('.dateranges').daterangepicker({
            "autoUpdateInput": false,
            "showWeekNumbers": true,
            "timePickerIncrement": 1,
            "ranges": {
                "Hoje": [
                    moment().subtract(0, 'days').format('DD/MM/YYYY'),
                    moment().format('DD/MM/YYYY')
                ],
                "Ontem": [
                    moment().subtract(1, 'days').format('DD/MM/YYYY'),
                    moment().subtract(1, 'days').format('DD/MM/YYYY')
                ],
                "Últimos 7 Dias": [
                    moment().subtract(1, 'weeks').format('DD/MM/YYYY'),
                    moment().format('DD/MM/YYYY')
                ],
                "Últimos 30 Dias": [
                    moment().subtract(1, 'months').format('DD/MM/YYYY'),
                    moment().format('DD/MM/YYYY')
                ],
                "Ultimo Mês": [
                    moment().subtract(1, 'month').startOf('month').format('DD/MM/YYYY'),
                    moment().subtract(1, 'month').endOf('month').format('DD/MM/YYYY')
                ]
            },
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Filtrar",
                "cancelLabel": "Cancelar",
                "fromLabel": "De",
                "toLabel": "Até",
                "customRangeLabel": "Personalizado",
                "daysOfWeek": [
                    "Do",
                    "Se",
                    "Te",
                    "Qa",
                    "Qi",
                    "Se",
                    "Sa"
                ],
                "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                ]
            },
            "opens": "left",
            "drops": "down",
            "buttonClasses": "btn btn-sm",
            "applyClass": "btn-success",
            "cancelClass": "btn-default"
        });

        $('.dateranges').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
        $('.dateranges').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

    });
</script>
</body>
</html>