<?php @session_start();
$_SESSION['html'] = null;
$_SESSION['title'] = null;
$content = "";
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

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$itensPorPagina = !empty($_GET['per_page']) ? (int)$_GET['per_page'] : 10;

$data = [
    "nome" => !empty($_GET['nome']) ? $_GET['nome'] : "",
    "id_funcionario" => !empty($_GET['funcionario_id']) ? $_GET['funcionario_id'] : ""
];
$response = callapi($mainUrl . "presencas/" . $_GET["funcionario_id"] , "GET");

// print_r($response);
if (!empty($response->data)) :
?>
    <div class="row">
        <div class="col-md-12 mb-3 text-right" style="text-align: right">
            <button class="btn btn-danger" id="print"> Exportar para PDF</button>
        </div>
    </div>
    <?php //ob_start(); ?>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Total:</strong><?= count($response-> data) ?></h4>
        </div>
    </div>
    <?php ob_start(); ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr style="font-weight: bold; color:black">
                <th>#</th>
                <th>Nome</th>
                <th>Hora de Chegada</th>
                <th>Hora de Saida</th>
                <th>Data</th> 
                <th>Horas de Trabalho</th> 
                <?php $content .= ob_get_contents(); ?>
                <?php ob_start(); ?>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1;
            $total_valor = 0;
            foreach ($response->data as $row) : ?>
                <tr>
                 <th scope="row"><?= $cont++ ?></th>
                  <td><?= $row->nome ?></td>      
                  <td><?= date('H:i', strtotime($row->hora_chegada)) ?></td>
                  <td><?= $row->hora_saida == null ? "" : date('H:i', strtotime($row->hora_saida)) ?> </td>
                  <td><?= date('Y-m-d', strtotime($row->data)) ?></td>
                  <td><?= date_diff(date_create($row->hora_chegada), date_create($row->hora_saida))->format('%H:%I') ?></td>
                 

                    <?php $content .= ob_get_contents(); ?>
                    <?php ob_start(); ?>
                </tr>
            <?php
            endforeach; ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
    <?php $content .= ob_get_contents(); ?>
    <div class="row" hidden>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php //if ($_GET['limite'] != "all") { 
            $paginationButtons = paginationButtons($response->meta->current_page, $totalPaginas, $maxButtons);
            ?>
            <!-- Exibir links de paginação usando botões do Bootstrap -->
            <div class="pagination justify-content-end">
                <?= $paginationButtons ?>
            </div>

            <?php //} 
            ?>
        </div>
    </div>
<?php
    //ob_start();
else :
?>
    <div class="alert alert-info" role="alert">
        <strong class="text-capitalize">Alerta!</strong>
        Este funcionario nao tem nenhum registro..
    </div>
<?php
endif;
?>

<?php
// $content .= ob_get_contents();
$_SESSION['html'] = $content;
$_SESSION['title'] = "Listagem de Funcionarios";
// $_SESSION['dataInicio'] = $_GET['data_inicio'] ?? "";
// $_SESSION['dataFim'] = $_GET['data_fim'] ?? "";
// $_SESSION['parametro1'] = "";
// $_SESSION['parametro2'] = "";
// $_SESSION['parametro3'] = "";
// $_SESSION['parametro4'] = "";

// $_SESSION['user'] = $_SESSION['name'];
?>

<div class="modal fade" id="confirmacao_pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Pedido de Marcação</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Tem a Certeza que deseja fazer a marcação do aluno(a) </p>
                <form action="#" id="frm_confirm_request_marcac" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success ml-2 ladda-button basic-ladda-button">SIM</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger ml-2 ladda-button basic-ladda-button" type="button">NÃO</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success ml-2 ladda-button basic-ladda-button" data-style="expand-left" type="button" id="confirmar_pagamento">Submeter</button>
            </div> -->
        </div>
    </div>
</div>