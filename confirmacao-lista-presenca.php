<?php 
require_once("php/cabecalho-administrador.php"); 
require_once("banco-aluno.php");
require_once("banco-presenca.php");
require_once("banco-palestra.php");
require_once("usuario-logica.php");

verificaUsuario();

$palestra = buscaPalestra($conexao, $_POST['id-palestra']);

$presencas = listaPresencaPalestra($conexao, $palestra->getId());
?>

<div class="container">
	<div class="row">
		<div class="col m9 s12">
			<h2>Listagem de Presença</h2>
		<h3><?= $palestra->getNome() ?></h3>
		</div>
		<div class="col m3 s6">
			<form action="palestra-lista-impressa.php" method="post">
				<input type="hidden" name="id" value="<?= $palestra->getId() ?>" />
	      <button class="waves-effect waves-light orange btn">
		    	<i class="material-icons">print</i>
				</button>
			</form>
		</div>
		<div class="col m3 s6">
			<form action="palestra-email-certificados.php" method="post">
				<input type="hidden" name="id" value="<?= $palestra->getId() ?>" />
	      <button class="waves-effect waves-light blue btn">
		    	<i class="material-icons">email</i>
				</button>
			</form>
		</div>
	</div>
	<div class="col s12 m12">
		<form action="confirmacao-presenca.php" method="post">
	    <input type="hidden" value="<?= $palestra->getId() ?>" name="id">

			<table class="highlight">
	  		<thead>
					<tr>
						<th>Data</th>
	      		<th>Palestra</th>
	      		<th>Status</th>
	      		<th>Presença</th>
	    		</tr>
	  		</thead>
		    <tbody>
	      	<?php 
				foreach($presencas as $presenca) { 
					$aluno = buscaAlunoId($conexao, $presenca->getIdAluno()); ?>
					
	        <tr>
	        	<td><?= $aluno->getNomeAluno() ?></td>
	          <td><?= $aluno->getCpf() ?></td>
	          <td>
	          	<?=
	          		$presenca->getPresenca() == 1 ? "Presente" : "Faltou";
	          	?>	
        		</td>
	        	<td>
		        	<p>
					      <label>
			        		<input type="checkbox" class="filled-in" name="<?= $aluno->getId() ?>" value="1"/>
			        		<span></span>
					      </label>
					    </p>
						</td>
	        </tr>
	        <?php
					}
					?>
	      </tbody>
	    </table>
		<input type="submit" class="waves-effect waves-light green btn">
		<a class="waves-effect waves-light red btn">Cancelar</a>
		</form>
  </div>

</div>

<?php include("php/rodape.php"); ?>


