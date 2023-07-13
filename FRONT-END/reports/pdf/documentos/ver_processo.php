

<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: Manacaze
 * Date: 1/2/2018
 * Time: 9:50 PM
 */
// session_start();
//    require_once('../html2pdf.class.php');
require_once '../vendor/autoload.php';
//	require_once('../html2pdf.class.php');
////	require_once('../mpdf/mpdf.php');
//    require_once '../vendor/autoload.php';

// get the HTML
ob_start();
include('./res/ver_htmlProcesso_html.php');
$content = ob_get_clean();
$title = "Rafik Gilberto";
// init HTML2PDF
// $Object = new DateTime();  
// $Object->setTimezone(new DateTimeZone('Africa/Maputo'));
// $DateAndTime = $Object->format("d-m-Y h:i:s a"); 

$DateAndTime = date('d/m/Y H:i:s a');

$html2pdf = new \Mpdf\Mpdf();
$html2pdf->showImageErrors = true;
// display the full page
$html2pdf->SetDisplayMode('fullpage');


// First ensure that you are on an Even page
// $html2pdf->AddPage('', 'E');

// Then set the headers for the next page before you add the page
// $html2pdf->SetHTMLHeader('
//     <table cellspacing="0" style="width: 100%; color:black;">
//         <tr>
//             <tr>
//                 <td style="text-align: center; border-bottom: 2px solid; border-top: 2px solid; border-left: 2px solid; border-right: 2px solid;"><img src="../img/qrcode_proc.png" alt="" style="text-align: center; width: 70px; height: 70px;"></td>
//             </tr>
//             <td style="width: 100%;text-align: center; color: #444444;" class="text-center">
//                 <div class="invoice-desc" style="text-align: center; padding-top: 0; margin-top: 0">
//                 <div style="width: 100%; text-align: center">
//                     <img src="../img/logo1.png" alt="" style="text-align: center; width: 70px; height: 70px;">
//                     <p style="text-align: center; color: black; font-weight: bold; margin-bottom: 5px;">Sistema Gestão de Processos - PROC</p>                    
//                     <p style="text-align: center; color: black; margin-bottom: 5px;">AV. Marginal </p>                    
//                     <p style="text-align: center; color: black; margin-bottom: 5px;">bv@proc.co.mz </p>
//                     <p style="text-align: center; color: black; margin-bottom: 5px;">Maputo, Moçambique</p>
//                     <p style="text-align: center; color: black; margin-bottom: 5px;"><strong style="font-weight: bold;">Impresso por: </strong>'.$title.'</p>
//                     <p style="text-align: center; color: black; margin-top: 50px; "><strong style="font-weight: bold;">Data de Processamento: </strong>17 de Fevereiro de 2023 ás 12:35</p><br><br><br><br>
//                 </div>
//                 </div>
//             </td>
//         </tr>
//     </table>', 'O');
// $html2pdf->SetHTMLHeader('
//     <table cellspacing="0" style="width: 100%; color:black;">
//         <tr>
//             <td style="width: 100%;text-align: center; color: #444444;" class="text-center">
//                 <div class="invoice-desc" style="text-align: center; padding-top: 0; margin-top: 0">
//                 <div style="width: 100%; text-align: center">
//                     <img src="../img/logo1.png" alt="" style="text-align: center; width: 70px; height: 70px;">
//                     <p style="text-align: center; color: black; font-weight: bold; margin-bottom: 5px;">Sistema Gestão de Processos - PROC</p>                    
//                     <p style="text-align: center; color: black; margin-bottom: 5px;">AV. Marginal </p>                    
//                     <p style="text-align: center; color: black; margin-bottom: 5px;">bv@proc.co.mz </p>
//                     <p style="text-align: center; color: black; margin-bottom: 5px;">Maputo, Moçambique</p>
//                     <p style="text-align: center; color: black; margin-bottom: 5px;"><strong style="font-weight: bold;">Impresso por: </strong>'.$title.'</p>
//                     <p style="text-align: center; color: black; margin-top: 50px;"><strong style="font-weight: bold;">Data de Processamento: </strong>17 de Fevereiro de 2023 ás 12:35</p><br><br><br><br>
//                 </div>
//                 </div>
//             </td>
//         </tr>
//     </table>', 'E');

$html2pdf->AddPage();
$html2pdf->SetHTMLFooter('
<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;">Academia, Consultoria & Serviços Universo - ACSUN <img src="../img/logo.png" alt="" style="width: 30px; height: 30px; text-align: left; margin-top: 200px; "> </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>', 'O');
$html2pdf->SetHTMLFooter('<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;">Academia, Consultoria & Serviços Universo - ACSUN <img src="../img/logo.png" alt="" style="width: 30px; height: 30px; text-align: left; margin-top: 200px; "> </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>', 'E');
// convert
$html2pdf->writeHTML($content);
// send the PDF
$html2pdf->Output('../../../uploaded_files/processos/'.$_GET['id'].'.pdf', "F");
$html2pdf->Output('Invoice.pdf', 'I');
