<?php 
require_once("php/cabecalho-administrador.php"); 
require_once("banco-palestra.php"); 
require_once("usuario-logica.php");

verificaUsuario();
$id = $_POST['id-editar'];
$palestra = buscaPalestra($conexao, $id);
?>

<div class="container">
	<h2>ALTERAR PALESTRA</h2>
	<div class="row">
		<form  action="palestra-alterar.php"  method="post" class="col s12 m6">
		
	    <input type="hidden" value="<?= $palestra->getId() ?>" name="id">

		<div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Título" id="nome_palestra" type="text" class="	validate" value="<?= $palestra->getNome() ?>" name="nome_palestra">
	        <label for="nome_palestra">Título</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Local" id="local" type="text" class="validate" value="<?= $palestra->getLocal() ?>" name="local_palestra">
	        <label for="local">Local</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Data" id="data" type="text" class="validate" value="<?= $palestra->getDataAlterar() ?>" name="data">
	        <label for="data">Data</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Quantidade de vagas" id="vagas" type="text" class="validate" value="<?= $palestra->getLimiteVagas() ?>" name="vagas">
	        <label for="vagas">Vagas</label>
	      </div>
	    </div>

	    <div class="row">
	      <div class="input-field col s12 m12">
	        <input placeholder="Horário" id="horario" type="text" class="validate" value="<?= $palestra->getHorario() ?>" name="horario">
	        <label for="horario">Horário</label>
	      </div>
	    </div>
	 	
		<input type="submit" class="waves-effect waves-light green btn">
		<a class="waves-effect waves-light red btn">Cancelar</a>

		</form>
	</div>
</div>


<?php include("php/rodape.php");?> 