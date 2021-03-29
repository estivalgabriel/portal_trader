<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$relatorios = Painel::select('tb_admin.relatorios','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Visualizar Relatório</h2>
	<!-- <div class="gerar-pdf">
		<a href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf?id=<?php echo $relatorios['id']; ?>" target="_blank">Gerar PDF</a>
	</div> -->

	<form method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" readonly="readonly" name="nome" value="<?php echo $relatorios['nome_usuario']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data</label>
			<input formato="data" type="text" readonly="readonly" name="data" value="<?php echo $relatorios['data']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Ativo:</label>
			<input type="text" readonly="readonly" name="ativo" value="<?php echo $relatorios['ativo']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Gain</label>
			<input type="text" name="gain" readonly="readonly" value="<?php echo $relatorios['gain']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Los</label>
			<input type="text" name="los" readonly="readonly" value="<?php echo $relatorios['los']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Corretagem</label>
			<input type="text" name="corretagem" readonly="readonly" value="<?php echo $relatorios['corretagem']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Registro</label>
			<input type="text" name="registro" readonly="readonly" value="<?php echo $relatorios['registro']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>IR</label>
			<input type="text" name="ir" readonly="readonly" value="<?php echo $relatorios['ir']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>ISS</label>
			<input type="text" name="iss" readonly="readonly" value="<?php echo $relatorios['iss']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="valor" readonly="readonly" value="<?php echo $relatorios['valor']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_admin.relatorios" />
			<!-- <a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-relatorios">Voltar</a> -->
		</div><!--form-group-->

	</form>



</div><!--box-content-->
