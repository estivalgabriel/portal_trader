<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.

				$nome = $_POST['nome'];
				$email = $_POST['user'];
				$senha = md5($_POST['password']);
				$usuario = new Usuario();
				if ($usuario->atualizarUsuario($nome,$email,$senha)) {
					Painel::alert('sucesso','Atualizado com sucesso!');
				}else {
					Painel::alert('erro','Ocorreu um erro ao atualizar os dados!');
				}
			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Email:</label>
			<input type="text" name="user" value="<?php echo $_SESSION['user']; ?>" required>
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" value="">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->
