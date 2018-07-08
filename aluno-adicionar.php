<?php 
require_once("php/cabecalho.php"); 
require_once("banco-aluno.php");
require_once("class/Aluno.php");

$aluno = new Aluno();

$aluno->setNomeAluno($_POST{'nome_aluno'});
$aluno->setEmail($_POST{'email'});
$aluno->setFaculdade($_POST{'faculdade'});

if(empty($_POST['sala'])){
	$aluno->setSala("Null");
}else{
 	$aluno->setSala($_POST{'sala'});
}
if(empty($_POST['outras'])){
	$aluno->setOutras("Null");
}else{
 	$aluno->setOutras($_POST{'outras'});
}

$inserir = insereAluno($conexao, $aluno);

if($inserir) {
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
