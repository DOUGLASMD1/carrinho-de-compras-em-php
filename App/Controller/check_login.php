
<?php
 
	include_once '../../DataBase/conexao.php';
	 
	$email = isset($_POST['email']);
	$senha = md5(isset($_POST['senha']));
	 
	$PDO = new Conexao();
	$PDO = $PDO->conexao();
	 
	$sql = "SELECT cpf, nome FROM cliente WHERE email = :email AND senha = :senha";
	$stmt = $PDO->prepare($sql);
	 
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':senha', $senha);
	$stmt->execute();
	 
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	if (count($users) <= 0){
	    echo "Email ou senha incorretos";
	    exit;
	}
	 
	$user = $users[0];
	 
	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['user_email'] = $user['email'];
	$_SESSION['user_cpf'] = $user['cpf'];
	$_SESSION['user_nome'] = $user['nome'];
	 
	header('Location: shop.php');

?>