<?php
if($_GET["action"] == "newCompany"){
	if($_SESSION['userPermission'] == 10){
?>		
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3>Nova Empresa</h3>
				</div>
				<div class="content">
					<form class="form-horizontal" role="form" method="POST" action="<?=$dir?>users.php?action=insertUser" >
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
							<div class="col-sm-10">
								<input class="form-control" name="userName" id="inputEmail3" placeholder="Nome da Empresa">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome Fantasia</label>
							<div class="col-sm-10">
								<input class="form-control" name="userName" id="inputEmail3" placeholder="Sigla da Empresa">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="userMail" id="inputEmail3" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">CNPJ</label>
							<div class="col-sm-10">
								<input class="form-control" name="userCPF" id="inputEmail3" placeholder="CNPJ da Empresa">
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
							<label for="inputEmail3" class="col-sm-2 control-label">Telefone 1</label>
							<div class="col-sm-10">
								<input class="form-control" name="userCPF" id="inputEmail3" placeholder="Telefone para contato 1">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Telefone 2</label>
							<div class="col-sm-10">
								<input class="form-control" name="userCPF" id="inputEmail3" placeholder="Telefone para contato 2">
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