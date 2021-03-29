<?php
	verificaPermissaoPagina(2);

	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$relatorios = Painel::select('tb_admin.relatorios','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Relatorio</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','O serviço foi editado com sucesso!');
					$relatorios = Painel::select('tb_admin.relatorios','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<select name="nome_usuario">
				<option value="<?php echo $relatorios['nome_usuario']; ?>"><?php echo $relatorios['nome_usuario']; ?></option>
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
			<label>Data</label>
			<input formato="data" type="text" name="data" value="<?php echo $relatorios['data']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Ativo</label>
			<select name="ativo">
				<?php
					if ($relatorios['ativo'] == 'Win') {
						echo '<option value="'.$relatorios['ativo'].'">'.$relatorios["ativo"].'</option>';
						echo '<option value="Wdo">Wdo</option>';
					}else {
						echo '<option value="'.$relatorios['ativo'].'">'.$relatorios["ativo"].'</option>';
						echo '<option value="Win">Win</option>';
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Gain</label>
			<input type="text" name="gain" value="<?php echo $relatorios['gain']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Loss</label>
			<input type="text" name="los" value="<?php echo $relatorios['los']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Corretagem</label>
			<input type="text" name="corretagem" value="<?php echo $relatorios['corretagem']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Registro</label>
			<input type="text" name="registro" value="<?php echo $relatorios['registro']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>IR</label>
			<input type="text" name="ir" value="<?php echo $relatorios['ir']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>ISS</label>
			<input type="text" name="iss" value="<?php echo $relatorios['iss']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valor" value="<?php echo $relatorios['valor']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Status</label>
			<select name="status">
				<?php
					if ($relatorios['status'] == 'Liberado') {
						echo '<option value="'.$relatorios['status'].'">'.$relatorios["status"].'</option>';
						echo '<option value="Suspenso">Suspenso</option>';
					}else {
						echo '<option value="'.$relatorios['status'].'">'.$relatorios["status"].'</option>';
						echo '<option value="Liberado">Liberado</option>';
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_admin.relatorios" />
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->
