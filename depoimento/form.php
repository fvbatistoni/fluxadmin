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
    <title>${config_site_title} - ${depoimento_menu_admin}</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
    <style>
        form .dropify-wrapper .dropify-preview .dropify-render img {
            width: 100%;
            height: 100%;
            border-radius: 66%;
            border: 0px;
            /*imagem preenche o input*/
        }
       span.colorpicker-input-addon i {
            width: 50px !important;
            min-height: 38px !important;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
        }
        form .dropify-wrapper {
            border-radius: 10px;
            object-fit: cover;
            width: 100%;
            height: 330px !important;
        }
        form .dropify-wrapper {
            border-radius: 10px;
            object-fit: cover;
            width: 200px;
            height: 200px !important;
        }
    </style>
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar  ${depoimento_menu_admin}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> ${depoimento_menu_admin}</a></li>
                        <li class="breadcrumb-item active">Gerenciar  ${depoimento_menu_admin}</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                @(admin.layout.topo-info)
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a href="${baseUri}/depoimento-lista/" data-id="Depoimento:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                            <i class="fa fa-arrow-circle-left"></i>  ${depoimento_menu_admin}
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
                            <div class="content">
                                <form autocomplete="off" id="depoimento" method="post" action="${baseUri}/depoimento/gravar/" enctype="multipart/form-data">

                                <input type="hidden" name="depoimento_id" id="depoimento_id" value="${depoimento_id}">
                                    <section id="depoimento">

                                        <div class="row">

                                            <!--<div class="col-md-12">
                                                <div class="row">
                                                <div class="col-md-4">&nbsp;</div>
                                                <div class="col-md-3 text-center">
                                                    <input type="file" id="depoimento_avatar" name="depoimento_avatar"
                                                    @IF(depoimento_avatar != '')
                                                    data-default-file="${baseUri}/media/depoimento/${depoimento_avatar}"
                                                    @ENDIF
                                                    data-allowed-file-extensions="jpg jpeg png" />
                                                </div>
                                                <div class="col-md-4"></div>
                                                <br><br><br><br>
                                                </div>
                                                <br><br>
                                            </div>-->

                                            <div class="col-md-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="autor_depoimento">Autor do Depoimento
                                                        <span id="idf-info" class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="depoimento_nome" id="depoimento_nome"
                                                           class="form-control" value="${depoimento_nome}" required
                                                           placeholder="Informe o nome do autor"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="depoimento_profissao">Profissão do Autor
                                                    </label>
                                                    <input type="text" name="depoimento_profissao" id="depoimento_profissao"
                                                           class="form-control" value="${depoimento_profissao}"
                                                           placeholder="Informe a profissão do autor"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="depoimento_status">Depoimento ativo?</label>
                                                    <select class="form-control" name="depoimento_status" id="depoimento_status">
                                                        <option value="1">Sim</option>
                                                        <option value="0">Não</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <textarea name="depoimento_texto" id="depoimento_texto" rows="8" class="form-control" maxlength="600">${depoimento_texto}</textarea>
                                                </div>
                                            </div>

                                    </section>

                                    <section id="obs">
                                        <div class="col-xs-12 text-center menu-access" data-id="Depoimento:G">
                                            <div class="mb-3 text-center">
                                                <br><br>
                                                <button id="btn-send" class="btn btn-primary"><i
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
<script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="assets/plugins/jquery.mask.min.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<!-- PRINCIPAL JS -->
<!-- CALENDAR JS -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/moment/pt-br.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="app-js/datepicker.js"></script>
<!-- CALENDAR -->

<!--TEXTO-->
<script src="assets/js/vue.min.js"></script>
<script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>

<script type="text/javascript">
$(document).ready(function() {
            $('.menu-depoimento').addClass('active');
            $('.menu-cliente').addClass('active');
            setTimeout(() => {
            $('.wysihtml5-sandbox').addClass('editor_texto');

            $('#depoimento_texto').wysihtml5({
                locale: "pt-BR",
                "font-styles": true,
                "emphasis": true,
                "lists": true,
                "html": false,
                "link": false,
                "image": false,
                "color": false
            });
        }, 500);

            var drEvent = $(".dropify").dropify();
            drEvent.on("dropify.afterClear", function (event, element) {
                $("#depoimento_avatar").val("");
            });

            $("#depoimento_avatar").dropify({
                messages: {
                    default:
                        "<div>Clique aqui para selecionar um arquivo </div>",
                    replace:
                        "<div>Clique em remover para selecionar um novo arquivo </div>",
                    remove: "Remover",
                    error: "Ocorreu um erro ao alterar o arquivo",
                },
                error: {
                    fileSize: "O tamanho máximo permitido é de: ({{ value }}).",
                    minWidth: "The image width is too small ({{ value }}}px min).",
                    maxWidth: "The image width is too big ({{ value }}}px max).",
                    minHeight: "The image height is too small ({{ value }}}px min).",
                    maxHeight: "The image height is too big ({{ value }}px max).",
                    imageFormat: "Os formatos de imagem permitidos são: ({{ value }}).",
                    fileExtension: "As extensões permitidas são: ({{ value }}).",
                },
            });
        });
        $('#depoimento_status').val('${depoimento_status}')
</script>
</body>
</html>