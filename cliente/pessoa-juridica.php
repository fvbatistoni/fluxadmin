<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="mb-3">
            <label for="cliente_cpf">CNPJ</label>
            <span class="text-danger">*</span>
            &nbsp;&nbsp;<span id="cnpj_error"></span>
            <input type="text" name="cliente_cnpj" id="cliente_cnpj" class="form-control cnpj"
                   placeholder="informe um número de CNPJ"
                   value="${cliente_cnpj}"/>
        </div>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="mb-3">
            <label for="cliente_rg">I.E</label>
            <input type="text" name="cliente_ie" id="cliente_ie" class="form-control ie"
            placeholder="informe a inscrição estadual" 
            value="${cliente_ie}"/>
            <input type="hidden" name="cliente_tipo" value="2">
        </div>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="mb-3">
            <label for="cliente_sobrenome">Responsável </label>
            <input type="text" name="cliente_contato" id="cliente_contato" class="form-control"
                   placeholder="informe o nome de um responsável"
                   value="${cliente_contato}"/>
        </div>
    </div>   
</div> 

