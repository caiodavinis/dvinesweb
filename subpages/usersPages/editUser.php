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
				<?php
			        include('subpages/usersPages/updateUserPassword.php');
			    ?>
				<div class="content">
					<form class="form-horizontal" role="form" method="POST" action="<?=$dir?>users.php?action=editUser&userId=<?=$data['userId']?>" >
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Login</label>
							<div class="col-sm-10">
								<input class="form-control" name="userName" value="<?=$data['userLogin']?>" id="inputEmail3" placeholder="Nome">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
							<div class="col-sm-10">
								<input class="form-control" name="userName" value="<?=$data['userCPF']?>" id="inputEmail3" placeholder="CPF do usuário">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Senha</label>
							<div class="col-sm-10">
								<a href="#myModalPassword" data-toggle="modal">Mudar senha?</a></br>
								<?php
								if($_SESSION['userPermission'] == 10){
								?>	
								<a href="users.php?action=editUser&userId=<?=$userId?>&resetUserPassword=1" onclick="return confirm('Deseja realmente resetar a senha desse usuário? A nova senha desse usuário será seu CPF com todos os caracteres!');">Resetar senha?</a>
								<?php
								}	
								?>
							</div>
						</div>
						<?php
							if($_SESSION['userPermission'] == 10){
						?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Permição</label>
							<div class="col-sm-10">
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























<!-- ####################################### MODAL DE ALTERAÇÃO DE SENHA ######################################## -->
  <div class="modal" id="myModalPassword">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Alteração de senha</h4>
        </div>
        <form class="form-horizontal" method="POST" action="users.php?action=editUser&userId=<?=$userId?>">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Senha anterior</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="oldUserPassword" name="oldUserPassword">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nova senha</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="newUserPassword" name="newUserPassword" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Confirmação de senha</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="newUserPasswordConfirm" name ="newUserPasswordConfirm">
              </div>
            </div>
          </div><!-- /.box-body -->
          <div class="modal-footer">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
            <input type="hidden" name="userCPF" value="<?php echo $data['userCPF']; ?>" />
            <button type="submit" name="updateUserPassword" class="btn btn-primary">Atualizar senha</button>
          </div>
        </form>   
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>




<?php
	}
?>				