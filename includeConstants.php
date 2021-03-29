<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require('vendor/autoload.php');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};



	spl_autoload_register($autoload);


	define('INCLUDE_PATH','http://novadimensaodigital.com.br/upload/cliente/portaltrader/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	//Conectar com banco de dados!
	define('HOST','mysql13-farm70.uni5.net');
	define('USER','gabrielestival02');
	define('PASSWORD','Tib123qwe');
	define('DATABASE','gabrielestival02');

	//Constantes para o painel de controle
	define('NOME_EMPRESA','Portal do Trader');
?>
