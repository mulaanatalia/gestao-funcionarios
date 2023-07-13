<?php
@session_start();
include_once "../includes.php";
include_once "../app/api/callapi.php";

$data = ["row_id"=>$_POST['row_id'], "tabela"=>$_POST['tabela']];
$anexos = callapi($mainUrl . "anexo", "GET", $data);

if (count($anexos->data) > 0) {
    if (!empty($anexos->data)) {
        // $anexos->data = [];
?>
        <!-- <div class="table-responsive"> -->
        <table class="table table-bordered">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-top-2 border-gray-200">
                    <th class="fw-bold"><b>Anexo</b></th>
                    <!-- <th class="fw-bold"><b>Descrição</b></th> -->
                    <th class="fw-bold"><b>Tipo Documento</b></th>
                    <th class="fw-bold"><b>Acções</b></th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($anexos->data as $key => $row) {
                    // print_r($key);                            
                ?>
                    <tr>
                        <td>
                            <?= $row->nome_original; ?>
                        </td>
                        <td> <?= $row->tipo_documento->descricao; ?></td>
                        <td class="text-center">
                            <button value="<?= $key ?>" type="button" onclick="removeAnexo(this.value, 'anexo_aluno', './components/listar_anexos.php')" class="btn btn-danger">
                                X
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    <?php } else { ?>
        <div class="alert alert-info text-center">
            Nenhum registo encontrado!
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="alert alert-info text-center">
        Nenhum registo encontrado!
    </div>
<?php } ?>