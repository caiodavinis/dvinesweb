<?php
##################################################################
#			   DATACOM - EQUIPE DE DESENVOLVIEMNTO          	 #
#		  					          					 		 #
#		  	PROJETO DESENVOLVIDO PARA O USE/SEBRAE				 #
#		  		   DESENVOLVEDORES ENVOLVIDOS					 #
#			@caiodavinis, @victorleite, @walterleite			 #
#		  					          					 		 #
##################################################################


//Se "action" não existir, exibir lista de usuários
if (!isset($_GET['action'])) { $action = "start"; } else { $action = $_GET['action']; }

//Includes security class and calls the class protectPage ();
require_once('includes/class/class.Security.php');
protectPage();

//Includes security class and calls the class protectPage ();
require_once('includes/class/class.Functions.php');

//Calls function UserAccess and checks user permissions
#userAccess($system, $page, $action);

function limit_words($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
}
?>

<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DVINESWEB">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>DVINESWEB - Solução em TI</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
  

    <!-- Bootstrap core CSS -->
    <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.easypiechart/jquery.easy-pie-chart.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />

</head>
<body>

  <!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><span>DVINESWEB</span></a>
		</div>
		<div class="navbar-collapse collapse">
			<!-- ###### MENU SISTEMAS ###### -->
			<ul class="nav navbar-nav">
				<?php
				/*
				?>
				<li <?php echo ($system == 'default') ? "class=\"active\"" : ""; ?> ><a href="<?=$dir?>index.php">Início</a></li>
				<li <?php echo ($system == 'educacao') ? "class=\"active\"" : ""; ?> ><a href="<?=$dir?>educacao/index.php">Educação</a></li>
				<li <?php echo ($system == 'inovacaoTecnologia') ? "class=\"active\"" : ""; ?> ><a href="<?=$dir?>inovacaoTecnologia/index.php">Inovação e Tecnologia</a></li>
				<li <?php echo ($system == 'mercado') ? "class=\"active\"" : ""; ?> ><a href="<?=$dir?>mercado/index.php">Mercado</a></li>
				<li <?php echo ($system == 'pop') ? "class=\"active\"" : ""; ?> ><a href="<?=$dir?>pop/index.php">P.O.P</a></li>
				<li <?php echo ($system == 'convenio') ? "class=\"active\"" : ""; ?> ><a href="<?=$dir?>convenios/index.php">Convênios</a></li>
				<li><a href="http://www.novosme.sebrae.com.br/ibmcognos/cgi-bin/cognosisapi.dll?b_action=xts.run&m=portal/main.xts&startwel=yes" target="_blank" >Orçamentos</a></li>
				<?php
				*/
				?>
			</ul>
			<!-- ###### FIM MENU SISTEMAS ###### -->
			<ul class="nav navbar-nav navbar-right user-nav">
			  <li class="dropdown profile_menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?=$_SESSION['userName']?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="<?=$dir?>users.php?action=editUser&userId=<?=$_SESSION['userId']?>">Meu perfil</a></li>
				  <li class="divider"></li>
				  <li><a href="<?=$dir?>logout.php">Sair</a></li>
				</ul>
			  </li>
			</ul>

		</div><!--/.nav-collapse -->
    </div>
</div>


	<div id="cl-wrapper">	
			<div class="cl-sidebar">
				<div class="cl-toggle"><i class="fa fa-bars"></i></div>
				<div class="cl-navblock">
					<ul class="cl-vnavigation">
						<li><a href="#"><i class="fa fa-home"></i>Início</a></li>
						<li class="parent open"><a href="#"><i class="fa fa-male"></i>Cadastros</a>
							<ul class="sub-menu" <?php if($page == "cadastres"){ ?> style="display:block;" <?php }else{?> style="display:none;"  <?php } ?>>
								<li><a href="<?=$dir?>cadastres.php?action=newPeople">Novo Cadastro de Pessoa</a></li>
								<li><a href="<?=$dir?>cadastres.php?action=newCompany">Novo Cadastro de Empresa</a></li>
								<li><a href="<?=$dir?>cadastres.php?action=listCadastre">Lista Cadastros</a></li>
							</ul>
						</li>
						<li class="parent open"><a href="#"><i class="fa fa-code-fork"></i>Relações</a>
							<ul class="sub-menu" <?php if($page == "relationships"){ ?> style="display:block;" <?php }else{?> style="display:none;"  <?php } ?>>
								<li><a href="<?=$dir?>relationships.php?action=newRelationship">Nova Relação</a></li>
								<li><a href="<?=$dir?>relationships.php?action=listRelationships">Lista de Relações</a></li>
							</ul>
						</li>
						<li class="parent open"><a href="#"><i class="fa fa-users"></i>Grupos</a>
							<ul class="sub-menu" <?php if($page == "groups"){ ?> style="display:block;" <?php }else{?> style="display:none;"  <?php } ?>>
								<li><a href="<?=$dir?>groups.php?action=newGroup">Novo Grupo</a></li>
								<li><a href="<?=$dir?>groups.php?action=listGroups">Lista de Grupos</a></li>
							</ul>
						</li>
						<li class="parent open"><a href="#"><i class="fa fa-user"></i>Usuários</a>
							<ul class="sub-menu" <?php if($page == "users"){ ?> style="display:block;" <?php }else{?> style="display:none;"  <?php } ?>>
								<li><a href="<?=$dir?>users.php?action=newUser">Novo Usuário</a></li>
								<li><a href="<?=$dir?>users.php?action=listUser">Lista de Usuários</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div style="text-align: center; margin-top: 100px;"><iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://www.cptec.inpe.br/widget/widget.php?p=220&w=p&c=767676&f=ffffff" height="154px" width="120px"></iframe><noscript>Previs&atilde;o de <a href="http://www.cptec.inpe.br/cidades/tempo/220">Aracaju/SE</a> oferecido por <a href="http://www.cptec.inpe.br">CPTEC/INPE</a></noscript></div>
			</div>
		
		