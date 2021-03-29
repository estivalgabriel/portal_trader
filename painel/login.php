<?php
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
				$info = $sql->fetch();
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome'];
				$_SESSION['img'] = $info['img'];
				header('Location: '.INCLUDE_PATH_PAINEL);
				die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Portal do Trader - Login | Tiberius</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
</head>
<body>
	<div class="login">
		<div class="box-login">
			<?php
				if(isset($_POST['acao'])){
					$user = $_POST['user'];
					$password = md5($_POST['password']);
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
					$sql->execute(array($user,$password));
					if($sql->rowCount() == 1){
						$info = $sql->fetch();
						//Logamos com sucesso.
						$_SESSION['login'] = true;
						$_SESSION['user'] = $user;
						$_SESSION['password'] = $password;
						$_SESSION['cargo'] = $info['cargo'];
						$_SESSION['nome'] = $info['nome'];
						$_SESSION['img'] = $info['img'];
						if(isset($_POST['lembrar'])){
							setcookie('lembrar',true,time()+(60*60*24),'/');
							setcookie('user',$user,time()+(60*60*24),'/');
							setcookie('password',$password,time()+(60*60*24),'/');
						}
						header('Location: '.INCLUDE_PATH_PAINEL);
						die();
					}else{
						//Falhou
						echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
					}
				}
			?>
			<h2>Portal do Trader</h2>
			<form method="post">
				<input type="text" name="user" placeholder="Email" required>
				<input type="password" name="password" placeholder="Senha" required>
				<div class="form-group-login right">
					<input type="submit" name="acao" value="Entrar">
				</div>
				<div class="form-group-login left">
					<label class="lembre">Lembrar-me</label>
					<input type="checkbox" name="lembrar" />
				</div>
				<div class="clear"></div>
			</form>
		</div><!--box-login-->
	</div>


</body>
</html>
