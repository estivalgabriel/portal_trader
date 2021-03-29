<?php
include('../includeConstants.php');
include('../classes/Painel.php');
include('../classes/MySql.php');


if(isset($_GET['id'])){
	$id = (int)$_GET['id'];
	$relatorios = Painel::select('tb_admin.relatorios','id = ?',array($id));
}else{
	Painel::alert('erro','Você precisa passar o parametro ID.');
	die();
}
?>


<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	h2{
		background: #333;
		color: white;
		padding: 8px;
	}
	.box{
		width: 900px;
		margin:0 auto;
	}

	table{
		width: 900px;
		margin-top:15px;
		border-collapse: collapse;
	}
	table td{
		font-size: 14px;
		padding:8px;
		border: 1px solid #ccc;
	}
</style>
<div class="box">
<h2><i class="fa fa-id-card-o"></i> Relatório do Trader - <?php echo $relatorios['nome_usuario']; ?></h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td style="font-weight: bold;">Data</td>
			<td style="font-weight: bold;">Ativo</td>
			<td style="font-weight: bold;">Gain</td>
			<td style="font-weight: bold;">Los</td>
			<td style="font-weight: bold;">Corretagem</td>
			<td style="font-weight: bold;">Registro</td>
			<td style="font-weight: bold;">IR</td>
			<td style="font-weight: bold;">ISS</td>
			<td style="font-weight: bold;">Valor</td>
		</tr>

		<tr>
			<td><?php echo $relatorios['data']; ?></td>
			<td><?php echo $relatorios['ativo']; ?></td>
			<td><?php echo $relatorios['gain']; ?></td>
			<td><?php echo $relatorios['los']; ?></td>
			<td><?php echo $relatorios['corretagem']; ?></td>
			<td><?php echo $relatorios['registro']; ?></td>
			<td><?php echo $relatorios['ir']; ?></td>
			<td><?php echo $relatorios['iss']; ?></td>
			<td><?php echo $relatorios['valor']; ?></td>
		</tr>

	</table>
	</div>

	</div>
