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
    <title>${config_site_title} -  ${funcionario_menu_admin}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">${funcionario_menu_admin}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Cadastros</a></li>
                            <li class="breadcrumb-item"><a href="${baseUri}/funcionario/">${funcionario_menu_admin}</a></li>
                            <li class="breadcrumb-item active">Dados</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/funcionario/">
                                <i class="fas fa-chevron-circle-left"></i> Voltar
                            </a>
                        </h6>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Cadastro de Funcionário</span>
                            </div>
                            <div class="card-body">
                                <div class="content">
                                    <div id="btn-group-tipo">
                                        <div class="float-end ">
                                            <div class="btn-group text-right" data-toggle="buttons">
                                                <label class="btn btn-primary btn-tipo-cadastro" data-tipo="pessoa-juridica" data-tipo-v="2">
                                                    <div class="form-check custom-radio">
                                                        <input type="radio" id="r-pessoa-juridica" name="tipo-pessoa" class="form-check-input">
                                                        <label class="form-check-label" for="pessoa-juridica">
                                                            <span class="hidden-xs-down">Pessoa</span> Jurídica
                                                        </label>
                                                    </div>
                                                </label>
                                                <label class="btn btn-primary btn-tipo-cadastro" data-tipo="pessoa-fisica" data-tipo-v="1">
                                                    <div class="form-check custom-radio">
                                                        <input type="radio" id="r-pessoa-fisica" name="tipo-pessoa" class="form-check-input" checked>
                                                        <label class="form-check-label" for="pessoa-fisica">
                                                            <span class="hidden-xs-down">Pessoa</span> Física
                                                        </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <form autocomplete="off" method="post" action="${baseUri}/funcionario/gravar/" enctype="multipart/form-data">
                                        <input type="hidden" name="funcionario_id" value="${funcionario_id}" />
                                        <div class="mb-3 pt-3 ">
                                            <h4 class="separator-line" id="tit_form">Dados Pessoais</h4>
                                            <hr>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <input type="file" id="funcionario_foto" name="funcionario_foto"
                                                 <?php if(!isset($data['funcionario']->funcionario_foto) && empty($data['funcionario']->funcionario_foto)) :?> 
                                                    required<?php endif?>
                                                    <?php if(isset($data['funcionario']->funcionario_foto) && !empty($data['funcionario']->funcionario_foto)) :?> 
                                                     value="${funcionario_foto_url}" data-default-file="${baseUri}/media/funcionario/${funcionario_foto}"<?php endif?>
                                                    data-allowed-file-extensions="jpg jpeg png" class="dropify"  />
                                                <input type="text" hidden id="funcionario_foto_" name="funcionario_foto" value="${funcionario_foto}" />
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="mb-3">
                                                            <label id="label_nome" for="funcionario_nome">Nome Completo</label>
                                                            <span class="text-danger">*</span>
                                                            <input type="text" name="funcionario_nome" id="funcionario_nome" required class="form-control" placeholder="" value="${funcionario_nome}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pessoa-fisica">
                                                    @(admin.funcionario.pessoa-fisica)
                                                </div>
                                                <div id="pessoa-juridica">
                                                    @(admin.funcionario.pessoa-juridica)
                                                </div>

                                            </div>
                                        </div>

                                        <section>
                                            <div>
                                                <br>
                                                <h4 class="separator-line">Dados do funcionário</h4>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_abertura">Abertura</label>      
                                                        <input type="text" name="funcionario_abertura" id="funcionario_abertura" class="form-control datar date-calendar" value="${funcionario_abertura}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_cargo">Cargo</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" name="funcionario_cargo" id="funcionario_cargo" class="form-control" placeholder="informe um cargo" required value="${funcionario_cargo}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_c_contrato">Contrato</label>
                                                        <input type="text" name="funcionario_contrato" id="funcionario_contrato" class="form-control " placeholder="Tipo de contrato" value="${funcionario_contrato}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_abertura">Admissão</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" name="funcionario_admissao" id="funcionario_admissao" class="form-control datar date-calendar" required value="${funcionario_admissao}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_afastamento">Afastamento</label>
                                                        <input type="text" name="funcionario_afastamento" id="funcionario_afastamento" class="form-control datar date-calendar" autocomplete="off" value="${funcionario_afastamento}" placeholder="informe uma data" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_ferias">Férias</label>
                                                        <input type="text" name="funcionario_ferias" id="funcionario_ferias" class="form-control datar date-calendar" autocomplete="off" value="${funcionario_ferias}" placeholder="informe uma data" />
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_abertura">Salário</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" name="funcionario_salario" id="funcionario_salario" class="form-control money" required value="${funcionario_salario}" />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="funcionario_home">Aparece na home? <span id="idf-info" class="text-danger">*</span></label>
                                                        <select name="funcionario_home" id="funcionario_home" class="form-control" required>
                                                            <option disabled="disabled" <?php if ($data['funcionario']->funcionario_home == 0) : ?>selected <?php endif; ?>>Selecione</option>
                                                            <option <?php if ($data['funcionario']->funcionario_home == 1) : ?>selected <?php endif; ?>value="1">Sim</option>
                                                            <option <?php if ($data['funcionario']->funcionario_home == 2) : ?>selected <?php endif; ?> value="2">Não</option>
                                                        </select>
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
                                                        <label for="funcionario_telefone">Telefone Preferencial</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" name="funcionario_telefone" id="funcionario_telefone" class="form-control fone" placeholder="informe um telefone de contato" required value="${funcionario_telefone}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_celular">Telefone Celular</label>
                                                        <input type="text" name="funcionario_celular" id="funcionario_celular" class="form-control fone" placeholder="informe um telefone celular" value="${funcionario_celular}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_celular">WhatsApp</label>
                                                        <input type="text" name="funcionario_whats" id="funcionario_whats" class="form-control fone" placeholder="informe um celular para whatsapp" value="${funcionario_whats}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_email">E-mail Principal</label>
                                                        <span class="text-danger"> *</span>
                                                        &nbsp;&nbsp;<span id="email_error" class="text-danger"></span>
                                                        <input type="email" name="funcionario_email" id="funcionario_email" class="form-control email" autocomplete="off" value="${funcionario_email}" placeholder="informe um endereço de e-mail" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_email">E-mail Secundário</label>
                                                        <input type="email" name="funcionario_email2" id="funcionario_email2" class="form-control email" autocomplete="off" value="${funcionario_email2}" placeholder="informe um endereço de e-mail" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_password">Senha</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="password" name="funcionario_password" id="funcionario_password" class="form-control password" autocomplete="off" <?php if (empty($data['funcionario']->funcionario_id)) : ?> required <?php endif; ?> placeholder="Informe uma senha inicial" />
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
                                                        <label for="funcionario_cep">CEP</label>
                                                        <span id="cep-invalido" class="text-danger"></span>
                                                        <input type="text" name="funcionario_cep" id="funcionario_cep" class="form-control cep" maxlength="9" placeholder="informe o cep" value="${funcionario_cep}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <div class="hide-elems">
                                                            <label for="funcionario_rua">Endereço</label>
                                                            <input type="text" name="funcionario_rua" id="funcionario_rua" class="form-control rua" placeholder="Informe o endereço" value="${funcionario_rua}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-xs-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_num">Número</label>
                                                        <input type="text" name="funcionario_num" id="funcionario_num" class="form-control numero" placeholder="informe o número" value="${funcionario_num}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_bairro">Bairro</label>
                                                        <input type="text" name="funcionario_bairro" id="funcionario_bairro" class="form-control bairro" placeholder="informe o nome do bairro" value="${funcionario_bairro}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_complemento">Complemento</label>
                                                        <input type="text" name="funcionario_complemento" id="funcionario_complemento" class="form-control" placeholder="ex: Sala 5 / Apto 15" value="${funcionario_complemento}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_ref">Ponto de referência</label>
                                                        <input type="text" name="funcionario_ref" id="funcionario_ref" class="form-control" placeholder="ex: próximo ao Hospital Central" value="${funcionario_ref}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_cidade">Cidade</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" name="funcionario_cidade" id="funcionario_cidade" class="form-control cidade" placeholder="informe o nome da cidade" required value="${funcionario_cidade}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="funcionario_uf">UF/Estado</label>
                                                        <input type="text" name="funcionario_uf" id="funcionario_uf" required class="form-control uf" placeholder="Informe o estado ex: SP" value="${funcionario_uf}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 text-center menu-access" data-id="Cliente">
                                                <div class="mb-3 text-center">
                                                    <br />
                                                    <input type="hidden" name="funcionario_tipo" id="funcionario_tipo" value="${funcionario_tipo}" />
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/moment/pt-br.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="app-js/datepicker.js"></script>
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="app-js/main.js"></script>
    <script src="app-js/validacoes.js"></script>
    <script src="${baseUri}/view/admin/app-js/endereco.js"></script>
    <script src="${baseUri}/view/admin/funcionario/form.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.menu-funcionarios').addClass('active');
            if ('${funcionario_id}' != '') {
                $('#btn-group-tipo').remove();
            }
        });
    </script>
</body>

</html>