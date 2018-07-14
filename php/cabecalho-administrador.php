<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
//include("mostra-alerta.php"); ?>

<html>
<head>
	<meta charset="utf-8">
	<title>Techweek</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="./css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="./css/estilo.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<nav class="green lighten-1">
	<div class="container ">
	  <div class="nav-wrapper">
	    <a href="#" class="brand-logo">TECHWEEK</a>
	    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

		  <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li>
      		<a class="dropdown-trigger" href="#!" data-target="dropdownPalestra">Palestras<i class="material-icons right">arrow_drop_down</i></a>
	  		</li>
	  		<li>
      		<a class="dropdown-trigger" href="#!" data-target="dropdownAluno">Alunos<i class="material-icons right">arrow_drop_down</i></a>
	  		</li>
		    <li><a href="badges.html">Eventos</a></li>
		    <li><a href="collapsible.html">Sobre nós</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
    </div>
  </div>
</nav>

<ul class="sidenav" id="mobile-demo">
  <li><a href="eventos.php">Eventos</a></li>
  <li><a href="sobre-nos.php">Sobre nós</a></li>
  <li><a href="logout.php">Logout</a></li>

</ul>
<ul id="dropdownPalestra" class="dropdown-content">
  <li><a href="palestra-lista.php">Painel</a></li>
  <li><a href="palestra-formulario.php">Adicionar</a></li>
  <li class="divider"></li>
</ul>
<ul id="dropdownAluno" class="dropdown-content">
  <li><a href="aluno-lista.php">Painel</a></li>
  <li><a href="aluno-formulario.php">Adicionar</a></li>
  <li class="divider"></li>
</ul>
<div class="container">
	<?php 
		//mostraAlerta("success");
		//mostraAlerta("danger");
	?>
</div>