<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="${baseUri}/view/tema/${tema}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="${config_site_description}">
    <meta name="author" content="${config_site_author}">
    <meta name="keywords" content="${config_site_keywords}">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .connectedSortable {
            list-style-type: none;
            min-height: 400px;
            padding: 4px !important;
            background: #DFE1E6;
            border: 0px solid red !important;
            margin-top: -10px;
            -webkit-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
        }

        @media screen and (max-width: 992px) {
            .connectedSortable {
                min-height: 300px;
            }
        }

        .connectedSortable li {
            font-size: 1em;
            padding: 6px;
            min-height: 95px;
            margin-bottom: 7px;
            margin-top: 5px;
            background: #2a00ff;
            color: #fff;

            border-radius: 4px;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;

            -webkit-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
        }

        .col-step {
            margin: 0px !important;
        }

        .col-step h4 {
            padding: 10px;
            font-weight: bolder;
            background: #f0f0f0;
            text-transform: uppercase;
        }

        .opaco {
            opacity: .7;
            font-size: 1.6em;
        }

        .opaco i {
            border: 0px solid red;
            margin-top: -5px !important;
            margin-left: -25px !important;
            position: absolute;
        }

        /*
        .col-md-3{
            margin-left: 10px;
            width: 10%;
            min-height: 450px;
            display: inline-table;

        }
        .content{
            position: absolute;
            width: 200%;
            overflow-x: inherit;
        }
        https://codepen.io/riktar/pen/KqZpgL
        */

        #s1 h4, #s1 li {
            background: #7C71C5;
            color: #fff;
        }

        #s2 h4, #s2 li {
            background: #209BEC;
            color: #fff;
        }

        #s3 h4, #s3 li {
            background: #FB7D44;
            color: #fff;
        }

        #s4 h4, #s4 li {
            background: #2AC06D;
            color: #fff;
        }

        #s5 h4, #s5 li {
            background: #D9534F;
            color: #fff;
        }

        #s6 h4, #s6 li {
            background: #EE436F;
            color: #fff;
        }

        #s7 h4, #s7 li {
            background: #982438;
            color: #fff;
        }

        #s8 h4, #s8 li {
            background: #CAE002;
            color: #fff;
        }

        @media (min-width: 768px) {
            h4 {
                font-size: 13px !important;
            }

            li {
                font-size: 11.5px !important;
            }

        }
    </style>


</head>

