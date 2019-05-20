<?php
 	session_start();
 ?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" lang="pt-br" >
		<link href="css/style.css"  rel="stylesheet" >
		<link href="css/login_cadastro.css"  rel="stylesheet" >
		
		<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script>
		$(document).ready(function () {
		
			$('#check').click(function () {
				if ($('#check').is(':checked')) {
					$('#pass').attr('type', 'text');
				} else {
					$('#pass').attr('type', 'password');
				}
			});
		});
		</script>
		
		<script src="../js/jquery-3.1.1.min.js" type="text/javascript">
			
		</script>
	</head>
	<body>
		<div id="corpo" >
			<a class="a" href="tela_login.php">Faça o login &raquo;</a>
			<div id="tela_cadastro" >
				<img src="img/ic_logo.png" width="200"  >
				<form action="php/cadastro.php" method="post" >
					<label for="nome">Nome</label>
					<input id="nome" class="edittext" type="text" name="nome" >
					<label for="data">Data de nascimento</label>
					<input id="data" class="data" type="date"  name="data">
					<label for="email">E-mail</label>
					<input class="edittext" type="email" name="email" >
					<label for="password">Senha</label>
					<input id="pass" class="edittext" type="password"  name="password">
					<div class="telacheck"> 
						<input id="check" type="checkbox" name="passview" >
						<label class="labelcheck" for="check">Mostra senha</label>
					</div>
					<input class="button" type="submit" name="enviar" value="Cadastre-se" >
				</form>
				<div class="telamsg" >
					<p><?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } session_destroy(); ?></p>
				</div>
			</div>
		</div>
	</body>
</html>