<?php 
require_once("php/cabecalho.php"); 
?>

<div class="container">
	<h2>INSCRIÇÃO</h2>

	<form  action="aluno-adicionar.php"  method="post" class="col s12">
		<div class="row">
      <div class="input-field col s12 m12">
        <input placeholder="Nome" id="nome_aluno" type="text" class="	validate" name="nome_aluno">
        <label for="nome_aluno">Nome Completo</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12 m12">
        <input placeholder="Email" id="email" type="email" class="	validate" name="email">
        <label for="email">E-mail</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12 m12">
        <input placeholder="Cpf" id="cpf" type="text" class="validate" name="cpf">
        <label for="cpf">CPF</label>
      </div>
    </div>

	<div class="row">
	    <div class="input-field col m6 s12">
		    <select name="faculdade">
		      <option value="" disabled selected>Faculdade</option>
		      <option value="IFSP">IFSP - Campus Cubatão</option>
		      <option value="Outras">Outras</option>
		    </select>
		    <label>Faculdade</label>
	  	</div>
  	</div>

  	<div class="row">
      <div class="input-field col s12 m12">
        <input placeholder="Turma" id="sala" type="text" class="validate" name="sala">
        <label for="sala">Turma</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12 m12">
        <input placeholder="Nome Faculdade" id="outras" type="text" class="	validate" name="outras">
        <label for="outras">Nome Faculdade</label>
      </div>
    </div>
		<div class="divider"></div>
		<h5>Palestras</h5>
		
		<h6>25 de Outubro -Terça-Feira</h6>
		<div class="row">
			<div class="col m6 s12">
		    <p>
		      <label>
		        <input type="checkbox" class="filled-in" name="palestra1" value="1"/>
		        <span>Palestra 1 <small>19h45 às 20h40</small></span>
		      </label>
		    </p>
	    </div>
	    <div class="col m6 s12">
		    <p>
		      <label>
		        <input type="checkbox" class="filled-in" name="palestra2" value="2"/>
		        <span>Palestra 2 <small>21h00 às 21h40</small></span>
		      </label>
		    </p>
	    </div>
    </div>

    <h6>26 de Outubro -Terça-Feira</h6>
		<div class="row">
			<div class="col m6 s12">
		    <p>
		      <label>
		        <input type="checkbox" class="filled-in" name="palestra3" value="3"/>
		        <span>Palestra 3 <small>19h45 às 20h40</small></span>
		      </label>
		    </p>
	    </div>
	    <div class="col m6 s12">
		    <p>
		      <label>
		        <input type="checkbox" class="filled-in" name="palestra4" value="4"/>
		        <span>Palestra 4 <small>21h00 às 21h40</small></span>
		      </label>
		    </p>
	    </div>
    </div>
		<input type="submit" class="waves-effect waves-light green btn">
		<a class="waves-effect waves-light red btn">Cancelar</a>

	</form>
</div>


<?php include("php/rodape.php");?> 