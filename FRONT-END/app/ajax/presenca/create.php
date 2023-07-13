<?php
@session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../includes.php';
include_once '../../api/callapi.php';


$data = [
        "id_funcionario"=> $_POST['funcionario_id']
];


$json = callapi($mainUrl . "presenca", "POST", $data);
echo json_encode($json);
