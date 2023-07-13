<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <fieldset class="border p-3 mb-3">
                        <legend style="font-size: 1.2em; font-weight: 800; color: #0abf53">Anexos</legend> -->
                            <form action="#" method="post" id="form_docs">
                                <input type="hidden" id="row_id" name="row_id" />
                                <input type="hidden" id="servico_id" name="servico_id" value="12"/>
                                <input type="hidden" id="delegacao_codigo" name="delegacao_codigo" value="04"/>
                                <input type="hidden" id="estado_marcacao_id" name="estado_marcacao_id" value="1"/>
                                <input type="hidden" id="estado_pagamento" name="estado_pagamento" value="0"/>
                                <input type="hidden" id="escola_id" name="escola_id" value="<?= $_SESSION["escola_id"] ?>">

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-1">
                                            <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Registo Criminal<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="registo_criminal" name="registo_criminal" required>
                                                <label class="custom-file-label" for="photoUpload">Escolher arquivo</label>
                                            </div>
                                            <!-- <input type="file" name="anexo_aluno" class="form-control" id="anexo_aluno" cols="10" rows="1" placeholder="Carregue um ficheiro"> -->
                                            <div class="invalid-feedback">
                                                Campo de preenchimento obrigatório.
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-5 mb-2">
                                                        <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data Emissão <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="text" id="data_emissao_registo_criminal" data-inputmask="'alias': 'datetime', 'inputFormat': 'yyyy-mm-dd'" name="data_emissao_registo_criminal" class="form-control date-input" required/>
                                                    </div>
                                                    <div class="col-md-5 mb-2">
                                                        <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data Validade <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="text" id="data_validade_registo_criminal" data-inputmask="'alias': 'datetime', 'inputFormat': 'yyyy-mm-dd'" name="data_validade_registo_criminal" class="form-control date-input" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Declaração Militar<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="declaracao_militar" name="declaracao_militar" required>
                                                <label class="custom-file-label" for="photoUpload">Escolher arquivo</label>
                                            </div>
                                            <!-- <input type="file" name="anexo_aluno" class="form-control" id="anexo_aluno" cols="10" rows="1" placeholder="Carregue um ficheiro"> -->
                                            <div class="invalid-feedback">
                                                Campo de preenchimento obrigatório.
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-5 mb-2">
                                                        <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data Emissão <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="text" id="data_emissao_declaracao_militar" data-inputmask="'alias': 'datetime', 'inputFormat': 'yyyy-mm-dd'" name="data_emissao_declaracao_militar" class="form-control date-input" required/>
                                                    </div>
                                                    <div class="col-md-5 mb-2">
                                                        <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data Validade <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="text" id="data_validade_declaracao_militar" data-inputmask="'alias': 'datetime', 'inputFormat': 'yyyy-mm-dd'" name="data_validade_declaracao_militar" class="form-control date-input" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Atestado Médico<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="atestado_medico" name="atestado_medico" required>
                                                <label class="custom-file-label" for="photoUpload">Escolher arquivo</label>
                                            </div>
                                            <!-- <input type="file" name="anexo_aluno" class="form-control" id="anexo_aluno" cols="10" rows="1" placeholder="Carregue um ficheiro"> -->
                                            <div class="invalid-feedback">
                                                Campo de preenchimento obrigatório.
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-5 mb-2">
                                                        <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data Emissão <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="text" id="data_emissao_atestado_medico" data-inputmask="'alias': 'datetime', 'inputFormat': 'yyyy-mm-dd'" name="data_emissao_atestado_medico" class="form-control date-input" required/>
                                                    </div>
                                                    <div class="col-md-5 mb-2">
                                                        <label class="required form-label" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data Validade <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="text" id="data_validade_atestado_medico" data-inputmask="'alias': 'datetime', 'inputFormat': 'yyyy-mm-dd'" name="data_validade_atestado_medico" class="form-control date-input" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- </fieldset> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="btn_submit_doc">Submeter</button>
            </div>
        </div>
    </div>
</div>