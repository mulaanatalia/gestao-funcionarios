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




$response = callapi($mainUrl . "distritos/" . $_GET['provincia_id'], "GET", $data);
if (!empty($response->data)) : ?>
    <option value=""> Selecione aqui... </option>
    <?php
    foreach ($response->data as $distrito) : ?>
        <option value="<?= $distrito->id ?>"><?= $distrito->nome ?></option>
<?php
    endforeach;
endif;
