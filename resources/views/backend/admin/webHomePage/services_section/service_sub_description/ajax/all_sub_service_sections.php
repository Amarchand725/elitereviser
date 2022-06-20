<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Sub Services Section <span style="float: right;"><a href="<?= base_url('add-sub-service')?>" class="btn btn-success btn-sm" >Add Sub Service</a></span></h4>
			<div class="table-responsive">

				<table class="table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Image</th>
							<th>Description</th>
							<th>link</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allData)):
							$sl = $CountRow;
							foreach ($allData as $Data):
								$id= $Data['ssd_id'];
						?>
							
						<tr id="tr-remove<?= $id;?>">
							<td><?php if(!empty($Data['ssd_heading'])){ echo $Data['ssd_heading'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['ssd_img'])){ ?><img  height="50px" width="50px;" src="<?= base_url().$Data['ssd_img'];?>" >
								<?php }else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['ssd_description'])){ echo $Data['ssd_description'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['ssd_btn_link'])){ echo $Data['ssd_btn_link'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($Data['ssd_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-sub-service/').$id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update Section"><i class="mdi mdi-border-color"></i></a>
								<a  onclick="deleteData(<?= $id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Section"><i class="fa fa-trash-alt"></i></a>
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
