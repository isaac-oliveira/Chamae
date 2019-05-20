<?php
 	include "includes/database.php";
 	session_start();
 ?>
 
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" lang="pt-br" >
		<link href="css/chat.css" rel="stylesheet" >
		<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		<script type="text/javascript" src="js/chat.js"></script>
	</head>
	<body>
		<div id="user" >
	    	<ul id="contatos">
	   		 	<?php
	    			$result = mysql_query("select * from user");
	    			while ($row = mysql_fetch_object($result)) {
	    			   if($row->id != $_SESSION['id_user']){
	    			   		echo "<li><a href=\"javascript:void(0);\" nome=\"".$row->nome."\" id=\"".$row->id."\" class=\"comecar\" >".$row->nome."</a></li>";
	    			   }
	    			}
	    			mysql_free_result($result);
	    		?>
	   		 </ul>
	   	</div>
	   	<div style="position:absolute; top:0px; right:0px;" id="retorno"></div>
	   	<div id="chat" ></div>
	</body>
</html>