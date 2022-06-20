<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">All Users</h4>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Contact No</th>
							<th>Role</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allUsers)):
							$sl = $CountRow;
							foreach ($allUsers as $User):
							$u_id= $User['u_id'];
						?>
							
						<tr id="tr-remove<?= $u_id;?>">
							<td><?php if(!empty($User['u_name'])){ echo $User['u_name'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($User['u_email'])){ echo $User['u_email'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($User['u_contact_no'])){ echo $User['u_contact_no'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($User['u_role_id'] ==1){?> <span class="btn-primary btn-xs">Admin</span><?php }elseif($User['u_role_id'] ==2){?> <span class="bg-inverse btn-xs" style="color: white;">Spirituality</span><?php }elseif($User['u_role_id'] ==3){?> <span class="bg-inverse btn-xs" style="color: white;">Education</span><?php }elseif($User['u_role_id'] ==4){?> <span class="bg-inverse btn-xs" style="color: white;">Lifestyle</span><?php }elseif($User['u_role_id'] ==5){?> <span class="bg-inverse btn-xs" style="color: white;">Family</span><?php }else{ ?> <span class="bg-inverse btn-xs" style="color: white;">User</i></span><?php }?>
							</td>
							<td>
								<?php if($User['u_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-user/').$u_id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update User"><i class="mdi mdi-border-color"></i></a>
								<a  onclick="deleteData(<?= $u_id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete User"><i class="fa fa-trash-alt"></i></a>
							</td>
						</tr>
						<?php $sl++;
							endforeach;
						endif; ?>
					</tbody>
				</table>
				<div>
					<span><?php echo $result_count?></span>
					<ul class="pagination" style="float: right;"><?php echo $pagelinks ?></ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
 $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
