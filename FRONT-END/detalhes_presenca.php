<?php
@session_start();
include_once './includes.php';
include_once './security/control.php';
include_once './app/api/callapi.php';

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
    <link rel="stylesheet" href="dist-assets/select2/css/select22.min.css" />
    <link rel="stylesheet" href="dist-assets/select2-bootstrap4-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="dist-assets/css/toastr.min.css">

    <!-- preloader css-->
    <link rel="stylesheet" href="dist-assets/css/preloader.css" />
    <!-- favicon -->
    <link href="./dist-assets/images/logo1.png" rel="shortcut icon">
    <link href="dist-assets/css/flatpickr.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="dist-assets/css/plugins/sweetalert2.min.css"> -->
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
                    <h1 class="font-weight-bold">Lista das Presencas</h1>
                    <!-- <ul>
                        <li><a href="#">Home</a></li>
                        <li>Buttons</li>
                    </ul> -->
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <!-- <h1 class="font-weight-bold">Multas</h1><br> -->
                                <div class="row">
                                    <div class="col-md-12 text-right ">
                                        <!-- <button  href="rg_aluno.php" class="btn btn-success btn-lg" type="button" id="registar">Registar</button> -->
                                        <!-- <a  data-toggle="modal" data-target="#modal_registar_presenca" class="btn btn-success btn-lg">Registar</a> -->
                                    </div>
                                </div>
                                <!-- CAMPO DOS FILTROS DE PESQUISA  -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome do funcionario</label>
                                        <input type="text" class="form-control" name="nome" id="nome" />
                                    </div>
                                    
                                    <!-- <div class="col-md-4 mb-3">
                                        <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data </label>
                                        <input type="date" class="form-control" name="data" id="data" />
                                    </div> -->
                                    <div class="col-md-4 mb-3">
                                        <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Hora de entrada</label>
                                        <input type="time" class="form-control" name="hora_chegada" id="hora_chegada" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Hora de Saida</label>
                                        <input type="time" class="form-control" name="hora_saida" id="hora_saida" />
                                    </div>



                                    <div class="col-md-12 mb-3 text-right" style="text-align: right">
                                        <button class="btn btn-secondary btn-lg search pesquisar">Pesquisar</button>
                                        <!-- <a class="text-white btn btn-info mb-1" href="detalhes_funcionario.php?id=<?= $row->id ?>" data-toggle="tooltip" data-placement="top" title="Detalhes do Funcionario" data-original-title="Detalhes"><i class="nav-icon i-Eye-Visible text-white"></i> Detalhes</a> -->
                                    </div>
                                </div>
                                <br><br>

                                <div class="table-responsive">
                                    <div class="presenca"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of main-content -->
            <!-- <?php include_once './components/modals/rg_presenca.php'; ?> -->

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
    <script src="dist-assets/js/flatpickr.js"></script>
    <script src="./js/imask.js"></script>
    <!-- Script geral -->
    <script src="./js/scripts.js"></script>
    <!-- <script src="dist-assets/js/scripts/sweetalert.script.min.js"></script> -->
    <script src="dist-assets/js/scripts/sweetalert2@11.js"></script>
    <script src="dist-assets/select2/js/lodash.min.js"></script>
    <script src="dist-assets/select2/js/select22.min.js"></script>
    <script src="dist-assets/js/toastr.min.js"></script>

    <!-- VentanaCentrada.js -->
    <script src="./reports/pdf/js/VentanaCentrada.js"></script>
    <!-- pdf.js -->
    <script src="./reports/pdf/js/pdf.js"></script>
    <script src="./js/anexo_script.js"></script>
    <script src="dist-assets/js/jquery.inputmask.min.js"></script>
    <script src="./js/api_queries.js"></script>
    <script src="./js/pagination.js"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2({
                allowClear: true,
            });

            list("");

            $(document).on('click', '.pagination a', paginaClickHandler);

            $("#listagem_funcionarios_li").addClass("nav-item-active")
            $("#listagem_funcionarios_link").addClass("nav-item-active-text")

            $(".pesquisar").click(function() {
                list("")
            })

            // $("#departamento").change(function() {
            //     // alert($(this).val())
            //     $.ajax({
            //         url: './app/ajax/distritos/list.php',
            //         method: 'GET',
            //         data: {
            //             "provincia_id": $(this).val(),
            //         },
            //         dataType: 'html',
            //         success: function(data) {
            //             // console.log(data);
            //             $("#distrito_id").html(data)
            //         },
            //         error: function(err) {
            //             console.log(err);
            //         }
            //     }).always(function() {
            //         hideLoader();
            //     });
            // })
        });
        // $("#departamento").change(function() {
        //         // alert($(this).val())
        //         $.ajax({
        //             url: './app/ajax/departamento/list.php',
        //             method: 'GET',
        //             data: {
        //                 "departamento": $(this).val(),
        //             },
        //             dataType: 'html',
        //             success: function(data) {
        //                 // console.log(data);
        //                 $("#departamento").html(data)
        //             },
        //             error: function(err) {
        //                 console.log(err);
        //             }
        //         }).always(function() {
        //             hideLoader();
        //         });
        //     })
        $("#detalhes").click(function() {
            // alert($("#depart").val())
            $.ajax({
                url: './app/ajax/presenca/backup.php',
                method: 'POST',
                data: {
                    "nome": $("#depart").val()
                },
                dataType: 'html',
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Presenca Registada com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    list("")
                    document.getElementById('close').click();
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })




        hideLoader();

        function list(page) {
            // alert(page)
            showLoader();
            $.ajax({
                url: './app/ajax/presenca/backup.php',
                method: 'GET',
                data: {
                    "nome": $("#nome").val(),
                    // "data": $("data").val(),
                    "hora_chegada": $("#hora_chegada").val(),
                    "hora_chegada": $("#hora_chegada").val(),

                },
                dataType: 'html',
                success: function(data) {
                    // console.log(data);
                    $(".presenca").html(data)
                },
                error: function(err) {
                    console.log(err);
                }
            }).always(function() {
                hideLoader();
            });
        }
    </script>
</body>

</html>