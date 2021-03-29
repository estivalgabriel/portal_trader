<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Fatura</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
    if(isset($_POST['acao'])){
      $usuario = $_POST['trader'];
      $doc = $_FILES['doc'];
      $data = $_POST['data'];
			$vencimento = $_POST['vencimento'];
			$valor = $_POST['valor'];
			$status = $_POST['status'];

      if($usuario == ''){
        Painel::alert('erro','O Usuário está vazio');
      }else if($doc['name'] == ''){
        Painel::alert('erro','Você precisa anexar a fatura');
      }else if($data == ''){
        Painel::alert('erro','A data de emissão está vazia');
      }else if($vencimento == ''){
        Painel::alert('erro','A data de vencimento está vazia');
      }else if($valor == ''){
        Painel::alert('erro','O valor está vazio');
      }else if($status == ''){
        Painel::alert('erro','Selecione o status');
      }else{
        //Podemos cadastrar!
        if(Painel::docValido($doc) == false){
          Painel::alert('erro','O formato especificado não está correto!');
        }else{
          //Apenas cadastrar no banco de dados!
          $fatura = new Fatura();
          $doc = Painel::uploadFile($doc);
          $fatura->cadastrarFatura($usuario,$doc,$data,$vencimento,$valor,$status);
          Painel::alert('sucesso','O cadastro da fatura para o/a '.$usuario.' foi feito com sucesso!');
        }
      }
    }
		?>

		<div class="form-group">
			<label>Trader:</label>
			<select name="trader">
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
			<label>Anexar a Fatura</label>
			<input type="file" name="doc"/>
		</div>

		<div class="form-group">
			<label>Data de Emissão:</label>
			<input formato="data" type="text" name="data">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data de Vencimento:</label>
			<input formato="data" type="text" name="vencimento">
		</div><!--form-group-->

		<div class="form-group">
			<label>Valor:</label>
			<input type="text" name="valor">
		</div><!--form-group-->

		<div class="form-group">
			<label>Status:</label>
			<select name="status">
				<option value="">Selecione o Status</option>
				<option value="Enviado">Enviado</option>
				<option value="Pago">Pago</option>
				<option value="Cancelado">Cancelado</option>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar">
		</div><!--form-group-->

	</form>
</div><!--box-content-->
