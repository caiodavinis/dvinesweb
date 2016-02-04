<?php
if($_GET["action"] == "listUser"){
	if($_SESSION['userPermission'] == 10){
?>		
  

    <div class="row">
        <div class="col-md-12">
	        <div class="block-flat">
				<div class="header">							
					<h3>Lista de usuários</h3>
				</div>
				<div class="content">
					<div class="table-responsive">
						<table class="table table-bordered" id="datatable" >
							<thead>
								<tr>
									<th style="width:30%;">Nome Usuário</th>
									<th style="width:20%;">Login</th>
									<th style="width:20%;">Nivel de permição</th>
									<th style="width:10%;">Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php
	                            $queryCheque = $mySQL->sql("SELECT * FROM users ORDER BY userId DESC");
	                            while ($data = mysql_fetch_array($queryCheque)){
	                            ?>
								<tr class="gradeC">
									<td><?=userName($data['userId'])?></td>
									<td><?=$data['userLogin']?></td>
									<td><?=$data['userPermission']?></td>
									<td class="text-center">
										<a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> 
										<a class="label label-danger" href="#"><i class="fa fa-times"></i></a>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>							
					</div>
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