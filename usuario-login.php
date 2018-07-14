<?php 
require_once("banco-usuario.php");
require_once("usuario-logica.php");

$usuario = buscaUsuario($conexao, $_POST["login"], $_POST["senha"]);
if($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido!";
    header("Location: index.php");
} else {
    $_SESSION["success"] = "Usuário logado com sucesso.";
    logaUsuario($usuario["username"]);
    header("Location: administrador.php");
}
die();