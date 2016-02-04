<?php
if (isset($_POST['updateUserPassword'])){
	// GET VARIABLES VIA POST
	$userId = mysql_real_escape_string($_POST['userId']);
	$oldUserPassword = md5($_POST['oldUserPassword']);
	$newUserPassword = mysql_real_escape_string($_POST['newUserPassword']);
	$newUserPasswordConfirm = mysql_real_escape_string($_POST['newUserPasswordConfirm']);
	$resetPassword = mysql_real_escape_string($_POST['resetPassword']);
	$userCPF = mysql_real_escape_string($_POST['userCPF']);
	$newUserPassword = md5($newUserPassword);
	$newUserPasswordConfirm = md5($newUserPasswordConfirm);
	//END GET VARIABLES VIA POST
	
	//ERROR HANDLING
	$errorDescription = "";
	$errorConfirm = TRUE;
	$errorVerification = TRUE;
	if($resetPassword != 1){
	
		if($oldUserPassword != $_SESSION['userPassword']){
			$errorDescription = $errorDescription."<div class=\"alert alert-danger alert-dismissable\">
											                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
											                <h4>	<i class=\"icon fa fa-fan\"></i> Ops!</h4>
											                ERRO: Senha antiga não confere!
											            </div>";
		}else {
			$errorVerification = FALSE;
		}
		
		if ($newUserPassword != $newUserPasswordConfirm) {
			$errorDescription = $errorDescription."<div class=\"alert alert-danger alert-dismissable\">
											                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
											                <h4>	<i class=\"icon fa fa-fan\"></i> Ops!</h4>
											                ERRO: Senhas não conferem!
											            </div>";
		} else {
			$errorConfirm = FALSE;
		}
		
		//END ERROR HANDLING
		
		if(($errorConfirm == FALSE) AND ($errorVerification == FALSE)){
			if($userId == $_SESSION['userId']){
				$_SESSION['userPassword'] = $newUserPassword;
			}
				$query = $mySQL->sql("UPDATE 
										users 
									  SET 
										userPassword = '".$newUserPassword."'
									  WHERE 
										userId = '".$userId."'") 
									  or die(mysql_error("<h4 class='widgettitle title-danger'>Erro ao atualizar usuário!</h4><br />"));
				//changeLog($system, $page, 'Alterou a senha - '.$userName);								
				echo "<div class=\"alert alert-success\"><button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>Senha alterada com sucesso!</div></br>";
			}else {
				echo $errorDescription;
		}
	}else{
		$newUserPassword = md5($userCPF);
		if($userId == $_SESSION['userId']){
			$_SESSION['userPassword'] = $newUserPassword;
		}
		if($_SESSION['userPermission'] >= 10){
				$query = $mySQL->sql("UPDATE 
										users 
									  SET 
										userPassword = '".$newUserPassword."',
										userChangePassword = 1
									  WHERE 
										userId = '".$userId."'") 
									  or die(mysql_error("<h4 class='widgettitle title-danger'>Erro ao atualizar usuário!</h4><br />"));
				//changeLog($system, $page, 'Alterou a senha - '.$userName);								
				echo "<div class=\"alert alert-success\"><button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>Senha resetada com sucesso!</br>A nova senha desse usuário é o seu CPF com todos seus caracteres.</div></br>";
		}else{
			echo "<div class=\"alert alert-danger alert-dismissable\">
											                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
											                <h4>	<i class=\"icon fa fa-fan\"></i> Ops!</h4>
											                Desculpe, mas vocøe não tem permissão para resetar a sua senha
											            </div>";
		}		
	}

} // FIM - Mudança de senha


/* inicio resetar senha*/
if (isset($_GET['resetUserPassword'])){
	$userId = mysql_real_escape_string($_GET['userId']);

	$query = $mySQL->sql("UPDATE 
										users 
									  SET 
										userPassword = MD5(userCPF)
									  WHERE 
										userId = '".$userId."'") 
									  or die(mysql_error("<h4 class='widgettitle title-danger'>Erro ao atualizar usuário!</h4><br />"));
				//changeLog($system, $page, 'Alterou a senha - '.$userName);								
				echo "<div class=\"alert alert-success\"><button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>Senha resetada com sucesso!</br>A nova senha desse usuário é o seu CPF com todos seus caracteres.</div></br>";
} 


?>