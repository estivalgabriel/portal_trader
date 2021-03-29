<?php

	class Fatura{

		public function atualizarUsuario($nome,$senha,$imagem){
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?,password = ?,img = ? WHERE user = ?");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))){
				return true;
			}else{
				return false;
			}
		}

		public static function cadastrarFatura($usuario,$doc,$data,$vencimento,$valor,$status){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.faturas` VALUES (null,?,?,?,?,?,?)");
			$sql->execute(array($usuario,$doc,$data,$vencimento,$valor,$status));
		}

	}

?>
