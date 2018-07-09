<?php 
require_once("php/cabecalho-administrador.php"); 
require_once("banco-palestra.php");

$palestras = listaPalestra($conexao);
?>

<div class="container">
	<h2>Listagem de Palestras</h2>
	
	<div class="col s12 m12">
		<table class="highlight">
  		<thead>
				<tr>
					<th>Id</th>
      		<th>Título</th>
      		<th>Data</th>
      		<th>Local</th>
      		<th colspan="3">Opções</th>
    		</tr>
  		</thead>

      <tbody>
      	<?php 
				foreach($palestras as $palestra) { ?>
        <tr>
          <td><?= $palestra->getId() ?></td>
          <td><?= $palestra->getNome() ?></td>
          <td><?= $palestra->getData() ?></td>
          <td><?= $palestra->getLocal() ?></td>
        	<td>
						<form action="palestra-deletar.php" method="post">
        			<input type="hidden" name="id" value="<?= $palestra->getId() ?>" />
	            <button class="waves-effect waves-light red btn">
	            	<i class="material-icons">delete_forever</i>
							</button>
      			</form>
					</td>
					<td>					
						<form action="palestra-formulario-alterar.php" method="post">
							<input type="hidden" name="id-editar" value="<?= $palestra->getId() ?>" />
							<button class="waves-effect waves-light orange btn">
								<i class="material-icons">edit</i>
							</button>
						</form>
					</td>
					<td>					
						<form action="confirmacao-lista-presenca.php" method="post">
							<input type="hidden" name="id-palestra" value="<?= $palestra->getId() ?>" />
							<button class="waves-effect waves-light green btn">
								<i class="material-icons">search</i>
							</button>
						</form>
					</td>
        </tr>
        <?php
				}
				?>
      </tbody>
    </table>
  </div>
</div>

<?php include("php/rodape.php"); ?>


