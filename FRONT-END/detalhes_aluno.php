<?php
//include_once './security/control.php';
include_once 'includes.php';
// include_once './security/control.php';
include_once './app/api/callapi.php';
include_once('./app/Extras.php');
include_once './security/control.php';

$extras = new Extras();

// requisicao
$response = callapi($mainUrl . "aluno/" . $_GET['id'], "GET");

// print_r($response);
?>

<!DOCTYPE html>
<html lang="en" dir="">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Portal | INATRO</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="./dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="./dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="./dist-assets/css/all.css" rel="stylesheet" />
    <!-- Select2 -->
    <link rel="stylesheet" href="dist-assets/select2/css/select22.min.css" />
    <link rel="stylesheet" href="dist-assets/select2-bootstrap4-theme/select2-bootstrap.min.css" />
    <!-- ladda spin button -->
    <link rel="stylesheet" href="dist-assets/css/plugins/ladda-themeless.min.css" />
    <!-- preloader css-->
    <link rel="stylesheet" href="dist-assets/css/preloader.css" />
    <!-- favicon -->
    <link href="./dist-assets/images/logo1.png" rel="shortcut icon">

    <link href="dist-assets/css/flatpickr.min.css" rel="stylesheet">
</head>

<body class="text-left">
    <!-- Start preloader -->
    <div class="loader-bg">
        <div class="loader-p"></div>
    </div>
    <!-- End preloader -->

    <div class="app-admin-wrap layout-sidebar-large">
        <?php include_once './sidebar.phtml' ?>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="font-weight-bold">Detalhes do Aluno</h1>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <!-- <div class="text-right w-100"> -->
                                <!-- <div class="dropdown dropleft text-right float-right">
                                        <button class="btn bg-info text-white" id="dropdownMenuButton_table2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                        <div class="dropdown-menu bg-primary" aria-labelledby="dropdownMenuButton_table2">
                                             <div class="dropdown-divider"></div> -->
                                <!-- <a class="dropdown-item btn btn-primary text-white" href="./reports/pdf/documentos/fichaAluno.php?id=< $_GET['id'] ?>" target="_blank">Ficha do Aluno</a> -->
                                <!-- </div>
                                    </div> 
                                </div> -->
                                <!-- <h1 class="h2">Filtros de pesquisa</h1> -->
                                <form action="" method="post">
                                    <input type="hidden" id="aluno_id" value="<?= $_GET['id'] ?>">
                                    <input type="hidden" id="escola_id" value="<?= $_SESSION["escola_id"] ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 mb-3">
                                                    <img id="imagemAluno" <?= $response->foto != null ? 'src="' . $response->foto . '"' : (($response->foto != "") ? 'src="' . $response->foto . '"' : 'src="dist-assets/images/user.png"') ?> alt="Imagem do Aluno" class="img-fluid img-thumbnail rounded-circle avatar-xl mb-3">
                                                </div>
                                                <div class="col-md-10 col-sm-9">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for=""> Código<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->codigo ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->codigo ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for=""> Nome<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->nome ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->nome ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for=""> Outros Nome<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->outros_nomes ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->outros_nomes ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Apelido <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->apelido ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->apelido ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Data de Nascimento <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $extras->date_format2($response->data_nascimento) ?></p>
                                                            <!-- <input value="<?= $extras->date_format2($response->data_nascimento) ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Estado Civil<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->estado_civil->descricao ?></p>
                                                            <!-- <select name="estado_civil_id" id="estado_civil_id" class="form-control select" disabled>
                                                                <option> <?= $response->estado_civil->descricao ?></option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Sexo<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->genero == "M" ? "Masculino" : "Femenino" ?></p>
                                                            <!-- <select name="sexo" id="sexo" class="form-control select" disabled>
                                                                <option value="<?= $response->genero == "M" ? "Masculino" : "Femenino" ?>"><?= $response->genero == "M" ? "Masculino" : "Femenino" ?></option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Email <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->email ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->email ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Tipo Identificação<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->tipo_documento->descricao ?></p>
                                                            <!-- <select name="tipo_identificacao" id="tipo_identificacao" class="form-control select" disabled>
                                                                <option value=""><?= $response->tipo_documento->descricao ?></option>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Numero de Identificação<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->numero_documento ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" name="numero_identificacao" id="numero_identificacao" class="form-control" value="<?= $response->numero_documento ?>" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">País de Origem <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->pais->nome ?></p>
                                                            <!-- <select name="origem" id="origem" class="form-control select2" disabled>
                                                                <option value=""><?= $response->pais->nome ?></option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Classe de Veiculo <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->classe->descricao ?></p>
                                                            <!-- <select name="classe_id" id="classe_id" class="form-control select" disabled>
                                                                <option><?= $response->classe->descricao ?></option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Contacto Principal <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->telefone1 ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->telefone1 ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Contacto Alternativo<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->telefone2 ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->telefone2 ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Profissão<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->profissao ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->profissao ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Endereço<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->endereco ?></p>
                                                            <!-- <input style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;" value="<?= $response->endereco ?>" class="form-control" disabled> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3" hidden>
                                                            <label for="">Escola<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->escola->nome ?></p>
                                                            <!-- <select name="" id="" class="form-control select" disabled>
                                                                <Option><?= $response->escola->nome ?></Option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Provincia<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->provincia->nome ?></p>
                                                            <!-- <select name="provincia_id" id="provincia_id" class="form-control select" disabled>
                                                                <Option><?= $response->provincia->nome ?></Option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Distrito<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->distrito->nome ?></p>
                                                            <!-- <select name="distrito_id" id="distrito_id" class="form-control select" disabled>
                                                                <Option><?= $response->distrito->nome ?></Option>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                                        // print_r($response->anexo);
                                                ?>
                                                        <div class="table-responsive">
                                                            <table class="display table table-hover" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Ordem</th>
                                                                        <th>Tipo de Documento</th>
                                                                        <th>Data Emissão</th>
                                                                        <th>Data Validade</th>
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
                                                                            <td><?= $extras->date_format2($row->data_emissao); ?></td>
                                                                            <td><?= $extras->date_format2($row->data_validade); ?></td>
                                                                            <td><a href="<?= $row->caminho ?>" target="_blank" class="btn btn-success" data-descricao="<?= $row->tipo_documento->descricao ?>" data-caminho="<?= $row->caminho ?>">Visualizar</a></td>
