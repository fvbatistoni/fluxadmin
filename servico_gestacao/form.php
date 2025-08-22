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
    <title>${config_site_title} - Gestação e uso de medicamentos</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
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
            height: 350px !important;
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
        <div class="page-wrapper" id="APP" data-url="servico">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gestação e uso de medicamentos</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Cadastros</a></li>
                            <li class="breadcrumb-item"><a href="${baseUri}/servico/">Gestação e uso de medicamentos</a></li>
                            <li class="breadcrumb-item active">Cadastrar / Atualizar</li>
                        </ol>
                    </div>
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px" data-id="Servico:G">
                            <a href="${baseUri}/gestacao/" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-chevron-circle-left"></i> Voltar
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            <!-- Start Page Content -->
            <form autocomplete="off" id="servico" method="post" action="${baseUri}/ServicoGestacao/gravar/" enctype="multipart/form-data">
                <input type="hidden" name="servico_tipo_sessao" id="servico_tipo_sessao" value="2">
                <div class="servico-vue" id="servico">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header"><i class="text-white fas fa-edit"></i>
                                @(admin.layout.seo)
                            </div>
                            <div class="card-body" id="inputs">
                                <div class="content">
                                    <input type="hidden" id="servico_id" name="servico_id" value="${servico_id}">
                                    <input type="hidden" id="servico_iconee" name="servico_icone" value="${servico_icone}">
                                    <section>
                                        <div class="row align-self-center">
                                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 py-3">
                                                <div class="row align-self-center">
                                                    <div class="col-12">
                                                        <input type="file" id="servico_icone" name="servico_icone" <?php if (isset($data['serv']->servico_icone) && !empty($data['serv']->servico_icone)) : ?> data-default-file="${baseUri}/media/servicos/${servico_icone}" <?php endif; ?> data-allowed-file-extensions="jpg jpeg png" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 ">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 ">
                                                        <div class="mb-3">
                                                            <label for="servico_nome">Nome</label>
                                                            <span class="text-danger">*</span>
                                                            <input type="text" name="servico_nome" id="servico_nome" class="form-control" placeholder="Nome do serviço" required value="${servico_nome}" />
                                                        </div>
                                                    </div>
                                                    <div class="d-none col-xl-3 col-lg-4 col-md-12 col-sm-12 align-self-center">
                                                        <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#config_agenda">
                                                            <i class="text-white fas fa-calendar"></i>
                                                            Configuração agenda
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                                        <div class="mb-3">
                                                            <label for="servico_categoria">Indicador de uso</label>
                                                            <span class="text-danger">*</span>
                                                            <select class="form-control" name="servico_indicador_uso" id="servico_indicador_uso">
                                                                <option value="0" selected>
                                                                    Selecione um indicador
                                                                </option>
                                                                <option value="1">Criterioso</option>
                                                                <option value="2">Contraindicado</option>
                                                                <option value="3">Compatível</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                                        <div class="mb-3">
                                                            <label for="servico_categoria">Categoria</label>
                                                            <span class="text-danger">*</span>
                                                            <select class="form-control" name="servico_categoria" id="servico_categoria" required>
                                                                <option value="" disabled="disabled" selected>
                                                                    Selecione uma categoria
                                                                </option>
                                                                <option v-for="cat in categorias" :value="cat.categoria_servico_id">
                                                                    {{cat.categoria_servico_nome}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                                                        <div class="mb-3">
                                                            <label for="servico_subcategoria">Subcategoria</label>
                                                            <span class="text-danger">*</span>
                                                            <select class="form-control" name="servico_subcategoria" id="servico_subcategoria" required>
                                                                <option value="" selected>
                                                                    Selecione uma subcategoria
                                                                </option>
                                                                <option v-for="cat in subcategorias" :value="cat.subcategoria_servico_id">
                                                                    {{cat.subcategoria_servico_nome}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                                                        <div class="mb-3">
                                                            <label for="servico_subcategoria_filha">Subcategoria Secundária</label>
                                                            <select class="form-control" name="servico_subcategoria_filha" id="servico_subcategoria_filha">
                                                                <option value="0" selected>
                                                                    Selecione uma subcategoria secundária
                                                                </option>
                                                                <option v-for="cat in subcategorias_filha" :value="cat.subcategoria_filha_servico_id">
                                                                    {{cat.subcategoria_filha_servico_nome}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                        <label for="servico_desc">Descrição Completa</label>
                                                        <textarea name="servico_desc_full" id="servico_desc_full" class="form-control" maxlength="600">${servico_desc_full}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-5">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="text-white fas fa-save"></i> Gravar Dados
                                            </button>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="config_agenda" tabindex="-1" aria-labelledby="config_agendaLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form autocomplete="off" id="servico" method="post" action="${baseUri}/servico/gravar_agenda/" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="config_agendaLabel">Configuração deste serviço na agenda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="servico_id" name="servico_id" value="${servico_id}">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="servico_nome">Duração em horas</label>
                                        <input type="number" name="servico_duracao" id="servico_duracao" class="form-control" placeholder="Em horas" <?php if (isset($data['serv']->servico_duracao) && !empty($data['serv']->servico_duracao)) : ?> value="${servico_duracao}" <?php else : ?> value="1" <?php endif; ?> />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="cp-container text-left" id="cor_servico-container">
                                        <label>Cor do servico</label>
                                        <div class="input-group" title="Using input value">
                                            <input id="cor_servico" type="text" class="form-control color" name="cor_servico" value="${agenda_servico_cor}" autocomplete="off" />
                                            <div class="">
                                                <span class="colorpicker-input-addon">
                                                    <i id="cor_servicoi"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @(admin.layout.footer)
    </div>
    </div>
    @(admin.layout.modal-remove)
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
    <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="assets/plugins/summernote/dist/lang/summernote-pt-BR.js"></script>
    <script src="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>
    <script src="servico_gestacao/form.js"></script>
    <script type="text/javascript">
        $('#btn-config-seo').hide();
        $('.menu-servico-gestacao').addClass('active');
        var sub = '${servico_subcategoria}';
        var servico_subcategoria_filha = '${servico_subcategoria_filha}';
        var baseUri = '${baseUri}';
        var app = new Vue({
            el: '#seo',
            data: {
                titulo: '${servico_nome}',
                desc: '${servico_desc}',
                categorias: null,
                pagina_url: '${servico_url}',
                pagina_updated: '${servico_updated}',
                pagina_nome: null,
                img: '',
                link: null,
                categoria_nome: null
            },
            created: function() { 
                this.link = baseUri + '/servico/ver/' + this.pagina_url;
            }
        });
        $(document).ready(function() {
            if(sub > 0){
                setTimeout(() => {
                $('#servico_categoria').val('${servico_categoria}').change();
                    setTimeout(() => {
                        $('#servico_subcategoria').val('${servico_subcategoria}').change();
                        if(servico_subcategoria_filha){
                            setTimeout(() => {
                                $('#servico_subcategoria_filha').val(servico_subcategoria_filha).change();
                            }, 600);
                        }

                    }, 600);

                }, 600);
            }
            setTimeout(() => {
                $('#servico_indicador_uso').val('${servico_indicador_uso}').change();
            }, 600);
            $("#keywords_seo").attr('name', 'servico_keywords');
            $("#pagina_desc").attr('name', 'servico_desc');
            $("#keywords_seo").val('${servico_keywords}');
            $('#keywords_seo').tagsinput({
                confirmKeys: [32],
                delimiter: ',',
            });
        });
    </script>
</body>
</html>