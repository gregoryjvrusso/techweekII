<?php
//Load Composer's autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once("dompdff/dompdf_config.inc.php");
require_once("banco-aluno.php");
require_once("banco-palestra.php");
require_once("usuario-logica.php");

require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';

$aluno = buscaAlunoId($conexao, $_POST['id-aluno']);

$palestra = buscaPalestra($conexao, $_POST['id-palestra']);

$html = '<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Certificado - Tech Week</title>
		<style>
			body{
				background-image: url("img/fundo-certificado.jpg");
			}
			p{
				text-align: center;
				font-family: Helvetica;
			}
			.texto-principal{
				font-weight: bold;
				font-size: 25px;
				margin-top: 0px;
			}
			.texto-secundario{
				font-weight: bold;
				font-size: 18px;
				margin-top: 0px;
				margin-bottom: -25px;
			}
			.texto-terceiro{
				font-size: 14px;
				margin-top: 0px;
				margin-bottom: -25px;
			}
			#brasao{
				width: 120px;
				height: 140px;
			}
			#div-brasao{
				margin: 0 auto;
				width: 10%;
				margin-bottom: 25px;
			}
			#texto-principal{
				margin-bottom: -10px;
			}
			#texto-certificado{
				width: 70%;
				margin: 0 auto;
				font-size: 17px;
				font-weight: none;
			}
			#certificado{
				margin-top: 35px;
			}
		</style>
	</head>
	<body>
		<div id="div-brasao">
			<img src="img/brasao.png" id="brasao">
		</div>
		<p class="texto-principal" id="texto-principal">REPUBLICA FEDERATIVA DO BRASIL</p>
		<p class="texto-principal" id="texto-principal">MINISTÉRIO DA EDUCAÇÃO</p>
		<p class="texto-secundario">INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA SÃO PAULO</p>
		<p class="texto-terceiro">Criado pela Lei nº 11.892 de 29/12/2008.</p>
		<p class="texto-secundario">CÂMPUS CUBATÃO</p>
		<p class="texto-terceiro">Endereço Rua Mª Cristina, 50, Jd. Casqueiro, Cubatão - SP</p>
		<p class="texto-principal" id="certificado">CERTIFICADO</p>
		<div id="texto-certificado">
			<p>Certifico que <b>' . $aluno->getNomeAluno() . '</b>, . CPF: <b>' . $aluno->getCpf() . '</b> participou da Palestra <b>'. $palestra->getNome() . '</b> no <b>II Tech Week</b>, promovida pelo Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - Campus Cubatão do período de 20 de Novembro a 25 de Novembro de 2018.</p>
		</div>
	</body>
</html>';

$dompdf = new DOMPDF();

$dompdf->set_option('enable_html5_parser', TRUE);

$dompdf->load_html($html);

$dompdf->set_paper('A4','landscape');

$dompdf->render();

$dompdf->stream(
    "saida.pdf", 
    array(
        "Attachment" => true 
    )
);




$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
