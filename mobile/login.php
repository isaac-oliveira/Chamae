<?php
if(strcmp('login', $_POST['method']) == 0){
  $host = "localhost"; 
  $user = "root"; 
  $pass = ""; 
  $bank = "Chat"; 
  $table = 'user';
  $serv = mysql_connect($host, $user, $pass) or die("Impossível conectar-se ao servidor ".$host); 
  $link = mysql_select_db($bank) or die ("Impossível conectar-se ao banco ".$bank);
  
  $carro = utf8_encode($_POST['json']);
  $carro = json_decode($carro);
 
  $email = $carro->email;
  $senha = $carro->pass;
  
  $sql = "SELECT `id`, `nome`, `email`, `data`, `foto` FROM user WHERE email ='$email' AND senha = '$senha' LIMIT 1";
  
  $query = mysql_query($sql);
  $resultado = mysql_fetch_array($query);
  mysql_free_result($query);
  
  if(!mysql_num_rows($query)<=0){
  
  $email = $resultado['email'];
  $nome = $resultado['nome'];
  $data = $resultado['data'];
  $foto = $resultado['foto'];
 
  $value = new value();
  $value->setEmail($email);
  $value->setNome(utf8_encode($nome));
  $value->setFoto($foto);
  $value->setNasc($data);
  
  echo json_encode($value->getDataJSON());
  }
  }
  
  ?>