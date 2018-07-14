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
	<h2>Listagem de Presença</h2>
	<h3><?= $palestra->getNome() ?></h3>
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
						<form action="alunos-deletar.php" method="post">
        			<input type="hidden" name="id" value="<?= $presenca->getId() ?>" />
	            <button class="waves-effect waves-light red btn">
	            	<i class="material-icons">delete_forever</i>
							</button>
      			</form>
					</td>
					<td>					
						<form action="alunos-alterar-formulario.php" method="post">
							<input type="hidden" name="id-editar" value="<?= $presenca->getId() ?>" />
							<button class="waves-effect waves-light orange btn">
								<i class="material-icons">edit</i>
							</button>
						</form>
					</td>
					<td>					
						<form action="presenca-lista-aluno.php" method="post">
							<input type="hidden" name="cpf-lista-aluno" value="<?= $aluno->getCpf() ?>" />
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


