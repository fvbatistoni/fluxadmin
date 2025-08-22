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
    <title>Técnico | ${config_site_title}</title>
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Técnico</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ordem de Serviço</a></li>
                        <li class="breadcrumb-item"><a href="${baseUri}/tecnico/">Técnicos</a></li>
                        <li class="breadcrumb-item active">Dados</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/tecnico/">
                            <i class="fas fa-arrow-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>
            </div>
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Cadastro do Técnicos</span>
                        </div>
                        <div class="card-body">
                            <div class="content">
                                <form autocomplete="off" method="post" action="${baseUri}/tecnico/gravar/">
                                    <input type="hidden" name="tecnico_id" value="${tecnico_id}"/>

                                    <section>
                                        <section class="clear">
                                            <div class="mb-3">
                                                <h4 class="separator-line">Dados Cadastrais</h4>
                                                <hr>
                                            </div>
                                        </section>
                                        <div class="row">
                                            <div class="col-md-7 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_nome">Nome Completo</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" name="tecnico_nome" id="tecnico_nome"
                                                           class="form-control" required
                                                           placeholder="informe o nome completo"
                                                           value="${tecnico_nome}"/>
                                                </div>
                                            </div>

                                            <div class="col-md-5  col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_cpf">Documento</label>
                                                    <span class="text-danger d-none"> *</span>
                                                    <span id="cnpj_error"></span>
                                                    <input type="text" name="tecnico_documento" id="tecnico_documento"
                                                           class="form-control cpfCnpj"
                                                           placeholder="informe o número do documento"
                                                           value="${tecnico_documento}"/>
                                                </div>
                                            </div>

                                        </div>
                                    </section>

                                    <section>
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Dados de Contato</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_celular">Celular / WhatsApp</label>
                                                    <input type="text" name="tecnico_whats" id="tecnico_whats"
                                                           class="form-control fone"
                                                           value="${tecnico_whats}"
                                                           placeholder="informe um celular para whatsapp"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_telefone">Telefone Preferencial</label>
                                                    <span class="text-danger d-none">*</span>
                                                    <input type="text" name="tecnico_telefone" id="tecnico_telefone"
                                                           class="form-control fone"
                                                           placeholder="informe um telefone de contato"
                                                           value="${tecnico_telefone}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_email">E-mail</label>
                                                    <span class="text-danger d-none"> *</span>
                                                    &nbsp;&nbsp;<span id="email_error" class="text-danger"></span>
                                                    <input type="email" name="tecnico_email" id="tecnico_email"
                                                           class="form-control email" autocomplete="off"
                                                           value="${tecnico_email}"
                                                           placeholder="informe um endereço de e-mail"/>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!--
                                    <section class="d-nones">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Dados Acesso</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_email">E-mail Principal</label>
                                                    <span class="text-danger"> *</span>
                                                    &nbsp;&nbsp;<span id="email_error" class="text-danger"></span>
                                                    <input type="email" name="tecnico_email" id="tecnico_email" class="form-control email" autocomplete="off" value="${tecnico_email}" placeholder="informe um endereço de e-mail" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_password">Senha</label>
                                                    <input type="password" name="tecnico_password" id="tecnico_password" class="form-control password" autocomplete="off" value="" placeholder="Informe uma senha inicial" />
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    -->
                                    <!--
                                    <section>
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Endereço</h4>
                                            <hr>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_cep">CEP</label>
                                                    <span id="cep-invalido" class="text-danger"></span>
                                                    <input type="text" name="tecnico_cep" id="tecnico_cep" class="form-control cep" maxlength="9" placeholder="informe o cep" value="${tecnico_cep}" />
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <div class="hide-elems">
                                                        <label for="tecnico_rua">Endereço</label>
                                                        <input type="text" name="tecnico_rua" id="tecnico_rua" class="form-control rua" placeholder="Informe o endereço" value="${tecnico_rua}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-4 col-xs-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_num">Número</label>
                                                    <input type="text" name="tecnico_num" id="tecnico_num" class="form-control numero" placeholder="informe o número" value="${tecnico_num}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_complemento">Complemento</label>
                                                    <input type="text" name="tecnico_complemento" id="tecnico_complemento" class="form-control" placeholder="ex: Sala 5 / Apto 15" value="${tecnico_complemento}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_ref">Ponto de referência</label>
                                                    <input type="text" name="tecnico_ref" id="tecnico_ref" class="form-control" placeholder="ex: próximo ao Hospital Central" value="${tecnico_ref}" />
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_bairro">Bairro</label>
                                                    <input type="text" name="tecnico_bairro" id="tecnico_bairro" class="form-control bairro" placeholder="informe o nome do bairro" value="${tecnico_bairro}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_cidade">Cidade</label>
                                                    <input type="text" name="tecnico_cidade" id="tecnico_cidade" class="form-control cidade" placeholder="informe o nome da cidade" value="${tecnico_cidade}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="tecnico_uf">UF/Estado</label>
                                                    <input type="text" name="tecnico_uf" id="tecnico_uf" class="form-control uf" placeholder="Informe o estado ex: SP" value="${tecnico_uf}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 text-center menu-access" data-id="Fornecedor:G">
                                            <div class="mb-3 text-center">
                                                <br />
                                                <button type="submit" id="btn-send" class="btn btn-primary"><i class="fas fa-check-circle"></i> Gravar Dados
                                                </button>
                                            </div>
                                        </div>

                                    </section>
                                    -->

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
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- END CALENDAR -->
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<!--<script src="${baseUri}/view/admin/app-js/endereco.js"></script>-->
<script src="${baseUri}/view/admin/app-js/validacoes.js"></script>
<script type="text/javascript">
    $('.menu-tecnico').addClass('active');
</script>
</body>

</html>