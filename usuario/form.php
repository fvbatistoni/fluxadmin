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
    <title>${config_site_title} - Usuário</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #form .dropify-wrapper .dropify-preview .dropify-render img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /*imagem preenche o input*/
        }

        #form .dropify-wrapper {
            display: block;
            position: relative;
            cursor: pointer;
            border-radius: 5px;
            object-fit: cover;
            width: 240px;
            height: 239px;
            overflow: hidden;
            max-width: 100%;
            padding: 5px 10px;
            font-size: 14px;
            line-height: 22px;
            color: #777;
            background-color: #FFF;
            text-align: center;
            border: 2px solid #E5E5E5;
            -webkit-transition: border-color .15s linear;
            transition: border-color .15s linear
        }

        .select2-results__options[id*="select2-usuario_permissao"] .select2-results__option {
            color: #333;
        }

        .select2-selection__choice__remove {
            color: #ffffff !important;
        }

        .select2-selection__choice {
            font-family: "Poppins", sans-serif !important;
            background-color: #1e88e5 !important;
            padding: 10px;
            color: #ffffff;
            font-weight: 400;
            border-radius: 4px;
            font-size: 100%;
        }
    </style>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Usuários</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Configurações</a></li>
                            <li class="breadcrumb-item"><a href="${baseUri}/usuario/">Usuários</a></li>
                            <li class="breadcrumb-item active">Cadastro</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/usuario/">
                                <i class="fas fa-chevron-circle-left"></i> Voltar
                            </a>
                        </h6>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Cadastro do Usuário</span>
                            </div>
                            <div class="card-body">
                                <div class="content">
                                    <div class="row pt-4">
                                        <div class="col-lg-2 col-md-6 col-sm-12 ">
                                            <form method="post" id="form" action="${baseUri}/usuario/avatar_upload/" enctype="multipart/form-data">
                                                <input type="hidden" name="usuario_id" value="${usuario_id}" />
                                                <div class="row">
                                                    <div class="col-12 pl-4">
                                                        <input type="file" id="input-file-now-custom-1" name="avatar" data-allowed-file-extensions="png jpeg jpg" class="dropify" data-default-file="${baseUri}/media/avatar/${usuario_avatar}" />
                                                    </div>
                                                </div>
                                                <div class="row pt-4">
                                                    <div class="col-12">
                                                        <button type="submit" id="up_avatar" class="btn btn-primary btn-block"><i class="fas fa-check-circle"></i> Atualizar Avatar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-10 col-md-6 col-sm-12">
                                            <form autocomplete="off" method="post" action="${baseUri}/usuario/gravar/" enctype="multipart/form-data">
                                                <input type="hidden" name="usuario_id" value="${usuario_id}" />
                                                <section>
                                                    <div>
                                                      
                                                        <h4 class="separator-line">Dados de Usuário</h4>
                                                        <hr>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="usuario_nome">Nome</label>
                                                                <span class="text-danger"> *</span>
                                                                <input type="text" name="usuario_nome" id="usuario_nome" class="form-control" placeholder="informe o nome do usuário" value="${usuario_nome}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="usuario_email">E-mail</label>
                                                                <span class="text-danger"> *</span>
                                                                &nbsp;&nbsp;<span id="email_error" class="text-danger"></span>
                                                                <input type="email" name="usuario_email" id="usuario_email" class="form-control email" autocomplete="off" value="${usuario_email}" placeholder="informe um endereço de e-mail" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3" autocomplete="off">
                                                                <label for="usuario_password">Senha</label>
                                                                <span class="text-danger" id="pass-required"> *</span>
                                                                <input type="text" name="usuario_pass" id="usuario_pass" class="form-control" autocomplete="off" value="" placeholder="Informe uma senha" required />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mb-3 pt-4">
                                                        <label for="usuario_level">Permissões de Acesso</label>

                                                        <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" name="usuario_permissao[]" id="usuario_permissao" required data-placeholder="Selecione as permissões de acesso">
                                                            <optgroup label="Administrador">
                                                                <option value="*">Total - Admin</option>
                                                            </optgroup>
                                                            <optgroup label="Módulo Clientes">
                                                                <option value="Cliente:L">Cliente Leitura</option>
                                                                <option value="Cliente:*">Cliente Total</option>
                                                            </optgroup>
                                                            <optgroup label="Módulo Serviços">
                                                                <option value="Servico:L">Servico Leitura</option>
                                                                <option value="Servico:*">Servico Total</option>
                                                            </optgroup>
                                                            <optgroup label="Módulo Usuários">
                                                                <option value="Usuario:*">Usuario Total</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <p class="text-center">
                                                    <br><br>
                                                    <button class="btn btn-primary"><i class="fa fa-save"></i> Gravar
                                                        Dados
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                        </section>
                                        </form>
                                    </div>
                                </div>
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
    <!-- <script src="assets/js/jquery.slimscroll.js"></script> -->
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
    <script src="app-js/datepicker.js"></script>
    <!-- END CALENDAR -->
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="${baseUri}/view/admin/app-js/endereco.js"></script>
    <script src="${baseUri}/view/admin/app-js/validacoes.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/usuario/form.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#up_avatar").hide();
        });

        $("#input-file-now-custom-1").change(function() {

            $("#up_avatar").fadeIn('slow');
        })

        drEvent = $('#input-file-now-custom-1').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            $("#up_avatar").fadeIn('slow');
        });
        $('.menu-cadastro').addClass('active');
        if ('${usuario_id}' != '') {
            // $('#pass-required').removeClass('text-danger').addClass('text-muted').html('</br><small class="text-muted float-end"> <i class="fa fa-exclamation-circle"></i> Preencha apenas se desejar mudar a senha</small>');
            $('#usuario_pass').removeAttr('required');
            $('#usuario_pass').attr('placeholder', 'Preencha apenas se desejar mudar a senha');
        }
        $('#usuario_level').val('${usuario_level}');

        var perms = "${usuario_permissao}";
        $('#usuario_permissao').val(perms.split(','));
        $(".select2").select2({
            multiple: true,
            placeholder: 'Selecione as permissões de acesso'
        })

        setTimeout(function() {
            $('#usuario_pass').attr('type', 'password');
        }, 500);

        $('.dropify').dropify({
            messages: {
                default: 'Clique aqui para selecionar uma imagem',
                replace: 'Clique em remover para selecionar uma nova imagem',
                remove: 'Remover',
                error: 'Ocorreu um erro ao alterar a imagem'
            },
            error: {
                'fileSize': 'O tamanho máximo permitido é de: ({{ value }}).',
                'minWidth': 'The image width is too small ({{ value }}}px min).',
                'maxWidth': 'The image width is too big ({{ value }}}px max).',
                'minHeight': 'The image height is too small ({{ value }}}px min).',
                'maxHeight': 'The image height is too big ({{ value }}px max).',
                'imageFormat': 'Os formatos de imagem permitidos são: ({{ value }}).',
                'fileExtension': 'As extensões permitidas são: ({{ value }}).'
            }
        });
    </script>
    <script type="text/javascript">
    $('.menu-usuario').addClass('active');
</script>
</body>

</html>