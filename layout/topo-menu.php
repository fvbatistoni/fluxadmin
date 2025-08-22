<aside class="left-sidebar">
    <div class="scroll-sidebar ">
        <div class="user-profile text-center d-none d-md-block" id="imgProfile">
            <div class="profile-img  d-none d-md-block">
                <!-- <img src="${baseUri}/media/avatar/${avatar}" alt="user" style="object-fit: cover; width: 140px;height: 140px;border-radius: 100px;"/> -->
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sub-menu text-uppercase">
                    <a>
                        <span>Gerenciar Site</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="${baseUri}/admin">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- inicio menu home  -->
                <li data-mod="Configuracao" class="menu-access menu-home">
                    <a href="" class="has-arrow" aria-expanded="false">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="hide-menu">${site_menu_admin}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if (isset($data['modulos']) && $data['modulos']->slide_status == 1) : ?>
                            <li data-mod="Slide" data-id="Slide:L">
                                <a href="${baseUri}/slide/" class="menu-slide">${slide_menu_admin}</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($data['modulos']) && $data['modulos']->indicador_status == 1) : ?>
                            <li>
                                <a href="${baseUri}/indicador-lista" class="menu-indicadores">${indicador_menu_admin}</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </li>
                <!-- fim menu home -->

                <!-- menu conteudo  -->
                <li data-mod="Conteudo" class="menu-access menu-conteudo">
                    <a href="" class="has-arrow menu-conteudo" aria-expanded="false">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <span class="hide-menu"> Conteúdo</span>
                    </a>

                    <ul aria-expanded="false" class="collapse menu-conteudo-collapse">
                        <!-- blog inicio -->
                        <?php if (isset($data['modulos']) && $data['modulos']->blog_status == 1) : ?>
                            <li data-mod="BlogAdmin" class="menu-access menu-blog">
                                <a href="${baseUri}/blog-lista" class="has-arrow menu-blog" aria-expanded="false">
                                    <span class="hide-menu"> ${blog_menu_admin}</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="${baseUri}/blog-lista" data-id="BlogAdmin:L" class="menu-post">Postagens</a>
                                    </li>
                                    <li>
                                        <a href="${baseUri}/blog-categoria" data-id="BlogAdmin:L" class="menu-categoria">Categorias</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <!-- blog fim  -->

                        <!-- faq inicio  -->
                        <?php if (isset($data['modulos']) && $data['modulos']->faq_status == 1) : ?>
                            <li data-mod="FaqAdmin" class="menu-access menu-faq">
                                <a href="" class="has-arrow menu-faq" aria-expanded="false">
                                    <span class="hide-menu"> ${faq_menu_admin}</span>
                                </a>
                                <ul aria-expanded="false" class="collapse menu-faq-collpase">
                                    <li>
                                        <a href="${baseUri}/faq-lista" data-id="FaqAdmin:L" class="menu-faq-gerenciar">Gerenciar</a>
                                    </li>
                                    <li>
                                        <a href="${baseUri}/faq-categoria" data-id="FaqAdmin:L" class="menu-faq-categorias">Categorias</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <!-- faq fim  -->

                        <!-- evento inicio  -->
                        <?php if (isset($data['modulos']) && $data['modulos']->evento_status == 1) : ?>
                            <li data-mod="Evento" data-id="Evento:L">
                                <a href="${baseUri}/evento" class="hide-menu menu-evento">${evento_menu_admin} </a>
                            </li>
                        <?php endif; ?>
                        <!-- evento fim  -->

                        <!-- inicio menu pagina  -->
                        <?php if (isset($data['modulos']) && $data['modulos']->pagina_status == 1) : ?>
                            <li data-mod="PaginaAdmin" class="menu-access menu-pagina">
                                <a href="${baseUri}/paginas-lista" class="has-arrow menu-pagina" aria-expanded="false">
                                    <span class="hide-menu">Páginas</span>
                                </a>
                                <ul aria-expanded="false" class="collapse menu-pagina-collapse">
                                    <li data-id="PaginaAdmin:L">
                                        <a href="${baseUri}/pagina-lista" class="menu-pagina-gerenciar">Gerenciar</a>
                                    </li>
                                    <li data-id="PaginaAdmin:L">
                                        <a href="${baseUri}/pagina-categoria" class="menu-pagina-categorias">Categorias</a>
                                    </li>
                                    <!--
                                <li data-id="PaginaAdmin:L" class="menu-access">
                                    <a href="${baseUri}/pagina-subcategoria">Subcategorias</a>
                                </li>
                                -->
                                </ul>
                            </li>
                        <?php endif; ?>
                        <!-- fim menu pagina  -->

                        <!-- inicio menu galeria -->
                        <?php if (isset($data['modulos']) && $data['modulos']->galeria_status == 1) : ?>
                            <li data-mod="Galeria" class="menu-access menu-galeria">
                                <a href="${baseUri}/galeria/" class="has-arrow menu-galeria" aria-expanded="false">
                                    <span class="hide-menu">${galeria_menu_admin}</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li data-id="Galeria:L">
                                        <a href="${baseUri}/galeria" class="menu-fotos">Fotos</a>
                                    </li>
                                    <li data-id="Videogaleria:L">
                                        <a href="${baseUri}/videogaleria" class="menu-videos">Vídeos</a>
                                    </li>
                                    <li data-id="Galeria:L">
                                        <a href="${baseUri}/galeria/categoria" class="menu-categorias">Categorias</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <!-- fim menu galeria -->
                    </ul>
                </li>
                <!-- fim menu conteudo  -->

                <li data-mod="Conteudo" class="menu-access">
                    <a href="${baseUri}" target="_blank" aria-expanded="false">
                        <i class="fa fa-share" aria-hidden="true"></i>
                        <span class="hide-menu"> Ver site</span>
                    </a>
                </li>

                <li class="sub-menu text-uppercase">
                    <hr>
                    <a><span>CRM</span></a>
                </li>

                <!-- inicio menu clientes -->
                <?php if (isset($data['modulos']) && $data['modulos']->cliente_status == 1) : ?>
                    <li data-mod="Cliente" class="menu-access menu-cliente">
                        <a href="${baseUri}/cliente-lista/" class="has-arrow " aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i></i><span class="hide-menu">${cliente_menu_admin}</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li data-id="Cliente:L">
                                <a href="${baseUri}/cliente/" class="menu-gerenciar">Gerenciar</a>
                            </li>
                            <?php if (isset($data['modulos']) && $data['modulos']->agenda_status == 1) : ?>
                                <li data-id="Cliente:L">
                                    <a href="${baseUri}/agenda/" class="menu-agenda">${agenda_menu_admin}</a>
                                </li>
                            <?php endif; ?>
                            <!--<?php if (isset($data['modulos']) && $data['modulos']->depoimento_status == 1) : ?>
                                <li data-id="Depoimento:L">
                                    <a href="${baseUri}/depoimento/" class="menu-depoimento">${depoimento_menu_admin}</a>
                                </li>
                            <?php endif; ?>-->
                            <?php if (isset($data['modulos']) && $data['modulos']->documento_status == 1) : ?>
                                <li data-id="Cliente:L">
                                    <a href="${baseUri}/documento-lista" class="menu-documentos">${documento_menu_admin}</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <!--
                    <li data-id="Cliente:L" class="menu-access"><a href="">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    Campanhas</a></li>
                    <li data-id="Cliente:L" class="menu-access"><a href="">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    Lead</a></li>
                    -->
                <?php endif; ?>
                <!-- fim menu clientes -->

                <!-- menu produtos inicio  -->
                <?php if (isset($data['modulos']) && $data['modulos']->produto_status == 1) : ?>
                    <li data-mod="ProdutosAdmin" class="menu-access menu-produtos">
                        <a href="${baseUri}/produtos-lista" class="has-arrow" aria-expanded="false">
                            <i class="fa fa-archive"></i><span class="hide-menu"> Receitas </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li data-id="ProdutosAdmin:L">
                                <a href="${baseUri}/produtos-lista" class="menu-produtos-gerenciar">Gerenciar</a>
                            </li>
                            <li data-id="ProdutosAdmin:L">
                                <a href="${baseUri}/produto-novo" class="menu-produtos-cadastrar">Cadastrar</a>
                            </li>
                            <li data-id="ProdutosAdmin:L">
                                <a href="${baseUri}/produtos-categoria" class="menu-produtos-categorias">Categorias</a>
                            </li>
                            <li data-id="ProdutosAdmin:L">
                                <a href="${baseUri}/produtos-subcategoria" class="menu-produtos-subcategorias">Subcategorias</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- menu produtos fim  -->

                <!-- menu servicos  -->
                <?php if (isset($data['modulos']) && $data['modulos']->servico_status == 1) : ?>
                    <li data-mod="Servico" class="menu-access menu-servico">
                        <a href="${baseUri}/servico" class=" has-arrow" aria-expanded="false">
                            <i class="fa fa-tasks" aria-hidden="true"></i><span class="hide-menu">Amamentação
                            </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li data-id="">
                                <a href="${baseUri}/amamentacao" class="menu-servico-gerenciar">Gerenciar</a>
                            </li>
                            <li data-id="">
                                <a href="${baseUri}/amamentacao-categoria" class="menu-servico-categorias">Categorias</a>
                            </li>
                            <li data-id="">
                                <a href="${baseUri}/amamentacao-subcategoria" class="menu-servico-subcategorias">Subcategorias</a>
                            </li>
                            <li data-id="">
                                <a href="${baseUri}/amamentacao-subcategoria-secundaria" class="menu-servico-subcategorias-filhas">Subcategorias Secundárias</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- fim menu servicos  -->

                <!-- menu servicos  -->
                <?php if (isset($data['modulos']) && $data['modulos']->servico_status == 1) : ?>
                    <li data-mod="Servico" class="menu-access menu-servico-gestacao">
                        <a href="${baseUri}/servico" class=" has-arrow" aria-expanded="false">
                            <i class="fa fa-tasks" aria-hidden="true"></i><span class="hide-menu">Gestação
                            </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li data-id="">
                                <a href="${baseUri}/gestacao" class="menu-servico-gestacao-gerenciar">Gerenciar</a>
                            </li>
                            <li data-id="">
                                <a href="${baseUri}/gestacao-categoria" class="menu-servico-gestacao-categoria">Categorias</a>
                            </li>
                            <li data-id="">
                                <a href="${baseUri}/gestacao-subcategoria" class="menu-servico-gestacao-subcategoria">Subcategorias</a>
                            </li>
                            <li data-id="">
                                <a href="${baseUri}/gestacao-subcategoria-secundaria" class="menu-servico-gestacao-subcategoria-filha">Subcategorias Secundárias</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- fim menu servicos  -->
                            <?php if (isset($data['modulos']) && $data['modulos']->depoimento_status == 1) : ?>
                                <li data-id="Depoimento:L">
                                    <a href="${baseUri}/depoimento/" class="menu-depoimento"><i class="fa fa-users" aria-hidden="true"></i></i> ${depoimento_menu_admin}</a>
                                </li>
                            <?php endif; ?>
                <!-- inicio menu parceiro  -->
                <?php if (isset($data['modulos']) && $data['modulos']->parceiro_status == 1) : ?>
                    <li>
                        <a href="${baseUri}/parceiros-lista" class="menu-perceiros">
                            <i class="fa fa-black-tie" aria-hidden="true"></i> ${parceiro_menu_admin}</a>
                    </li>
                <?php endif; ?>
                <!-- fim menu parceiro  -->

                <!-- menu servicos  -->
                <?php if (isset($data['modulos']) && $data['modulos']->funcionario_status == 1) : ?>
                    <li data-mod="Funcionario" class="menu-access">
                        <a href="${baseUri}/funcionario" class="menu-funcionarios" aria-expanded="false">
                            <i class="fa fa-list-alt" aria-hidden="true"></i><span class="hide-menu">${funcionario_menu_admin}
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <!-- fim menu servicos  -->

                <li class="sub-menu text-uppercase">
                    <hr>
                    <a>
                        <span>Configurações</span>
                    </a>
                </li>
                <!-- menu aparencia inicio -->
                <li data-mod="Configuracao" class="menu-access menu-aparencia">
                    <a href="" class="has-arrow" aria-expanded="false">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i>
                        <span class="hide-menu"> Aparência</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if (isset($data['modulos']) && $data['modulos']->tema_status == 1) : ?>
                            <li id="mod-configuracao-tema">
                                <a href="${baseUri}/configuracao/tema" class="menu-temas">${tema_menu_admin}</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="${baseUri}/configuracao/logo" class="menu-logo">Logo e background</a>
                        </li>
                        <li>
                            <a href="${baseUri}/configuracao/site" class="menu-informacoes">Informações Gerais</a>
                        </li>
                    </ul>
                </li>
                <!-- menu aparencia fim  -->

                <!-- menu contato inicio -->
                <li data-mod="Contato" class="menu-access menu-contato">
                    <a href="" class="has-arrow" aria-expanded="false">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span class="hide-menu"> ${contato_menu_admin} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li id="mod-configuracao-contato">
                            <a class="menu-endereco" href="${baseUri}/configuracao/contato/"> Contatos e Local</a>
                        </li>
                        <li id="mod-configuracao-rede">
                            <a class="menu-redes" href="${baseUri}/configuracao/rede/">Redes Sociais</a>
                        </li>
                        <li id="mod-configuracao-email">
                            <a class="menu-email" href="${baseUri}/configuracao/email/">Email & SMTP</a>
                        </li>
                    </ul>
                </li>
                <!-- menu contato fim  -->

                <!-- menu usuario inicio  -->
                <li data-id="Usuario:*" class="menu-access menu-usuario">
                    <a href="${baseUri}/usuario/" class="menu-usuario">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        Usuários
                    </a>
                </li>
                <!-- menu usuario fim  -->

                <?php if (isset($data['modulos']->seo_status) && $data['modulos']->seo_status == 1) : ?>
                    <li data-mod="Configuracao" class="menu-access">
                        <a href="${baseUri}/configuracao/seo" class="menu-seo">
                            <i class="fa fa-pie-chart" aria-hidden="true"></i>
                            <span class="hide-menu"> ${seo_menu_admin}</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- modulo inicio  -->
                <?php if (isset($data['modulos']) && $data['modulos']->modulo_status == 1) : ?>
                    <li class="d-none" data-mod="Modulo" data-id="Modulo:L">
                        <a href="${baseUri}/modulo" class="hide-menu menu-modulo">
                            <i class="fa fa-code" aria-hidden="true"></i>
                            ${modulo_menu_admin} </a>
                    </li>
                <?php endif; ?>
                <!-- modulo fim  -->
            </ul>
        </nav>
    </div>
</aside>