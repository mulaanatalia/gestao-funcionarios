<?php
@session_start();

if (empty($_SESSION['anexo_aluno'])) {
    $_SESSION['anexo_aluno'] = [];
}

// print_r($_SESSION['anexo_aluno']);

if (count($_SESSION['anexo_aluno']) > 0) {
    if (!empty($_SESSION['anexo_aluno'])) {
        // $_SESSION['anexo_aluno'] = [];
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

                foreach ($_SESSION['anexo_aluno'] as $key => $files_processo) {
                    // print_r($files_processo['tipo_documento']);
                    foreach ($files_processo as $chave => $row) {
                        // $tipo_documento = isset($files_processo['tipo_documento']) ? $files_processo['tipo_documento'] : "";
                    // print_r($row);
                ?>
                        <tr>
                            <td>
                                <?= $row['nome_original']; ?>
                            </td>
                            <td> <?= $row['tipo_documento']; ?></td>
                            <td class="text-center">
                                <button value="<?= $key ?>" type="button" onclick="removeAnexo(this.value, 'anexo_aluno', './components/listar_anexos.php')" class="btn btn-danger">
                                    X
                                </button>
                            </td>
                        </tr>
                <?php
                    }
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