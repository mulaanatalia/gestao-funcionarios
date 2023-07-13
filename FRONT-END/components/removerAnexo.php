<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function remove_from_session($session_name, $key)
{
    session_start();
    if (isset($_SESSION[$session_name][$key])) {
        unset($_SESSION[$session_name][$key]);
        session_write_close();
        $json['success'] = true;
        $json['message'] = "Removida com sucesso";
    } else {
        $json['error'] = true;
        $json['message'] = "Houve um erro ao tentar remover.";
    }

    echo json_encode($json);

    return $json;
}

remove_from_session($_POST['session_name'], intval($_POST['id']));