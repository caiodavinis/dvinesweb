<?php
include("class/class.Security.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$userLogin = (isset($_POST['userLogin'])) ? $_POST['userLogin'] : '';
	$userPassword = (isset($_POST['userPassword'])) ? $_POST['userPassword'] : '';
	$userPassword = md5($userPassword);
	$date = date("d/m/Y");
    $hour = date("H:i");
	
	if (validateUser($userLogin, $userPassword) == true) {
		$query = mysql_query("SELECT `userChangePassword` FROM users WHERE `userLogin` = '".$userLogin."' AND `userPassword` = '".$userPassword."'");
		$changePassword = mysql_fetch_assoc($query);
		
		if ($changePassword['userChangePassword'] == 1){
			header("Location: ../login.php?action=changePassword");
			exit;
		} else {
			$query = mysql_query("INSERT INTO login_log (`loginLogUser`, `loginLogDate`, `loginLogHour`) VALUES ('$userLogin', '$date', '$hour')");
			header("Location: ../index.php");
			exit;
		}
	} else {
		unset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userLogin'], $_SESSION['userPassword']);
		header("Location: ../login.php?error=1");
		exit;
	}
}
?>