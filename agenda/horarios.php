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
    <title>${config_site_title} - Agenda </title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css
" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="agenda/index.css" rel="stylesheet">
    <!--CALENDAR -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="assets/plugins/fullcalendar/main.css" rel="stylesheet">
    </script>
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">



    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>

    <![endif]-->
    <style>
        span.colorpicker-input-addon i {
            width: 50px !important;
            min-height: 38px !important;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
        }

        label.form-check-label {
            font-size: 110%;
        }

        @media (max-width: 600px) {

            label.form-check-label {
                font-size: 100%;
            }
        }

        #semana {
            text-align: justify;
            top: 35px;

        }

        .selecionado {
            background-color: mediumseagreen;
            color: white;
        }

        .selecionado [type="checkbox"]:checked+label:before {
            top: -4px;
            left: -5px;
            width: 12px;
            height: 22px;
            border-top: 2px solid transparent;
            border-left: 2px solid transparent;
            border-right: 2px solid #fff;
            border-bottom: 2px solid #fff;
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
        }

        .fix {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 25px;
            z-index: 1000;
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Seus Horários</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Agenda</a></li>
                            <li class="breadcrumb-item active">Seus Horários</li>
                        </ol>
                    </div>
                    <!-- Top Right Info -->
                    @(admin.layout.topo-info)
                    <div class="col-md-7 col-4 align-self-center">
                        <h6 class="float-end" style="padding-top: 20px">
                            <a class="btn btn-primary waves-effect waves-light menu-access" data-id="Cliente:G" href="${baseUri}/agenda">
                                <i class="fa fa-calendar-minus"></i> Voltar</span>
                            </a>
                        </h6>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row" id="vm">
                    <form action="${baseUri}/ConfigAgenda/gravar/" method="post">
                        <div class="row">
                            <div class=" col-xl-9 col-lg-8 col-md-7 col-sm-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-outline-primary ">
                                            <div class="card-header text-white">Dias Disponíveis</div>
                                            <div class="card-body">


                                                <div class="row pt-4 ">
                                                    <div class="col-3 align-self-center text-center d-none d-xl-inline-block">
                                                        <svg version="1.1" viewBox="0 0 60 60" width="100px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <title />
                                                            <desc />
                                                            <defs />
                                                            <g fill="none" fill-rule="evenodd" id="People" stroke="none" stroke-width="1">
                                                                <g fill="#000000" id="Icon-2">
                                                                    <path d="M17.707,43.293 C17.316,42.902 16.684,42.902 16.293,43.293 L15,44.586 L13.707,43.293 C13.316,42.902 12.684,42.902 12.293,43.293 C11.902,43.684 11.902,44.316 12.293,44.707 L13.586,46 L12.293,47.293 C11.902,47.684 11.902,48.316 12.293,48.707 C12.488,48.902 12.744,49 13,49 C13.256,49 13.512,48.902 13.707,48.707 L15,47.414 L16.293,48.707 C16.488,48.902 16.744,49 17,49 C17.256,49 17.512,48.902 17.707,48.707 C18.098,48.316 18.098,47.684 17.707,47.293 L16.414,46 L17.707,44.707 C18.098,44.316 18.098,43.684 17.707,43.293 L17.707,43.293 Z M27.707,43.293 C27.316,42.902 26.684,42.902 26.293,43.293 L25,44.586 L23.707,43.293 C23.316,42.902 22.684,42.902 22.293,43.293 C21.902,43.684 21.902,44.316 22.293,44.707 L23.586,46 L22.293,47.293 C21.902,47.684 21.902,48.316 22.293,48.707 C22.488,48.902 22.744,49 23,49 C23.256,49 23.512,48.902 23.707,48.707 L25,47.414 L26.293,48.707 C26.488,48.902 26.744,49 27,49 C27.256,49 27.512,48.902 27.707,48.707 C28.098,48.316 28.098,47.684 27.707,47.293 L26.414,46 L27.707,44.707 C28.098,44.316 28.098,43.684 27.707,43.293 L27.707,43.293 Z M47.707,33.293 C47.316,32.902 46.684,32.902 46.293,33.293 L45,34.586 L43.707,33.293 C43.316,32.902 42.684,32.902 42.293,33.293 C41.902,33.684 41.902,34.316 42.293,34.707 L43.586,36 L42.293,37.293 C41.902,37.684 41.902,38.316 42.293,38.707 C42.488,38.902 42.744,39 43,39 C43.256,39 43.512,38.902 43.707,38.707 L45,37.414 L46.293,38.707 C46.488,38.902 46.744,39 47,39 C47.256,39 47.512,38.902 47.707,38.707 C48.098,38.316 48.098,37.684 47.707,37.293 L46.414,36 L47.707,34.707 C48.098,34.316 48.098,33.684 47.707,33.293 L47.707,33.293 Z M37.707,23.293 C37.316,22.902 36.684,22.902 36.293,23.293 L35,24.586 L33.707,23.293 C33.316,22.902 32.684,22.902 32.293,23.293 C31.902,23.684 31.902,24.316 32.293,24.707 L33.586,26 L32.293,27.293 C31.902,27.684 31.902,28.316 32.293,28.707 C32.488,28.902 32.744,29 33,29 C33.256,29 33.512,28.902 33.707,28.707 L35,27.414 L36.293,28.707 C36.488,28.902 36.744,29 37,29 C37.256,29 37.512,28.902 37.707,28.707 C38.098,28.316 38.098,27.684 37.707,27.293 L36.414,26 L37.707,24.707 C38.098,24.316 38.098,23.684 37.707,23.293 L37.707,23.293 Z M44,27 L46,27 L46,25 L44,25 L44,27 Z M48,28 C48,28.552 47.552,29 47,29 L43,29 C42.448,29 42,28.552 42,28 L42,24 C42,23.448 42.448,23 43,23 L47,23 C47.552,23 48,23.448 48,24 L48,28 Z M34,47 L36,47 L36,45 L34,45 L34,47 Z M38,44 L38,48 C38,48.552 37.552,49 37,49 L33,49 C32.448,49 32,48.552 32,48 L32,44 C32,43.448 32.448,43 33,43 L37,43 C37.552,43 38,43.448 38,44 L38,44 Z M34,37 L36,37 L36,35 L34,35 L34,37 Z M38,38 C38,38.552 37.552,39 37,39 L33,39 C32.448,39 32,38.552 32,38 L32,34 C32,33.448 32.448,33 33,33 L37,33 C37.552,33 38,33.448 38,34 L38,38 Z M24,37 L26,37 L26,35 L24,35 L24,37 Z M28,38 C28,38.552 27.552,39 27,39 L23,39 C22.448,39 22,38.552 22,38 L22,34 C22,33.448 22.448,33 23,33 L27,33 C27.552,33 28,33.448 28,34 L28,38 Z M24,27 L26,27 L26,25 L24,25 L24,27 Z M28,28 C28,28.552 27.552,29 27,29 L23,29 C22.448,29 22,28.552 22,28 L22,24 C22,23.448 22.448,23 23,23 L27,23 C27.552,23 28,23.448 28,24 L28,28 Z M14,37 L16,37 L16,35 L14,35 L14,37 Z M18,38 C18,38.552 17.552,39 17,39 L13,39 C12.448,39 12,38.552 12,38 L12,34 C12,33.448 12.448,33 13,33 L17,33 C17.552,33 18,33.448 18,34 L18,38 Z M14,27 L16,27 L16,25 L14,25 L14,27 Z M18,28 C18,28.552 17.552,29 17,29 L13,29 C12.448,29 12,28.552 12,28 L12,24 C12,23.448 12.448,23 13,23 L17,23 C17.552,23 18,23.448 18,24 L18,28 Z M44,7 C44,7.551 44.449,8 45,8 C45.551,8 46,7.551 46,7 L46,3 C46,2.449 45.551,2 45,2 C44.449,2 44,2.449 44,3 L44,7 Z M42,7 L42,3 C42,1.346 43.346,0 45,0 C46.654,0 48,1.346 48,3 L48,7 C48,8.654 46.654,10 45,10 C43.346,10 42,8.654 42,7 L42,7 Z M34,7 C34,7.551 34.449,8 35,8 C35.551,8 36,7.551 36,7 L36,3 C36,2.449 35.551,2 35,2 C34.449,2 34,2.449 34,3 L34,7 Z M32,7 L32,3 C32,1.346 33.346,0 35,0 C36.654,0 38,1.346 38,3 L38,7 C38,8.654 36.654,10 35,10 C33.346,10 32,8.654 32,7 L32,7 Z M24,7 C24,7.551 24.449,8 25,8 C25.551,8 26,7.551 26,7 L26,3 C26,2.449 25.551,2 25,2 C24.449,2 24,2.449 24,3 L24,7 Z M22,7 L22,3 C22,1.346 23.346,0 25,0 C26.654,0 28,1.346 28,3 L28,7 C28,8.654 26.654,10 25,10 C23.346,10 22,8.654 22,7 L22,7 Z M14,7 C14,7.551 14.449,8 15,8 C15.551,8 16,7.551 16,7 L16,3 C16,2.449 15.551,2 15,2 C14.449,2 14,2.449 14,3 L14,7 Z M12,7 L12,3 C12,1.346 13.346,0 15,0 C16.654,0 18,1.346 18,3 L18,7 C18,8.654 16.654,10 15,10 C13.346,10 12,8.654 12,7 L12,7 Z M48.293,54.293 C47.902,54.684 47.902,55.316 48.293,55.707 C48.488,55.902 48.744,56 49,56 C49.256,56 49.512,55.902 49.707,55.707 L55.707,49.707 C55.895,49.52 56,49.265 56,49 L56,17 C56,16.448 55.552,16 55,16 L5,16 C4.448,16 4,16.448 4,17 L4,52 C4,54.206 5.794,56 8,56 L45,56 C45.552,56 46,55.552 46,55 L46,49 C46,48.547 46.446,48 47,48 L51,48 C51.552,48 52,47.552 52,47 C52,46.448 51.552,46 51,46 L47,46 C45.402,46 44,47.402 44,49 L44,54 L8,54 C6.897,54 6,53.103 6,52 L6,18 L54,18 L54,48.586 L48.293,54.293 Z M55,2 L51,2 C50.448,2 50,2.448 50,3 C50,3.552 50.448,4 51,4 L55,4 C56.458,4 58,5.542 58,7 L58,55 C58,56.458 56.458,58 55,58 L5,58 C3.542,58 2,56.458 2,55 L2,14 L55,14 C55.552,14 56,13.552 56,13 C56,12.448 55.552,12 55,12 L1,12 C0.448,12 0,12.448 0,13 L0,55 C0,57.57 2.43,60 5,60 L55,60 C57.57,60 60,57.57 60,55 L60,7 C60,4.43 57.57,2 55,2 L55,2 Z M0,9 L0,7 C0,4.43 2.43,2 5,2 L9,2 C9.552,2 10,2.448 10,3 C10,3.552 9.552,4 9,4 L5,4 C3.542,4 2,5.542 2,7 L2,9 C2,9.552 1.552,10 1,10 C0.448,10 0,9.552 0,9 L0,9 Z" id="calendar" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <?php if (isset($data['horarios']['dias']) && !empty($data['horarios']['dias'])) : ?>
                                                        <?php foreach ($data['horarios']['dias'] as $key => $value) : ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 ">
                                                                <div class="card  <?= $value['nome'] ?>">
                                                                    <div class="card-body pb-5 mb-5 ">
                                                                        <div class="form-check  ml-0 pl-0" id="semana">
                                                                            <input class="form-check-input " type="checkbox" <?php if ($value['status'] == 1) : ?> checked <?php endif; ?> name="<?= $value['nome'] ?>" value="<?= $value['num'] ?>" id="<?= $value['nome'] ?>">
                                                                            <label class="form-check-label" for="<?= $value['nome'] ?>">
                                                                                &nbsp; <?= $value['nome'] ?>
                                                                            </label>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                        <div class="card card-outline-primary ">
                                            <div class="card-header text-white">Horário de funcionamento</div>
                                            <div class="card-body">
                                                <div class="row py-3">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label>Início</label>
                                                            <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                                <input type="text" class="form-control" name="inicio" autocomplete="off" id="inicio" value="${inicio}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label>Fim</label>
                                                            <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                                <input type="text" class="form-control" id="fim" name="fim" autocomplete="off" value="${fim}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                                        <div class="card card-outline-primary ">
                                            <div class="card-header text-white">Horário de almoço / intervalo</div>
                                            <div class="card-body">
                                                <div class="row py-3">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label>Início</label>
                                                            <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                                <input type="text" class="form-control" name="almoco_inicio" autocomplete="off" id="almoco_inicio" value="${inicio_almoco}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label>Fim</label>
                                                            <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                                <input type="text" class="form-control" id="almoco_fim" autocomplete="off" name="almoco_fim" value="${fim_almoco}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <div class="card card-outline-primary ">
                                            <div class="card-header text-white">Antecedência de agendamento</div>
                                            <div class="card-body">
                                                <div class="row py-3">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label>Dias</label>
                                                            <input type="number" name="dias_antecedencia" value="${antecedencia_dias}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label>Horas</label>
                                                            <input type="number" name="horas_antecedencia" value="${antecedencia_horas}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card card-outline-primary " style="min-height: 690px;">
                                            <div class="card-header text-white">Cores | Serviços e Status</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="list-group list-group-flush">
                                                            <?php if (isset($data['cores_servicos']) && !empty($data['cores_servicos'])) : ?>
                                                                <?php foreach ($data['cores_servicos'] as $key => $value) : ?>
                                                                    <li class="list-group-item">
                                                                        <div class="cp-container text-left" id="<?= $key ?>-container">
                                                                            <label><?= $value->agenda_servico_nome; ?></label>
                                                                            <div class="input-group" title="Using input value">
                                                                                <input id="<?= $key ?>" type="text" class="form-control color" name="cor_servico@<?= $value->agenda_servico_id; ?>" value="<?= $value->agenda_servico_cor; ?>" autocomplete="off" />
                                                                                <div class="">
                                                                                    <span class="colorpicker-input-addon">
                                                                                        <i id="<?= $key ?>i"></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach ?>
                                                            <?php else : ?>
                                                                <div class="row">
                                                                    <div class="col-12 text-center">
                                                                        <h5>Não há serviços cadastrados</h5>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row py-3">

                                                    <div class="col-xl-6 col-lg-12 col-md-12  col-sm-12">
                                                        <div class="cp-container text-left" id="confirmado-container">
                                                            <label>Confirmado</label>
                                                            <div class="input-group" title="Using input value">
                                                                <input id="confirmado" type="text" class="form-control color" value="${cor_agendado}" name="cor_agendado" autocomplete="off" />
                                                                <div class="">
                                                                    <span class="colorpicker-input-addon">
                                                                        <i id="confirmadoi"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                        <div class="cp-container text-left" id="solicitacao-container">
                                                            <label>Solicitação</label>
                                                            <div class="input-group" title="Using input value">
                                                                <input id="solicitacao" type="text" class="form-control color" value="${cor_solicitado}" name="cor_solicitado" autocomplete="off" />
                                                                <div class="">
                                                                    <span class="colorpicker-input-addon">
                                                                        <i id="solicitacaoi"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                        <div class="cp-container text-left" id="atrasado-container">
                                                            <label>Atrasado</label>
                                                            <div class="input-group" title="Using input value">
                                                                <input id="atrasado" type="text" class="form-control color" name="cor_atrasado" value="${cor_atrasado}" autocomplete="off" />
                                                                <div class="">
                                                                    <span class="colorpicker-input-addon">
                                                                        <i id="atrasadoi"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                        <div class="cp-container text-left" id="concluido-container">
                                                            <label>Concluído</label>
                                                            <div class="input-group" title="Using input value">
                                                                <input id="concluido" type="text" class="form-control color" name="cor_concluido" value="${cor_concluido}" autocomplete="off" />
                                                                <div class="">
                                                                    <span class="colorpicker-input-addon">
                                                                        <i id="concluidoi"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="cp-container " id="recusado-container">
                                                            <label>Recusado</label>
                                                            <div class="input-group" title="Using input value">
                                                                <input id="recusado" type="text" class="form-control color" name="cor_recusado" value="${cor_recusado}" autocomplete="off" />
                                                                <div class="">
                                                                    <span class="colorpicker-input-addon">
                                                                        <i id="recusadoi"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="fix">
                    <button type="submit" class="btn btn-circle btn-lg btn-success float-end mt-5 m-l-10  waves-effect waves-light">
                        <i class="fa fa-check text-white"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
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
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- This is data table -->
    <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- start - This is for export functionality only -->
    <script src="assets/plugins/datatables-button/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-button/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables-button/jszip.min.js"></script>
    <script src="assets/plugins/datatables-button/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables-button/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-button/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-button/buttons.print.min.js"></script>
    <script src="assets/plugins/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- PRINCIPAL JS -->
    <script src="assets/js/vue.min.js"></script>
    <script src="${baseUri}/view/admin/app-js/datatable.js"></script>
    <script src="${baseUri}/view/admin/app-js/main.js"></script>

    <script src="assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>

    <script src="assets/plugins/fullcalendar/main.min.js"></script>
    <script src="assets/plugins/fullcalendar/locales-all.js"></script>
    <script src="${baseUri}/view/admin/app-js/validacoes.js"></script>
    <script src="agenda/horarios.js"></script>
    <!-- <script src="${baseUri}/view/admin/agenda/index.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.menu-agenda').addClass('active');
            $('.menu-cliente').addClass('active');
        });
        $('.clockpicker').clockpicker();
    </script>
</body>

</html>