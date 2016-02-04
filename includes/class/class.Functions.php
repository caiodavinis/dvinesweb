<?php
// Conexão direta com o banco
$link = mysql_connect('localhost', 'root', 'key!databaseadmin') or die('MySQL: Nao foi possivel conectar-se ao banco de dados');
mysql_select_db('dvinesweb', $link) or die('MySQL: Nao foi possivel conectar-se ao banco de dados');

mysql_query('SET character_set_results=utf8');

function multiexplode($delimiters,$string){
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function userPermission($userId) {

	$sql = mysql_query("
			SELECT userPermission FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userPermission'];
}

function userGender($userId) {

	$sql = mysql_query("
			SELECT userGender FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userGender'];
}

function userPhone1($userId) {

	$sql = mysql_query("
			SELECT userPhone1 FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userPhone1'];
}

function userPhone2($userId) {

	$sql = mysql_query("
			SELECT userPhone2 FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userPhone2'];
}

function userStatus($userId) {

	$sql = mysql_query("
			SELECT userStatus FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userStatus'];
}

function userCPF($userId) {

	$sql = mysql_query("
			SELECT userCPF FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userCPF'];
}

function courseName($courseId) {

	$sql = mysql_query("
			SELECT courseName FROM `courses` WHERE `courseId` = '".$courseId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['courseName'];
}



function userName($userId) {

	$sql = mysql_query("
			SELECT userName FROM `users` WHERE `userId` = '".$userId."'
		");
	$return = mysql_fetch_array($sql);
	return $return['userName'];
}


?>


















