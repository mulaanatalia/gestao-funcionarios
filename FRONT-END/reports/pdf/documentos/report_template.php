

<?php ini_set('memory_limit', '6144M');
// session_start();
/**
 * Created by PhpStorm.
 * User: Manacaze
 * Date: 1/2/2018
 * Time: 9:50 PM
 */
// session_start();
//    require_once('../html2pdf.class.php');
// require_once('../html2pdf.class.php');
// require_once('../mpdf/mpdf.php');
require_once '../vendor/autoload.php';
require_once '../../../app/Extras.php';
$extras = new Extras();
// require_once '../vendor/autoload.php';
//	require_once('../html2pdf.class.php');
////	require_once('../mpdf/mpdf.php');
//    require_once '../vendor/autoload.php';

// get the HTML
ob_start();
include('./res/ver_htmlConteudo_html.php');
$content = ob_get_clean();
$title = $_SESSION['nome'];
// init HTML2PDF
// $Object = new DateTime();  
// $Object->setTimezone(new DateTimeZone('Africa/Maputo'));
// $DateAndTime = $Object->format("d-m-Y h:i:s a"); 

$DateAndTime = date('d/m/Y H:i:s a');

$html2pdf = new \Mpdf\Mpdf();
// $html2pdf->showImageErrors = true;
// $html2pdf->cacheTables = true;
$html2pdf->simpleTables=true;
$html2pdf->packTableData=true;
// display the full page
$html2pdf->SetDisplayMode('fullpage');
// First ensure that you are on an Even page
// $html2pdf->AddPage('', 'E');
// $html2pdf->AddPage();
$html2pdf->SetHTMLFooter('
<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;"> Academia, Consultoria & Serviços Universo - ACSUN <img src="../pdf/reports/dist-assets/images/acsun.png" alt="" style="width: 10px; height: 10px; text-align: left; margin-top: 200px; "> </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>');
// $html2pdf->SetHTMLFooter('<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;">Academia, Consultoria & Serviços Universo - ACSUN <img src="" alt="" style="width: 10px; height: 10px; text-align: left; margin-top: 100px; "> </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>', 'E');
$html2pdf->SetHTMLHeader("<small><div align='botton'><label style='text-align=left' class='h6'><strong>Data da impressão: </strong>".date("d/m/Y H:i:s")."</div></small>
    <div align='botton'><label style='text-align=left' class='h6'><strong> Usuário: </strong>".$title."</div>");
// convert
$html2pdf->writeHTML($content);
// send the PDF
// $html2pdf->Output('../../../uploaded_files/processos/'.$_GET['id'].'.pdf', "F");
$html2pdf->Output('Lista de Processo.pdf', 'I');
