<?php
	include "../includes/database.php";
    session_start();
    
    $msg = "";
    $user = "";
	$email = $_POST['email'];
	$senha = $_POST['password'];
	
	$nemail = addslashes($email);
	$nsenha = addslashes($senha);
	
	$sql = "SELECT `id`, `nome`, `email` FROM user WHERE email ='$nemail' AND senha = '$nsenha' LIMIT 1";
	
	$query = mysql_query($sql);
	$resultado = mysql_fetch_array($query);
	
	
	if(!mysql_num_rows($query)<=0){
		$_SESSION['email'] = $resultado['email'];
		$_SESSION['nome'] = $resultado['nome'];
		$page = "../home.php";
		
	} else {
		$msg = "Usuário não encontrado";
		$_SESSION['msg'] = $msg;
		$page = "../tela_login.php";
		
	}
	
	header("Location: ". $page)

?>