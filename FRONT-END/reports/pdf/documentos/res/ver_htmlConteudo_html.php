<?php session_unset();
@session_start();
date_default_timezone_set("Africa/Johannesburg");
$conteudo = $_SESSION['html'];
$title = $_SESSION['title'];
$dataInicio = $_SESSION['dataInicio']=="" ? "" : $extras->date_format2($_SESSION['dataInicio']);
$dataFim = $_SESSION['dataFim']=="" ? "" : $extras->date_format2($_SESSION['dataFim']);
// print_r($_SESSION);
$parametro1 = isset($_SESSION['parametro1']) ? $_SESSION['parametro1'] : "";
$parametro2 = $_SESSION['parametro2'];
$parametro3 = $_SESSION['parametro3'];
$parametro4 = $_SESSION['parametro4'];
?>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <style>

        body {
            color: black !important;
        }

        div,table,thead,tr,th,td {
            color: black !important;
        }

        p {
            color: black !important;
        }
    </style>
</head>

<body style="font-size: 10px; font-family: arial; background: white; padding-top: 0; color:black">
<div class="padding white" style="padding-top: 0; color:black">
    <div class="">
        <?php
        include("cabecalho.php");
        //        echo "<br/>";
        ?>

        <table cellspacing="0" style="width: 100%; color: black">
            <tr>
                <td style="width: 100%; color: black;" class="text-center" style="text-align: left">
                    <h3>Parametros da pesquisa:</h3><br>
                    <?php if(isset($dataInicio) && !empty($dataInicio) && isset($dataFim) && !empty($dataFim)){?>
                        <p><?= $dataInicio ?> <?php echo "  | "; ?> <?= $dataFim?> </p>
                        <?php
                    }
                    ?>
                    <p><?= $parametro1 ?></p>
                    <p><?= $parametro2 ?></p>
                    <p><?= $parametro3 ?></p>
                    <p><?= $parametro4 ?></p>
                </td>
            </tr>
        </table>


        <div class="" style="color:black;">

            <div class="text-center" style="text-align:center; color:black">
                <h2 style="color:black;">
                    <?= $title ?>
                </h2>
            </div>
            <br/>
            <div class="text-left" style="width: 100%; color:black">
                <?=$conteudo?>
            </div>
        </div>
        <br>
    </div>
</div>
</body>
</html>

