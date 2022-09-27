<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Home Page Services Categories <span style="float: right;"><a href="<?= base_url('add-services-category')?>" class="btn btn-success btn-sm" >Add Service Category</a></span></h4>
			<div class="table-responsive">

				<table class="table">
					<thead>
						<tr>
							<th>Category title</th>
							<th>Image</th>
							<th>Category link</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allData)):
							$sl = $CountRow;
							foreach ($allData as $Data):
								$cat_id= $Data['cat_id'];
						?>
							
						<tr id="tr-remove<?= $cat_id;?>">
							<td><?php if(!empty($Data['cat_head'])){ echo $Data['cat_head'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['cat_img'])){ ?><img  height="50px" width="50px;" src="<?= base_url().$Data['cat_img'];?>" >
								<?php }else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['cat_link'])){ echo $Data['cat_link'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($Data['cat_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-category/').$cat_id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update Category"><i class="mdi mdi-border-color"></i></a>
								<a  onclick="deleteData(<?= $cat_id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Banner"><i class="fa fa-trash-alt"></i></a>
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
