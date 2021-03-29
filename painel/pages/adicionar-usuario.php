<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
		if(isset($_POST['acao'])){
			$login = $_POST['user'];
			$senha = md5($_POST['password']);
			$nome = $_POST['nome'];
			$cargo = $_POST['cargo'];
			$tipo = $_POST['tipo'];

			if($login == ''){
				Painel::alert('erro','Preencha o e-mail');
			}else if($senha == ''){
				Painel::alert('erro','Preencha a senha');
			}else if($nome == ''){
				Painel::alert('erro','Preencha o nome completo');
			}else if($cargo == ''){
				Painel::alert('erro','Selecione o cargo');
			}else if($tipo == ''){
				Painel::alert('erro','Selecione o tipo');
			}else{
				//Podemos cadastrar!
				$usuario = new Usuario();
				$usuario->cadastrarUsuario($login,$senha,$nome,$cargo,$tipo);
				Painel::alert('sucesso','O cadastro do usuário ' .$nome.' foi feito com sucesso!');
			}
		}
		?>

		<div class="form-group">
			<label>Email:</label>
			<input type="text" name="user">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome Completo:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<option value="">Selecione o Nível</option>
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key <= $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Tipo:</label>
			<select name="tipo">
				<option value="">Selecione o Tipo</option>
				<option value="Junior">Junior</option>
				<option value="Pleno">Pleno</option>
				<option value="Sênior">Sênior</option>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->
