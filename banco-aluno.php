<?php 
include("conecta.php");
require_once("class/Aluno.php");

function listaAluno($conexao){
	$alunos = array();
	$resultado = mysqli_query($conexao, "select * from Alunos");

	while($alunos_array = mysqli_fetch_assoc($resultado)){

		$aluno = new Aluno();

		$aluno->setId($alunos_array{'aluno_id'});
		$aluno->setNomeAluno($alunos_array{'nome_aluno'});
		$aluno->setEmail($alunos_array{'email'});
		$aluno->setFaculdade($alunos_array{'faculdade'});
		$aluno->setSala($alunos_array{'sala'});
		$aluno->setOutras($alunos_array{'outras'});


		array_push($alunos, $aluno);
	}

	return $alunos;
}

function insereAluno($conexao, Aluno $aluno)
{
	$query = "insert into Alunos (nome_aluno, email, faculdade, sala, outras) values ('{$aluno->getNomeAluno()}', '{$aluno->getEmail()}', '{$aluno->getFaculdade()}', '{$aluno->getSala()}', '{$aluno->getOutras()}')";
	$resultadoDaInsersao = mysqli_query($conexao, $query);
	return $resultadoDaInsersao;
}

function removeAluno($conexao, $id) {
    $query = "delete from Alunos where id_aluno = {$id}";
    
    return mysqli_query($conexao, $query);
}

function buscaAluno($conexao, $id) {
    $query = "select * from alunos where id_aluno = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $aluno_buscado = mysqli_fetch_assoc($resultado);

	$cliente = new Cliente();				
	$aluno->setId($alunos_array{'aluno_id'});
	$aluno->setNomeAluno($alunos_array{'nome_aluno'});
	$aluno->setEmail($alunos_array{'email'});
	$aluno->setFaculdade($alunos_array{'faculdade'});
	$aluno->setSala($alunos_array{'sala'});
	$aluno->setOutras($alunos_array{'outras'});

    return $aluno;
}