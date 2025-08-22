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
    <title>Fornecedor | ${config_site_title}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
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
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">
        <!-- TOPO import -->
        @(admin.layout.topo)
        <!-- MENU import -->
        @(admin.layout.topo-menu)
        <!-- Page wrapper  -->
        <div class="page-wrapper" id="APP" data-url="fornecedor">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Fornecedores</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Cadastros</a></li>
                            <li class="breadcrumb-item"><a href="${baseUri}/fornecedor/">Fornecedores</a></li>
                            <li class="breadcrumb-item active">Dados</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/fornecedor/">
                                <i class="fas fa-arrow-circle-left"></i> Voltar
                            </a>
                        </h6>
                    </div>
                </div>

                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Cadastro do Fornecedor</span>
                            </div>
                            <div class="card-body">

                                <div class="content">

                                    <form autocomplete="off" method="post" action="${baseUri}/fornecedor/gravar/">
                                        <input type="hidden" name="fornecedor_id" value="${fornecedor_id}" />

                                        <section>


                                            <section class="clear">
                                                <div class="mb-3">
                                                    <h4 class="separator-line">Dados Cadastrais</h4>
                                                    <hr>
                                                </div>
                                            </section>
                                            <div class="row">
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_nome">Nome / Razão</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" name="fornecedor_nome" id="fornecedor_nome" class="form-control" placeholder="informe o nome ou razão social" value="${fornecedor_nome}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4  col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_cpf">Documento</label>
                                                        <span class="text-danger d-none"> *</span>
                                                        <span id="cnpj_error"></span>
                                                        <input type="text" name="fornecedor_documento" id="fornecedor_documento" class="form-control cpfCnpj exit-cnpj" placeholder="informe o número do seu CPF / CNPJ" value="${fornecedor_documento}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_responsavel">Contato ou Responsável</label>
                                                        <input type="text" name="fornecedor_responsavel" id="fornecedor_responsavel" class="form-control" placeholder="informe de um contato ou responsável" value="${fornecedor_responsavel}" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_profissao">Profissão</label>
                                                        <span class="text-danger">*</span>
                                                        <select name="fornecedor_profissao" id="fornecedor_profissao" data-live-search="true" class="form-control" required>
                                                            <option value="" data-icon="fa fa-building">Selecione uma profissão...
                                                            </option>
                                                            <option value="CAU" data-icon="fa fa-building">CAU</option>
                                                            <option value="CREA" data-icon="fa fa-building">CREA</option>
                                                            <!--option v-for="bc in bancos" :value="bc.id">{{bc.nome}}</option-->
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_crea">Número do CREA/CAU</label>
                                                        <input type="text" name="fornecedor_crea" id="fornecedor_crea" class="form-control" placeholder="informe o valor do seu CREA/CAU" value="${fornecedor_crea}" />
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
                                                        <label for="fornecedor_telefone">Telefone Preferencial</label>
                                                        <span class="text-danger d-none">*</span>
                                                        <input type="text" name="fornecedor_telefone" id="fornecedor_telefone" class="form-control fone" placeholder="informe um telefone de contato" value="${fornecedor_telefone}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_celular">Telefone Celular</label>
                                                        <input type="text" name="fornecedor_celular" id="fornecedor_celular" class="form-control fone" placeholder="informe um telefone celular" value="${fornecedor_celular}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_celular">WhatsApp</label>
                                                        <input type="text" name="fornecedor_whats" id="fornecedor_whats" class="form-control fone" placeholder="informe um celular para whatsapp" value="${fornecedor_whats}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_email">E-mail Principal</label>
                                                        <span class="text-danger d-none"> *</span>
                                                        &nbsp;&nbsp;<span id="email_error" class="text-danger"></span>
                                                        <input type="email" name="fornecedor_email" id="fornecedor_email" class="form-control email" autocomplete="off" value="${fornecedor_email}" placeholder="informe um endereço de e-mail" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_email">E-mail Secundário</label>
                                                        <input type="email" name="fornecedor_email2" id="fornecedor_email2" class="form-control email" autocomplete="off" value="${fornecedor_email2}" placeholder="informe um endereço de e-mail" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_password">Senha</label>
                                                        <input type="password" name="fornecedor_password" id="fornecedor_password" class="form-control password" autocomplete="off" value="" placeholder="Informe uma senha inicial" />
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
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_cep">CEP</label>
                                                        <span id="cep-invalido" class="text-danger"></span>
                                                        <input type="text" name="fornecedor_cep" id="fornecedor_cep" class="form-control cep" maxlength="9" placeholder="informe o cep" value="${fornecedor_cep}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <div class="hide-elems">
                                                            <label for="fornecedor_rua">Endereço</label>
                                                            <input type="text" name="fornecedor_rua" id="fornecedor_rua" class="form-control rua" placeholder="Informe o endereço" value="${fornecedor_rua}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4 col-xs-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_num">Número</label>
                                                        <input type="text" name="fornecedor_num" id="fornecedor_num" class="form-control numero" placeholder="informe o número" value="${fornecedor_num}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_complemento">Complemento</label>
                                                        <input type="text" name="fornecedor_complemento" id="fornecedor_complemento" class="form-control" placeholder="ex: Sala 5 / Apto 15" value="${fornecedor_complemento}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_ref">Ponto de referência</label>
                                                        <input type="text" name="fornecedor_ref" id="fornecedor_ref" class="form-control" placeholder="ex: próximo ao Hospital Central" value="${fornecedor_ref}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_bairro">Bairro</label>
                                                        <input type="text" name="fornecedor_bairro" id="fornecedor_bairro" class="form-control bairro" placeholder="informe o nome do bairro" value="${fornecedor_bairro}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_cidade">Cidade</label>
                                                        <input type="text" name="fornecedor_cidade" id="fornecedor_cidade" class="form-control cidade" placeholder="informe o nome da cidade" value="${fornecedor_cidade}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_uf">UF/Estado</label>
                                                        <input type="text" name="fornecedor_uf" id="fornecedor_uf" class="form-control uf" placeholder="Informe o estado ex: SP" value="${fornecedor_uf}" />
                                                    </div>
                                                </div>
                                            </div>

                                        </section>


                                        <section>

                                            <div>
                                                <br>
                                                <h4 class="separator-line">Dados Bancários</h4>
                                                <hr>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-4 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_banco">Banco</label>
                                                        <span class="text-danger">*</span>
                                                        <select name="fornecedor_banco" id="fornecedor_banco" data-live-search="true" class="form-control select3 sselectpicker" required>
                                                            <option value="" data-icon="fa fa-building">Selecione um
                                                                banco...
                                                            </option>
                                                            <option v-for="bc in bancos" :value="bc.id">{{bc.nome}}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_agencia">Agência</label>
                                                        <span class="text-danger"></span>
                                                        <input type="text" name="fornecedor_agencia" id="fornecedor_agencia" class="form-control" placeholder="Número da Agência" value="${fornecedor_agencia}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_numero_conta">Número da conta</label>
                                                        <span class="text-danger"></span>
                                                        <input type="text" name="fornecedor_numero_conta" id="fornecedor_numero_conta" class="form-control" placeholder="Conta e Dígito" value="${fornecedor_numero_conta}" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-4 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_tipo_conta">Tipo de conta</label>
                                                        <span class="text-danger">*</span>
                                                        <select name="fornecedor_tipo_conta" id="fornecedor_tipo_conta" data-live-search="true" class="form-control select3 sselectpicker" required>
                                                            <option value="" data-icon="fa fa-building">Selecione um tipo
                                                            </option>
                                                            <option value="1" data-icon="fa fa-building">Conta corrente</option>
                                                            <option value="2" data-icon="fa fa-building">Conta poupança</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="fornecedor_obs">Observações</label>
                                                        <input type="text" name="fornecedor_obs" id="fornecedor_obs" class="form-control" placeholder="Observações" value="${fornecedor_obs}" />
                                                    </div>
                                                </div>

                                            </div>
                                        </section>


                                        <section>
                                            <div class="col-xs-12 text-center menu-access" data-id="Fornecedor:G">
                                                <div class="mb-3 text-center">
                                                    <br />
                                                    <button type="submit" id="btn-send" class="btn btn-primary"><i class="fas fa-check-circle"></i> Gravar Dados
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
    <!-- CALENDAR JS -->
    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/moment/pt-br.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- END CALENDAR -->
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="app-js/main.js"></script>
    <script src="app-js/endereco.js"></script>
    <script src="app-js/validacoes.js"></script>
    <script src="fornecedor/form.js?v=3"></script>
    <script type="text/javascript">
        $('.menu-fornecedor').addClass('active');

        $(document).ready(() => {
            $("#fornecedor_tipo_conta").val("${fornecedor_tipo_conta}"); 
            setTimeout(() => $("#fornecedor_banco").val("${fornecedor_banco}"), 750 );
            
            $("#fornecedor_profissao").val('${fornecedor_profissao}')
        })
    </script>
</body>

</html>