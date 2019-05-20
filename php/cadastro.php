<?php
	include "../includes/database.php";
    session_start();
    
    $msg = "";
    $nome = $_POST['nome'];
    $date = $_POST['data'];
	$email = $_POST['email'];
	$senha = $_POST['password'];
	
	$sql = "INSERT INTO user (id, nome, data, email, senha) VALUES (null, '$nome', '$date', '$email', '$senha')"; 
	$query = mysql_query($sql); 
	if ($query) header("Location: ../editar.php"); 
	else echo "Erro ao inserir registro. Provavelmente registro já cadastrado";
	
	$msg = "cadastrado realizado com sucesso!";
	$_SESSION['msg'] = $msg;
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email;

?>