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
    <meta name="author" content="${config_seo_author}">
    <link rel="icon" type="image/png" sizes="16x16" href="${baseUri}/media/site/${config_site_favicon}">
    <title>Login - ${config_site_title}</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/toast-master/css/jquery.toast.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/colors/${config_tema_color}.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <style>
        .jq-toast-wrap {
            width: 450px !important;
            margin-top: 30px;
        }
        .jq-toast-wrap * {
            font-size: 16px !important;
        }
        .particle-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow: hidden
        }
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
        }
    </style>
</head>
<body class="card-no-border logo-center" style="background-position:center; background-size:cover;  background-image:url('${baseUri}/media/site/${config_site_loginscreen}');">
<div class="particle-container fullscreen bg3" data-scroll-index="0">

<section id="wrapper" class="login-register" style="z-index:20; width:390px; margin:0 auto; position:relative; opacity:.9">
        <div class="login-box card" >
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" id="loginform"
                    action="${baseUri}/login/auth/">
                    <br/><br/>
                    <h3 class="text-center"><i class="fa fa-lock"></i> ÁREA RESTRITA </h3>
                    <a href="javascript:void(0)" class="text-center db">
                        <!-- <img src="${baseUri}/media/site/${config_site_logo}" alt="Home" width="100%"/> -->
                        <br/>
                       
                    </a>
                    <div class="mb-3 m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="login" required="" placeholder="Email"
                                value="${email}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="pass" placeholder="Senha"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flexs row no-block align-items-center">
                            <div class="col-xs-12 col-md-6">
                                <div class="checkbox checkbox-primary p-t-0">
                                    <input id="checkbox-signup" type="checkbox" name="lembrar" ${lembrar_ipt}>
                                    <label for="checkbox-signup"> Lembrar-me </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="ml-auto">
                                    <a href="javascript:void(0)" id="to-recover" class="text-muted">
                                        <i class="fa fa-lock m-r-5"></i> 
                                                Recuperar senha
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                                    <i class="fa fa-user m-r-5"></i> 
                                    Entrar
                            </button>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center hide">
                            <div class="social">
                                <button class="btn btn-facebook" data-toggle="tooltip" title="Login with Facebook"><i
                                            aria-hidden="true" class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"><i
                                            aria-hidden="true" class="fab fa-google-plus-g"></i></button>
                            </div>
                        </div>
                    </div> -->
                    <!--
                    <div class="mb-3 m-b-0">
                        <div class="col-sm-12 text-center">
                            Don't have an account? <a href="pages-register2.html" class="text-primary m-l-5"><b>Sign Up</b></a>
                        </div>
                    </div>
                    -->
                </form>
                <form class="form-horizontal" id="recoverform" action="${baseUri}/login/gera_token/" method="post">
                    <div class="mb-3 ">
                        <div class="col-xs-12">
                            <h3>Recuperar Senha</h3>
                            <p class="text-muted">Informe seu email cadastrado! </p>
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="email" placeholder="Informe o e-mail">
                        </div>
                    </div>
                    <div class="mb-3 text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                                    <i class="fa fa-retweet m-r-5"></i> 
                                    Recuperar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
    <div id="particles" class="particles"></div>

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
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="assets/js/jquery.slimscroll.js"></script>
<script>
    function alert_error_center(title, msg) {
        $.toast({
            heading: title,
            text: msg,
            position: 'top-center',
            //loaderBg: '#1e88e5',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 7000,
            stack: 2
        });
    }

    if (window.location.href.indexOf("incorreto") != -1) {
        alert_error_center('Login ou senha incorretos!', 'Entre em contato com o administrador!');
    }
    if (window.location.href.indexOf("desativado") != -1) {
        alert_error_center('Usuário desativado!', 'Entre em contato com o o administrador! ');
    }
</script>
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/particles.js"></script>
</body>
</html>