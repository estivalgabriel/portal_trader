<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Portal do Trader - Tiberius</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
	<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
</head>
<body>

<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">

		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome']; ?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
		</div><!--nome-usuario-->
	</div><!--box-usuario-->
	<div class="items-menu">
		<h2 <?php verificaPermissaoMenu(1); ?>>Relatórios Trader </h2>
		<a <?php selecionadoMenu('listar-relatorios'); ?> <?php verificaPermissaoMenu(1); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>listar-relatorios">Listar Relatórios</a>
		<h2 <?php verificaPermissaoMenu(1); ?>>Faturas Trader </h2>
		<a <?php selecionadoMenu('faturas-trader'); ?> <?php verificaPermissaoMenu(1); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>faturas-trader">Listar Faturas</a>
		<h2 <?php verificaPermissaoMenu(2); ?>>Relatórios</h2>
		<a <?php selecionadoMenu('listar-geral'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-geral">Listar Todos</a>
		<a <?php selecionadoMenu('cadastrar-relatorio'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-relatorio">Cadastrar Relatório</a>
		<h2 <?php verificaPermissaoMenu(2); ?>>Faturas</h2>
		<a <?php selecionadoMenu('listar-faturas'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-faturas">Listar Faturas</a>
		<a <?php selecionadoMenu('cadastrar-faturas'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-faturas">Cadastrar Faturas</a>
		<h2>Administração do painel</h2>
		<a <?php selecionadoMenu('listar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-usuario">Listar Usuários</a>
		<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>

		<?php
			$user = $_SESSION['nome'];
			$usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE nome LIKE '%$user%'");
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
				foreach ($usuariosPainel as $key => $value) {
					$id = $value['id'];
				}
		?>
		<a <?php selecionadoMenu('editar-usuario'); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario?id=<?php echo $id; ?>">Editar Perfil</a>
	</div><!--items-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->

<header>
	<div class="center">
		<div class="menu-btn">
			<i class="fa fa-bars"></i>
		</div><!--menu-btn-->

		<div class="loggout">
			<a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
		</div><!--loggout-->

		<div class="clear"></div>
	</div>
</header>

<div class="content">

	<?php Painel::carregarPagina(); ?>


</div><!--content-->
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>
