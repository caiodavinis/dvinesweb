<?php
if (!isset($_GET['action'])) { $action = "login"; } else { $action = $_GET['action']; }
include('includes/class/class.Security.php');
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="DVINESWEB">
	<link rel="shortcut icon" href="<?=$themeDir?>images/favicon.png">

	<title>DVINESWEB - Solução em TI</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="<?=$themeDir?>js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="<?=$themeDir?>fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Custom styles for this template -->
	<link href="<?=$themeDir?>css/style.css" rel="stylesheet" />	

</head>

<body class="texture">
	<?php
	############################################# LOGIN PAGE #########################################
	if ($action == "login"){
	?>
		<div id="cl-wrapper" class="login-container">
			<div class="middle-login">
				<div class="block-flat">
					<div class="header">							
						<h3 class="text-center"><img class="logo-img" src="<?=$themeDir?>images/logo.png" alt="logo"/>DVINESWEB - Soluções em TI</h3>
					</div>
					<div>
						<form style="margin-bottom: 0px !important;" class="form-horizontal" method="POST" action="includes/validate.php">
								<div class="content">
									<h4 class="title">Acesso ao sistema</h4>
									<div class="form-group">
										<div class="col-sm-12">
											<?php
											if ($_GET['error'] == 1) {
											?> 
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="fa fa-times-circle sign"></i><strong>Ops!</strong> Usuário ou senha não estão válidas.
											 </div>
											<?php
											}
											?>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" placeholder="Login" name="userLogin" id="username" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<input type="password" placeholder="Senha" name="userPassword" id="password" class="form-control">
											</div>
										</div>
									</div>	
								</div>
							<div class="foot">
								<!--<button class="btn btn-default" data-dismiss="modal" type="button">REGISTRAR</button>-->
								<button class="btn btn-primary" data-dismiss="modal" type="submit">ENTRAR</button>
							</div>
						</form>
					</div>
				</div>
				<div class="text-center out-links"><a href="#">&copy; 2015 DVINESWEB</a></div>
			</div> 
		</div>
	<?php
	}

	######################################## CHANGE PASSWORD PAGE #########################################
	if ($action == "changePassword"){
		if(isset($_POST['changePassword'])){
			//get new password
			$userNewPassword = $_POST['userNewPassword'];
			$userNewPasswordConfirm = $_POST['userNewPasswordConfirm'];
			
			//verifies passwords match
			if ($userNewPassword == $userNewPasswordConfirm){
				//encrypt new password
				$encryptedNewPassword = md5($userNewPassword);
				//get session values of user
				$userLogin = $_SESSION['userLogin'];
				$userOldPassword = $_SESSION['userPassword'];
				
				//update new password encrypted and `userChangePassword` status
				$updateNewPassword = "UPDATE users SET `userPassword`='".$encryptedNewPassword."', `userChangePassword`='0' WHERE userLogin = '".$userLogin."' AND userPassword = '".$userOldPassword."'";
				$query = mysql_query($updateNewPassword);
				
				//update session value for `userPassword`
				$_SESSION['userPassword'] = $encryptedNewPassword;
				
				//set error false
				$error = 0;
			} else {
				/* Holy shit, passwords do not match. 
				   Redirect user to `changePassword` page again, 
				   with error description */
				header("Location: login.php?action=changePassword&error=1");
				exit;
			}
			
			?>

			<div id="cl-wrapper" class="login-container">
				<div class="middle-login">
					<div class="block-flat">
						<div class="header">							
							<h3 class="text-center"><img class="logo-img" src="<?=$themeDir?>images/logo.png" alt="logo"/>DVINESWEB - Soluções em TI</h3>
						</div>
						<div>
							<div class="content">
								<h4 class="title">Acesso ao sistema</h4>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<i class="fa fa-info-circle sign"></i><strong>Oba, oba!</strong> Sua senha foi alterada com sucesso, agora você pode dormir tranquilo.
										 </div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="foot">
										<!--<button class="btn btn-default" data-dismiss="modal" type="button">REGISTRAR</button>-->
										<button data-toggle="modal" type="button" onclick="location.href='dashboard.php'" class="btn btn-success"><i class="fa fa-check"></i> Acessar o sistema</button>
									</div>
								</div>
							</div>		
						</div>
					</div>
					<div class="text-center out-links"><a href="#">&copy; 2015 DVINESWEB</a></div>
				</div> 
			</div>
			<?php
		} else {
			?>

		<div id="cl-wrapper" class="login-container">
			<div class="middle-login">
				<div class="block-flat">
					<div class="header">							
						<h3 class="text-center"><img class="logo-img" src="<?=$themeDir?>images/logo.png" alt="logo"/>DVINESWEB - Soluções em TI</h3>
					</div>
					<div>
						<form style="margin-bottom: 0px !important;" class="form-horizontal" method="POST" action="login.php?action=changePassword" >
								<div class="content">
									<h4 class="title">Acesso ao sistema</h4>
									<div class="form-group">
										<div class="col-sm-12">
											<?php
											if (!isset($_GET['error'])) { $error = "0"; } else { $error = $_GET['error']; }

											if ($error == 0) {
											?>
											<div class="alert alert-info">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="fa fa-info-circle sign"></i><strong>Opa!</strong> Vejo que é o seu primeiro login após a redefinição de sua senha. Por motivos de segurança, você precisa digitar uma nova senha de sua preferência.
											 </div>
											<?php
											} elseif ($error == 1) {
											?> 
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<i class="fa fa-times-circle sign"></i><strong>Ops!</strong> As senhas não coincidem. Por favor, tente novamente.
											 </div>
											<?php
											}
											?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<input type="password" name="userNewPassword" id="password" placeholder="Nova senha"class="form-control">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<input type="password" name="userNewPasswordConfirm" id="password" placeholder="Confirmação da nova senha" class="form-control">
											</div>
										</div>
									</div>	
								</div>
							<div class="foot">
								<!--<button class="btn btn-default" data-dismiss="modal" type="button">REGISTRAR</button>-->
								<button class="btn btn-primary" name="changePassword" data-dismiss="modal" type="submit">Alterar senha</button>
							</div>
						</form>
					</div>
				</div>
				<div class="text-center out-links"><a href="#">&copy; 2015 DVINESWEB</a></div>
			</div> 
		</div>
			<?php
		}
	}
	?>
<script src="js/jquery.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$themeDir?>js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=$themeDir?>js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?=$themeDir?>js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=$themeDir?>js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>
