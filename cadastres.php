<?php
//Página
$page = "cadastres";

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
include("subpages/cadastresPages/newPeople.php");
include("subpages/cadastresPages/newCompany.php");

require_once('includes/footer.php');
?>
