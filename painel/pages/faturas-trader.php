<?php
	verificaPermissaoPagina(1);

	$user = $_SESSION['nome'];

	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.faturas` WHERE trader LIKE '%$user%'");
	$sql->execute();
	$resultados = $sql->fetchAll();

?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Meus Relatórios</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>ID</td>
			<td>Data de Emissão</td>
			<td>Data de Vencimento</td>
			<td>Valor</td>
			<td>Status</td>
			<td>#</td>
		</tr>

			<?php
				foreach ($resultados as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['data']; ?></td>
				<td><?php echo $value['vencimento']; ?></td>
				<td>R$<?php echo $value['valor']; ?></td>
				<td><?php echo $value['status']; ?></td>
				<td><a target="_blank" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['fatura']; ?>"><i class="fa fa-pencil"></i> Visualizar</a></td>
			</tr>

			<?php } ?>

	</table>
	</div>

	<div class="paginacao">
	</div><!--paginacao-->


</div><!--box-content-->
