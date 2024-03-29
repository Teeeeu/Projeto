<?php 

include "UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO();
$lista = $usuarioDAO->buscar();

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
		<a class="navbar-brand" href="#">Cadastro</a>
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
						Dropdown
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
						<a class="nav-link active" href="#">Cadastro</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  href="Questoes.php">Questões</a>
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
				<h3>Usuários</h3>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modalnovo">
					<i class="fas fa-user-plus"></i>
				Novo Usuário</button>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Ações</th>

					</tr>
					<?php foreach($lista as $usuario): ?>		
						<tr>
							<td><?= $usuario->id_usuario ?></td>
							<td><?= $usuario->nome ?></td>
							<td><?= $usuario->email ?></td>
							<td>
								<a type="button" class="btn btn-danger" href="UsuariosController.php?acao=apagar&id=<?= $usuario->id_usuario ?>">
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
					</div>
				</div>

				<!-- Modal - Inserir -->


				<div class="modal fade" id="Modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="UsuariosController.php?acao=inserir" method="POST">
									<div class="form-group">
										<label for="exampleInputEmail1">Nome</label>
										<input type="Nome" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
									</div>							
									<div class="form-group">
										<label for="exampleInputEmail1">Endereço de email</label>
										<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
										<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Senha</label>
										<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
									</div>
									<button type="submit" class="btn btn-primary">Enviar</button>
								</form>
								</div>
							</div>
							</div>
							</div>

								<!-- Modal Trocar Senha -->

								<div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="UsuariosController.php?acao=alterarsenha" method="POST">				
													<div class="form-group">
														<input type="hidden" name="id" id ="campo-id">	
														<label for="exampleInputPassword1">Senha</label>
														<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
														</div>
													</form>

													</div>

														<div class="modal-footer">
															<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-primary">Salvar</button>
														</div>
													</div>		
												</div>
											</div>

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