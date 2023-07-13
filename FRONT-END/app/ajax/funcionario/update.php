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
        "nome"=> $_POST['nome'],
        "data_nascimento"=>$_POST['data_de_nascimento'],
        "genero"=>$_POST['genero'],
        "id_departamento"=>$_POST['departamento'],
        "contacto"=>$_POST['contacto'],
        "id_provincia"=>$_POST['provincia'],
        "id_distrito"=>$_POST['distrito'],     
];

//print_r($data);


$json = callapi($mainUrl . "funcionario/".$_POST['id'], "PUT", $data);
//$response = callapi($mainUrl . "funcionario/".$_GET['id'], "GET");
// print_r($data);

echo json_encode($json);
// // print_r($json);