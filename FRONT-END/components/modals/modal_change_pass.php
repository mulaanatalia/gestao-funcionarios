<?php @session_start(); ?>
<!-- O modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Cabeçalho do modal -->
            <div class="modal-header">
                <h4 class="modal-title">Alterar Senha</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Corpo do modal -->
            <div class="modal-body">
                <form id="change_pass">
                    <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                    <div class="form-group">
                        <label for="senhaAntiga">Senha Antiga:</label>
                        <input type="password" class="form-control" id="senhaAntiga">
                    </div>
                    <div class="form-group">
                        <label for="novaSenha">Nova Senha:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="novaSenha" name="novaSenha">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="toggleNovaSenha" onclick="togglePassword('novaSenha')">Mostrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmarSenha">Confirmar Senha:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmarSenha" onclick="togglePassword('confirmarSenha')">Mostrar</button>
                            </div>
                        </div>
                        <div id="mensagemErro" class="text-danger" style="display: none;">
                            As senhas não conferem. Por favor, verifique novamente.
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="update_pass">Salvar</button>
                </form>
            </div>

        </div>
    </div>
</div>