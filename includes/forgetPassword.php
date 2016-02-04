<?php
//calls the class and run forgetPassword function with values obtained by post
include('class/class.ForgetPassword.php');
$userLogin = $_POST['userLogin'];
$userCPF = $_POST['userCPF'];
if (forgetPassword($userLogin, $userCPF) == true){$return = true;} else {$return = false;}
?>