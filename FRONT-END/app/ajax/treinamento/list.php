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


$response = callapi($mainUrl . "treinamento", "GET", $data);
if (!empty($response->data)) :

    print_r($response);
?>

<div class="row">
        <div class="col-md-12 mb-3 text-right" style="text-align: right">
            <button class="btn btn-danger" id="print"> Exportar para PDF</button>
        </div>
</div>

    <?php ob_start(); ?>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Total:</strong><?= count($response->data) ?></h4>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr style="font-weight: bold; color:black">
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Duração</th>
                <?php $content .= ob_get_contents(); ?>
                <th>Acções</th>
                <?php ob_start(); ?> 
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1;
            $total_valor = 0;
            foreach ($response->data as $row): ?>
                <tr>
                    <th scope="row"><?= $cont++ ?></th>
                    <td><?= $row->nome ?></td>
                    <td><?= $row->descricao ?></td>
                    <td><?= $row->duracao ?></td>
                    <?php $content .= ob_get_contents(); ?>
                    <td class="text-center">
                        <a class="text-white btn btn-info mb-1" href="detalhes_treinamento.php?id=<?= $row->id ?>" data-toggle="tooltip" data-placement="top" title="Detalhes do Funcionario" data-original-title="Detalhes"><i class="nav-icon i-Eye-Visible text-white"></i> Detalhes</a>
                        <button id="editar_treinamento" class="text-white btn btn-primary"  value="<?= $row->id ?>" data-toggle="modal" data-target="#update_funcionario_modal"><i class="nav-icon i-Edit text-white"></i> Editar</button>
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
$_SESSION['title'] = "Listagem de Funcinário";
// $_SESSION['dataInicio'] = $_GET['data_inicio'] ?? "";
// $_SESSION['dataFim'] = $_GET['data_fim'] ?? "";
// $_SESSION['parametro1'] = "";
// $_SESSION['parametro2'] = "";
// $_SESSION['parametro3'] = "";
// $_SESSION['parametro4'] = "";

// $_SESSION['user'] = $_SESSION['name'];
?>

