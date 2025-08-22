<!-- <link href="layout/seo.css" rel="stylesheet"> -->
<button class="right-side-toggle waves-effect waves-light btn-success btn float-end">
    Configuração do SEO
</button>

<div class="right-sidebar" style="width:30vmax!important;">
    <div class="slimscrollright">
        <div class="rpanel-title"> Configuração do Seo <span><i class="ti-close right-side-toggle"></i></span>
        </div>
        <div class="r-panel-bodys">
            <div class="container">
                <form action="${baseUri}/seo/gravar/" method="post">
                    <div class="row pt-4">
                        <?php foreach ($data['seo'] as $key => $value) : ?>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="text-capitalize">código <?= $value->name ?></label>
                                 
                                    <input type="text" name="id_<?= $value->id ?>" hidden value="<?= $value->id ?>">
                                    <textarea name="cod_<?= $value->id ?>" rows="6" class="form-control"><?= $value->cod ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-block">Gravar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>