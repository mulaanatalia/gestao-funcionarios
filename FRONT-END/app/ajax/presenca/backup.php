<?php @session_start();
$_SESSION['html'] = null;
$_SESSION['title'] = null;
$content = null;
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("../../api/callapi.php");
include('../../../includes.php');
include('../../Extras.php');
include_once("../pagination.php");

$extras = new Extras();

$dataActual = date("d-m-y");
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$itensPorPagina = !empty($_GET['per_page']) ? (int)$_GET['per_page'] : 10;

$data = [
    "id_Funcionario" => "",
    "nome" => !empty($_GET['nome']) ? $_GET['nome'] : "",
    "data" => !empty($_GET['data']) ? $_GET['data'] : "",
    "hora_entrada" => !empty($_GET['hora-entrada']) ? $_GET['hora_entrada'] : "",
    "hora_saida" => !empty($_GET['hora_saida']) ? $_GET['hora_saida'] : "",
    "genero" => !empty($_GET['genero']) ? $_GET['genero'] : "",
    "id_provincia" => !empty($_GET['id_provincia']) ? $_GET['id_provincia'] : "",
    "id_distrito" => !empty($_GET['distrito']) ? $_GET['distrito'] : "",
    "id_departamento" => !empty($_GET['id_departamento']) ? $_GET['id_departamento'] : "",

];

$response = callapi($mainUrl . "presencass", "GET", $data);
if (!empty($response)) :
?>
    <div class="row">
        <div class="col-md-12 mb-3 text-right" style="text-align: right">
            <button class="btn btn-danger" id="printDep"> Exportar para PDF</button>
        </div>
    </div>
    <?php ob_start(); ?>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Dia:</strong><?= $dataActual ?></h4>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr style="font-weight: bold; color:black">
                <th>#</th>
                <!-- <th>Id do Funcionario</th> -->
                <th>Nome do Funcionario</th>
                <th>Genero</th>
                <!-- <th>Data de Nascimento</th> -->
                <!-- <th>Provincia</th>
                <th>Distrito</th> -->
                <th>Contacto</th>
                <!-- <th>Departamento</th> -->
                <!-- <th>data da presenca</th> -->
                <th>Hora de Entrada</th>
                <th>Hora de Saida</th>
                <!-- <th>Activo </th> -->
                <!-- <th>Tipo de Presenca</th> -->
                <!-- <th>Usuario</th> -->
                <?php $content .= ob_get_contents(); ?>
                 <th>Accoes</th> 
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
                    <td><?= ($row->genero == 'M') ?  "Masculino" :  "Feminino" ?></td>
                    <!-- <td><?= $extras->date_format2($row->data_nascimento) ?></td>
                    <td><?= $row->provincia ?></td>
                    <td><?= $row->distrito ?></td> -->
                    <td><?= $row->contacto ?></td>
                    <!-- <td><?= $row->departamento ?></td> -->
                    <!-- <td><?= $row->data ?></td> -->
                    <td><?= $row->hora_entrada ?></td>
                    <td><?= $row->hora_saida ?></td>
                    <!-- <?php if ($row->activo == 1) { ?>  -->
                        <!-- <span class="badge badge-success">Activo</span>
                        <!-- <?php   
                        // } else { ?>
                            
                            <!-- <span class="badge badge-warning">Nao activo</span> -->
                            <!-- <?php
                        } ?></td>
                     -->
                      <?php $content .= ob_get_contents(); ?>  
                       <td class="text-center">
                        <button class="btn btn-secondary printRecibo mb-2" value="<?= $row->id ?>" type="button" title="Imprimir"><i class="fas fa-print"></i></button>
                         </td> 
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
    ob_start();
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
$content .= ob_get_contents();
$_SESSION['html'] = $content;
$_SESSION['title'] = "Listagem de Marcações";
$_SESSION['dataInicio'] = $_GET['data_inicio'] ?? "";
$_SESSION['dataFim'] = $_GET['data_fim'] ?? "";
$_SESSION['parametro1'] = "";
$_SESSION['parametro2'] = "";
$_SESSION['parametro3'] = "";
$_SESSION['parametro4'] = "";

// $_SESSION['user'] = $_SESSION['name'];
?>

<div class="modal fade" id="confirmacao_pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Pedido de Marcação</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
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