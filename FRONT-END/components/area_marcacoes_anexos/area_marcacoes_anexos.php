<div class="main-content">
    <div class="card user-profile o-hidden mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="marcacoes-tab" data-toggle="tab" href="#marcacoes" role="tab" aria-controls="photos" aria-selected="true">Marcações</a></li>
                <li class="nav-item"><a class="nav-link" id="anexos-tab" data-toggle="tab" href="#anexos" role="tab" aria-controls="anexos" aria-selected="false">Anexos</a></li>
            </ul>
            <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade active show" id="marcacoes" role="tabpanel" aria-labelledby="marcacoes-tab">
                    <div class="row">
                        <div class="table-responsive">
                            <div class="list_marcacoes"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="anexos-tab">
                    <div class="row">
                        <?php
                        if (count($response->anexo) > 0) :
                            if (!empty($response->anexo)) :
                        ?>
                                <div class="table-responsive">
                                    <table class="display table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Ordem</th>
                                                <th>Tipo de Documento</th>
                                                <th>Anexo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($response->anexo as $key => $row) : ?>
                                                <tr>
                                                    <td><?= $count++ ?></td>
                                                    <td><?= $row->tipo_documento->descricao ?></td>
                                                    <td><button id="visualizar_anexo" class="btn btn-success">Visualizar</button></td>
                                                    <!-- <a href="<?= $row->caminho ?>" target="_blank" rel="noopener noreferrer"><strong class="btn btn-success">Visualizar</strong></a> -->
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <div class="col-md-12 alert alert-info text-center">
                                    Nenhum registo encontrado!
                                </div>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="col-md-12 alert alert-info text-center">
                                Nenhum registo encontrado!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of main-content -->
</div>