<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" style="background: none">
            <a class="navbar-brand" href="${baseUri}/admin/">
                <b class="text-white">${config_site_title}</b>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 pl-2">
                <li class="nav-item"> <a class="nav-link sidebartoggler text-muted waves-effect waves-dark" id="menuButton" onclick="bindFoto(1)" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="${baseUri}/media/avatar/<?=Session::node('avatar')?>" alt="user" style="object-fit: cover; width: 40px;height: 40px;border-radius: 100px;"/>
                        <small>${uname}</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li><a href="${baseUri}/logout/"><i class="fa fa-power-off"></i> Logout / Sair</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>