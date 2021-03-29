<?php
	verificaPermissaoPagina(1);

	$user = $_SESSION['nome'];

	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.relatorios` WHERE nome_usuario LIKE '%$user%'");
	$sql->execute();
	$resultados = $sql->fetchAll();

?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Meus Relatórios</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>Data</td>
			<td>Valor</td>
			<td>Status</td>
			<td>#</td>
		</tr>

			<?php
				foreach ($resultados as $key => $value) {
				$status = $value['status'];

			?>
			<tr>
				<td><?php echo $value['data']; ?></td>
				<td>R$<?php echo $value['valor']; ?></td>
				<td><?php echo $value['status']; ?></td>
				<?php if ($status != 'Suspenso'): ?>
					<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>visualizar-relatorio?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Visualizar</a></td>
				<?php else: ?>
					<td>Relatório Indisponível</td>
				<?php endif; ?>
			</tr>

			<?php } ?>

	</table>
	</div>

	<div class="paginacao">
	</div><!--paginacao-->


</div><!--box-content-->
