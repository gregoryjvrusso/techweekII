<?php 
require_once("php/cabecalho.php"); 
require_once("banco-aluno.php");

$id = $_POST['id'];
removeAluno($conexao, $id);
//$_SESSION["danger"] = "Cliente removido com sucesso.";
header("Location: aluno-lista.php");
die();


include("php/rodape.php");
?>