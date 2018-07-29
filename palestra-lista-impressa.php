<?php
require_once("dompdff/dompdf_config.inc.php");
require_once("banco-presenca.php");
require_once("banco-palestra.php");
require_once("usuario-logica.php");


$palestra = buscaPalestra($conexao, $_POST['id']);

$presencas = buscaListaChamada($conexao, $palestra->getId());

$html = '<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Atenção, apenas um teste</title>
		<style>
			body{
				background-image: url("img/fundo-certificado.jpg");
				font-family: Helvetica;
			}
			p, h2{
				text-align: center;
		 	}
		 	table {
  			width: 43em;
			}
			#texto-principal{
				font-size: 35px;
				font-weight: bold;
				margin-bottom: 0px;
			}
			#texto-secundario{
				font-size: 25px;
				font-weight: bold;
				text-transform: uppercase;
				margin-top: -20px;
			}
			thead {
			  border-top: 1px solid #a5a5a5;
  			border-bottom: 1px solid #a5a5a5;
			}
			td{
  			border-bottom: 1px solid #a5a5a5;
				text-align: center;
				height: 20px;
			}
			small{
				font-size: 18px;
				font-weight: none;
			}
		</style>
	</head>
	<body>
		<p id="texto-principal">LISTA DE PRESENÇA</p>
		<p id="texto-secundario">' . $palestra->getNome() . ' - <small> ' . $palestra->getData() . '</small></p>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Cpf</th>
					<th>Assinatura</th>
				</tr>
			</thead>
			<tbody>';
  foreach($presencas as $presenca) { 
		$html.= '<tr>';
		$html.= '<td style="height:40px">' . $presenca['nome_aluno'] . '</td>';
		$html.= '<td style="height:40px">' . $presenca['cpf'] . '</td>';
		$html.= '<td style="height:40px"></td></tr>';
	} 
	$html.=	'</tbody>
		</table>
	</body>
</html>';

$dompdf = new DOMPDF();

$dompdf->set_option('enable_html5_parser', TRUE);

$dompdf->load_html($html);

$dompdf->set_paper('A4','portrait');

$dompdf->render();


$dompdf->stream(
    "saida.pdf", 
    array(
        "Attachment" => false 
    )
);

