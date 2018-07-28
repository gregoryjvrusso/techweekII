<?php
require_once("dompdf/dompdf_config.inc.php");
require_once("banco-aluno.php");
require_once("banco-palestra.php");
require_once("usuario-logica.php");
require_once("PHPMailer/src/PHPMailer.php");

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
        "Attachment" => false 
    )
);

define('GUSER', 'techweekcubatao@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'Techweek2016');		// <-- Insira aqui a senha do seu GMail


if (smtpmailer('gregoryjvrusso@gmail.com', 'techweekcubatao@gmail.com', 'Nome do Enviador', 'Assunto do Email', 'teste')) {

	Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.
}
if (!empty($error)) echo $error;

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}
