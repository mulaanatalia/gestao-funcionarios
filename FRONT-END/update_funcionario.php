
<?php
    session_start();
    //include_once './security/control.php';
    include_once 'includes.php';
    //include_once './security/control.php';
    include_once './app/api/callapi.php';
    $response = callapi($mainUrl . "funcionario/".$_GET['id'], "GET");
    $provincias = callapi($mainUrl . "provincia", "GET");
    $departamentos = callapi($mainUrl . "departamento", "GET");
    $distritos = callapi($mainUrl . "distrito", "GET");

    ?>

 <!DOCTYPE html>
 <html lang="en">
 <meta http-equiv="content-type" content="text/html;charset=utf-8" />

 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width,initial-scale=1" />
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <title>Portal | Funcionarios</title>
     <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
     <link href="./dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
     <link href="./dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
     <link href="./dist-assets/css/all.css" rel="stylesheet" />
     <link rel="stylesheet" href="./dist-assets/bootstrap-fileinput/css/bootstrap-icons.min.css" crossorigin="anonymous">
     <link href="./dist-assets/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
     <link href="./dist-assets/bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css" />

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
     <!-- <div class="loader-bg">
         <div class="loader-p"></div>
     </div> -->
     <!-- End preloader -->

     <div class="app-admin-wrap layout-sidebar-large">
         <?php include_once './sidebar.phtml' ?>
         <!-- =============== Left side End ================-->
         <div class="main-content-wrap sidenav-open d-flex flex-column">
             <!-- ============ Body content start ============= -->
             <div class="main-content">
                 <div class="breadcrumb">
                     <h1 class="font-weight-bold">Formulário de Cadastro</h1>
                 </div>

                 <div class="separator-breadcrumb border-top"></div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card mb-3">
                             <div class="card-body">
                                 <!-- <h1 class="h2">Filtros de pesquisa</h1> -->
                                 <form action="#" method="post" id="form_update_funcionario">
                                    <input type="hidden" value="<?= $response->data->id ?>" id="id" name="id"></input>
                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="row" hidden>
                                                 <div class="col-md-4">
                                                     <div class="kv-avatar">
                                                         <div class="file-loading">
                                                             <input id="foto_perfil" name="foto_perfil" type="file">
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;"> Nome<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input value="<?= $response->data->nome ?>" type="text" name="nome" id="nome" class="form-control" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Data de Nascimento <span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input value="<?= $response->data->data_nascimento ?>" type="date" name="data_nascimento" id="data_nascimento" class="form-control start_date" value="<?= date("Y-m-d") ?>" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Sexo<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="genero" id="genero" class="form-control select2" required>
                                                         <option value="">selecione uma opção</option>
                                                         <option <?= $response->data->genero == "M" ? "selected" : "" ?> value="M" >Masculino</option>
                                                         <option <?= $response->data->genero == "F" ? "selected" : "" ?> value="F">Feminino</option>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Departamento<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_departamento" id="id_departamento" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($departamentos->data as $item) : ?>
                                                             <option value="<?= $item->id ?>" <?= $item->nome == $response->data->departamento ? "selected": ""  ?>><?= $item->nome ?></option>
                                                         <?php endforeach ?>
                                                     </select>

                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Contacto<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <input value="<?= $response->data->contacto ?>" type="text" name="contacto" id="contacto" class="form-control" required>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia Residência<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="provincia_id" id="provincia_id" class="form-control select2" required>
                                                         <option value="">--selecione uma opção--</option>
                                                         <?php foreach ($provincias->data as $item) : ?>
                                                             <option value="<?= $item->id ?>" <?= $item->nome == $response->data->provincia ? "selected": ""  ?>><?= $item->nome ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                     <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Distrito Residência<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold">*</span></label>
                                                     <select name="id_distrito" id="id_distrito" class="form-control select2" required>
                                                     <option value=""> --selecione uma opção--</option>
                                                     <?php foreach ($distritos->data as $item) : ?>
                                                        <?php if ($item->nome == $response->data->distrito) {?>
                                                         <option value="<?= $item->id ?>" 
                                                         selected> <?= $item->nome   ?></option>
                                                        <?php } endforeach ?>

                                                     </select>
                                                 </div>
                                                 <div class="col-md-12 text-right">
                                                     <button class="btn btn-success btn-lg" type="button" id="actualizar_funcionario">Actualizar</button>
                                                 </div>
                                                 <!-- <div class="d-sm-flex" data-view="print"><span class="m-auto"></span>
                                                    <button class="btn btn-success" id="btn_registar_requerente" type="button"></button>
                                                </div> -->
                                             </div>
                                         </div>
                                     </div>
                                 </form>
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
     <script src="./dist-assets/bootstrap-fileinput/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
     <script src="./dist-assets/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
     <script src="./dist-assets/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
     <script src="./dist-assets/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
     <script src="./dist-assets/bootstrap-fileinput/js/locales/pt.js" type="text/javascript"></script>
     <script src="./dist-assets/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
     <script src="./dist-assets/bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
     <script src="./dist-assets/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>


     <!-- Script geral -->
     <script src="./js/scripts.js"></script>
     <script src="./js/anexo_script.js"></script>
     <script src="./js/api_queries.js"></script>

     <script>
         // alert()
         $(document).ready(function() {

             hideLoader();

             //activar o link actual
             $("#listagem_alunos_li").addClass("nav-item-active")
             $("#listagem_alunos_link").addClass("nav-item-active-text")

             $(".select2").select2({
                 allowClear: true,
             });

             $(document).on("change", "#provincia_id", function(e) {
                 let provincia_id = $(this).val()
                 $.ajax({
                     url: './app/ajax/distritos/list.php',
                     method: 'GET',
                     data: {
                         "provincia_id": provincia_id
                     },
                     dataType: 'html',
                     success: function(data) {
                         $("#id_distrito").html(data)
                     },
                     error: function(err) {
                         console.log(err);
                     }
                 }).always(function() {
                     // hideLoader();
                 });

             });
         });





     </script>
 </body>

 </html>