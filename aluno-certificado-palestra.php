<?php
//Load Composer's autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

require 'vendor/autoload.php';

require_once 'dompdf/autoload.inc.php';
require_once("banco-aluno.php");
require_once("banco-palestra.php");
require_once("usuario-logica.php");


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
				margin-bottom: 0px;
			}
			.texto-terceiro{
				font-size: 14px;
				margin-top: 0px;
				margin-bottom: 0px;
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
				margin-bottom: 0px;
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
		<br><br>
		<p class="texto-principal" id="texto-principal">MINISTÉRIO DA EDUCAÇÃO</p>
		<p class="texto-secundario">INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA SÃO PAULO</p>
		<br>
		<p class="texto-terceiro">Criado pela Lei nº 11.892 de 29/12/2008.</p>
		<br>
		<p class="texto-secundario">CÂMPUS CUBATÃO</p>
		<br>
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

$output = $dompdf->output();

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;                              
    $mail->isSMTP();                            
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
    $mail->SMTPSecure = 'tls';                            
    $mail->SMTPAuth = true;                               
    $mail->Username = 'gregoryjvrusso@gmail.com';                
    $mail->Password = 'savoia1914';                           
    //Recipients
    $mail->setFrom('gregoryjvrusso@gmail.com', 'Mailer');
    $mail->addAddress('gregory_savoia@gmail.com', 'Joe User');     

    $mail->isHTML(true);                                  // Set email format to 
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	$mail->addAttachment($output,  'certificado.pdf', 'base64', 'application/pdf', 'attachment');
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
