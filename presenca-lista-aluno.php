<?php 
require_once("php/cabecalho-administrador.php"); 
require_once("banco-aluno.php");
require_once("banco-presenca.php");
require_once("banco-palestra.php");
require_once("usuario-logica.php");

verificaUsuario();

$aluno = buscaAluno($conexao, $_POST['cpf-lista-aluno']);

$presencas = listaPresencaAluno($conexao, $aluno->getId());
?>

<div class="container">
	<h2>Listagem de Alunos</h2>
	<h3><?= $aluno->getNomeAluno() ?></h3>
	
	<div class="col s12 m12">
		<table class="highlight">
  		<thead>
				<tr>
					<th>Data</th>
      		<th>Palestra</th>
      		<th>Presença</th>
      		<th colspan="3">Opções</th>
    		</tr>
  		</thead>

      <tbody>
      	<?php 
				foreach($presencas as $presenca) { 
					$palestra = buscaPalestra($conexao, $presenca->getIdPalestra()); ?>

        <tr>
        	<td><?= $palestra->getData() ?></td>
          <td><?= $palestra->getNome() ?></td>
          <td>
          	<?=
          		$presenca->getPresenca() == 1 ? "Presente" : "Faltou";
          	?>	
        	</td>
        	<td>
						<form action="alunos-deletar.php" method="post">
        			<input type="hidden" name="id" value="<?= $aluno->getId() ?>" />
	            <button class="waves-effect waves-light red btn">
	            	<i class="material-icons">delete_forever</i>
							</button>
      			</form>
					</td>
					<td>					
						<form action="alunos-alterar-formulario.php" method="post">
							<input type="hidden" name="id-editar" value="<?= $aluno->getId() ?>" />
							<button class="waves-effect waves-light orange btn">
								<i class="material-icons">edit</i>
							</button>
						</form>
					</td>
					<td>					
						<form action="aluno-certificado-palestra.php" method="post">
							<input type="hidden" name="id-aluno" value="<?= $aluno->getId() ?>" />
							<input type="hidden" name="id-palestra" value="<?= $palestra->getId() ?>">
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


