<?php @session_start();
$_SESSION['html'] = null;
$_SESSION['title'] = null;
$content = null;
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../api/callapi.php";
include('../../../includes.php');
include('../../Extras.php');
include_once "../pagination.php";

$extras = new Extras();




$funcionario = callapi($mainUrl . "funcionario/".$_GET["id"], "GET");
$provincia = callapi($mainUrl . "provincia", "GET");
$departamento = callapi($mainUrl. "departamento", "GET");

$distrito = callapi($mainUrl . "distrito", "GET");


if(!empty($funcionario->data)){

?>

<form action="#" method="post">

                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="row" hidden>
                                                 <div class="col-md-4">
                                                     <div class="kv-avatar">
                                                         <div class="file-loading">
                                                             <input id="foto_perfil" name="foto_perfil" type="file">
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;"> Nome<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                    <input type="text" value="<?=$funcionario->data->nome?>" name="nome" id="nome_modal" class="form-control" required>
                                                    </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data de Nascimento <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input type="date" name="data_nascimento" id="data_nascimento" class="form-control start_date" value="<?=$extras->date_format3($funcionario->data->data_nascimento)?>" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Genero <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="genero" id="genero_modal" class="form-control select2" required>
                                                         <option value="">selecione uma opção</option>
                                                         <option <?=$funcionario->data->genero == "M" ? "selected" : ""?> value="M">Masculino</option>
                                                         <option <?=$funcionario->data->genero == "F" ? "selected" : ""?> value="F">Feminino</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Departamento<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_departamento" id="id_departamento" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($departamento->data as $item) : ?>
                                                             <option <?=$funcionario->data->departamento == $item->nome ? "selected" : ""?> value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Contacto<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input type="text" value="<?=$funcionario->data->contacto?>" name="contacto" id="contacto" class="form-control" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia Residência<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_provincia_modal" id="id_provincia_modal" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($provincia->data as $item) : ?>
                                                            <?php if($funcionario->data->provincia == $item->nome) :
                                                               $distritos = callapi($mainUrl . "distritos/" . $item->id, "GET", $data);                         
                                                            ?>
                                                             <option selected  value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                             <?php else: ?>
                                                                <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                             <?php endif ?>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Distrito Residência<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_distrito_modal" id="id_distrito_modal" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($distritos->data as $item) : ?>
                                                             <option <?= $item->nome == $funcionario->data->distrito ? "selected" : "" ?> value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 
                                             </div>
                                         </div>
                                     </div>
                                 </form>

<?php } ?>