<?php
	verificaPermissaoPagina(2);

	$id = $_GET['id'];

	$id = (int)$_GET['id'];
	$usuarios = Painel::select('tb_admin.usuarios','id = ?',array($id));

 ?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>

	<form method="post">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				$email = $_POST['user'];
				$senha = md5($_POST['password']);
				$nome = $_POST['nome'];
				$tipo = $_POST['tipo'];
				$id = $_POST['id'];
				$usuario = new Usuario();
				if ($usuario->atualizarTrader($email,$senha,$nome,$tipo,$id)) {
					Painel::alert('sucesso','Atualizado com sucesso!');
					header('Location: '.INCLUDE_PATH_PAINEL.'/listar-usuario');
				}else {
					Painel::alert('erro','Ocorreu um erro ao atualizar os dados!');
				}
			}
		?>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="user" value="<?php echo $usuarios['user']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha</label>
			<input type="password" name="password" value="">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome Completo</label>
			<input type="text" name="nome" value="<?php echo $usuarios['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Tipo</label>
			<select name="tipo">
				<?php
					if ($usuarios['tipo'] == 'Junior') {
						echo '<option value="'.$usuarios['tipo'].'">'.$usuarios["tipo"].'</option>';
						echo '<option value="Pleno">Pleno</option>';
						echo '<option value="Sênior">Sênior</option>';
					}elseif($usuarios['tipo'] == 'Pleno') {
						echo '<option value="'.$usuarios['tipo'].'">'.$usuarios["tipo"].'</option>';
						echo '<option value="Junior">Junior</option>';
						echo '<option value="Sênior">Sênior</option>';
					}else {
						echo '<option value="'.$usuarios['tipo'].'">'.$usuarios["tipo"].'</option>';
						echo '<option value="Pleno">Pleno</option>';
						echo '<option value="Sênior">Sênior</option>';
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<?php $user = $_GET['id']; ?>
			<input type="hidden" name="id" value="<?php echo $user; ?> ">
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form>
</div><!--box-content-->
