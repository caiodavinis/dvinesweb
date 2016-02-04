<?php
if($_GET["action"] == "newUser"){
	if($_SESSION['userPermission'] == 10){
?>		
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3>Novo Usuário</h3>
				</div>
				<div class="content">
					<form class="form-horizontal" role="form" method="POST" action="<?=$dir?>users.php?action=insertUser" >
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
							<div class="col-sm-10">
								<input class="form-control" name="userName" id="inputEmail3" placeholder="Nome">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="userMail" id="inputEmail3" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
							<div class="col-sm-10">
								<input class="form-control" name="userCPF" id="inputEmail3" placeholder="CPF">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Gênero</label>
							<div class="col-sm-6">
							  <select name="userGender" class="form-control">
								<option value="" >Selecione</option>
								<option value="male" >Masculino</option>
								<option value="female" >Feminino</option>
							  </select>									
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Login</label>
							<div class="col-sm-10">
								<input class="form-control" id="inputEmail3" name="userLogin" placeholder="Login">
							</div>
						</div>						
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
							<div class="col-sm-10">
								<input type="password" name="userPassword" class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Confirmar Senha</label>
							<div class="col-sm-10">
								<input type="password" name="userPasswordConfirm" class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Permição</label>
							<div class="col-sm-6">
							  <div class="radio"> 
								<label> <input type="radio" checked="" name="userPermission" value="1"> Comum</label> 
							  </div>
							  <div class="radio"> 
								<label> <input type="radio" name="userPermission" value="5"> Avançado</label> 
							  </div>
							  <div class="radio"> 
								<label> <input type="radio" name="userPermission" value="10"> Administrador</label> 
							  </div>
							</div>
						  </div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Registrar</button>
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
	if($_SESSION['userPermission'] != 10){
	?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="fa fa-times-circle sign"></i>Usuário sem permissão para realizar tarefa.
		 </div>	
	<?php		 
	}
}
?>				