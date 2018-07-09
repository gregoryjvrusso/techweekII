<?php 
require_once("php/cabecalho.php"); 
require_once("banco-presenca.php");
require_once("class/Presenca.php");

$presencas = listaPresencaPalestra($conexao, $_POST['id']);

foreach($presencas as $presenca){
	foreach($_POST as $campo => $valor){
		if($campo == $presenca->getIdAluno()){
			confirmaPresenca($conexao, $presenca->getIdAluno());
		}
	}		
}

header("Location: index.php");
die();
