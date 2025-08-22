<link href="layout/seo.css" rel="stylesheet">
<button id="btn-config-seo" type="button" class="right-side-toggle waves-effect waves-light btn-success btn float-end mt-0">
    Configuração do SEO
</button>

<div class="right-sidebar" style="width:30vmax!important;">
    <div class="slimscrollright" id="seo">
        <div class="rpanel-title"> Configuração do Seo <span><i class="ti-close right-side-toggle"></i></span>
        </div>
        <div class="r-panel-bodys">
            <ul class="nav nav-tabs pt-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Google</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Facebook</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container">
                        <div class="searchResults">
                            <ul>
                                <div class="searchResultsItem">
                                    <li><a>{{this.titulo}} | ${config_site_title}</a></li>
                                    <p class="resultAddr">{{link}}</p>
                                    <p><span>{{pagina_updated}} - </span>{{this.desc}}</p>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container">
                        <div class="card">
                            <div id="img_facebook"></div>
                            <div class="card-body">
                                <h3 class="card-title" style="font-family: 'Times New Roman', Times, serif;">{{titulo}} | ${config_site_title}</h3>
                                <p class="card-text" style="font-family:Arial, Helvetica, sans-serif">{{desc}}</p>
                                <label style="font-family:Arial, Helvetica, sans-serif" class="text-uppercase">${baseUri} </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label>Descrição da Página</label>
                            <textarea type="text" v-model="desc" id="pagina_desc" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="mb-3">
                            <label class="float-end"><i class="fa fa-info-circle"></i> Palavras chaves separadas por espaço</label>
                            <label for="keywords_seo">Palavras chave </label>
                            <input type="text" id="keywords_seo" class="form-control" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

