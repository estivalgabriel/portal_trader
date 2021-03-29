<?php
	verificaPermissaoPagina(2);

	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_admin.usuarios',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-usuario');
	}else if(isset($_GET['id'])){
		Painel::orderItem('tb_admin.usuarios;',$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 25;

	$usuarios = Painel::selectAll('tb_admin.usuarios',($paginaAtual - 1) * $porPagina,$porPagina);

?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Listar Usuários</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>ID</td>
			<td>Nome Completo</td>
			<td>Email</td>
			<td>Tipo</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php
			foreach ($usuarios as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['nome']; ?></td>
			<td><?php echo $value['user']; ?></td>
			<td><?php echo $value['tipo']; ?></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-trader?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-usuario?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
		</tr>

		<?php } ?>

	</table>
	</div>

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_admin.usuarios')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-usuario?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-usuario?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--paginacao-->


</div><!--box-content-->
