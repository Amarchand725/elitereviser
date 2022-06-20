<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Home Page Banner <span style="float: right;"><a href="<?= base_url('add-home-page-banner')?>" class="btn btn-success btn-sm" >Add Banner</a></span></h4>
			<div class="table-responsive">

				<table class="table">
					<thead>
						<tr>
							<th>Banner title</th>
							<th>Sub Title</th>
							<th>Description</th>
							<th>Image</th>
							<th>Button text</th>
							<th>Button link</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allData)):
							$sl = $CountRow;
							foreach ($allData as $Data):
							$s_id= $Data['s_id'];
						?>
							
						<tr id="tr-remove<?= $s_id;?>">
							<td><?php if(!empty($Data['s_title'])){ echo $Data['s_title'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['s_sub_title'])){ echo $Data['s_sub_title'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['s_title_desc'])){ echo $Data['s_title_desc'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['s_bg_image'])){ ?><img  height="50px" width="50px;" src="<?= base_url().$Data['s_bg_image'];?>" >
								<?php }else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['s_button_text'])){ echo $Data['s_button_text'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['s_button_link'])){ echo $Data['s_button_link'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($Data['s_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-banner/').$s_id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update Banner"><i class="mdi mdi-border-color"></i></a>
								<a  onclick="deleteData(<?= $s_id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Banner"><i class="fa fa-trash-alt"></i></a>
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
