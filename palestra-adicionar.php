<?php 
require_once("php/cabecalho.php"); 
require_once("banco-palestra.php");
require_once("Class/Palestra.php");

$palestra = new Palestra();

$palestra->setNome($_POST{'nome_palestra'});
$palestra->setLocal($_POST{'local_palestra'});
$palestra->setData($_POST{'data'});
$palestra->setHorario($_POST{'horario'});
$palestra->setLimiteVagas($_POST{'vagas'});

$inserir = inserePalestra($conexao, $palestra);

if($inserir) {
	/*$_SESSION["success"] = "O Aluno <?= nomeAluno; ?> foi adicionado com sucesso!";*/
	header("Location: palestra-lista.php");
	die();
	
} else {
	/*$msg = mysqli_error($conexao);
	
	$_SESSION["danger"] = "O Aluno não foi adicionado!  <?= $msg ?>";*/
	header("Location: palestra-lista.php");
	die();
}


include("php/rodape.php"); ?>
