<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
@session_start();
include "../../api/callapi.php";
include('../../../includes.php');
include('../handle_upload_anexos.php');
include("../uploadDirs.php");

$json['message'] = null;
$json['error'] = false;

function handleFileUpload($file, $filePath, $sessionId = null)
{
    if (!empty($file)) {
        $data = handleMultiFileUpload($file, $filePath);
        $data['anexo_aluno']['tipo_documento'] = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : "";
        $response["message"] = "Upload com sucesso";
        $response["data"] = $data;
        $response["status"] = 200; 
        // print_r($data);
        // Verifica se a variável $sessionId está definida antes de acessar a sessão
        if ($sessionId) {
            array_push($_SESSION[$sessionId], $data);
        }

        return $response;
    }
}


if (!empty($_FILES)) {
    $fileDir = "alunos";
    $idSessao = $_POST["session_aluno"];

    $uploadDirs = uploadDirs($fileDir);
    $response = handleFileUpload($_FILES, $uploadDirs, $idSessao ?? null);
}
// print_r($_SESSION[$sessionId]);
echo json_encode($response);
