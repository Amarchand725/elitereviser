<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Services <span style="float: right;"><a href="<?= base_url('add-service')?>" class="btn btn-success btn-sm" >Add Service </a></span></h4>
			<div class="table-responsive">

				<table class="table">
					<thead>
						<tr>
							<th>Heading</th>
							<th>Title</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allData)):
							$sl = $CountRow;
							foreach ($allData as $Data):
								$id= $Data['serv_id'];
						?>
							
						<tr id="tr-remove<?= $id;?>">
							<td><?php if(!empty($Data['serv_main'])){ echo $Data['serv_main'];}else{ echo"N/A";} ?></td>

							<td><?php if(!empty($Data['serv_mainhead'])){ echo $Data['serv_mainhead'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['serv_maintext'])){ echo $Data['serv_maintext'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($Data['serv_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-service/').$id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update Service"><i class="mdi mdi-border-color"></i></a>
								<a  onclick="deleteData(<?= $id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Service"><i class="fa fa-trash-alt"></i></a>
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
