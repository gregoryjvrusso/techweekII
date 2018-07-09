<?php 
require_once("php/cabecalho.php"); 
require_once("banco-palestra.php");

$id = $_POST['id'];
removePalestra($conexao, $id);
//$_SESSION["danger"] = "Cliente removido com sucesso.";
header("Location: index.php");
die();


include("php/rodape.php");
?>