<?php
########################### INSERT NEW USER INTO DB ##############################
#                                                                                #
#                                                                                #
if ($action == "insertUser"){

	if($_SESSION['userPermission'] == 10){
	
	// GET VARIABLES VIA POST
	$userName = mysql_real_escape_string($_POST['userName']);
	$userMail = mysql_real_escape_string($_POST['userMail']);
	$userCPF = mysql_real_escape_string($_POST['userCPF']);
	$userGender = $_POST['userGender'];
	
	$userLogin = mysql_real_escape_string($_POST['userLogin']);
	$userPassword = mysql_real_escape_string($_POST['userPassword']);
	$userPasswordConfirm = mysql_real_escape_string($_POST['userPasswordConfirm']);
	
	$userPermission = $_POST['userPermission'];
	
	//END GET VARIABLES VIA POST
	
	$userPassword = md5($userPassword);
	$userPasswordConfirm = md5($userPasswordConfirm);
	
	
	$query = $mySQL->sql("
							INSERT INTO 
							users (`userName`,
									`userMail`, 
									`userGender`,
									`userChangePassword`,
									`userLogin`, 
									`userPassword`,
									`userPermission`, 
									`userCPF`) 
							VALUES ('".$userName."', 
									'".$userMail."', 
									'".$userGender."', 
									'1',
									'".$userLogin."', 
									'".$userPassword."', 
									'".$userPermission."',
									'".$userCPF."')
						") or die("Erro ao inserir o usuário no banco de dados");
	echo "<div class=\"alert alert-success\">
								<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
								<i class=\"fa fa-check sign\"></i><strong>Ótimo!</strong> Cadastro ".$userName." efeutuado com sucesso!
							 </div>";
	}else{
		// GET VARIABLES VIA POST
		$userName = mysql_real_escape_string($_POST['userName']);
		$userMail = mysql_real_escape_string($_POST['userMail']);
		$userCPF = mysql_real_escape_string($_POST['userCPF']);
		$userGender = $_POST['userGender'];
		
		$userLogin = mysql_real_escape_string($_POST['userLogin']);
		$userPassword = mysql_real_escape_string($_POST['userPassword']);
		$userPasswordConfirm = mysql_real_escape_string($_POST['userPasswordConfirm']);
		
		
		//END GET VARIABLES VIA POST
		
		$userPassword = md5($userPassword);
		$userPasswordConfirm = md5($userPasswordConfirm);
		
		
		$query = $mySQL->sql("
								INSERT INTO 
								users (`userName`, `userMail`, `userGender`, `userLogin`, 
										`userPassword`, `userCPF`) 
								VALUES ('".$userName."', '".$userMail."', '".$userGender."', 
										'".$userLogin."', '".$userPassword."', '".$userCPF."')
							") or die("Erro ao inserir o usuário no banco de dados");
		echo "<div class=\"alert alert-success\">
									<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
									<i class=\"fa fa-check sign\"></i><strong>Ótimo!</strong> Cadastro ".$userName." efeutuado com sucesso!
								 </div>";
	}

} // FIM - Insere usuário na DB

#                                                                                #
#                                                                                #
######################## END OF INSERT NEW USER INTO DB ##########################
?>