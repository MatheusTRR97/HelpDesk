<?php

		session_start();

		

		// usuarios do sistema sem mysql
		$usuario_autenticado = false;
		$usuario_id = null;
		$usuario_perfil_id = null;

		$perfis = array(1 => 'Administrativo', 2 => 'Usuário');


		$usuarios_app = array(
			array('email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id'=> 1),
			array('email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id'=> 1),
			array('email' => 'jose@teste.com.br', 'senha' => 'abcd' ,'perfil_id'=> 2),
			array('email' => 'maria@teste.com.br', 'senha' => 'abcd', 'perfil_id'=> 2),

		);
		/*
		echo '<pre>';
		print_r($usuarios_app);
		echo '</pre>';

		print_r($_POST);
		*/



		foreach ($usuarios_app as $user) {

		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha'] ) {
				$usuario_autenticado  = true;
				$usuario_id = $user['id'];
				$usuario_perfil_id = $user['perfil_id'];
			}
		}

		if($usuario_autenticado) {
			echo 'usuario  autenticado';
			$_SESSION['autenticado'] = 'SIM';
			$_SESSION['id'] = $usuario_id;
			$_SESSION['perfil_id'] = $usuario_perfil_id;
			header('location: home.php');
		}else{
			$_SESSION['autenticado'] = 'NAO';
			header('location: index.php?login=erro');
			
		}



		/*
echo 'Usuário app: ' . $user['email'] .' / ' .  $user['senha'] ;
			echo '<br />';
			echo 'Usuário form: ' . $_POST['email'] .'/'. $_POST['senha'];






		echo "estamos aqui ";

		print_r($_GET);

		echo '<br />';

		echo  $_GET['email'];
		echo '<br />';
		echo  $_GET['senha'];
		echo '<br />';

		
			
		echo  $_POST['email'];
		echo '<br />';
		echo  $_POST['senha'];
		echo '<br />';
		*/	
?>