<?php
#TIP 1: DO NOT CHANGE ANYTHING HERE OR YOU WILL BURN IN HELL :D
#TIP 2: TAKES SERIOUSLY THE TIP 1 ;)

//Conect with DB selfishly
$link = mysql_connect('localhost', 'root', 'key!databaseadmin') or die('MySQL: Nao foi possivel conectar-se ao banco de dados');
mysql_select_db('dvinesweb', $link) or die('MySQL: Nao foi possivel conectar-se ao banco de dados');

function randomPassword($size = 8, $case = true, $numbers = true, $symbols = false){
	//attributes to generate password randomly
	$lowerCase = 'abcdefghijklmnopqrstuvwxyz';
	$upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num = '1234567890';
	$symbol = '!@#$%*-';
	$return = '';
	$chars = '';
	
	//conditions check
	$chars .= $lowerCase;
	if ($case) $chars .= $lowerCase;
	if ($numbers) $chars .= $num;
	if ($symbols) $chars .= $symbol;

	$len = strlen($chars);
	
	//the magic happens here <:)
	for ($n = 1; $n <= $size; $n++) {
		$rand = mt_rand(1, $len);
		$return .= $chars[$rand-1];
	}

	//if everithing is ok, return the $return and echo it :P
	return $return;
	echo $return;
}

function forgetPassword($userLogin, $userCPF) {
	//get security ;)
	$userLogin = mysql_real_escape_string($userLogin);
	$userCPF = mysql_real_escape_string($userCPF);
	
	//select validate data sent by POST
	$query = mysql_query("SELECT `userLogin`, `userCPF`, `userMail` FROM `users` WHERE `userLogin` = '".$userLogin."' AND `userCPF` = '".$userCPF."' LIMIT 1");
	$return = mysql_num_rows($query);
	$result = mysql_fetch_assoc($query);
	
	if ($return == 0) {
		//oh shit!
		return false;
	} else {
		//generate and encrypt password
		$newPassword = randomPassword(6, true, true, false);
		$encryptedNewPassword = md5($newPassword);
		//update password
		$updateNewPassword = "UPDATE users SET `userPassword`='".$encryptedNewPassword."', `userChangePassword`='1' WHERE userLogin = '".$userLogin."' AND userCPF = '".$userCPF."'";
		$query = mysql_query($updateNewPassword);
		
		# SETTINGS TO SEND EMAIL FOR USER
		$to = $result['userMail'];
		$subject = "PGA - SEMED: Alteração de Senha";
		$message="
		<html>
		<body>
		  <h3>Alteração de Senha</h3><br />
		  Sua nova senha é: <b>".$newPassword."</b>
		</body>
		</html>";

		$from = "pga.semed@gmail.com";
		$headers = "From: ".$from."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		mail($to,$subject,$message,$headers);
		return true;
	}
}
?>