<?php
	include "../includes/database.php";
	session_start();
	
	$email = $_SESSION['email'];
	$imagem = $_FILES['foto'];
	$status = htmlspecialchars($_POST['status']);
	$bio = htmlspecialchars($_POST['bio']);
	$discri = htmlspecialchars($_POST['disc']);
	$sexo = $_POST['sexo'];
	
	$nomeFinal = $email."_".time().'.jpg';

	$uploaddir = '../uploads/';
	$uploadfile = $uploaddir . $nomeFinal;
	
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
		mysql_query("UPDATE user SET status='$status', disc='$discri', bio='$bio', sexo = '$sexo', foto='"."uploads/".$nomeFinal."' WHERE email='$email'") or die("O sistema não foi capaz de executar a query"); 
		header("Location: ../home.php");
		
	} else {
		echo "Você não realizou o upload de forma satisfatória."; 
	}
?>