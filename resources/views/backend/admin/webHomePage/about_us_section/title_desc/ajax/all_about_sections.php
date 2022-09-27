<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">About Us <span style="float: right;"><a href="<?= base_url('add-about-us')?>" class="btn btn-success btn-sm" >Add About Us</a></span></h4>
			<div class="table-responsive">

				<table class="table">
					<thead>
						<tr>
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
								$ab_id= $Data['ab_id'];
						?>
							
						<tr id="tr-remove<?= $ab_id;?>">
							<td><?php if(!empty($Data['ab_heading'])){ echo $Data['ab_heading'];}else{ echo"N/A";} ?></td>

							<td><?php if(!empty($Data['ab_description'])){ echo $Data['ab_description'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($Data['ab_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-about-us/').$ab_id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update Category"><i class="mdi mdi-border-color"></i></a>
								<a  onclick="deleteData(<?= $ab_id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Banner"><i class="fa fa-trash-alt"></i></a>
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
