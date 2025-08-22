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
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} - Contato</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
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
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Contato e Endereço</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Configurações</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Contato</a></li>
                        <li class="breadcrumb-item active">Contato e Endereço</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
            </div>

            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-globe"></i></div>
                        <div class="card-body">

                            <form method="post" action="${baseUri}/configuracao/gravarContato/return/contato/">
                                <input type="hidden" name="contato_id" value="1">

                                <section class="content">
                                    <div>
                                        <br>
                                        <h4 class="separator-line">Contato</h4>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_email">Email Principal</label>
                                                <span class="text-danger">*</span>
                                                <input type="email" name="contato_email" id="contato_email"
                                                       class="form-control" placeholder="Informe um email" required
                                                       value="${contato_email}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_email">Emails adicionais</label>
                                                <label class="float-end"><i class="fa fa-info-circle"></i> Emails
                                                    separados por espaço</label>

                                                <input type="text" name="contato_emails" id="emails"
                                                       class="form-control" value="${contato_emails}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_tell1">Telefone Principal</label>
                                                <input type="text" name="contato_tell1" id="contato_tell1"
                                                       placeholder="Informe um telefone" class="form-control fone"
                                                       value="${contato_tell1}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_tell2">Telefone Secundário</label>
                                                <input type="text" name="contato_tell2" id="contato_tell2"
                                                       class="form-control fone" placeholder="informe um telefone"
                                                       value="${contato_tell2}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <br>
                                        <h4 class="separator-line">Mensageiro Instantâneo</h4>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_whatsapp">Whatsapp</label>
                                                <input type="text" name="contato_whatsapp" id="contato_whatsapp"
                                                       class="form-control fone"
                                                       placeholder="Informe telefone whatsapp" value="${contato_whatsapp}"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_telegram">Telegram</label>
                                                <input type="text" name="contato_telegram" id="contato_telegram"
                                                       class="form-control"
                                                       placeholder="Informe usuário telegram" value="${contato_telegram}"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <br>
                                        <h4 class="separator-line">Endereço</h4>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_cep">CEP</label>
                                                <span id="cep-invalido" class="text-danger"></span>
                                                <input type="text" name="contato_cep" id="contato_cep"
                                                       class="form-control cep" maxlength="9" required
                                                       placeholder="Informe o cep" value="${contato_cep}"
                                                       onblur="completaEndereco(this.value)"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <div class="hide-elems">
                                                    <label for="contato_rua">Endereço</label>
                                                    <input type="text" name="contato_rua" id="contato_rua"
                                                           class="form-control rua" placeholder="Informe o endereço"
                                                           value="${contato_rua}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="cliente_num">Número</label>
                                                <input type="text" name="contato_numero" id="contato_numero"
                                                       class="form-control numero" placeholder="informe o número"
                                                       required value="${contato_numero}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_bairro">Bairro</label>
                                                <input type="text" name="contato_bairro" id="contato_bairro"
                                                       class="form-control bairro"
                                                       placeholder="informe o nome do bairro"
                                                       value="${contato_bairro}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_cidade">Cidade</label>
                                                <input type="text" name="contato_cidade" id="contato_cidade"
                                                       class="form-control cidade"
                                                       placeholder="informe o nome da cidade"
                                                       value="${contato_cidade}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_uf">UF/Estado</label>
                                                <input type="text" name="contato_uf" id="contato_uf"
                                                       class="form-control uf" placeholder="Informe o estado ex: SP"
                                                       value="${contato_uf}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_complemento">Complemento</label>
                                                <input type="text" name="contato_complemento" id="contato_complemento"
                                                       class="form-control" placeholder="ex: Sala 5 / Apto 15"
                                                       value="${contato_complemento}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="contato_ref">Ponto de referência</label>
                                                <input type="text" name="contato_ref" id="contato_ref"
                                                       class="form-control"
                                                       placeholder="ex: próximo ao Hospital Central"
                                                       value="${contato_ref}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <div class="mb-3 text-center">
                                            <br/>
                                            <button type="submit" id="btn-send" class="btn btn-primary"><i
                                                        class="fas fa-check-circle"></i> Atualizar Dados
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
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
</body>

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
<script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="assets/js/custom.min.js"></script>
<!-- Style switcher -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- PRINCIPAL JS -->
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="${baseUri}/view/admin/app-js/endereco.js"></script>
<script type="text/javascript">
    $('.menu-contato').addClass('active');
    $('.menu-endereco').addClass('active');
    $('#emails').tagsinput({
        confirmKeys: [32],
        delimiter: ',',
    });
</script>
</html>