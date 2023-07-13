<?php
include_once 'includes.php';
// include_once './security/control.php';
include_once './app/api/callapi.php';
include_once('./app/Extras.php');
include_once './security/control.php';

$extras = new Extras();

// requisicao
$totais = callapi($mainUrl . "dashboard_totais", "GET");
?>
<!DOCTYPE html>
<html lang="en" dir="">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard v1 | Gull admin template</title>
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
       
        <!-- <div class="switch-overlay"></div> -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
           
            <div class="main-content pt-4">
                <div class="breadcrumb">
                    <h1 class="mr-2">Version 1</h1>
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li>Version 1</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG-->
                    <div class="col-lg-4 col-md-8 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Add-User"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Total de Funcionarios</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?=$totais->total?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Financial"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Total de Funcionarios Activos</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?=$totais->total_activos?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0 w-100">Total de Funcionarios Inactivos</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?=$totais->total_inativos?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-13">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">Total por genero</div>
                                <div id="echartPie" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title"> Total por departamento</div>
                                <div id="basicBar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">Basic line chart(Product Trends by Month)</div>
                                <div id="basicLine-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="sidebar-overlay open"></div>
            <!-- Footer Start -->
            <?php include_once './copyright.php' ?>
           
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    
        <!-- PAGINATION CONTROL -->
        
    </div>
    <!-- ============ Search UI End ============= -->
    <script src="./dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="./dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="./dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./dist-assets/js/scripts/script.min.js"></script>
    <script src="./dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <script src="./dist-assets/js/flatpickr.js"></script>
    <script src="./dist-assets/js/plugins/echarts.min.js"></script>
    <script src="./dist-assets/js/scripts/echart.options.min.js"></script>
    <script src="./dist-assets/js/scripts/dashboard.v1.script.min.js"></script>
    <script src="dist-assets/js/plugins/apexcharts.min.js"></script>
    <!-- <script src="dist-assets/js/scripts/apexBarChart.script.min.js"></script>
    <script src="dist-assets/js/plugins/apexcharts.min.js"></script>
    <script src="dist-assets/js/scripts/apexChart.script.min.js"></script> -->
    <script src="./js/dashboard.js"></script>

    <script>
        $(document).ready(function(){
            $("#dashboard_li").addClass("nav-item-active")
            $("#dashboard_link").addClass("nav-item-active-text")
        });
    </script>

</body>


<!-- Mirrored from demos.ui-lib.com/gull/html/layout4/dashboard1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Aug 2021 10:00:11 GMT -->
</html>