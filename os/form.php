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
    <title>${config_site_title} - O.S</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="container-fluid">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Dados da O.S</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="${baseUri}/os/">Ordem de Serviço</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Registrar / Atualizar O.S</a>
                        </li>
                        <li class="breadcrumb-item active">Dados</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                <!-- Top Right Info -->
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/os/"
                           title="Voltar para Consulta de OS" data-toggle="tooltip"
                        >
                            <i class="fas fa-arrow-circle-left"></i> Voltar
                        </a>

                        <a class="btn btn-info waves-effect waves-light text-light"
                           href="${baseUri}/os/anexo/id/${os_id}/"
                           id="btn-anexos"
                           title="anexar arquivos nesta OS" data-toggle="tooltip">
                            <i class="fas fa-folder-open"></i> Anexos
                        </a>

                    </h6>
                </div>

                @(admin.layout.topo-info)
            </div>

            <!-- Start Page Content -->
            <div class="row" id="vm">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Dados da O.S</span>
                        </div>
                        <div class="card-body">

                            <div class="content">
                                <form autocomplete="off" method="post" action="${baseUri}/os/gravar/">
                                    <input type="hidden" name="os_id" id="os_id" value="${os_id}">

                                    <section id="os">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Ordem de serviço</h4>
                                            <hr>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_identificacao">Identificação
                                                        <span id="idf-info" class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="os_identificacao" id="os_identificacao"
                                                           class="form-control" value="${os_identificacao}" required
                                                           placeholder="Informe uma identificação"/>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_servico">Tipo de Imóvel<span
                                                                class="text-danger"> *</span></label>
                                                    <select required class="form-control" name="os_tipo" id="os_tipo">
                                                        <option value="">Selecione um tipo...</option>
                                                        <option v-for="tpo in tipos" :value="tpo.id">{{tpo.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_servico">Tipo de Avaliação<span class="text-danger"> *</span></label>
                                                    <select required class="form-control" name="os_servico"
                                                            id="os_servico">
                                                        <option value="">Selecione um serviço...</option>
                                                        <option v-for="srv in servicos" :value="srv.id">{{srv.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_nf">Retificação</label>
                                                    <select class="form-control" name="os_retifica" id="os_retifica">
                                                        <option value="">Selecione uma opção...</option>
                                                        <option value="2" selected>Não</option>
                                                        <option value="1">Sim</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_cliente">Cliente</label>
                                                    <span class="text-danger"> *</span>
                                                    <select name="os_cliente" id="os_cliente" class="form-control"
                                                            required>
                                                        <option value=""> Selecione um cliente</option>
                                                        <option v-for="cliente in clientes" :value="cliente.id">
                                                            {{cliente.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_proponente">Proponente</label>
                                                    <input type="text" name="os_proponente" id="os_proponente"
                                                           class="form-control" value="${os_proponente}"
                                                           placeholder="Informe um proponente"/>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_contato">Contato para Vistoria</label>
                                                    <input type="text" name="os_contato" id="os_contato"
                                                           class="form-control" value="${os_contato}"
                                                           placeholder="Informe um contato"/>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_status">Status da OS<span
                                                                class="text-danger"> *</span></label>
                                                    <select required class="form-control" name="os_status"
                                                            id="os_status">
                                                        <option value="">Selecione um status</option>
                                                        <option v-for="st in status" :value="st.id">{{st.nome}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_nf">Emite NF</label>
                                                    <select class="form-control" name="os_nf" id="os_nf" required>
                                                        <option value="">Selecione uma opção...</option>
                                                        <option value="1">Sim</option>
                                                        <option value="2">Não</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-9 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_nfnum">
                                                        Número NF
                                                    </label>
                                                    <span class="float-end d-none">
                                                            <small><i class="fa fa-exclamation-circle"></i>   NF's separados por ; (ponto e vírgula)</small>
                                                        </span>
                                                    <input type="text" name="os_nfnum" id="os_nfnum"
                                                           class="form-control" value="${os_nfnum}"
                                                           data-role="tagsinput"
                                                           placeholder="Número de NF. Você pode informar mais de um número."/>
                                                </div>
                                            </div>
                                        </div>


                                    </section>


                                    <section id="enderecos">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Endereço da execução da O.S</h4>
                                            <hr>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-2 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_cep">CEP <span class="text-danger">*</span></label>
                                                    <span id="cep-invalido" class="text-danger"></span>
                                                    <input type="text" name="os_cep" id="os_cep"
                                                           class="form-control cep" maxlength="9"
                                                           placeholder="Informe o cep"
                                                           value="${os_cep}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <div class="hide-elems">
                                                        <label for="os_rua">Endereço</label>
                                                        <span class="text-danger"> *</span>
                                                        <input type="text" name="os_rua" id="os_rua"
                                                               value="${os_rua}" required
                                                               class="form-control rua"
                                                               placeholder="Informe o endereço"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-xs-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_num">Número</label>
                                                    <span class="text-danger"> *</span>
                                                    <input type="text" name="os_num" id="os_num"
                                                           value="${os_num}"
                                                           class="form-control numero"
                                                           placeholder="Informe o número" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_complemento">Complemento</label>
                                                    <input type="text" name="os_complemento"
                                                           value="${os_complemento}"
                                                           id="os_complemento"
                                                           class="form-control"
                                                           placeholder="ex: Sala 5 / Apto 15"/>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">



                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_bairro">Bairro</label>
                                                    <span class="text-danger"> *</span>
                                                    <input type="text" name="os_bairro" id="os_bairro"
                                                           value="${os_bairro}" required
                                                           class="form-control bairro"
                                                           placeholder="Informe o nome do bairro"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_cidade">Cidade</label>
                                                    <span class="text-danger"> *</span>
                                                    <input type="text" name="os_cidade" id="os_cidade"
                                                           value="${os_cidade}" required
                                                           class="form-control cidade"
                                                           placeholder="Informe o nome da cidade"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_uf">UF/Estado</label>
                                                    <span class="text-danger"> *</span>
                                                    <input type="text" name="os_uf" id="os_uf"
                                                           value="${os_uf}" required
                                                           class="form-control uf"
                                                           placeholder="Informe o estado ex: SP"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_ref">Ponto de referência</label>
                                                    <input type="text" name="os_ref" id="os_ref"
                                                           value="${os_ref}"
                                                           class="form-control"
                                                           placeholder="ex: próximo ao Hospital Central"/>
                                                </div>
                                            </div>

                                        </div>

                                    </section>
                                    <section id="prestador">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Prestador de Serviço</h4>
                                            <hr>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_executor">Executado por </label>
                                                    <select name="os_executor" id="os_executor" class="form-control">
                                                        <option value="">Selecione um Técnico</option>
                                                        <option v-for="tecnico in tecnicos" :value="tecnico.id">
                                                            {{tecnico.nome}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_vistoriador">Vistoriador Parceiro </label>
                                                    <select name="os_fornecedor" id="os_fornecedor" class="form-control">
                                                        <option value="">Selecione um Parceiro</option>
                                                        <option v-for="dt in fornecedor" :value="dt.id">{{dt.nome}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_rs_vistoriador">Valor
                                                        Parceiro<strong>(R$)</strong></label>
                                                    <input type="text" name="os_vl_fornecedor" id="os_vl_fornecedor"
                                                           value="${os_vl_fornecedor}" class="form-control moeda"
                                                           placeholder=""/>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="os_vl_servico">Valor Serviço
                                                        <strong>(R$)</strong></label>
                                                    <input type="text" name="os_vl_servico" id="os_vl_servico"
                                                           value="${os_vl_servico}" class="form-control moeda"
                                                           placeholder=""/>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section id="datas">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Datas</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-12">
                                                <div class="mb-3">
                                                    <label for="os_dt_solicitacao">Data de Solicitação</label>
                                                    <span class="text-danger"> *</span>
                                                    <input type="text" name="os_dt_solicitacao" id="os_dt_solicitacao"
                                                           value="${os_dt_solicitacao}"
                                                           class="form-control  date-calendar" autocomplete="off"
                                                           required/>
                                                </div>
                                            </div>
                                            <div class="col col-xs-12">
                                                <div class="mb-3">
                                                    <label for="os_prazo">Prazo de Entrega</label>
                                                    <input type="text" name="os_prazo" id="os_prazo"
                                                           value="${os_prazo}"
                                                           class="form-control date-calendar" autocomplete="off"/>
                                                </div>
                                            </div>


                                            <div class="col col-xs-12">
                                                <div class="mb-3">
                                                    <label for="os_dt_visita">Data de Vistoria</label>
                                                    <input type="text" name="os_dt_visita" id="os_dt_visita"
                                                           value="${os_dt_visita}"
                                                           class="form-control date-calendar" autocomplete="off"/>
                                                </div>
                                            </div>

                                            <div class="col col-xs-12">
                                                <div class="mb-3">
                                                    <label for="os_dt_entrega">Data de Entrega</label>
                                                    <input type="text" name="os_dt_entrega" id="os_dt_entrega"
                                                           value="${os_dt_entrega}"
                                                           class="form-control date-calendar" autocomplete="off"/>
                                                </div>
                                            </div>

                                            <div class="col col-xs-12">
                                                <div class="mb-3">
                                                    <label for="os_dt_finalizado">Data de Finalização</label>
                                                    <input type="text" name="os_dt_finalizado" id="os_dt_finalizado"
                                                           value="${os_dt_finalizado}"
                                                           class="form-control  date-calendar" autocomplete="off"/>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section id="obs">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Observações</h4>
                                            <hr>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="os_comentario">Comentário da OS</label>
                                                <textarea class="form-control" name="os_comentario" id="os_comentario"
                                                          cols="10" rows="5">${os_comentario}</textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="os_comentario_financeiro">Comentário Financeiro</label>
                                                <textarea class="form-control" name="os_comentario_financeiro"
                                                          id="os_comentario_financeiro" cols="10" rows="5">${os_comentario_financeiro}</textarea>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-xs-12 text-center menu-access" data-id="Os:G">
                                            <div class="mb-3 text-center">
                                                <div class="bg-danger" id="anexo-new-info">
                                                    <h5 class="text-light p-2">
                                                        <i class="fa fa-exclamation-triangle"></i> <strong>ATENÇÃO</strong><br>
                                                        Você poderá anexar documentos e arquivos após gravar os dados da
                                                        OS.
                                                    </h5>
                                                </div>
                                                <br/>
                                                <button type="submit" id="btn-send" class="btn btn-primary"><i
                                                            class="fas fa-check-circle"></i> Gravar Dados
                                                </button>
                                            </div>
                                        </div>

                                    </section>
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
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- CALENDAR JS -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/moment/pt-br.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="app-js/datepicker.js"></script>
<!-- CALENDAR -->
<script src="app-js/main.js"></script>
<script src="app-js/endereco.js"></script>
<script src="app-js/validacoes.js"></script>
<script src="os/form.js?v=2"></script>
<script type="text/javascript">
    $('.menu-os').addClass('active');
    if ('${os_id}' == '') {
        $('#btn-anexos').remove();
    }else{
        $('#anexo-new-info').remove();
    }

    setTimeout(function () {
        $('#os_executor').val('${os_executor}');
        $('#os_cliente').val('${os_cliente}');
        $('#os_tipo').val('${os_tipo}');
        $('#os_servico').val('${os_servico}');
        $('#os_retifica').val('${os_retifica}');
        $('#os_nf').val('${os_nf}');
        $('#os_status').val('${os_status}');
        if ('${os_status}' == '') {
            $('#os_status').val(2);
        }
        $('#os_fornecedor').val('${os_fornecedor}');
    }, 1000);
</script>
</body>
</html>