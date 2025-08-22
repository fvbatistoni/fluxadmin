<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="mb-3">
            <label for="funcionario_cpf">CNPJ</label>
            <span class="text-danger">*</span>
            &nbsp;&nbsp;<span id="cnpj_error"></span>
            <input type="text" name="funcionario_cnpj" id="funcionario_cnpj" class="form-control cnpj"
                   placeholder="informe um número de CNPJ"
                   value="${funcionario_cnpj}"/>
        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="mb-3">
            <label for="funcionario_rg">I.E</label>
            <input type="text" name="funcionario_ie" id="funcionario_ie" class="form-control ie"
            placeholder="informe a inscrição estadual" 
            value="${funcionario_ie}"/>
            <input type="hidden" name="funcionario_tipo" value="2">
        </div>
    </div>
</div>
   
