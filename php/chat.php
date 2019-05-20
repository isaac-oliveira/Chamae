<?php
	include "../includes/database.php";
	session_start();
	
	$acao = $_POST['acao'];
	$new_id = 0;
	
	switch($acao){
		case 'inserir':
			$para = $_POST['para'];
			$msg = strip_tags($_POST['mensagem']);
			
			$query = mysql_query($sql = "SELECT `nome` FROM user WHERE id ='".$_SESSION['id_user']."' LIMIT 1");
			$row = mysql_fetch_object($query);
			
			if(!mysql_num_rows($query)<=0){
				$id = $_SESSION['id_user'];
				$nome = $row->nome;
				mysql_free_result($query);
			}
			
			$sql = "INSERT INTO message (id, id_de, id_para, data, mensagem) VALUES (null, '$id', '$para', NOW(), '$msg')"; 
			$query = mysql_query($sql); 
			if ($query){
				echo "<li><span>".$nome.": "."</span><p>".$msg."</p></li>";
			}else{
				echo "Erro ao inserir registro. Provavelmente registro já cadastrado";
			}
			
		break;
		
		case 'atualizar':
		
		$para = $_POST['para'];
		
		$query = mysql_query($sql = "SELECT `id_de`, `mensagem` FROM message WHERE id_de ='".$_SESSION['id_user']."'AND id_para='".$para."' OR id_de='".$para."' AND id_para='".$_SESSION['id_user']."'");
		
		while ($row = mysql_fetch_object($query)) {
			$query_nome = mysql_query($sql = "SELECT `nome` FROM user WHERE id ='".$row->id_de."' LIMIT 1");
			$row_nome = mysql_fetch_object($query_nome);
			echo "<li><b>".$row_nome->nome."</b><br/><p>".$row->mensagem."</p></li>";
			mysql_free_result($query_nome);
		}
		mysql_free_result($query);
		
		break;
	}
?>