<body class="fix-header card-no-border logo-center">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span>
                         <!-- dark Logo text -->
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item hidden-sm-down search-box">
                        <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i
                                        class="ti-close"></i></a></form>
                    </li>

                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark"
                           href="starter-kit.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="mdi mdi-message"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span
                                                        class="mail-desc">Just see the my new admin!</span> <span
                                                        class="time">9:30 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                                <span class="time">9:10 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span>
                                                <span class="time">9:08 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:02 AM</span></div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                            notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="starter-kit.html"
                           id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="mdi mdi-email"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="user-img"><img src="assets/images/users/1.jpg" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status online float-end"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:30 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="user-img"><img src="assets/images/users/2.jpg" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status busy float-end"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span
                                                        class="mail-desc">I've sung a song! See you at</span> <span
                                                        class="time">9:10 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="user-img"><img src="assets/images/users/3.jpg" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status away float-end"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span
                                                        class="time">9:08 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="starter-kit.html#">
                                            <div class="user-img"><img src="assets/images/users/4.jpg" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status offline float-end"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:02 AM</span></div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                            e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="starter-kit.html"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="assets/images/users/1.jpg" alt="user" class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="assets/images/users/1.jpg" alt="user"></div>
                                        <div class="u-text">
                                            <h4>Steave Jobs</h4>
                                            <p class="text-muted">varun@gmail.com</p><a href="profile.html"
                                                                                        class="btn btn-rounded btn-danger btn-sm">View
                                                Profile</a></div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="starter-kit.html#"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="starter-kit.html#"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="starter-kit.html#"><i class="ti-email"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="starter-kit.html#"><i class="ti-settings"></i> Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="starter-kit.html#"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">PERSONAL</li>
                    <li>
                        <a class="has-arrow" href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="index.html">Dashboard 1</a></li>
                            <li><a href="index2.html">Dashboard 2</a></li>
                            <li><a href="index3.html">Dashboard 3</a></li>
                            <li><a href="index4.html">Dashboard 4</a></li>
                            <li><a href="index5.html">Dashboard 5</a></li>
                            <li><a href="index6.html">Dashboard 6</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-bullseye"></i><span class="hide-menu">Apps</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="app-calendar.html">Calendar</a></li>
                            <li>
                                <a class="has-arrow" href="starter-kit.html#" aria-expanded="false">Inbox</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="app-email.html">Mailbox</a></li>
                                    <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                                    <li><a href="app-compose.html">Compose Mail</a></li>
                                </ul>
                            </li>
                            <li><a href="app-chat.html">Chat app</a></li>
                            <li><a href="app-ticket.html">Support Ticket</a></li>
                            <li><a href="app-contact.html">Contact / Employee</a></li>
                            <li><a href="app-contact2.html">Contact Grid</a></li>
                            <li><a href="app-contact-detail.html">Contact Detail</a></li>
                        </ul>
                    </li>
                    <li class="three-column">
                        <a class="has-arrow" href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-chart-bubble"></i><span class="hide-menu">Ui Elements</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                            <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-user-card.html">User Cards</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                            <li><a href="ui-notification.html">Notification</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-bootstrap.html">Bootstrap Ui</a></li>
                            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                            <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                            <li><a href="ui-list-media.html">List Media</a></li>
                            <li><a href="ui-ribbons.html">Ribbons</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-nestable.html">Nestable</a></li>
                            <li><a href="ui-range-slider.html">Range slider</a></li>
                            <li><a href="ui-timeline.html">Timeline</a></li>
                            <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                            <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                            <li><a href="ui-session-ideal-timeout.html">Session Ideal Timeout</a></li>
                            <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                            <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                            <li><a href="ui-spinner.html">Spinner</a></li>
                            <li><a href="ui-scrollspy.html">Scrollspy</a></li>
                            <li><a href="ui-toasts.html">Toasts</a></li>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">FORMS, TABLE &amp; WIDGETS</li>
                    <li class="two-column">
                        <a class="has-arrow" href="starter-kit.html#" aria-expanded="false"><i class="mdi mdi-file"></i><span
                                    class="hide-menu">Forms</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="form-basic.html">Basic Forms</a></li>
                            <li><a href="form-layout.html">Form Layouts</a></li>
                            <li><a href="form-addons.html">Form Addons</a></li>
                            <li><a href="form-material.html">Form Material</a></li>
                            <li><a href="form-float-input.html">Floating Lable</a></li>
                            <li><a href="form-pickers.html">Form Pickers</a></li>
                            <li><a href="form-upload.html">File Upload</a></li>
                            <li><a href="form-mask.html">Form Mask</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-dropzone.html">File Dropzone</a></li>
                            <li><a href="form-icheck.html">Icheck control</a></li>
                            <li><a href="form-img-cropper.html">Image Cropper</a></li>
                            <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                            <li><a href="form-typehead.html">Form Typehead</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                            <li><a href="form-summernote.html">Summernote Editor</a></li>
                            <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-table"></i><span class="hide-menu">Tables</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="table-basic.html">Basic Tables</a></li>
                            <li><a href="table-layout.html">Table Layouts</a></li>
                            <li><a href="table-data-table.html">Data Tables</a></li>
                            <li><a href="table-footable.html">Footable</a></li>
                            <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                            <li><a href="table-responsive.html">Responsive Table</a></li>
                            <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                            <li><a href="table-editable-table.html">Editable Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">EXTRA COMPONENTS</li>
                    <li class="two-column">
                        <a class="has-arrow " href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-book-open-variant"></i><span class="hide-menu">Pages</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="starter-kit.html">Starter Kit</a></li>
                            <li><a href="pages-profile.html">Profile page</a></li>
                            <li><a href="pages-animation.html">Animation</a></li>
                            <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                            <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-treeview.html">Treeview</a></li>
                            <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                            <li><a href="pages-search-result.html">Search result</a></li>
                            <li><a href="pages-scroll.html">Scrollbar</a></li>
                            <li><a href="pages-pricing.html">Pricing</a></li>
                            <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                            <li><a href="pages-gallery.html">Gallery</a></li>
                            <li><a href="pages-faq.html">Faqs</a></li>
                            <li><a href="starter-kit.html#" class="has-arrow">Error Pages</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="pages-error-400.html">400</a></li>
                                    <li><a href="pages-error-403.html">403</a></li>
                                    <li><a href="pages-error-404.html">404</a></li>
                                    <li><a href="pages-error-500.html">500</a></li>
                                    <li><a href="pages-error-503.html">503</a></li>
                                </ul>
                            </li>
                            <li><a href="starter-kit.html#" class="has-arrow">Authentication <span
                                            class="label label-rounded label-success">6</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="pages-login.html">Login 1</a></li>
                                    <li><a href="pages-login-2.html">Login 2</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-register2.html">Register 2</a></li>
                                    <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                    <li><a href="pages-recover-password.html">Recover password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-widgets"></i><span class="hide-menu">Extra</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a class="has-arrow " href="starter-kit.html#" aria-expanded="false">Widgets</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="widget-apps.html">Widget Apps</a></li>
                                    <li><a href="widget-data.html">Widget Data</a></li>
                                    <li><a href="widget-charts.html">Widget Charts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="starter-kit.html#" aria-expanded="false">Maps</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="map-google.html">Google Maps</a></li>
                                    <li><a href="map-vector.html">Vector Maps</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="starter-kit.html#" aria-expanded="false">Icons</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="icon-material.html">Material Icons</a></li>
                                    <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                    <li><a href="icon-themify.html">Themify Icons</a></li>
                                    <li><a href="icon-linea.html">Linea Icons</a></li>
                                    <li><a href="icon-weather.html">Weather Icons</a></li>
                                    <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
                                    <li><a href="icon-flag.html">Flag Icons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="starter-kit.html#" aria-expanded="false">Charts</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="chart-morris.html">Morris Chart</a></li>
                                    <li><a href="chart-chartist.html">Chartis Chart</a></li>
                                    <li><a href="chart-echart.html">Echarts</a></li>
                                    <li><a href="chart-flot.html">Flot Chart</a></li>
                                    <li><a href="chart-knob.html">Knob Chart</a></li>
                                    <li><a href="chart-chart-js.html">Chartjs</a></li>
                                    <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                                    <li><a href="chart-extra-chart.html">Extra chart</a></li>
                                    <li><a href="chart-peity.html">Peity Charts</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="starter-kit.html#" aria-expanded="false"><i
                                    class="mdi mdi-arrange-send-backward"></i><span
                                    class="hide-menu">Multi level dd</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="starter-kit.html#">item 1.1</a></li>
                            <li><a href="starter-kit.html#">item 1.2</a></li>
                            <li>
                                <a class="has-arrow" href="starter-kit.html#" aria-expanded="false">Menu 1.3</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="starter-kit.html#">item 1.3.1</a></li>
                                    <li><a href="starter-kit.html#">item 1.3.2</a></li>
                                    <li><a href="starter-kit.html#">item 1.3.3</a></li>
                                    <li><a href="starter-kit.html#">item 1.3.4</a></li>
                                </ul>
                            </li>
                            <li><a href="starter-kit.html#">item 1.4</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">
                    <div class="d-flex m-t-10 justify-content-end">
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0">
                                    <small>THIS MONTH</small>
                                </h6>
                                <h4 class="m-t-0 text-info">$58,356</h4></div>
                            <div class="spark-chart">
                                <div id="monthchart"></div>
                            </div>
                        </div>
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0">
                                    <small>LAST MONTH</small>
                                </h6>
                                <h4 class="m-t-0 text-primary">$48,356</h4></div>
                            <div class="spark-chart">
                                <div id="lastmonthchart"></div>
                            </div>
                        </div>
                        <div class="">
                            <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm float-end m-l-10">
                                <i class="ti-settings text-white"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="content overflow-hidden " style=" min-height: 550px">

                                <div class="row" id="cards">
                                    <div class="col-md-2 col-step" id="s1">
                                        <h4> Aguardando
                                            <span class="float-end opaco">
                                        <i class="fa fa-envelope"></i>
                                 </span>
                                        </h4>
                                        <ul id="sortable1" data-name="Aguardando" class="connectedSortable">
                                            <li class="ui-state-default" data='{"name":"João das Coves", "id":"55"}'>
                                    <span><i class="fa fa-user-circle"></i> João das Coves
                                        <span class="float-end"><i class="fa fa-star"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> jcoves@gmail.com <br>
                                                <i class="fa fa-phone"></i> (11) 95555-8888 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                            <li class="ui-state-default" data='{"name":"Manuel Português", "id":"55"}'>
                                   <span><i class="fa fa-user-circle"></i> Manuel Português
                                        <span class="float-end"><i class="fa fa-star-o"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> mano@el.pt <br>
                                                <i class="fa fa-phone"></i> (11) 97777-6666 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                            <li class="ui-state-default" data='{"name":"Chico Pinheiro", "id":"55"}'>
                                   <span><i class="fa fa-user-circle"></i> Chico Pinheiro
                                        <span class="float-end"><i class="fa fa-star-o"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> chicop@gmail.com <br>
                                                <i class="fa fa-phone"></i> (13) 98877-4444 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s2">
                                        <h4>Proposta enviada
                                            <span class="float-end opaco">
                                        <i class="fa fa-envelope-open"></i>
                                 </span>
                                        </h4>
                                        <ul id="sortable2" data-name="Proposta Enviada" class="connectedSortable">
                                            <li class="ui-state-default" data='{"name":"Chuck Norris", "id":"55"}'>
                                   <span><i class="fa fa-user-circle"></i> Chuck Norris
                                        <span class="float-end"><i class="fa fa-star"></i></span>
                                    </span><br>
                                                <i class="fa fa-envelope"></i> cnorris@gmail.com <br>
                                                <i class="fa fa-phone"></i> (13) 98877-4444 <br>
                                                <span class="pull-left">
                                        <i class="fa fa-clock"></i> 30/04/2019 15:00
                                    </span>
                                                <span class="float-end">
                                        <a class="btn-xs btn-default">
                                            <i class="fa fa-tasks"></i> Tasks
                                        </a>
                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s3">
                                        <h4>Negociação
                                            <span class="float-end opaco">
                                        <i class="fa  fa-users"></i>
                                 </span>
                                        </h4>
                                        <ul id="sortable3" data-name="Negociação" class="connectedSortable"></ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s4">
                                        <h4>Proposta Aceita
                                            <span class="float-end opaco">
                                       <i class="fa  fa-bullseye"></i>
                                </span>
                                        </h4>
                                        <ul id="sortable4" data-name="Proposta Aceita" class="connectedSortable"></ul>
                                    </div>
                                    <div class="col-md-2 col-step" id="s5">
                                        <h4>Desenvolvendo
                                            <span class="float-end opaco">
                                       <i class="fa  fa-code"></i>
                                </span>
                                        </h4>
                                        <ul id="sortable5" class="connectedSortable"></ul>
                                    </div id=>
                                    <div class="col-md-2 col-step" id="s6">
                                        <h4>Testes
                                            <span class="float-end opaco">
                                       <i class="fa fa-code-branch"></i>
                                 </span>
                                        </h4>
                                        <ul id="sortable6" class="connectedSortable"></ul>
                                    </div>
                                    <!-- ETAPA FUTURA -->
                                    <div class="col-md-2 col-step hide" id="s7">
                                        <h4>Entrega
                                            <span class="float-end opaco">
                                    <i class="fa fa-cloud-upload"></i>
                                </span>
                                        </h4>
                                        <ul id="sortable7" class="connectedSortable"></ul>
                                    </div>
                                    <div class="col-md-2 col-step hide" id="s8">
                                        <h4 class="text-center">Faturamento
                                            <span class="float-end opaco">
                                    <i class="fa fa-barcode"></i>
                                 </span>
                                        </h4>
                                        <ul id="sortable7" class="connectedSortable"></ul>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                    </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a>
                            </li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Varun Dhavan <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Genelia Deshmukh <small
                                                class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Ritesh Deshmukh <small
                                                class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Arijit Sinh <small
                                                class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Govinda Star <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img"
                                                                  class="img-circle"> <span>John Abraham<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Hritik Roshan<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Pwandeep rajan <small
                                                class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 Material Pro Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->

