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
    <title>${config_site_title} - Páginas</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
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
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        @(admin.layout.topo)
        @(admin.layout.topo-menu)
        <div class="page-wrapper" id="APP" data-url="servico">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Páginas</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Páginas</a></li>
                            <li class="breadcrumb-item active">Gerenciar Páginas</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/pagina-lista/" data-id="PaginaAdmin:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> Voltar
                            </a>
                        </h6>
                    </div>
                </div>
                <form autocomplete="off" id="novo-página" method="post" action="${baseUri}/PaginaAdmin/gravar/" enctype="multipart/form-data">
                    <div class="card card-outline-primary">
                        <div class="card-header"><i class="text-white fas fa-edit"></i>
                            @(admin.layout.seo)
                        </div>
                        <div class="card-body" id="vm">
                            <div class="content">
                                <input type="hidden" name="pagina_id" id="pagina_id" value="${pagina_id}">
                                <section id="pagina">
                                    <div class="row">
                                        <div class="col-md-6  col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <span class="float-end" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i>
                                                    Ajuda</span>
                                                <label for="pagina_titulo">Título da página
                                                    <span id="idf-info" class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="pagina_titulo" id="pagina_titulo" class="form-control" value="${pagina_titulo}" required placeholder="Informe um título para o página" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="pagina_categoria">Categoria <span id="idf-info" class="text-danger">*</span></label>
                                                <select name="pagina_categoria" id="pagina_categoria" class="form-control" required>
                                                    <option disabled="disabled" value="" selected>Selecione uma categoria</option>
                                                    <option v-for="cat in categorias" :value="cat.categoria_pagina_id">{{cat.categoria_pagina_nome}}</option>
                                                    <option value="x">Criar nova categoria</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="col-md-12">
                                            <h4 class="separator-line">Imagem</h4>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <input type="file" id="input-file-now-custom-1" name="pagina_capa" data-allowed-file-extensions="jpg jpeg png" class="dropify" <?php if (empty($data['pagina']->pagina_capa)) : ?> requireds <?php endif; ?> data-default-file="${pagina_capa}" />
                                        </div>
                                        -->
                                        <div class="col-md-3 col-xs-12 col-sm-12 d-none" id="sbcateg">
                                            <div class="mb-3">
                                                <label for="pagina_subcategoria">Subcategoria </label>
                                                <select name="pagina_subcategoria" id="pagina_subcategoria" class="form-control">
                                                    <option value="" selected>Selecione uma subcategoria</option>
                                                    <option v-for="cat in subcategorias" :value="cat.subcategoria_pagina_id">{{cat.subcategoria_pagina_nome}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-md-12">
                                            <label for="pagina_texto">Conteúdo <span id="idf-info" class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <div class="mb-3">
                                                <textarea name="pagina_texto" id="pagina_texto" rows="40" required class="form-control">${pagina_texto}</textarea>
                                            </div>
                                        </div>
                                </section>
                                <section id="obs">
                                    <div class="col-xs-12 text-center menu-access" data-id="PaginaAdmin:G">
                                        <div class="mb-3 text-center">
                                            <br><br>
                                            <button id="btn-send" class="btn btn-primary"><i class="fas fa-check-circle"></i> Gravar Dados
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sobre as páginas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>As páginas do seu site são dividas em categorias e serão mostradas no menu e rodapé.</p>
                        <img src="${baseUri}/media/admin/exemplo.png" width="100%">
                        <p class="pt-3">
                            Você pode exibir sua categoria no menu do topo e/ou rodapé atrávez do menu <a href="${baseUri}/pagina-categoria"> Páginas > Categorias</a>
                        </p>
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
    @(admin.pagina.modal-nova)
    <!-- End Page wrapper  -->
    </div>
</body>

<script>
    var categoria_edit = parseInt('${pagina_categoria}');
    var sub_cat_id = parseInt('${pagina_subcategoria}');
</script>
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
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- This is data table -->
<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables.net/js/dataTables.rowReorder.min.js"></script>
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<!-- start - This is for export functionality only -->
<script src="assets/plugins/jquery.mask.min.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<!-- PRINCIPAL JS -->
<!-- CALENDAR JS -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/moment/pt-br.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="app-js/datepicker.js"></script>
<!-- CALENDAR -->
<script src="assets/js/vue.min.js"></script>
<!--TEXTO-->
<script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
<script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script src="${baseUri}/view/admin/app-js/datatable.js"></script>
<script src="${baseUri}/view/admin/app-js/main.js"></script>
<script src="pagina/form.js"></script>
<script type="text/javascript">
    $('.menu-pagina').addClass('active');
    $('.menu-conteudo').addClass('active');
    $('.menu-pagina-gerenciar').addClass('active');
    setTimeout(function() {
        $('#pagina_categoria').val('${pagina_categoria}');
    }, 350);
    $('#pagina_texto').summernote({
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
            ['table', ['table']],
            ['misc', ['undo', 'redo']],
            ['insert', ['link', 'picture', 'video','hr']],
            ['view', ['fullscreen', 'codeview']],
        ]
    });
</script>

<script>
    var baseUri = '${baseUri}';
    var app = new Vue({
        el: '#seo',
        data: {
            titulo: '${pagina_titulo}',
            desc: '${pagina_desc}',
            categorias: null,
            cat_url: '${categoria_pagina_url}',
            pagina_url: '${pagina_url}',
            pagina_updated: '${pagina_updated}',
            pagina_nome: null,
            img: '',
            link: null,
            categoria_nome: null
        },
        created: function() {
            this.link = baseUri + '/pagina/' + this.cat_url + '/' + this.pagina_url;
        }
    });

    $(document).ready(function() {
        $("#keywords_seo").attr('name', 'pagina_keywords');
        $("#pagina_desc").attr('name', 'pagina_desc');
        $("#keywords_seo").val('${pagina_keywords}');
        $('#keywords_seo').tagsinput({
            confirmKeys: [32],
            delimiter: ',',
        });
    });
</script>

</html>