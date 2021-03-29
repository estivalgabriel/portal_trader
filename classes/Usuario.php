<?php

	class Usuario{

		public static function userExists($user){
			$sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user=?");
			$sql->execute(array($user));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

		public static function cadastrarUsuario($login,$senha,$nome,$cargo,$tipo){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($login,$senha,$nome,$cargo,$tipo));
		}

		public function atualizarUsuario($nome,$email,$senha){
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, user = ?, password = ? WHERE user = ?");
			if($sql->execute(array($nome,$email,$senha,$_SESSION['user']))){
				return true;
			}else{
				return false;
			}
		}

		public function atualizarTrader($email,$senha,$nome,$tipo,$id){
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET user = ?, password = ?, nome = ?, tipo = ? WHERE id = $id");
			if ($sql->execute(array($email,$senha,$nome,$tipo))) {
				return true;
			}else{
				return false;
			}
		}

	}

?>
