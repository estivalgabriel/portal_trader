<?php

	class Relatorio{

		// public static function userExists($user){
		// 	$sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user=?");
		// 	$sql->execute(array($user));
		// 	if($sql->rowCount() == 1)
		// 		return true;
		// 	else
		// 		return false;
		// }

		public static function cadastrarRelatorio($trader,$data,$ativo,$gain,$los,$corretagem,$registro,$ir,$iss,$valor,$status){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.relatorios` VALUES (null,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->execute(array($trader,$data,$ativo,$gain,$los,$corretagem,$registro,$ir,$iss,$valor,$status));
		}

	}

?>
