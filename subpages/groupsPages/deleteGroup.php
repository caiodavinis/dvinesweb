<?php
	if($action == "deleteUser"){
		$userId = mysql_real_escape_string($_GET['userId']);
		$query = $mySQL->sql("DELETE FROM users WHERE userId = '".$userId."'");		
		echo " <div class=\"alert alert-success\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
				<i class=\"fa fa-check sign\"></i>Usuário removido com sucesso!
			 </div>";
	}
?>