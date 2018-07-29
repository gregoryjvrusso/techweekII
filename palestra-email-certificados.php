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

$palestra = buscaPalestra($conexao, $_POST['id']);
$presencas = listaPresencaPalestra($conexao, $palestra->getId());

foreach($presencas as $presenca) { 

	$aluno = buscaAlunoId($conexao, $presenca->getIdAluno()); 

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


	$mail = new PHPMailer(true);
	try {
	    $mail->SMTPDebug = 0;                              
	    $mail->isSMTP();                            
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
	    $mail->SMTPSecure = 'tls';                            
	    $mail->SMTPAuth = true;                               
	    $mail->Username = 'techweekcubatao@gmail.com';                
	    $mail->Password = 'techweek2016';                           
	    //Recipients
	    $mail->setFrom('techweekcubatao@gmail.com', 'TechWeek - IFSP - Cubatão');
	    $mail->addAddress($aluno->getEmail(), $aluno->getPrimeiroNome());     

	    $mail->isHTML(true);                                  // Set email format to 
	    $mail->Subject = 'Certificado - ' . $palestra->getNome();
	    $mail->Body    = 'Prezado, ' . $aluno->getPrimeiroNome() . '.<br><br>Segue em anexo o certificado de presença da palestra ' . $palestra->getNome() . '<br><br>Atenciosamento, <br>Organização da Techweek.';
	    $mail->AltBody = 'Prezado, ' . $aluno->getPrimeiroNome() . '. Segue em anexo o certificado de presença da palestra ' . $palestra->getNome() . 'Atenciosamento, Organização da Techweek.';
	    $mail->addStringAttachment($dompdf->output(), 'certificado.pdf');
	    $mail->send();
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}
header("Location: palestra-lista.php");
