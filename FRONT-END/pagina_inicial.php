<?php include_once './security/control.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Portal | INATRO</title>
    <!-- App favicon -->
    <link href="./dist-assets/images/logo1.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="./dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="./dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="./dist-assets/css/all.css" rel="stylesheet" />
    <link href="dist-assets/css/flatpickr.min.css" rel="stylesheet">
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php include_once './sidebar.phtml' ?>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Página Inicial</h1>
                    <!-- <ul>
                        <li><a href="#">UI Kit</a></li>
                        <li>Buttons</li>
                    </ul> -->
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h1> <strong>Bem-vindo ao Sistema de Gestão de Funcionários!</strong><br>

                                    Simplifique a administração dos seus colaboradores com nossa plataforma intuitiva. Acesse rapidamente informações vitais, como perfis de funcionários, registros de ponto, folha de pagamento e benefícios.</h1>
                                <!-- <div class="card-title">Default Buttons</div> -->

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
    <script src="./dist-assets/js/flatpickr.js"></script>
    <!-- Script geral -->
    <script src="./js/scripts.js"></script>
</body>


</html>