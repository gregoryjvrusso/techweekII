<?php 
require_once("php/cabecalho-administrador.php"); 
require_once("banco-aluno.php");
require_once("usuario-logica.php");

verificaUsuario();

$alunos = listaAluno($conexao);
?>

<div class="container">
	<h2>Listagem de Alunos</h2>
	
	<div class="col s12 m12">
		<table class="highlight">
  		<thead>
				<tr>
					<th>Id</th>
      		<th>Nome</th>
      		<th>CPF</th>
      		<th>E-mail</th>
      		<th>Faculdade</th>
      		<th colspan="3">Opções</th>
    		</tr>
  		</thead>

      <tbody>
      	<?php 
				foreach($alunos as $aluno) { ?>
        <tr>
          <td><?= $aluno->getId() ?></td>
          <td><?= $aluno->getNomeAluno() ?></td>
          <td><?= $aluno->getCpf() ?></td>
          <td><?= $aluno->getEmail() ?></td>
          <td><?= $aluno->getFaculdade() ?></td>
        	<td>
						<form action="aluno-deletar.php" method="post">
        			<input type="hidden" name="id" value="<?= $aluno->getId() ?>" />
	            <button class="waves-effect waves-light red btn">
	            	<i class="material-icons">delete_forever</i>
							</button>
      			</form>
					</td>
					<td>					
						<form action="aluno-formulario-alterar.php" method="post">
							<input type="hidden" name="id-editar" value="<?= $aluno->getId() ?>" />
							<button class="waves-effect waves-light orange btn">
								<i class="material-icons">edit</i>
							</button>
						</form>
					</td>
					<td>					
						<form action="presenca-lista-aluno.php" method="post">
							<input type="hidden" name="aluno-id" value="<?= $aluno->getId() ?>" />
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


