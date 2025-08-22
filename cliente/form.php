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
    <title>${config_site_title} - ${cliente_menu_admin}</title>
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
                    <h3 class="text-themecolor m-b-0 m-t-0"> ${cliente_menu_admin}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Cadastros</a></li>
                        <li class="breadcrumb-item"><a href="${baseUri}/cliente/"> ${cliente_menu_admin}</a></li>
                        <li class="breadcrumb-item active">Dados</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/cliente/">
                            <i class="fas fa-chevron-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>
            </div>
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Cadastro do Cliente</span>
                        </div>
                        <div class="card-body">

                            <div class="content">
                                <div id="btn-group-tipo">
                                    <div class="float-end ">
                                        <div class="btn-group text-right" data-toggle="buttons">

                                            <label class="btn btn-primary btn-tipo-cadastro" data-tipo="pessoa-juridica"
                                                   data-tipo-v="2">
                                                <div class="form-check custom-radio">
                                                    <input type="radio" id="r-pessoa-juridica" name="tipo-pessoa"
                                                           class="form-check-input">
                                                    <label class="form-check-label" for="pessoa-juridica">
                                                        <span class="hidden-xs-down">Pessoa</span> Jurídica
                                                    </label>
                                                </div>
                                            </label>
                                            <label class="btn btn-primary btn-tipo-cadastro" data-tipo="pessoa-fisica"
                                                   data-tipo-v="1">
                                                <div class="form-check custom-radio">
                                                    <input type="radio" id="r-pessoa-fisica" name="tipo-pessoa"
                                                           class="form-check-input" checked>
                                                    <label class="form-check-label" for="pessoa-fisica">
                                                        <span class="hidden-xs-down">Pessoa</span> Física
                                                    </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <form autocomplete="off" method="post" action="${baseUri}/cliente/gravar/">
                                    <input type="hidden" name="cliente_id" id="cliente_id" value="${cliente_id}"/>
                                    <div class="mb-3 pt-3 ">
                                        <h4 class="separator-line" id="tit_form">Dados Pessoais</h4>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="mb-3">
                                                <label id="label_nome" for="cliente_nome">Nome Completo</label>
                                                <span class="text-danger">*</span>
                                                <input type="text" name="cliente_nome" id="cliente_nome" required
                                                       class="form-control" placeholder="" value="${cliente_nome}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-8 col-sm-12">
                                            <div id="pessoa-fisica">
                                                @(admin.cliente.pessoa-fisica)
                                            </div>
                                            <div id="pessoa-juridica">
                                                @(admin.cliente.pessoa-juridica)
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
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_telefone">Telefone Preferencial</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" name="cliente_telefone" id="cliente_telefone"
                                                           class="form-control fone"
                                                           placeholder="informe um telefone de contato"
                                                           value="${cliente_telefone}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_celular">Telefone Celular</label>
                                                    <input type="text" name="cliente_celular" id="cliente_celular"
                                                           class="form-control fone"
                                                           placeholder="informe um telefone celular"
                                                           value="${cliente_celular}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_celular">WhatsApp</label>
                                                    <input type="text" name="cliente_whats" id="cliente_whats"
                                                           class="form-control fone"
                                                           placeholder="informe um celular para whatsapp"
                                                           value="${cliente_whats}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="cliente_email">E-mail Principal</label>
                                                    <span class="text-danger"> *</span>
                                                    &nbsp;&nbsp;<span id="email_error" class="text-danger"></span>
                                                    <input type="email" name="cliente_email" id="cliente_email"
                                                           class="form-control email" autocomplete="off"
                                                           value="${cliente_email}"
                                                           placeholder="informe um endereço de e-mail" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_email">E-mail Secundário</label>
                                                    <input type="email" name="cliente_email2" id="cliente_email2"
                                                           class="form-control email" autocomplete="off"
                                                           value="${cliente_email2}"
                                                           placeholder="informe um endereço de e-mail"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_password">Senha</label>
                                                    <input type="password" name="cliente_password" id="cliente_password"
                                                           class="form-control password"
                                                           autocomplete="off"
                                                           placeholder="Informe uma senha inicial"/>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <section>
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Endereço</h4>
                                            <hr>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_cep">CEP</label>
                                                    <span id="cep-invalido" class="text-danger"></span>
                                                    <input type="text" name="cliente_cep" id="cliente_cep"
                                                           class="form-control cep" maxlength="9"
                                                           placeholder="informe o cep" value="${cliente_cep}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <div class="hide-elems">
                                                        <label for="cliente_rua">Endereço</label>
                                                        <input type="text" name="cliente_rua" id="cliente_rua"
                                                               class="form-control rua" placeholder="Informe o endereço"
                                                               value="${cliente_rua}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xs-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_num">Número</label>
                                                    <input type="text" name="cliente_num" id="cliente_num"
                                                           class="form-control numero" placeholder="informe o número"
                                                           value="${cliente_num}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_bairro">Bairro</label>
                                                    <input type="text" name="cliente_bairro" id="cliente_bairro"
                                                           class="form-control bairro"
                                                           placeholder="informe o nome do bairro"
                                                           value="${cliente_bairro}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_complemento">Complemento</label>
                                                    <input type="text" name="cliente_complemento"
                                                           id="cliente_complemento" class="form-control"
                                                           placeholder="ex: Sala 5 / Apto 15"
                                                           value="${cliente_complemento}"/>
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_ref">Ponto de referência</label>
                                                    <input type="text" name="cliente_ref" id="cliente_ref"
                                                           class="form-control"
                                                           placeholder="ex: próximo ao Hospital Central"
                                                           value="${cliente_ref}"/>
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_cidade">Cidade</label>
                                                    <input type="text" name="cliente_cidade" id="cliente_cidade"
                                                           class="form-control cidade"
                                                           placeholder="informe o nome da cidade"
                                                           value="${cliente_cidade}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="cliente_uf">UF/Estado</label>
                                                    <input type="text" name="cliente_uf" id="cliente_uf"
                                                           class="form-control uf" placeholder="Informe o estado ex: SP"
                                                           value="${cliente_uf}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 text-center menu-access" data-id="Cliente">
                                            <div class="mb-3 text-center">
                                                <br/>
                                                <input type="hidden" name="cliente_tipo" id="cliente_tipo"
                                                       value="${cliente_tipo}"/>
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
<script src="app-js/datepicker.js"></script>
<!-- END CALENDAR -->
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="assets/plugins/jquery.mask.min.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="${baseUri}/view/admin/app-js/endereco.js"></script>
<script src="${baseUri}/view/admin/app-js/validacoes.js"></script>
<script src="${baseUri}/view/admin/cliente/form.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.menu-cliente').addClass('active');
        $('.menu-gerenciar').addClass('active');
    });
    if ('${cliente_id}' != '') {
        $('#btn-group-tipo').remove();
    }
</script>
</body>

</html>