<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Relatório</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$trader = $_POST['nome_usuario'];
				$data = $_POST['data'];
				$ativo = $_POST['ativo'];
				$gain = $_POST['gain'];
				$los = $_POST['los'];
				$corretagem = $_POST['corretagem'];
				$registro = $_POST['registro'];
				$ir = $_POST['ir'];
				$iss = $_POST['iss'];
				$valor = $_POST['valor'];
				$status = $_POST['status'];

				if($trader == ''){
					Painel::alert('erro','Selecione um Trader');
				}else if($data == ''){
					Painel::alert('erro','Data está vazia');
				}else if($ativo == ''){
					Painel::alert('erro','Selecione um Ativo');
				}else if($gain == ''){
					Painel::alert('erro','Gain está vazio');
				}else if($los == ''){
					Painel::alert('erro','Los está vazio');
				}else if($corretagem == ''){
					Painel::alert('erro','Corretagem está vazia');
				}else if($registro == ''){
					Painel::alert('erro','Registro está vazio');
				}else if($ir == ''){
					Painel::alert('erro','IR está vazio');
				}else if($iss == ''){
					Painel::alert('erro','ISS está vazio');
				}else if($valor == ''){
					Painel::alert('erro','O valor está vazio');
				}else if($status == ''){
					Painel::alert('erro','Selecione um status');
				}else{
					//Podemos cadastrar!
					$usuario = new Relatorio();
					$usuario->cadastrarRelatorio($trader,$data,$ativo,$gain,$los,$corretagem,$registro,$ir,$iss,$valor,$status);
					Painel::alert('sucesso','O cadastro do relatório do '.$trader.' foi feito com sucesso!');
				}
			}
		?>

		<div class="form-group">
			<label>Trader:</label>
			<select name="nome_usuario">
				<option value="">Selecione um Trader</option>
				<?php
					$usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
					$usuariosPainel->execute();
					$usuariosPainel = $usuariosPainel->fetchAll();
					foreach ($usuariosPainel as $key => $value) {

				?>
				<option value="<?php echo $value['nome'] ?>"><?php echo $value['nome'] ?></option>
				<?php } ?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Data:</label>
			<input formato="data" type="text" name="data">
		</div><!--form-group-->

		<div class="form-group">
			<label>Ativo:</label>
			<select name="ativo">
				<option value="">Selecione um Ativo</option>
				<option value="Win">Win</option>
				<option value="Wdo">Wdo</option>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Gain:</label>
			<input type="text" name="gain">
		</div><!--form-group-->

		<div class="form-group">
			<label>Loss:</label>
			<input type="text" name="los">
		</div><!--form-group-->

		<div class="form-group">
			<label>Corretagem:</label>
			<input type="text" name="corretagem">
		</div><!--form-group-->

		<div class="form-group">
			<label>Registro:</label>
			<input type="text" name="registro">
		</div><!--form-group-->

		<div class="form-group">
			<label>IR:</label>
			<input type="text" name="ir">
		</div><!--form-group-->

		<div class="form-group">
			<label>ISS:</label>
			<input type="text" name="iss">
		</div><!--form-group-->

		<div class="form-group">
			<label>Valor:</label>
			<input type="text" name="valor">
		</div><!--form-group-->

		<div class="form-group">
			<label>Status:</label>
			<select name="status">
				<option value="">Selecione um Status</option>
				<option value="Liberado">Liberado</option>
				<option value="Suspenso">Suspenso</option>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->
