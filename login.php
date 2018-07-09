<?php 
require_once("php/cabecalho.php");
require_once("usuario-logica.php");
?>
<div class="container">
	<h2>LOGIN</h2>
	<div class="row">
		<div class="col m8 s12">
			<form action="usuario-login.php" method="post">
				<div class="input-field col s12 m12">
	        <input placeholder="login" id="login" type="text" class="validate" name="login" required>
	        <label for="login">Login</label>
	      </div>	

	      <div class="input-field col s12 m12">
	        <input placeholder="senha" id="senha" type="password" class="	validate" name="senha" required>
	        <label for="senha">Senha</label>
	      </div>	
				<input type="submit" class="waves-effect waves-light green btn">
			</form>
		</div>
	</div>
</div>

<?php include("php/rodape.php"); ?>


