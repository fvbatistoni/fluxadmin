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
    <title>${config_site_title} - Blog</title>
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
    <!--<link href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet"> -->
    <link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
</head>
<style>



</style>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar Blog</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                            <li class="breadcrumb-item active">Gerenciar Blog</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/blog-lista/" data-id="BlogAdmin:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> Posts
                            </a>
                        </h6>
                    </div>
                </div>

                <!-- Start Page Content -->
                <form autocomplete="off" id="novo-post" method="post" action="${baseUri}/BlogAdmin/gravar/" enctype="multipart/form-data">
                <div class="row" >
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-th-list"></i>
                            @(admin.layout.seo)
                        </div>
                            <div class="card-body" id="vm">
                                <div class='content'>
                                        <input type="hidden" name="blog_id" id="blog_id" value="${blog_id}">
                                        <section id="blog">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="blog_titulo">Título do Post
                                                            <span id="idf-info" class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="blog_titulo" id="blog_titulo" class="form-control" value="${blog_titulo}" required placeholder="Informe um título para o post" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="blog_autor">Autor do Post
                                                           
                                                        </label>
                                                        <input type="text" name="blog_autor" id="blog_autor" class="form-control" value="${blog_autor}" placeholder="Informe o nome de um ou vários autores" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="blog_data">Data do Post <span id="idf-info" class="text-danger">*</span></label>
                                                        <input type="text" name="blog_data" id="blog_data" value="${blog_data}" class="form-control date-calendar" autocomplete="off" required="required" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4 col-sm-12">
                                                    <div class="mb-3">
                                                    <span class="float-end" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle"></i>
                                                        Ajuda</span>
                                                        <label for="blog_autor">Link do post no Facebook</label>
                                                        <input type="text" name="blog_link_fb" id="blog_link_fb" class="form-control" value="${blog_link_fb}" placeholder="Informe o link do post no Facebook" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="blog_categoria">Categoria <span id="idf-info" class="text-danger">*</span></label>
                                                        <select name="blog_categoria" id="blog_categoria" class="form-control" required>
                                                            <option disabled="disabled" selected>Selecione uma categoria</option>
                                                            <option v-for="cat in categorias" :value="cat.categoria_blog_id">{{cat.categoria_blog_nome}}</option>
                                                            <option value="x">Criar nova categoria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-sm-12 d-none">
                                                    <div class="mb-3">
                                                        <label for="blog_status">Post ativo?</label>
                                                        <select class="form-control" name="blog_status" id="blog_status">
                                                            <option value="1" selected>Sim</option>
                                                            <option value="0">Não</option>
                                                        </select>
                                                    </div>
                                                </div>
                                              
                                                <!-- <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="mb-3">
                                                    <label class="float-end"><i class="fa fa-info-circle"></i> Palavras chaves separadas por espaço</label>
                                                        <label for="blog_keywords">Palavras chave </label>
                                                        <input type="text" id="blog_keywords" name="blog_keywords" class="form-control" value="${blog_keywords}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xs-8 col-sm-12">
                                                    <label for="blog_desc">Descrição breve</label>
                                                    <input name="blog_desc" id="blog_desc" class="form-control" maxlength="600" value="${blog_desc}">
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <h4 class="separator-line">Texto</h4>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <textarea name="blog_texto" id="blog_texto" cols="30" rows="15" class="form-control" maxlength="600">${blog_texto}</textarea>
                                                </div>
                                            </div>
                                            <div class="row pt-5">
                                                <div class="col-md-12">
                                                    <h4 class="separator-line">Imagem</h4>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <input type="file" id="input-file-now-custom-1" name="blog_capa" data-allowed-file-extensions="jpg jpeg png" class="dropify" data-default-file="${blog_capa}" />
                                                </div>
                                            </div>
                                        </section>
                                        <section id="obs">
                                            <div class="col-xs-12 text-center menu-access" data-id="BlogAdmin:G">
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sobre os comentários</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Caso você tenha postado sobre o assunto no Facebook, adicione o link dele. Os comentários feitos na postagem aparecerão aqui.</p>
                               
                                <img src="${baseUri}/media/admin/exemplo.jpg" width="100%">
                                <p>
                                <b class="text-danger">IMPORTANTE: A moderação desses comentários deve ser feita apenas no Facebook.</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
            </div>
            <!-- Footer import-->
            @(admin.layout.footer)
            @(admin.blog.modal-nova)
            <!-- End Footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
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
    <!--TEXTO-->
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <!--TEXTO-->
    <script src="assets/js/vue.min.js"></script>
    <!--
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.pt-BR.js"></script>
    -->
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>

    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="blog/form.js"></script>
    <script type="text/javascript">
        $('.menu-blog').addClass('active');
        $('.menu-conteudo').addClass('active');
        $('.menu-post').addClass('active');
        
        $(document).ready(function() {
            $('#servico_cor').val('${servico_cor}');

            $('#blog_texto').summernote({
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
            /*
            $('#blog_texto').wysihtml5({
                locale: "pt-BR",
                "font-styles": true,
                "emphasis": true,
                "lists": true,
                "html": false,
                "link": false,
                "image": false,
                "color": false
            });
            */
        });
        setTimeout(function() {
            $('#blog_categoria').val('${blog_categoria}');
        }, 300);
    </script>

<script>
    var baseUri = '${baseUri}';
    var app = new Vue({
        el: '#seo',
        data: {
            titulo: '${blog_titulo}',
            desc: '${blog_desc}',
            categorias: null,
            cat_url: '${categoria_blog_url}',
            pagina_url: '${blog_url}',
            pagina_updated: '${blog_updated}',
            pagina_nome: null,
            img: '',
            link: null,
            categoria_nome: null
        },
        created: function() {
            this.link = baseUri + '/blog/ler/' + this.cat_url + '/' + this.pagina_url;
        }
    });

    $(document).ready(function() {
        $("#pagina_desc").attr('name','blog_desc');
        $("#keywords_seo").attr('name','blog_keywords');
        $("#keywords_seo").val('${blog_keywords}');
        $('#keywords_seo').tagsinput({
            confirmKeys: [32],
            delimiter: ',',
        });
     
    });
</script>
</body>

</html>