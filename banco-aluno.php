<?php 
include("conecta.php");
require_once("class/Aluno.php");

function listaAluno($conexao){
	$alunos = array();
	$resultado = mysqli_query($conexao, "select * from Alunos");

	while($alunos_array = mysqli_fetch_assoc($resultado)){

		$aluno = new Aluno();

		$aluno->setId($alunos_array{'id_aluno'});
		$aluno->setNomeAluno($alunos_array{'nome_aluno'});
		$aluno->setEmail($alunos_array{'email'});
		$aluno->setFaculdade($alunos_array{'faculdade'});
		$aluno->setSala($alunos_array{'sala'});
		$aluno->setOutras($alunos_array{'outras'});
		$aluno->setCpf($alunos_array{'cpf'});

		array_push($alunos, $aluno);
	}

	return $alunos;
}

function insereAluno($conexao, Aluno $aluno)
{
	$query = "insert into Alunos (nome_aluno, email, faculdade, sala, outras, cpf) values ('{$aluno->getNomeAluno()}', '{$aluno->getEmail()}', '{$aluno->getFaculdade()}', '{$aluno->getSala()}', '{$aluno->getOutras()}', '{$aluno->getCpf()}')";
	$resultadoDaInsersao = mysqli_query($conexao, $query);
	return $resultadoDaInsersao;
}

function removeAluno($conexao, $id) {
    $query = "delete from Alunos where id_aluno = {$id}";
    
    return mysqli_query($conexao, $query);
}

function buscaAluno($conexao, $cpf) {
    $query = "select * from alunos where cpf = '{$cpf}'";
    
    $resultado = mysqli_query($conexao, $query);
    $aluno_buscado = mysqli_fetch_assoc($resultado);

    $aluno = new Aluno();				
	$aluno->setId($aluno_buscado{'id_aluno'});
	$aluno->setNomeAluno($aluno_buscado{'nome_aluno'});
	$aluno->setEmail($aluno_buscado{'email'});
	$aluno->setFaculdade($aluno_buscado{'faculdade'});
	$aluno->setSala($aluno_buscado{'sala'});
	$aluno->setOutras($aluno_buscado{'outras'});
	$aluno->setCpf($aluno_buscado{'cpf'});
	
    return $aluno;
}

function buscaAlunoId($conexao, $id) {
    $query = "select * from alunos where id_aluno = {$id}";
    
    $resultado = mysqli_query($conexao, $query);
    $aluno_buscado = mysqli_fetch_assoc($resultado);

    $aluno = new Aluno();				
	$aluno->setId($aluno_buscado{'id_aluno'});
	$aluno->setNomeAluno($aluno_buscado{'nome_aluno'});
	$aluno->setEmail($aluno_buscado{'email'});
	$aluno->setFaculdade($aluno_buscado{'faculdade'});
	$aluno->setSala($aluno_buscado{'sala'});
	$aluno->setOutras($aluno_buscado{'outras'});
	$aluno->setCpf($aluno_buscado{'cpf'});
	
    return $aluno;
}