<?php
if (isset($_POST['updateUser'])){

	if($_SESSION['userPermission'] == 10){
		// GET VARIABLES VIA POST
		$userId = mysql_real_escape_string($_POST['userId']);
		$userName = mysql_real_escape_string($_POST['userName']);
		$userMail = mysql_real_escape_string($_POST['userMail']);
		$userGender = $_POST['userGender'];
		$userCPF = $_POST['userCPF'];
		$userLogin = mysql_real_escape_string($_POST['userLogin']);
		$userPermission = mysql_real_escape_string($_POST['userPermission']);
		
		//END GET VARIABLES VIA POST
		
		
		//END ERROR HANDLING
		$query = $mySQL->sql("UPDATE 
								users 
							  SET 
								userName = '".$userName."', userMail = '".$userMail."', userGender = '".$userGender."',
								userLogin = '".$userLogin."', userCPF = '".$userCPF."', userPermission = '".$userPermission."'
							  WHERE 
								userId = '".$userId."'") 
							  or die(mysql_error("<h4 class='widgettitle title-danger'>Erro ao atualizar usuário ".$userName."!</h4><br />"));						
		echo "<div class=\"alert alert-success\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
				<i class=\"fa fa-check sign\"></i>Usuário atualizado com sucesso!
			 </div>";
	}else{
		// GET VARIABLES VIA POST
		$userId = mysql_real_escape_string($_POST['userId']);
		$userName = mysql_real_escape_string($_POST['userName']);
		$userMail = mysql_real_escape_string($_POST['userMail']);
		$userGender = $_POST['userGender'];
		$userCPF = $_POST['userCPF'];
		$userLogin = mysql_real_escape_string($_POST['userLogin']);
		
		//END GET VARIABLES VIA POST
		
		
		//END ERROR HANDLING
		$query = $mySQL->sql("UPDATE 
								users 
							  SET 
								userName = '".$userName."', userMail = '".$userMail."', userGender = '".$userGender."',
								userLogin = '".$userLogin."', userCPF = '".$userCPF."'
							  WHERE 
								userId = '".$userId."'") 
							  or die(mysql_error("<h4 class='widgettitle title-danger'>Erro ao atualizar usuário ".$userName."!</h4><br />"));						
		echo "<div class=\"alert alert-success\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
				<i class=\"fa fa-check sign\"></i>Usuário atualizado com sucesso!
			 </div>";
	}

} // FIM - Insere usuário na DB
?>