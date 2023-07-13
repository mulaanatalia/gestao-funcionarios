<?php 
    @session_start();
    date_default_timezone_set("Africa/Johannesburg");
    include_once '../../../phpqrcode/qrlib.php';
    include_once '../../../includes.php';
    include_once '../../../app/api/callapi.php';

    $response = callapi($mainUrl.'pedido/'.$_GET['id']);


    // print_r($response);

    $text = $_GET['id'];
  
    $path = "./img/qr/";
    $file = $path.$text.".png";
    
    // $ecc stores error correction capability('L')
    $ecc = 'L';
    $pixel_size = 10;
    $frame_size = 4;
    
    // Generates QR Code and Stores it in directory given
    QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);
  
?>

<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <style>
        @page {
            margin: 7px;
            font-family: Cambria, Georgia, serif;
        }

        body {
            color: black;
        }

        table {
            color: black;
        }

        p {
            color: black;
        }

        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid black;
            margin: 1em 0;
            padding: 0;
            margin-top: 2px;
        }
    </style>
</head>

<body>
    <div style="width: 100%; text-align: center">
        <img src="./img/logo1.png" alt="" style="text-align: center; width: 50px;">
    </div>
    <table border="0">
        <tr>
            <td style="color: black; font-weight: bold; font-size: 10px; text-align: center;">INATRO</td>
        </tr>
        <tr>
            <td style="font-size: 10px; text-align: center; text-decoration: underline;">Marcação Escola</td>
        </tr>
        <hr>
        <tr>
            <td style="color: black; font-weight: bold; text-align:center;"><b>Informação de Pagamento</b></td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Nome do Cliente:</b>
                <br>
                <?=$response->aluno->nome." ".$response->aluno->apelido?>
            </td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Serviço a Pagar:</b>
                <br>
                <?=$response->servico->descricao?>
            </td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Entidade</b>
                <br>
                <?=$response->entidade?>
            </td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Referência:</b>
                <br>
                <?=$response->referencia?>
            </td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Montante:</b>
                <br>
                <?=number_format($response->valor,'2',',','.')?>
            </td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Data de Validade:</b>
                <br>
                <?=date('d/m/Y', strtotime($response->validade_referencia));?>
            </td>
        </tr>
        <tr>
            <td>
                <b style="color: black; font-weight: bold; ">Local de atendimento:</b>
                <br>
                Maputo
                <!-- <//$response->data->local_atendimento;?> -->
            </td>
        </tr>
        <br>
        <br>
        <tr>
            <td style="font-size: 10px;"><b style="color: black; font-weight: bold;">Nota:</b> Poderá efectuar o pagamento do serviço pela <br> SIMO Rede(ATM, POS .24, balcão BCI ou mais canais <br>
                online do BCI). Após o pagamento, poderá consultar a <br> data e hora de atendimento no portal.</td>
        </tr>
        <tr>
            <td style="text-align: center;"><img src="<?=$file?>" alt="" style="text-align: center; width: 70%; height: 70%;"></td>
        </tr>
        <tr>
            <td style="color: black; font-weight: bold; font-size: 10px; text-align: center;">Telefone: 21 31 11 79 Telefax: 21 32 65 67 inatro@gov.mz <br> www.inatter.gov.mz <br> Maputo - Moçambique</td>
        </tr>
        <br><br>
        <tr>
            <td style="font-size: 10px; text-align: center;">Data de Emissão: <?=date('d/m/Y H:i:s')?> </td>
        </tr>
        <br><br>
        <tr>
            <td style="font-size: 10px; text-align: center;">Documento Processado por Computador</td>
        </tr>
    </table>
</body>

</html>