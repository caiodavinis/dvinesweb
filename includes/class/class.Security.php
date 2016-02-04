<?php

// Conexão direta com o banco
$link = mysql_connect('localhost', 'root', 'key!databaseadmin') or die('MySQL: Nao foi possivel conectar-se ao banco de dados');
mysql_select_db('dvinesweb', $link) or die('MySQL: Nao foi possivel conectar-se ao banco de dados');

mysql_query('SET character_set_results=utf8');

// Início de sessão
session_start();

function validateUser($userLogin, $userPassword) {
	$userLogin = mysql_real_escape_string($userLogin);
	$userPassword = mysql_real_escape_string($userPassword);
	

	
	$query = mysql_query("SELECT `userId`, `userName`, `userMail`, `userPermission` FROM `users` WHERE `userLogin` = '".$userLogin."' AND `userPassword` = '".$userPassword."' LIMIT 1");
	$result = mysql_fetch_assoc($query);

	if (empty($result)) {
		return false;
	} else {
		$_SESSION['userId'] = $result['userId'];
		$_SESSION['userName'] = $result['userName'];
		$_SESSION['userMail'] = $result['userMail'];
		$_SESSION['userPermission'] = $result['userPermission'];
		$_SESSION['userLogin'] = $userLogin;
		$_SESSION['userPassword'] = $userPassword;
		return true;
	}
}

function protectPage() {
	if (!isset($_SESSION['userId']) OR !isset($_SESSION['userName'])) {
		getOut();
	} elseif (!validateUser($_SESSION['userLogin'], $_SESSION['userPassword'])) {
		getOut();
	}
}

function userAccess($system, $page, $action) {
	/*
	* Função de gerencia de permissões de acesso à sistemas do PGA
	* $system = sistema atual
	*/
	
	$sql = "SELECT `userAccessGRH`, `userAccessCAT`, `userAccessHelpDesk`, `userAccessCheque`,  `userAccessCUCA`, `userAccessProtocolo`, `userPermission` FROM `users` WHERE `userLogin` = '".$_SESSION['userLogin']."'";
	$query = mysql_query($sql);
	$userAccess = mysql_fetch_array($query);
	
	################ Verifica acesso ao GRH ###############
	if ($system == "grh"){
		$userAccessGRH = $userAccess['userAccessGRH'];
		if($userAccessGRH == 0) {
			goError(001);
		}
	}
	############## FIM Verifica acesso ao GRH ##############
	
	############ Verifica acesso a definições de sistema ############
	if ($page == "settings"){
			if ($_SESSION['userPermission'] != 10){	goError(001); }
	}
	########## FIM Verifica acesso a definições de sistema ###########
}

function goError($erro) {
	include('includes/config.php');
	header("Location: ".$dir."error.php?action=".$erro);
	exit;
}

function getOut() {
	include('includes/config.php');
	unset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userLogin'], $_SESSION['userPassword']);
	header("Location: ".$dir."login.php");
	exit;
}
?>