<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="mb-3">
            <label for="cliente_cpf">CPF</label>
            <span class="text-danger"> *</span>
            &nbsp;&nbsp;<span id="cpf_error"></span>
            <input type="text" name="cliente_cpf" id="cliente_cpf" class="form-control cpf"
                   placeholder="informe o número de cpf"
                   value="${cliente_cpf}"/>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="mb-3">
            <label for="cliente_nascimento">Data Nascimento </label>
            <span id="idade" class="text-danger"></span>
            <input type="text" name="cliente_nascimento" id="cliente_nascimento"
                   class="form-control datar date-calendar"
                   placeholder="informe a data de nascimento"
                   value="${cliente_nascimento}"
            />
        </div>
    </div>
</div>