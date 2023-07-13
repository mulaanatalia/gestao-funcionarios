<?php
// session_start();
//    require_once('../html2pdf.class.php');
    require_once '../vendor/autoload.php';
//	require_once('../html2pdf.class.php');
////	require_once('../mpdf/mpdf.php');
//    require_once '../vendor/autoload.php';

    // get the HTML
     ob_start();
     include('./res/ver_htmlRecibo_html.php');
    $content = ob_get_clean();
    // $title = $_SESSION["user"];
    // init HTML2PDF
    // $Object = new DateTime();  
    // $Object->setTimezone(new DateTimeZone('Africa/Maputo'));
    // $DateAndTime = $Object->format("d-m-Y h:i:s a"); 
    
    $DateAndTime = date('d/m/Y H:i:s a');

    $html2pdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [72.1, 250]]);
    // $html2pdf->showImageErrors = true;
    // display the full page
    // $html2pdf->SetDisplayMode('fullpage');

    // $html2pdf->AddPage();
    // $html2pdf->SetFooter($title ." | ". $DateAndTime );
    // convert
    $html2pdf->writeHTML($content);
    // send the PDF
    // $html2pdf->Output('./saved/'.$_GET['id'].'.pdf', "F");
    $html2pdf->Output('recibo_'.$_GET['id'].'.pdf', 'I');

    
