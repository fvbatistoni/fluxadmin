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
    <title>${config_site_title} - Eventos</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Dados do Evento</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="${baseUri}/evento/">Eventos</a></li>
                        <li class="breadcrumb-item active">Dados</li>
                    </ol>
                </div>
                <!-- Top Right Info -->
                <!-- Top Right Info -->
                <div class="col-md-7 col-4 align-self-center">
                    <h6 class="float-end" style="padding-top: 20px">
                        <a class="btn btn-primary waves-effect waves-light" href="${baseUri}/evento"
                           title="Voltar para Eventos" data-toggle="tooltip">
                            <i class="fas fa-arrow-circle-left"></i> Voltar
                        </a>
                    </h6>
                </div>

                @(admin.layout.topo-info)
            </div>

            <!-- Start Page Content -->
            <div class="row" id="vm">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header text-white"><i class=" fas fa-edit"></i> <span class="hidden-sm-up">Dados do Evento</span>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form autocomplete="off" method="post" action="${baseUri}/evento/gravar/"
                                      enctype="multipart/form-data">
                                    <input type="hidden" name="evento_id" id="evento_id" value="${evento_id}">
                                    <section id="evento">
                                        <div>
                                            <br>
                                            <h4 class="separator-line">Evento</h4>
                                            <hr>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="evento_titulo">Título do evento
                                                        <span id="idf-info" class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="evento_titulo" id="evento_titulo"
                                                           class="form-control" value="${evento_titulo}" required
                                                           placeholder="Informe um título para o evento"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="evento_status">Evento ativo ?</label>
                                                    <select class="form-control" name="evento_status"
                                                            id="evento_status">
                                                        <option value="1" selected>Sim</option>
                                                        <option value="0">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="evento_status">Evento Valor</label>
                                                    <input type="text" class="form-control money" name="evento_valor"
                                                           id="evento_valor" value="${evento_valor}">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="evento_status">Evento Vagas</label>
                                                    <input type="text" class="form-control" name="evento_vagas"
                                                           id="evento_vagas" value="${evento_vagas}">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-3 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="evento_inicio">Início do evento <span
                                                                class="text-danger">*</span></label>
                                                    <input type="text" name="evento_inicio" id="evento_inicio"
                                                           value="${evento_inicio}" required
                                                           class="form-control  date-calendar" autocomplete="off"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-3 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="evento_fim">Final do evento</label>
                                                    <input type="text" name="evento_fim" id="evento_fim"
                                                           value="${evento_fim}" class="form-control date-calendar"
                                                           autocomplete="off"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6 col-sm-12">
                                                <label for="evento_desc">Descrição breve</label>
                                                <input name="evento_desc" id="evento_desc" class="form-control"
                                                       maxlength="600" value="${evento_desc}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="separator-line">Descrição</h4>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <textarea name="evento_texto" id="evento_texto" cols="30" rows="5"
                                                          class="form-control"
                                                          maxlength="600">${evento_texto}</textarea>
                                            </div>
                                            <div class="col-md-12 pt-4">
                                                <h4 class="separator-line">Imagem</h4>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <input type="file" id="input-file-now-custom-1" name="evento_img_capa"
                                                       data-allowed-file-extensions="jpg jpeg png" class="dropify"
                                                       data-default-file="${evento_img_capa}"/>
                                            </div>
                                    </section>
                                    <section id="obs">
                                        <div class="col-xs-12 text-center menu-access" data-id="Evento:G">
                                            <div class="mb-3 text-center">
                                                <br><br>
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
<script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
<script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
<script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script src="app-js/main.js"></script>
<script src="app-js/validacoes.js"></script>
<script src="evento/form.js"></script>
<script type="text/javascript">
    $('.menu-conteudo, .menu-evento').addClass('active');
    $(document).ready(function () {
            $('#evento_texto').summernote({
            placeholder: '',
            lang: 'pt-BR',
            minHeight: 550,
            maxHeight: 950,
            disableDragAndDrop: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
                ['size', ['paragraph', 'height', 'fontsize']],
                //['table', ['table']],
                ['misc', ['undo', 'redo']],
                ['insert', ['link', 'picture', 'video','hr']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
    });
</script>
</body>

</html>