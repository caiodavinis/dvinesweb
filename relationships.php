<?php
//Página
$page = "relationships";

//inclui configuração
require_once('includes/config.php');
//inclui o header
require_once('includes/header.php');
//conexão com o banco
require_once('includes/connect.php');
?>


<div class="container-fluid" id="pcont">
	<div class="page-head">
		<h2>Relacionamentos</h2>
		<ol class="breadcrumb">
			<li><a href="<?=$dir?>index.php">Início</a></li>
			<li class="active">Relacionamentos</li>
		</ol>
	</div>		
	<div class="cl-mcont">

<?php
include("subpages/relationshipsPages/updateRelationship.php");	
include("subpages/relationshipsPages/newRelationship.php");
include("subpages/relationshipsPages/insertRelationship.php");
include("subpages/relationshipsPages/listRelationship.php");
include("subpages/relationshipsPages/deleteRelationship.php");
include("subpages/relationshipsPages/editRelationship.php");

require_once('includes/footer.php');
?>