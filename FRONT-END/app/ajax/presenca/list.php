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
$dataActual = date("d-m-y");

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$itensPorPagina = !empty($_GET['per_page']) ? (int)$_GET['per_page'] : 10;

$data = [
    "nome" => !empty($_GET['nome']) ? $_GET['nome'] : "",
    "data" => !empty($_GET['data']) ? $_GET['data'] : "",
];

// print_r($data);
$response = callapi($mainUrl . "presencas", "GET", $data);
//print_r($response);
if (!empty($response)) :
?>
    <div class="row">
        <div class="col-md-12 mb-3 text-right" style="text-align: right">
            <button class="btn btn-danger" id="print"> Exportar para PDF</button>
        </div>
    </div>
    
    
    <?php ob_start(); ?>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Dia:</strong><?= $dataActual ?></h4>
        </div>
    </div>
    <?php ob_start(); ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr style="font-weight: bold; color:black">
                <th>#</th>
                <!-- <th> ID Funcionario</th> -->
                <th>Nome do Funcionário</th>
              
               
                <?php $content .= ob_get_contents(); ?>
                <th>Acções</th> 
                <th>Detalhes</th>
                <?php ob_start(); ?>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1;
            $total_valor = 0;
            foreach ($response as $row) : ?>
                <tr>
                    <th scope="row"><?= $cont++ ?></th>
                    <!-- <td><?= $row->id ?></td> -->
                    <td><?= $row->nome ?></td>
                  
                    <?php $content .= ob_get_contents(); ?>
                    <td class="text-center">
                      
                        <?php if ($row->presenca == 1 or is_null($row->presenca)) {
                                        if (is_null($row->hora_chegada)) { ?>
                                            <button value="<?= $row->id ?>" funcionario_nome="<?= $row->nome ?>" class="btn btn-outline-primary m-1 presenca_entrada">Marcar Entrada</button> <br />
                --                        <?php } else { ?>
                                            <span class="badge badge-info" style="margin-left: 10px;">Entrada marcada</span> <br />
                                        <?php } ?>

                                        <?php if (!is_null($row->hora_chegada) && is_null($row->hora_saida)) { ?>
                                            <button value="<?= $row->id ?>" funcionario_nome="<?= $row->nome ?>"class="btn btn-outline-info m-1 presenca_saida">Marcar Saida</button>     
                                            <?php } elseif (!is_null($row->hora_chegada) && !is_null($row->hora_saida)) { ?>
                                            <span class="badge badge-warning ms-5" style="margin-left: 15px;margin-top: 12px">Saída marcada</span>
                                        <?php }
                                    } else { ?>
                                        <span class="badge rounded-pill bg-danger">Ausente</span>
                                    <?php } ?>
                    
                        </td>   
                        <th>              
                         <a class="text-white btn btn-primary  mb-1" href="historico_presenca.php?id=<?= $row->id ?>" funcionario_id="<?= $row->id ?>" funcionario_nome="<?= $row->nome ?>"  data-toggle="tooltip" data-placement="top" title="Detalhes do Funcionario" data-original-title="Detalhes"><i class="nav-icon fa fa-history"></i> Histórico</a>
                         </th> 
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
        Nenhum registo encontrado.
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