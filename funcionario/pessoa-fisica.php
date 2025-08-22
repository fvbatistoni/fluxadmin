<div class="row">
    <div class="col-md-3 col-lg-3 col-sm-12">
        <div class="mb-3">
            <label for="funcionario_cpf">CPF</label>
            <span class="text-danger"> *</span>
            &nbsp;&nbsp;<span id="cpf_error"></span>
            <input type="text" name="funcionario_cpf" id="funcionario_cpf" class="form-control cpf" placeholder="informe o número de cpf" value="${funcionario_cpf}" />
        </div>
    </div>

    <div class="col-md-3 col-lg-3 col-sm-12">
        <div class="mb-3">
            <label for="funcionario_nascimento">Data Nascimento </label>
            <span id="idade" class="text-danger"></span>
            <span class="text-danger">*</span>
            <input type="text" name="funcionario_nascimento" id="funcionario_nascimento" class="form-control datar date-calendar" placeholder="informe a data de nascimento" value="${funcionario_nascimento}" />
        </div>
    </div>





    <div class="col-3">
        <div class="mb-3">
            <label for="funcionario_estado_civil">Estado Cívil</label>
            <select name="funcionario_estado_civil" id="funcionario_estado_civil" class="form-control" >
                <option disabled="disabled" <?php if (empty($data['funcionario']->funcionario_estado_civil)) : ?>selected <?php endif; ?> >Selecione um estado cívil</option>
                <option <?php if ($data['funcionario']->funcionario_estado_civil == 'casado') : ?>selected <?php endif; ?> value="casado">Casado</option>
                <option <?php if ($data['funcionario']->funcionario_estado_civil == 'solteiro') : ?>selected <?php endif; ?> value="solteiro">Solteiro</option>
                <option <?php if ($data['funcionario']->funcionario_estado_civil == 'divorciado') : ?>selected <?php endif; ?> value="divorciado">Divorciado</option>
            </select>
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="funcionario_sexo">Sexo</label>
            <select name="funcionario_sexo" id="funcionario_sexo" class="form-control">
            <option disabled="disabled" <?php if (empty($data['funcionario']->funcionario_sexo)) : ?>selected <?php endif; ?> >Selecione</option>
                <option <?php if ($data['funcionario']->funcionario_sexo == 'feminino') : ?>selected <?php endif; ?>value="feminino">Feminino</option>
                <option <?php if ($data['funcionario']->funcionario_sexo == 'masculino') : ?>selected <?php endif; ?> value="masculino">Masculino</option>
            </select>
        </div>
    </div>
</div>