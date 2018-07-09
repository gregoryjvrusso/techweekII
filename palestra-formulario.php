<?php 
require_once("php/cabecalho-administrador.php"); 
?>

<div class="container">
	<h2>CADASTRAR PALESTRA</h2>
	<div class="row">
		<form  action="palestra-adicionar.php"  method="post" class="col s12 m6">
			<div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Título" id="nome_palestra" type="text" class="	validate" name="nome_palestra">
	        <label for="nome_palestra">Título</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Local" id="local" type="text" class="validate" name="local_palestra">
	        <label for="local">Local</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Data" id="data" type="text" class="validate" name="data">
	        <label for="data">Data</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Quantidade de vagas" id="vagas" type="text" class="validate" name="vagas">
	        <label for="vagas">Vagas</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Horário" id="horario" type="text" class="validate" name="horario">
	        <label for="horario">Horário</label>
	      </div>
	    </div>
	 	
		<input type="submit" class="waves-effect waves-light green btn">
		<a class="waves-effect waves-light red btn">Cancelar</a>

		</form>
	</div>
</div>


<?php include("php/rodape.php");?> 