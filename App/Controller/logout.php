<?php
 /**
  * Arquivo para destruir uma sessão assim que o cliente sair do sistema
  */
	session_start();
	 
	$_SESSION['logged_in'] = false;
	 
	session_destroy();
	 
	header('Location: ../../template_store/login.php');

?>