<?php

	$host = "localhost"; 
	$user = "u651130697_user"; 
	$pass = "blurryface"; 
	$bank = "u651130697_base"; 
	$table = 'user';
	$serv = mysql_connect($host, $user, $pass) or die("Impossível conectar-se ao servidor ".$host); 
	$link = mysql_select_db($bank) or die ("Impossível conectar-se ao banco ".$bank);

?>