<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">All Companies Milestone Five Achived</h4>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Company Name</th>
							<?php $role_id = $this->session->userdata('su_role_id'); ?>
							
							<?php if($role_id == 1){ ?><th>User Name</th> <?php } ?>
							<?php if(!empty($milestones)){ ?>
							<th data-toggle="tooltip" data-placement="top" title="<?= $milestones[5]['sm_info'];?>"><?= $milestones[5]['sm_name'];?></th>
							<?php }?>
							<th>Status</th>
							<th>File Link</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							/* echo"<pre>";
							print_r($allSalesLeads); */
						if(!empty($allSalesLeads)):
							$sl = $CountRow;
							
							foreach ($allSalesLeads as $SalesLeads):
							$sum_id= $SalesLeads['sum_id'];
							$sl_id= $SalesLeads['sl_id'];
							
							?>
							
						<tr id="tr-remove<?= $sum_id;?>">
							<td><?= $SalesLeads['sl_company_name'];?></td>
							<?php if($role_id ==1){ ?>
							<td><?= $SalesLeads['su_name'];?></td><?php }?>
							<?php if($SalesLeads['sum_comment_status'] ==2){ ?>
								<td>Achived</td>
							<?php }else{ ?>
								<td>Not Achived</td>
							<?php }?>
							<?php if($SalesLeads['sm_file_status'] == 0){ ?>
								<td>Email Not Send</td> 
							<?php }else if($SalesLeads['sm_file_status'] == 1){ ?>
								<td>Email Send</td> 
							<?php }else if($SalesLeads['sm_file_status'] == 2){ ?>
								<td>File Added</td>
							<?php } ?>
							<?php if(!empty($SalesLeads['sm_file'])){ ?>
								<td><a href="<?= $SalesLeads['sm_file'];?>" target="_blank">View Document</a></td>
							<?php }else{ ?>
								<td>No File Added</td>
							<?php }?>
							<?php if($SalesLeads['sm_file_status']==0){ ?>
							<td>
								<button class="btn btn-xs btn-icon btn-info" onclick="sendEmailData(<?= $sum_id;?>,<?= $sl_id;?>)" data-toggle="tooltip" title="Send Email"><i class="fa fa-envelope"></i></button> 
							</td>
							<?php }?>
							<?php if($SalesLeads['sm_file_status']==1 || $SalesLeads['sm_file_status']==2){ ?>
							<td>
								<a href="add_file/<?= $sum_id?>" class="btn btn-xs btn-icon btn-warning" data-toggle="tooltip" title="Add File"><i class="mdi mdi-border-color"></i></a> 
							</td>
							<?php }?>
							<!--<td>
								<button class="btn btn-xs btn-icon btn-danger" onclick="deleteData('<?= $sum_id;?>')" data-toggle="tooltip" title="Delete file"><i class="fa fa-trash-alt"></i></button> 
							</td>-->
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