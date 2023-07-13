<?php
session_start();
//include_once './security/control.php';
include_once 'includes.php';
// include_once './security/control.php';
include_once './app/api/callapi.php';
include_once('./app/Extras.php');


$extras = new Extras();

// requisicao

$response = callapi($mainUrl . "funcionario/".$_GET['id'], "GET");

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
                    <h1 class="font-weight-bold">Detalhes do Funcionário</h1>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                               
                                <form action="" method="post">
                                    <input type="hidden" id="funcionario_id" value="<?= $_GET['id'] ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                
                                                <div class="col-md-10 col-sm-9">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for=""> Nome<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->data->nome ?></p>
                                                            
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Género<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->data->genero ?></p>
                                                            
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Contacto <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->data->contacto?></p>
                                                            
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-3">
                                                            <label for="">Data de Nascimento <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $extras->date_format2($response->data->data_nascimento) ?></p>
                                                            
                                                        </div>
                                                        
                                    
                                                        
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Departamento<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->data->departamento ?></p>
                                                            
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Provincia<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->data->provincia ?></p>
                                                            
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="">Distrito<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                                            <p style="font-family:'Times New Roman', Times, serif; font-size: 14px; color: #2C304D; font-weight: 600;" class="form-control"><?= $response->data->distrito ?></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
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

