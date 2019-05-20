<?php
 	include "includes/database.php";
 	session_start();
 	
 	$email = $_SESSION['email'];
 	
 	$sql = "SELECT `id`, `status`, `disc`, `bio`, `sexo`, `data`,`foto` FROM user WHERE email ='$email'";
 	
 	$query = mysql_query($sql);
 	$resultado = mysql_fetch_array($query);
 	
 	mysql_free_result($query);
 
 	$id = $resultado['id'];
 	$status = $resultado['status'];
 	$disc = $resultado['disc'];
 	$bio = $resultado['bio'];
 	$data = $resultado['data'];
 	$sexo = $resultado['sexo'];
 	$img = $resultado['foto'];
 	
 	$_SESSION['id_user'] = $id;
 
 ?>
 
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" lang="pt-br" >
		<link href="css/home.css" rel="stylesheet" >
		<script type="text/javascript">
		
			var zoom = true;
		
			function onZoom()
			{
				if(zoom){
					document.getElementById("perfil").style = "width:800px; height:800px; border-radius:0px; transition: all 0.4s;";
					document.getElementById("btn").style = "top:-60px; right:-60px; -webkit-transition:all 0.4s; transition:all 0.4s;";
					zoom = false;
				}else{
					document.getElementById("perfil").style = "width: 300px; height:300px; border-radius:200px; transition: all 0.4s;";
					document.getElementById("btn").style = "top:20px; right:20px; -webkit-transition:all 0.4s; transition:all 0.4s:";
					zoom = true;
				}
			}
			
		</script>
	</head>
	<body>
	    <div id="perfilbar" >
			<img id="perfil" onclick="onZoom()" src="<?php echo $img; ?>" >
			<legend for="perfil"><?php echo $_SESSION['nome']?></legend>
		</div>
		<div>
			<h3>Olá <?php echo $_SESSION['nome']; ?>, Seja bem vindo(a)</h3>
			<p id="status" ><b>Status:</b> <?php echo $status ?></p>
			<input id="btn"  type="button" onclick="window.location.href = 'tela_chat.php'"/>
			<h4>Data de nascimento</h4>
			<p class="para" ><?php echo $data; ?></p>
			<h4>Discrição</h4>
			<p class="para" ><?php echo $disc; ?></p>
			<h4>Biografia</h4>
			<p class="para" ><?php echo $bio; ?></p>
			<h4>Sexo</h4>
			<p class="para" ><?php echo $sexo?></p>
		</div>
	</body>
</html>