<?php
    //session_start();
    //include_once './security/control.php';
    include_once 'includes.php';
    include_once './security/control.php';
    include_once './app/api/callapi.php';

    $departamento = callapi($mainUrl. "departamento", "GET");
    $provincia = callapi($mainUrl. "provincia", "GET");
    //print_r($provincia->data);
?>


<!-- Modal -->
<div class="modal fade" id="modal_registar_funcionario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registo da Funcionario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         
          <div class="modal-body">                    
                                             <div class="row">
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;"> Nome<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input type="text" name="nome" id="nome_funcionario" class="form-control" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data de Nascimento <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input type="date" name="data_nascimento" id="data_nascimento" class="form-control start_date" value="<?= date("Y-m-d") ?>" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Sexo<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="genero" id="genero_fun" class="form-control select2" required>
                                                         <option value="">selecione uma opção</option>
                                                         <option value="M">Masculino</option>
                                                         <option value="F">Feminino</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Departamento<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_departamento" id="id_departamento" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($departamento->data as $item) : ?>
                                                             <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                    <div class="input-container">
                                                        <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Contacto<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                        <input type="tel" name="contacto" id="contacto" class="form-control"  placeholder="+258" >
                                                    </div>
                                                 </div>
                                                
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia Residência<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_provincia" id="id_provincia_modal" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($provincia->data as $item) : ?>
                                                             <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Distrito Residência<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_distrito" id="id_distrito_modal" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                     </select>
                                                 </div>
                                                 

                    

          </div>  

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fechar</button>
            <button class="btn btn-success btn-lg" type="button" id="registar_funcionario">Registar</button>
           </div>
        </div>
    </div>
</div>

