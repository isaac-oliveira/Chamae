<?php
 	session_start();
 ?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" lang="pt-br" >
		<link href="css/style.css"  rel="stylesheet" >
		<link href="css/editar.css" rel="stylesheet" >
		<script type="text/javascript">
			function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
			
				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
			};
		</script>
	</head>
	<body>
		<div>
			<h3><?php echo $_SESSION['msg']; ?></h3>
			<div>
				<p id="title" ><?php echo $_SESSION['nome']; ?>, que tal adicionar algumas informações a mais sobre você?</p>
					<div id="form">
						<form action="php/upload.php"  method="post" enctype="multipart/form-data">
						
							<label id="ptitle"  class="titlelabel" >Foto do perfil</label>
							<img id="uploadPreview" src="img/ic_default_perfil.png"  style="width:300px; border-radius:30px; border:10px solid #fff; box-shadow:1px 1px 8px rgba(0,0,0,.5);" />
							<input id="uploadImage" type="file" name="foto" onchange="PreviewImage();" />
							
							<label id="ptitle" class="titlelabel" >Status</label>
							<textarea class="d" cols="40"  rows="3"  type="text" name="status" ></textarea>
	
							<label id="ptitle" class="titlelabel" >Discrição</label>
							<textarea class="d" cols="40"  rows="5"  type="text" name="disc" ></textarea>
			
							<label id="ptitle" class="titlelabel" >Biografia</label>
							<textarea class="b" cols="40"  rows="10"  type="text" name="bio" ></textarea>
						
							<label id="ptitle" class="titlelabel" >Sexo</label>
							<div>
								<label class="m"  for="m">Masculino</label>
								<input class="m"  id="m" name="sexo"  type="radio" value="Masculino" checked="checked" ><br>
								<label class="f" for="f">Feminino</label>
								<input class="f" id="f" name="sexo" type="radio" value="Feminino" >
							</div>
							<div>
								<input class="pular"  type="button" value="Pular" >
								<input class="ok" type="submit" value="Ok" >
							</div>
						</form>
					</div>
			</div>
		</div>
	</body>
</html>