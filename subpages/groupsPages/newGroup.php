<?php
if($_GET["action"] == "newGroup"){
	if($_SESSION['userPermission'] == 10){
?>		
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3>Novo Grupo</h3>
				</div>
				<div class="content">
					<form class="form-horizontal" role="form" method="POST" action="<?=$dir?>groups.php?action=insertGroup" >
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome do Grupo</label>
							<div class="col-sm-10">
								<input class="form-control" name="groupName" id="inputEmail3" placeholder="Nome">
							</div>
						</div>
										


						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="groupDescription" id="inputEmail3" placeholder="Descrição"></textarea>
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