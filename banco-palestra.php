<?php 
include("conecta.php");
require_once("Class/Palestra.php");

function listaPalestra($conexao){
	$palestras = array();
	$resultado = mysqli_query($conexao, "select * from palestras");

	while($palestras_array = mysqli_fetch_assoc($resultado)){

		$palestra = new Palestra();

		$palestra->setId($palestras_array{'id_palestra'});
		$palestra->setNome($palestras_array{'nome_palestra'});
		$palestra->setLocal($palestras_array{'local_palestra'});
		$palestra->setDataBanco($palestras_array{'data_palestra'});
		$palestra->setLimiteVagas($palestras_array{'limite_vagas'});
		$palestra->setHorario($palestras_array{'horario'});

		array_push($palestras, $palestra);
	}

	return $palestras;
}

function inserePalestra($conexao, Palestra $palestra)
{
	$query = "insert into palestras (nome_palestra, local_palestra, data_palestra, limite_vagas, horario) values ('{$palestra->getNome()}', '{$palestra->getLocal()}', '{$palestra->getDataBanco()}', {$palestra->getLimiteVagas()}, '{$palestra->getHorario()}')";
	
	$resultadoDaInsersao = mysqli_query($conexao, $query);
	
	return $resultadoDaInsersao;
}

function removePalestra($conexao, $id) {
    $query = "delete from palestras where id_palestra = {$id}";
    
    return mysqli_query($conexao, $query);
}

function alteraPalestra($conexao, $palestra) {
    $query = "update palestras set nome_palestra = '{$palestra->getNome()}', local_palestra = '{$palestra->getLocal()}', data_palestra = '{$palestra->getDataBanco()}', limite_vagas = {$palestra->getLimiteVagas()}, horario = '{$palestra->getHorario()}' where id_palestra = {$palestra->getId()}";
    
    return mysqli_query($conexao, $query);
}

function buscaPalestra($conexao, $id) {
    $query = "select * from palestras where id_palestra = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $palestra_buscada = mysqli_fetch_assoc($resultado);

	$palestra = new Palestra();				
	$palestra->setId($palestra_buscada{'id_palestra'});
	$palestra->setNome($palestra_buscada{'nome_palestra'});
	$palestra->setLocal($palestra_buscada{'local_palestra'});
	$palestra->setDataBanco($palestra_buscada{'data_palestra'});
	$palestra->setLimiteVagas($palestra_buscada{'limite_vagas'});
	$palestra->setHorario($palestra_buscada{'horario'});

    return $palestra;
}