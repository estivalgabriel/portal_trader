<?php
	verificaPermissaoPagina(2);
	
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$faturas = Painel::select('tb_admin.faturas','id = ?',array($id));
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
					Painel::alert('sucesso','A fatura foi editada com sucesso!');
					$faturas = Painel::select('tb_admin.faturas','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
		?>

		<div class="form-group">
			<label>Nome do Trader:</label>
			<select name="trader">
				<option value="<?php echo $faturas['trader'] ?>"><?php echo $faturas['trader'] ?></option>
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
			<label>Data de Emissão</label>
			<input formato="data" type="text" name="data" value="<?php echo $faturas['data']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data de Vencimento</label>
			<input formato="data" type="text" name="vencimento" value="<?php echo $faturas['vencimento']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Valor:</label>
			<input type="text" name="valor" value="<?php echo $faturas['valor']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Status</label>
			<select name="status">
			  <?php
			    if ($faturas['status'] == 'Enviado') {
			      echo '<option value="'.$faturas['status'].'">'.$faturas["status"].'</option>';
			      echo '<option value="Pago">Pago</option>';
			      echo '<option value="Cancelado">Cancelado</option>';
			    }else if($faturas['status'] == 'Pago') {
			      echo '<option value="'.$faturas['status'].'">'.$faturas["status"].'</option>';
			      echo '<option value="Enviado">Enviado</option>';
			      echo '<option value="Cancelado">Cancelado</option>';
			    }else {
			      echo '<option value="'.$faturas['status'].'">'.$faturas["status"].'</option>';
			      echo '<option value="Enviado">Enviado</option>';
			      echo '<option value="Pago">Pago</option>';
			    }
			  ?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_admin.faturas" />
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->
