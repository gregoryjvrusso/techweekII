<?php 
require_once("php/cabecalho.php"); 
require_once("banco-palestra.php");
require_once("class/Palestra.php");

$palestra = new Palestra();

$palestra->setId($_POST{'id'});
$palestra->setNome($_POST{'nome_palestra'});
$palestra->setLocal($_POST{'local_palestra'});
$palestra->setData($_POST{'data'});
$palestra->setHorario($_POST{'horario'});
$palestra->setLimiteVagas($_POST{'vagas'});

$alterar = alteraPalestra($conexao, $palestra);
var_dump($alterar);die;
if($alterar) {
	/*$_SESSION["success"] = "O Aluno <?= nomeAluno; ?> foi adicionado com sucesso!";*/
	header("Location: index.php");
	die();
	
} else {
	/*$msg = mysqli_error($conexao);
	
	$_SESSION["danger"] = "O Aluno não foi adicionado!  <?= $msg ?>";*/
	header("Location: index.php");
	die();
}


include("php/rodape.php"); ?>
