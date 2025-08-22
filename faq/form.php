<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="${baseUri}/view/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="${config_site_description}">
    <meta name="author" content="${config_site_author}">
    <meta name="keywords" content="${config_site_keywords}">
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>${config_site_title} - ${faq_menu_admin}</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar ${faq_menu_admin}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"> ${faq_menu_admin}</a></li>
                            <li class="breadcrumb-item active">Gerenciar ${faq_menu_admin}</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/faq-lista" data-id="FaqAdmin:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> Perguntas
                            </a>
                        </h6>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row" id="vm">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-th-list"></i></div>
                            <div class="card-body">
                                <div class=''>
                                    <form autocomplete="off" id="novo-post" method="post" action="${baseUri}/FaqAdmin/gravar/" enctype="multipart/form-data">
                                        <input type="hidden" name="faq_id" id="faq_id" value="${faq_id}">
                                        <section id="faq">
                                            <div class="row">
                                                <div class="col-md-8 col-lg-8 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="faq_titulo">Pergunta
                                                            <span id="idf-info" class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="faq_titulo" id="faq_titulo" class="form-control" value="${faq_titulo}" required placeholder="Informe a pergunta" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="faq_categoria">Categoria <span id="idf-info" class="text-danger">*</span></label>
                                                        <select name="faq_categoria" id="faq_categoria" class="form-control" required>
                                                            <option disabled="disabled" selected>Selecione uma categoria
                                                            </option>
                                                            <option v-for="cat in categorias" :value="cat.categoria_faq_id">
                                                                {{cat.categoria_faq_nome}}
                                                            </option>
                                                            <option value="x">Criar nova categoria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <label>Resposta / Texto</label>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <textarea name="faq_texto" id="faq_texto" cols="30" required rows="15" class="form-control" maxlength="600">${faq_texto}</textarea>
                                                </div>
                                            </div>
                                        </section>
                                        <section id="obs">
                                            <div class="col-xs-12 text-center menu-access" data-id="FaqAdmin:G">
                                                <div class="mb-3 text-center">
                                                    <br><br>
                                                    <button id="btn-send" class="btn btn-primary"><i class="fas fa-check-circle"></i> Gravar Dados
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
            </div>
            @(admin.layout.footer)
        </div>
        @(admin.faq.modal-nova)
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/popper/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/moment/pt-br.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="app-js/datepicker.js"></script>
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.pt-BR.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="faq/form.js"></script>
    <script type="text/javascript">
        $('.menu-conteudo').addClass('active');
        $('.menu-faq-gerenciar').addClass('active');
        $('.menu-faq').addClass('active');
        $(document).ready(function() {
            $('#faq_texto').wysihtml5({
                locale: "pt-BR",
                "font-styles": true,
                "emphasis": true,
                "lists": true,
                "html": false,
                "link": false,
                "image": false,
                "color": false
            });
        });
        setTimeout(function() {
            $('#faq_categoria').val('${faq_categoria}');
        }, 300);
    </script>
</body>

</html>