<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


<script type="text/javascript" src="assets/plugins/jqueryui/jquery-ui.min.js"></script>

<script>
    $(function () {
        $(".connectedSortable").sortable({
            connectWith: ".connectedSortable",
            start: function (event, ui) {
                ui.item.css('transform', 'rotate(5deg)');
                ui.item.css('-webkit-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.3');
                ui.item.css('-moz-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.3');
                ui.item.css('box-shadow', '0 15px 20px rgba(0, 0, 0, 0.3');
            },
            stop: function (event, ui) {
                ui.item.css('transform', 'rotate(0deg)');
                ui.item.css('-webkit-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.1');
                ui.item.css('-moz-box-shadow', '0 15px 20px rgba(0, 0, 0, 0.1');
                ui.item.css('box-shadow', '0 15px 20px rgba(0, 0, 0, 0.1');
            },
            over: function (event, ui) {
                var step_id = $(this).attr('id');
                $("#" + step_id).css('background-color', 'rgba(0, 0, 0, 0.2)');
            },
            out: function (event, ui) {
                var step_id = $(this).attr('id');
                $("#" + step_id).css('background-color', '#DFE1E6');
            },
            receive: function (event, ui) {
                var step_id = $(this).attr('id');
                $("#" + step_id).css('background-color', '#DFE1E6');
                var data = JSON.parse(ui.item[0].attributes.data.value);
                var step = $(this).data('name');
                $("#" + step_id).effect('highlight', {}, 1000, function () {
                    //alert('Cliente ' + data.name + ' movido para ' + step)
                });
            },
            update: function (event, ui) {
                var step_id = $(this).attr('id');

            }
        }).disableSelection();
    });
</script>


</body>

</html>