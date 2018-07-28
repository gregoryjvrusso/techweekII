<?php 
require_once("php/cabecalho.php"); 
require_once("banco-aluno.php");
require_once("banco-presenca.php");
require_once("Class/Presenca.php");
require_once("Class/Aluno.php");

$aluno = new Aluno();

$aluno->setNomeAluno($_POST{'nome_aluno'});
$aluno->setEmail($_POST{'email'});
$aluno->setFaculdade($_POST{'faculdade'});
$aluno->setCpf($_POST{'cpf'});

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
	$alunoBuscado = buscaAluno($conexao, $aluno->getCpf());
	if(isset($_POST['palestra1'])){
		$presenca = new Presenca();
		$presenca->setIdAluno($alunoBuscado->getId());
		$presenca->setIdPalestra($_POST['palestra1']);
		$presenca->setPresenca(0);

		$inserirPresenca = inserePresenca($conexao, $presenca);
	}
	if(isset($_POST['palestra2'])){
		$presenca = new Presenca();
		$presenca->setIdAluno($alunoBuscado->getId());
		$presenca->setIdPalestra($_POST['palestra2']);
		$presenca->setPresenca(0);

		$inserirPresenca = inserePresenca($conexao, $presenca);
	}
	if(isset($_POST['palestra3'])){
		$presenca = new Presenca();
		$presenca->setIdAluno($alunoBuscado->getId());
		$presenca->setIdPalestra($_POST['palestra3']);
		$presenca->setPresenca(0);

		$inserirPresenca = inserePresenca($conexao, $presenca);
	}
	if(isset($_POST['palestra4'])){
		$presenca = new Presenca();
		$presenca->setIdAluno($alunoBuscado->getId());
		$presenca->setIdPalestra($_POST['palestra4']);
		$presenca->setPresenca(0);

		$inserirPresenca = inserePresenca($conexao, $presenca);
	}
	header("Location: aluno.php");
	die();
	
} else {
	/*$msg = mysqli_error($conexao);
	
	$_SESSION["danger"] = "O Aluno não foi adicionado!  <?= $msg ?>";*/
	header("Location: aluno.php");
	die();
}


include("php/rodape.php"); ?>
