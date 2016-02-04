<?php
//Página
$page = "groups";

//inclui configuração
require_once('includes/config.php');
//inclui o header
require_once('includes/header.php');
//conexão com o banco
require_once('includes/connect.php');
?>


<div class="container-fluid" id="pcont">
	<div class="page-head">
		<h2>Grupos</h2>
		<ol class="breadcrumb">
			<li><a href="<?=$dir?>index.php">Início</a></li>
			<li class="active">Grupos</li>
		</ol>
	</div>		
	<div class="cl-mcont">

<?php
include("subpages/groupsPages/updateGroup.php");	
include("subpages/groupsPages/newGroup.php");
include("subpages/groupsPages/insertGroup.php");
include("subpages/groupsPages/listGroup.php");
include("subpages/groupsPages/deleteGroup.php");
include("subpages/groupsPages/editGroup.php");

require_once('includes/footer.php');
?>