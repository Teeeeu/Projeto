<?php 
include "QuestoesDAO.php";

$questoesDAO = new QuestoesDAO();
$lista = $questoesDAO->buscar();

?>



<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Questões</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Ação</a>
						<a class="dropdown-item" href="#">Outra ação</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Algo mais aqui</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Desativado</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
			</form>
		</div>
	</nav>

		<div class="container-fluid">
		<div class = "row">
			<div class="col-2">
				<ul class="nav flex-column nav-pills vertical">
					<li class="nav-item">
						<a class="nav-link active" href="usuarios.php">Cadastro</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Questões</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Desativado</a>
					</li>
				</ul>
			</div>
			<div class="col-10" >
				<h3>Questões</h3>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modalvelho">
					<i class="fas fa-edit"></i> Insira uma Nova Questão</button>
				<table class="table">
					<tr>
						<th>#</th>
					</tr>
					<?php foreach($lista as $questao): ?>		
						<tr>
							<td><?= $questao->id_questoes ?></td>
							<td><?= $questao->Enunciado ?></td>
							<td><?= $questao->Tipo ?></td>
							<td>
								<a type="button" class="btn btn-danger" href="QuestoesController.php?acao=apagar&id=<?= $questao->id_questoes ?>">
									<i class="fas fa-user-times"></i></a>
									<button type="button" class="btn btn-warning">
										<i class="fas fa-user-edit"></i></button>
										<button type="button" class="alterar-senha btn btn-success" href="UsuariosController.php?acao=alterarsenha&id=<?= $usuario->id_usuario ?>" data-toggle="modal" data-target="#modalsenha" data-id="<?= $usuario->id_usuario ?>">
											<i class="fas fa-key"></i></button>

										</td>

									</tr>
								<?php endforeach ?>
				</table>
			</div>


					<!-- Modal - Inserir -->

					<div class="modal fade" id="Modalvelho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Nova questão</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="QuestoesController.php?acao=inserir" method="POST">
									<div class="form-group">
										<label for="exampleInputEmail1">Questao</label>
										<input type="Nome" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">

									</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Tipo</label>
									<input type="Nome" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
									</div>
									<button type="submit" class="btn btn-primary">Enviar</button>



				</body>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

				<script type="text/javascript">
											
				var botao = document.querySelector(".alterar-senha");
				botao.addEventListener("click", function(){
					var campo = document.querySelector("#campo-id");
					campo.value = botao.getAttribute("data-id");
				});


				</script>
				</html>
			