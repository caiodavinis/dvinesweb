<?php                                                                             
if ($action == "listUser"){
?>
	<div class="row">
		<div class="col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3>Lista de Usuários</h3>
				</div>
				<div class="content">
					<div class="table-responsive">
					<table class="table no-border hover">
						<thead class="no-border">
							<tr>
								<th style="width:30%;"><strong>Nome</strong></th>
								<th class="width:30%;"><strong>CPF</strong></th>
								<th style="width:30%;"><strong>Permissão</strong></th>
								<th style="width:10%;" class="text-center"><strong>Action</strong></th>
							</tr>
						</thead>
						<tbody class="no-border-y">
						<?php
						$query = $mySQL->sql("SELECT * FROM users");
						while ($data = mysql_fetch_array($query)){
							//inicio while usuarios
						?>
							<tr> 
								<td><?=$data['userName']?></td>
								<td><?=$data['userCPF']?></td>
								<?php
									if($data['userPermission'] == 1){
										$permission = "Comum";
									}elseif($data['userPermission'] == 5){
										$permission = "Avançado";
									}elseif($data['userPermission'] == 10){
										$permission = "Administrador";
									}
								?>
								<td><?=$permission?></td>
								<td class="text-center"><a class="label label-default" href="users.php?action=editUser&userId=<?=$data['userId']?>"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="users.php?action=deleteUser&userId=<?=$data['userId']?>"><i class="fa fa-times"></i></a></td>
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
?>