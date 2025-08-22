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
    <title>${config_site_title} - ${produto_menu_admin}</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
    <style>
        form .dropify-wrapper .dropify-preview .dropify-render img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /*imagem preenche o input*/
        }

        form .dropify-wrapper {
            border-radius: 10px;
            object-fit: cover;
            width: 100%;
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
        @(admin.layout.topo)
        @(admin.layout.topo-menu)
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gerenciar ${produto_menu_admin}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CRM</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">${produto_menu_admin}</a></li>
                            <li class="breadcrumb-item active">Nova ${produto_singular}</li>
                        </ol>
                    </div>
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a href="${baseUri}/produtos-lista/" data-id="ProdutosAdmin:L" class="btn btn-primary waves-effect waves-light text-white menu-access">
                                <i class="fa fa-arrow-circle-left"></i> ${produto_menu_admin}
                            </a>
                        </h6>
                    </div>
                </div>
                <form autocomplete="off" id="novo-produto" method="post" action="${baseUri}/ProdutosAdmin/gravar/" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header"><i class="text-white fas fa-th-list"></i>
                                </div>
                                <div class="card-body" id="vm">
                                    <div class="content">
                                        <input type="hidden" name="produto_id" id="produto_id" value="${produto_id}">
                                        <section id="produto">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                    <div class="row align-self-center">
                                                        <div class="col-12">
                                                            <input type="file" id="input-file-now-custom-1" name="produto_capa" data-allowed-file-extensions="jpg jpeg png" class="dropify" data-default-file="${produto_capa}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9  col-md-9 col-sm-12">
                                                    <div class="row pt-3">
                                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="produto_titulo">Título da receita
                                                                    <span id="idf-info" class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" name="produto_titulo" id="produto_titulo" class="form-control" value="${produto_titulo}" required placeholder="Informe um título para a receita" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-5">
                                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="produto_categoria">Categoria <span id="idf-info" class="text-danger">*</span></label>
                                                                <select name="produto_categoria" id="produto_categoria" class="form-control" required>
                                                                    <option value="" selected>Selecione uma
                                                                        categoria
                                                                    </option>
                                                                    <option v-for="cat in categorias" :value="cat.categoria_produto_id">
                                                                        {{cat.categoria_produto_nome}}
                                                                    </option>
                                                                    <!--
                                                                    <option value="x">Criar nova categoria</option>
                                                                                -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-xs-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="produto_subcategoria">Subcategoria <span id="idf-info" class="text-danger">*</span></label>
                                                                <select name="produto_subcategoria" id="produto_subcategoria" class="form-control" required>
                                                                    <option value="" selected>
                                                                        Selecione uma
                                                                        subcategoria
                                                                    </option>
                                                                    <option v-for="sub in subcategorias" :value="sub.subcategoria_produto_id">
                                                                        {{sub.subcategoria_produto_nome}}
                                                                    </option>
                                                                    <!--
                                                                    <option value="x">Criar nova subcategoria</option>
                                                                    -->
                                                                </select>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="col-md-2 col-xs-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="produto_status">Ativo ?</label>
                                                                <select class="form-control" name="produto_status" id="produto_status">
                                                                    <option value="1" selected>Sim</option>
                                                                    <option value="0">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-4 pb-1">
                                                <div class="col-12">
                                                    <hr>
                                                    <h4>Descrição</h4>
                                                </div>
                                            </div>
                                            <div class="row py-1">
                                                <div class="col-12">
                                                    <textarea name="produto_texto" id="produto_texto" cols="30" rows="15" class="form-control" maxlength="600">${produto_texto}</textarea>
                                                </div>
                                            </div>
                                                 </section>
                                        <section id="obs">
                                            <div class="col-xs-12 text-center menu-access" data-id="ProdutosAdmin:G">
                                                <div class="mb-3 text-center">
                                                    <br><br>
                                                    <button id="btn-send" type='submit' class="btn btn-primary"><i class="fas fa-check-circle"></i> Gravar Dados
                                                    </button>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @(admin.layout.footer)
    @(admin.produto.modal-novo)
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
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="produto/form.js"></script>
    <script type="text/javascript">
        $('.menu-produtos-cadastrar').addClass('active');
        $('.menu-produtos').addClass('active');
        $('#produto_texto').summernote({
            placeholder: '',
            lang: 'pt-BR',
            minHeight: 150,
            maxHeight: 550,
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
        setTimeout(function() {
            $('#produto_categoria').val('${produto_categoria}');
            if( parseInt('${produto_categoria}')  > 0) {
                $('#produto_categoria').trigger('change');
                setTimeout(function() {
                    $('#produto_subcategoria').val('${produto_subcategoria}');
                },500)
            }
        }, 300);
    </script>
    <script>
        var baseUri = '${baseUri}';
        var app = new Vue({
            el: '#seo',
            data: {
                titulo: '${produto_titulo}',
                desc: '${produto_desc}',
                categorias: null,
                subcategorias: null,
                pagina_url: '${produto_url}',
                cat_url: '${categoria_produto_url}',
                pagina_updated: '${produto_updated}',
                pagina_nome: null,
                img: '',
                link: null,
                categoria_nome: null
            },
            created: function() {
                this.link = baseUri + '/produtos/ver/' + this.cat_url + '/' + this.pagina_url;
            }
        });
        $(document).ready(function() {
            $("#keywords_seo").attr('name', 'produto_keywords');
            $("#pagina_desc").attr('name', 'produto_desc');
            $("#keywords_seo").val('${produto_keywords}');
            $('#keywords_seo').tagsinput({
                confirmKeys: [32],
                delimiter: ',',
            });
        });
    </script>
</body>

</html>