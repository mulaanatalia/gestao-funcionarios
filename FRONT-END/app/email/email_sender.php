<?php
    include_once '../../includes.php';
    include_once '../api/callapi.php';
    require '../../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Include autoload.php file
    require '../../vendor/autoload.php';

    $id = $_GET['id'];
    
    $response = callapi($mainUrl.'appointments/'.$id);

    // Create object of PHPMailer class
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    $output['error'] = false;
    $output['message'] = "";
    $output['details'] = "";

    $nome = $response->data->nome;
    $email = $response->data->email_utente;
    $servico = $response->data->marcacao;

    try {
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.correio.gov.mz';//'smtp.outlook.com';
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS

        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 587;

        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'balcaovirtual@inatro.gov.mz';//'bv.inatro@outlook.com';

        //Password to use for SMTP authentication
        $mail->Password = '12345#';//'pecbitusuvalpece';


        // Email ID from which you want to send the email
        $mail->setFrom('balcaovirtual@inatro.gov.mz');//'bv.inatro@outlook.com'
        // Recipient Email ID where you want to receive emails
        $mail->addAddress($email);
        $mail->addReplyTo($email, $nome);
        $mail->addReplyTo('jshicanha@gmail.com', 'Jose');
        $mail->addCC('jshicanha@gmail.com');
        $mail->addCC('adilson.dscg@gmail.com');
        $mail->addCC('andrewsjosemanacaze@gmail.com');
        
        // $mail->addBCC('bcc@example.com');

        $content ='<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#4caf50" style="padding: 0; margin: 0;">
        <!-- START OF TOP BAR-->
        <tr>
        <td class="full_width" align="center" width="100%" bgcolor="#4caf50" style=""><div class="div_scale" style="width:100%;">
            <table class="table_scale" width="100%" HEIGHT="42" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#4caf50" style="padding:0; margin: 0;">
                <tr>
                <td class="spacer" width="20" align="left" valign="top" bgcolor="#4caf50" style="margin: 0 !important; padding: 0 !important; line-height: 0 !important;">&nbsp;</td>
                <!-- START OF SUBJECT LINE-->
                <td class="subject_line" align="left" valign="middle" width="270" bgcolor="#4caf50" style="padding-top: 10px; padding-bottom: 10px;"><table width="100%">
                    <tr>
                        <td class="center" align="" valign="" style="font-family:Arial, sans-serif; font-style: italic; color:#fff; font-size:11px; line-height:18px;"> Portal Balcão Virtual - INATRO</td>
                    </tr>
                    </table></td>
                <!-- END OF SUBJECT LINE-->
                <td class="spacer" width="20" align="left" valign="top" bgcolor="#4caf50" style="margin: 0 !important; padding: 0 !important; line-height: 0 !important;">&nbsp;</td>
                <!-- START OF CONTACT-->
                <td class="contact" align="right" valign="middle" width="270" bgcolor="#4caf50" style="padding: 0px;"><table width="100%">
                    <tr>
                        <td class="center" align="" valign="" style="text-align: right; font-family:Arial, sans-serif; font-style: italic; color:#fff; font-size:11px; line-height:100%;"><img src="https://i.imgur.com/RxR11qU.png?1" alt="email" width="20" height="11" style="display: inline; vertical-align: middle;" /> </td>
                    </tr>
                    </table></td>
                <!-- END OF CONTACT-->
                <td class="spacer" width="20" align="left" valign="top" bgcolor="#4caf50" style="margin: 0 !important; padding: 0 !important; line-height: 0 !important;">&nbsp;</td>
                </tr>
            </table>
            </div></td>
        </tr>
        <!-- END OF TOP BAR-->

        <!-- START OF FEATURED AREA BLOCK-->
        <tr>
        <td class="full_width" align="center" width="100%" bgcolor="red" style=""><div class="div_scale" style="width:100%;">
            <table class="table_scale" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0" style="padding:0; margin: 0;">
                <tr>
                <!-- START OF LEFT COLUMN-->
                <td class="td_scale" width="600" bgcolor="red" align="center" valign="top" style="padding: 0px; font-size:14px ; color:#959595; font-family: Arial,sans-serif; line-height: 24px; "><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="red" style="margin: 0;">
                    <!-- START OF BANNER-->
                    <!-- <tr>
                        <td class="center" align="center" valign="top" bgcolor="red" style="padding:0; font-size: 16px; line-height: 24px; font-family:Lucida Sans Unicode; color:#262626; margin: 0 !important;"><a href="#" style="font-style: normal;"> <img class="img_scale" src="https://i.imgur.com/XoXUafe.png?1" width="600" height="240" alt="featured banner" border="0" style="display: block;" /> </a></td>
                    </tr> -->
                    <!-- END OF BANNER-->
                    <!-- START OF VERTICAL SPACER-->
                    <tr>
                        <td height="20" bgcolor="#f0f0f0" style="padding:0; line-height: 0;">&nbsp;</td>
                    </tr>
                    <!-- END OF VERTICAL SPACER-->
                    <!-- START OF HEADING TITLE-->
                    <tr>
                        <td class="center" align="center" valign="top" bgcolor="#f0f0f0" style="padding: 0px 20px;  text-shadow: 1px 1px 0px #ffffff;font-size:24px ; color:#444444; font-family: Lucida Sans Unicode; line-height: 34px; "> Saudações, senhor(a) '.$nome.'</td>
                    </tr>
                    <tr>
                        <td class="center" align="center" valign="top" bgcolor="#f0f0f0" style="padding: 0px 20px;  text-shadow: 1px 1px 0px #ffffff;font-size:14px ; color:#444444; font-family: Lucida Sans Unicode; line-height: 34px; "><p> Encontre em anexo o recibo com os dados de pagamento do serviço <span style="font-weight: bold;">'.$servico.'</span> </p> </td>
                    </tr>
                    
                    <!-- END OF HEADING TITLE-->
                    <!-- START OF VERTICAL SPACER-->
                    <tr>
                        <td height="10" bgcolor="#f0f0f0" style="padding:0; line-height: 0;">&nbsp;</td>
                    </tr>
                    <!-- END OF VERTICAL SPACER-->
                    
                    <!-- START OF VERTICAL SPACER-->
                    <tr>
                        <td height="20" bgcolor="#f0f0f0" style="padding:0; line-height: 0;">&nbsp;</td>
                    </tr>
                    <!-- END OF VERTICAL SPACER-->

                    <tr>
                        <td class="center" align="center" valign="top" bgcolor="#f0f0f0" style="padding: 0px 20px;  text-shadow: 1px 1px 0px #ffffff;font-size:14px ; color:#444444; font-family: Lucida Sans Unicode; line-height: 34px; "> <p> Melhores cumprimentos INATRO. </p> </td>
                    </tr>
                    </table></td>         
            </td>
        </tr>
        <!-- START OF FOOTER-->
        <tr>
        <td class="full_width" align="center" width="100%" bgcolor="#f0f0f0" style=""><div class="div_scale" style="width:100%;">
            <table class="table_scale" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0" style="padding:0; margin: 0;">
                <tr>
                <td class="" align="center" valign="top" width="600" bgcolor="#f0f0f0" style=""><table align="center" width="100%">
                        <!-- START OF TEXT-->
                    <tr>
                        <td align="center" valign="top" style="border-top: 1px solid #f0f0f0; padding: 40px 20px; font-size:13px ; color:#444444; font-family: Arial,sans-serif; line-height: 23px; "> Clique aqui para ir ao portal <a href="http://balcaovirtual.inatro.gov.mz/testes/" target="_blank" style="font-style: bold;">Portal Balcão Virtual - INATRO </a>. <br /></td>
                    </tr>
                    <!-- END OF TEXT-->
                    <!-- START OF LOGO-->
                    <tr>
                        <td align="center" valign="top" style="border-top: 1px solid #bbbbbb; padding: 20px; font-size:13px ; color:#bbbbbb; font-family: Arial,sans-serif; line-height: 23px; "><a href="https://www.inatter.gov.mz/" target="_blank" style="font-style: normal;"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Emblem_of_Mozambique.svg/1897px-Emblem_of_Mozambique.svg.png" width="120" height="120" alt="logo" border="0" style="display: inline-block;" /> </a></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="padding: 20px; font-size:13px ; color:#bbbbbb; font-family: Arial,sans-serif; "><a href="https://www.inatter.gov.mz/" target="_blank" style="font-style: normal;"> INATRO </a></td>
                    </tr>
                    <!-- END OF LOGO-->
                    </table></td>
                </tr>
            </table>
            </div></td>
        </tr>
        <!-- END OF FOOTER-->

        </table>';

        $mail->addAttachment("../../reports/documentos/saved/".$id.'.pdf');

        $mail->isHTML(true);
        $mail->Subject = "Dados para pagamento";
        $mail->Body = $content;

        if (file_exists("../../reports/documentos/saved/".$id.'.pdf')) {
            $mail->send();
            $output['error'] = false;
            $output['message'] = 'Email enviado com sucesso!';
            $output['details'] = '';
        }else{
            $output['error'] = true;
            $output['message'] = 'Houve um erro ao tentar enviar o email.';
            $output['details'] = 'Ficheiro de anexo não encontrado. Por favor volte a tentar.';
        }
    } catch (Exception $e) {
        $output['error'] = true;
        $output['message'] = 'Houve um erro ao tentar enviar o email.';
        $output['details'] = $e->getMessage();
    }

    echo json_encode($output);
       
?>