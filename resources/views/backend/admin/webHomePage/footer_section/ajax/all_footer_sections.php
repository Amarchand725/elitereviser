<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Footer Section <span style="float: right;"><a href="<?= base_url('add-footer-section')?>" class="btn btn-success btn-sm" >Add Footer Section</a></span></h4>
			<div class="table-responsive">

				<table class="table">
					<thead>
						<tr>
							<th>Logo</th>
							<th>Footer Logo</th>
							<th>Footer Desc</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Fb Link</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allData)):
							$sl = $CountRow;
							foreach ($allData as $Data):
								$id= $Data['set_id'];
						?>
							
						<tr id="tr-remove<?= $id;?>">
							<td><?php if(!empty($Data['set_logo'])){ ?><img  height="50px" width="50px;" src="<?= base_url().$Data['set_logo'];?>" >
								<?php }else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['set_footer_logo'])){ ?><img  height="50px" width="50px;" src="<?= base_url().$Data['set_footer_logo'];?>" >
								<?php }else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['set_footer_text'])){ echo $Data['set_footer_text'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['set_phone'])){ echo $Data['set_phone'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['set_email'])){ echo $Data['set_email'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['set_fb_link'])){ echo $Data['set_fb_link'];}else{ echo"N/A";} ?></td>
							<td>
								<?php if($Data['set_status'] ==1){?> <span class="btn-success btn-xs">Active</span><?php }else{ ?> <span class="btn-danger btn-xs">Inactive</i></span><?php }?>
							</td>
							<td>
								<a href ="<?= base_url('edit-footer-section/').$id;?>" class="btn btn-sm btn-icon btn-warning"  data-toggle="tooltip" title="Update Section"><i class="mdi mdi-border-color"></i></a>
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
