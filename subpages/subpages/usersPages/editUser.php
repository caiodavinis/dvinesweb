<?php
	if($_GET["action"] == "editUser"){
	
	$userId = mysql_real_escape_string($_GET['userId']);
	$query = $mySQL->sql("SELECT * FROM users WHERE userId = '".$userId."'");
	$data = mysql_fetch_array($query);
?>		
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<div class="block-flat">
				<div class="header">							
					<h3>Editar Usuário</h3>
				</div>
				<div class="content">
					<form class="form-horizontal" role="form" method="POST" action="<?=$dir?>users.php?action=editUser&userId=<?=$data['userId']?>" >
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
							<div class="col-sm-10">
								<input class="form-control" name="userName" value="<?=$data['userName']?>" id="inputEmail3" placeholder="Nome">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="userMail" value="<?=$data['userMail']?>" id="inputEmail3" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
							<div class="col-sm-10">
								<input class="form-control" name="userCPF" value="<?=$data['userCPF']?>" id="inputEmail3" placeholder="CPF">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Gênero</label>
							<div class="col-sm-6">
							  <select name="userGender" class="form-control">
								<option value="" >Selecione</option>
								<option value="male" <?php echo ($data['userGender'] == "male" ? "selected" : ""); ?> />Masculino
								<option value="female" <?php echo ($data['userGender'] == "female" ? "selected" : ""); ?> />Feminino
							  </select>									
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Login</label>
							<div class="col-sm-10">
								<input class="form-control" id="inputEmail3" name="userLogin"value="<?=$data['userLogin']?>" placeholder="Login">
							</div>
						</div>
						<?php
							if($_SESSION['userPermission'] == 10){
						?>
						<div class="form-group">
							<label class="col-sm-3 control-label">Permição</label>
							<div class="col-sm-6">
							  <div class="radio"> 
								<label> <input type="radio"  name="userPermission" <?php echo ($data['userPermission'] == 1 ? "checked=\"\"" : ""); ?> value="1"> Comum</label> 
							  </div>
							  <div class="radio"> 
								<label> <input type="radio" name="userPermission" <?php echo ($data['userPermission'] == 5 ? "checked=\"\"" : ""); ?> value="5"> Avançado</label> 
							  </div>
							  <div class="radio"> 
								<label> <input type="radio" name="userPermission" <?php echo ($data['userPermission'] == 10 ? "checked=\"\"" : ""); ?> value="10"> Administrador</label> 
							  </div>
							</div>
						  </div>
						<?php
							}
						?>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="userId" value="<?php echo $userId; ?>" />
								<input type="submit" name="updateUser" value="Atualizar dados" class="btn btn-primary"></input>
								<button class="btn btn-default">Cancelar</button>
							</div>
						</div>
					</form>
				</div>
			</div>				
		</div>
    </div>
<?php
	}
?>				