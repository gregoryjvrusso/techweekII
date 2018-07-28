<?php 
include("conecta.php");
require_once("Class/Presenca.php");

function listaPresenca($conexao){
	$presenca = array();
	$resultado = mysqli_query($conexao, "select * from presencas");

	while($presencas_array = mysqli_fetch_assoc($resultado)){

		$presenca = new Presenca();

		$presenca->setId($presencas_array{'id_presencas'});
		$presenca->setIdPalestra($presencas_array{'id_palestras'});
		$presenca->setIdAluno($presencas_array{'id_alunos'});
		$presenca->setPresenca($presencas_array{'presenca'});

		array_push($presencas, $presenca);
	}

	return $presencas;
}

function listaPresencaAluno($conexao, $id){
	$presencas = array();
	$resultado = mysqli_query($conexao, "select * from presencas where id_alunos = {$id}");

	while($presencas_array = mysqli_fetch_assoc($resultado)){

		$presenca = new Presenca();

		$presenca->setId($presencas_array{'id_presencas'});
		$presenca->setIdPalestra($presencas_array{'id_palestra'});
		$presenca->setIdAluno($presencas_array{'id_alunos'});
		$presenca->setPresenca($presencas_array{'presenca'});

		array_push($presencas, $presenca);
	}

	return $presencas;
}

function listaPresencaPalestra($conexao, $id){
	$presencas = array();
	$resultado = mysqli_query($conexao, "select * from presencas where id_palestra = {$id}");
	while($presencas_array = mysqli_fetch_assoc($resultado)){

		$presenca = new Presenca();

		$presenca->setId($presencas_array{'id_presencas'});
		$presenca->setIdPalestra($presencas_array{'id_palestra'});
		$presenca->setIdAluno($presencas_array{'id_alunos'});
		$presenca->setPresenca($presencas_array{'presenca'});

		array_push($presencas, $presenca);
	}

	return $presencas;
}

function inserePresenca($conexao, Presenca $presenca)
{
	$query = "insert into presencas (id_palestra, id_alunos, presenca) values ({$presenca->getIdPalestra()}, {$presenca->getIdAluno()}, {$presenca->getPresenca()})";
	$resultadoDaInsersao = mysqli_query($conexao, $query);
	return $resultadoDaInsersao;
}

function removePresenca($conexao, $id) {
    $query = "delete from presencas where id_presencas = {$id}";
    
    return mysqli_query($conexao, $query);
}

function removePresencaAluno($conexao, $id) {
    $query = "delete from presencas where id_alunos = {$id}";
    
    return mysqli_query($conexao, $query);
}

function buscaPresenca($conexao, $id) {
    $query = "select * from alunos where id_aluno = {$id}";

    $resultado = mysqli_query($conexao, $query);
    $aluno_buscado = mysqli_fetch_assoc($resultado);
	$aluno = new Aluno();				

	$aluno->setId($alunos_array{'aluno_id'});
	$aluno->setNomeAluno($alunos_array{'nome_aluno'});
	$aluno->setEmail($alunos_array{'email'});
	$aluno->setFaculdade($alunos_array{'faculdade'});
	$aluno->setSala($alunos_array{'sala'});
	$aluno->setOutras($alunos_array{'outras'});
	$aluno->setCpf($alunos_array{'cpf'});
  
    return $aluno;
}

function confirmaPresenca($conexao, $id){
	$query = "update presencas set presenca = 1 where id_alunos = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}

function buscaListaChamada($conexao, $id){
	$query = "select a.nome_aluno, a.cpf from presencas as p inner join alunos as a on p.id_alunos = a.id_aluno where p.id_palestra = {$id} order by a.nome_aluno";
	$resultado = mysqli_query($conexao, $query);
    return $resultado;
}