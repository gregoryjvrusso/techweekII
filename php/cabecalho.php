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
    <a href="#" class="index.php">TECHWEEK</a>
	  <ul id="nav-mobile" class="right hide-on-med-and-down">
	    <li><a href="palestras.php">Palestras</a></li>
	    <li><a href="badges.html">Eventos</a></li>
	    <li><a href="aluno-formulario.php">Inscrição</a></li>	    
	    <li><a href="collapsible.html">Sobre nós</a></li>
	  </ul>
    </div>
  </nav>
</div>
<ul class="sidenav" id="mobile-demo">
  <li><a href="palestras.php">Palestras</a></li>
  <li><a href="badges.html">Eventos</a></li>
  <li><a href="aluno-formulario.php">Inscrição</a></li>	    
  <li><a href="collapsible.html">Sobre nós</a></li>	  
</ul>
<div class="container">
	<?php 
		//mostraAlerta("success");
		//mostraAlerta("danger");
	?>
</div>