<!--                                                                             <a href="--><?php //= $row->caminho ?><!--" target="_blank" rel="noopener noreferrer"><strong class="btn btn-success">Visualizar</strong></a>-->
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
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
            </button> -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="imagemModal" src="" alt="" srcset="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of main-content -->

            <!-- Footer Start -->
            <?php include_once './copyright.php' ?>
            <!-- fotter end -->
        </div>
    </div>

    <script src="./dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="./dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="./dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./dist-assets/js/scripts/script.min.js"></script>
    <script src="./dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <!-- select2 -->
    <script src="dist-assets/select2/js/lodash.min.js"></script>
    <script src="dist-assets/select2/js/select22.min.js"></script>
    <!-- ladda spin button -->
    <script src="dist-assets/js/plugins/spin.min.js"></script>
    <script src="dist-assets/js/plugins/ladda.min.js"></script>
    <!-- sweetalert2 -->
    <script src="dist-assets/js/scripts/sweetalert2@11.js"></script>

    <script src="./dist-assets/js/flatpickr.js"></script>

    <!-- VentanaCentrada.js -->
    <script src="./reports/pdf/js/VentanaCentrada.js"></script>
    <!-- pdf.js -->
    <script src="./reports/pdf/js/pdf.js"></script>

    <!-- Script geral -->
    <script src="./js/scripts.js"></script>

    <script>
        // alert()
        $(document).ready(function() {

            hideLoader();
            detalhesMarcacoes("");
            //activar o link actual
            $("#listagem_alunos_li").addClass("nav-item-active")
            $("#listagem_alunos_link").addClass("nav-item-active-text")

            $(".select2").select2({
                allowClear: true,
            });

            $(document).on("click", ".visualizar_anexo", function() {
                var descricao = $(this).data("descricao");
                var caminho = $(this).data("caminho");

                $("#exampleModalLongTitle").text(descricao);
                $("#imagemModal").attr("src", caminho);

                $("#exampleModalCenter").modal("show");
            });

            function detalhesMarcacoes(page) {
                showLoader();
                $.ajax({
                    url: './app/ajax/detalhes_marcacoes/list.php',
                    method: 'GET',
                    data: {
                        "estado": $("#estado").val(),
                        "aluno_id": $("#aluno_id").val(),
                        "servico_id": $("#servico_id").val(),
                        "delegacao_id": $("#delegacao_id").val(),
                        "escola_id": $("#escola_id").val(),
                        "page": 1,
                        "per_page": 10
                    },
                    dataType: 'html',
                    success: function(data) {
                        // console.log(data);
                        $(".list_marcacoes").html(data)
                    },
                    error: function(err) {
                        console.log(err);
                    }
                }).always(function() {
                    hideLoader();
                });
            }


        });
    </script>

</body>


</html>