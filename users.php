<?php
//Página
$page = "users";

//inclui configuração
require_once('includes/config.php');
//inclui o header
require_once('includes/header.php');
//conexão com o banco
require_once('includes/connect.php');
?>


<div class="container-fluid" id="pcont">
	<div class="page-head">
		<h2>Usuários</h2>
		<ol class="breadcrumb">
			<li><a href="<?=$dir?>index.php">Início</a></li>
			<li class="active">Usuários</li>
		</ol>
	</div>		
	<div class="cl-mcont">

<?php
include("subpages/usersPages/updateUser.php");	
include("subpages/usersPages/newUser.php");
include("subpages/usersPages/insertUser.php");
include("subpages/usersPages/listUser.php");
include("subpages/usersPages/deleteUser.php");
include("subpages/usersPages/editUser.php");

require_once('includes/footer.php');
?>