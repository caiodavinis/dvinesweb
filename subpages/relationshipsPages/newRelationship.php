<?php
if($_GET["action"] == "newRelationship"){
	if($_SESSION['userPermission'] == 10){
?>		
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3>Nova Relação</h3>
				</div>
				<div class="content">
					<form class="form-horizontal" role="form" method="POST" action="<?=$dir?>relationships.php?action=insertRelationship" >
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Identificação da Relação A->B</label>
							<div class="col-sm-9">
								<input class="form-control" name="relationshipDescriptionAtoB" id="inputEmail3" placeholder="Nome">
							</div>
						</div>

						<div class="form-group">
			                <label class="col-sm-3 control-label">Pessoa A</label>
			                <div class="col-sm-9">
			                  <select class="select2" name="relationshipCadastreIdA" id="relationshipCadastreIdA" data-mask="relationshipCadastreIdA">
			                  	<?php
                                $queryA = $mySQL->sql("SELECT * FROM users");
								while ($data = mysql_fetch_array($queryA)){
                                ?>
                                <option value="<?=$data['userId']?>"><?=$data['userName']?></option>
                                <?php
                            	}
                                ?>
			                  </select>
			                </div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Identificação da Relação B->A</label>
							<div class="col-sm-9">
								<input class="form-control" name="relationshipDescriptionBtoA" id="inputEmail3" placeholder="Nome">
							</div>
						</div>

						<div class="form-group">
			                <label class="col-sm-3 control-label">Pessoa B</label>
			                <div class="col-sm-9">
			                  <select class="select2" name="relationshipCadastreIdB" id="relationshipCadastreIdB" data-mask="relationshipCadastreIdB">
			                  	<?php
                                $queryB = $mySQL->sql("SELECT * FROM users");
								while ($data = mysql_fetch_array($queryB)){
                                ?>
                                <option value="<?=$data['userId']?>"><?=$data['userName']?></option>
                                <?php
                            	}
                                ?>
			                  </select>
			                </div>
						</div>
						
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Data Inicio da Relação</label>
							<div class="col-sm-9">
								<input class="form-control" name="relationshipDateBegin" id="relationshipDateBegin" placeholder="Data Inicial">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Data Final da Relação</label>
							<div class="col-sm-9">
								<input class="form-control" name="relationshipDateEnd" id="relationshipDateEnd" placeholder="Data Final">
							</div>
						</div>


						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Observação</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="relationshipObs" id="relationshipObs" placeholder="Observação">
								</textarea>
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