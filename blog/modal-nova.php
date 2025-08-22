<div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form action="${baseUri}/BlogAdmin/gravar_categoria/" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel"><span class="categoria-acao">Inlcuir</span> categoria</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="categoria_blog_id" id="categoria_blog_id">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="categoria_blog_nome">Nome da categoria <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="categoria_blog_nome" name="categoria_blog_nome" maxlength="200" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                            <button type="button" id="add_cat_submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check-circle"></i> Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>