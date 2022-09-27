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
							<th>organization name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($allData)):
							foreach ($allData as $Data):
							$cu_id= $Data['cu_id'];
						?>
							
						<tr id="tr-remove<?= $cu_id;?>">

							<td><?php if(!empty($Data['cu_name'])){ echo $Data['cu_name'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['cu_email'])){ echo $Data['cu_email'];}else{ echo"N/A";} ?></td>
							<td><?php if(!empty($Data['cu_org'])){ echo $Data['cu_org'];}else{ echo"N/A";} ?></td>
							<td>
								<a href="#" data-toggle="modal" data-target="#view-details1-<?php echo $Data['cu_id']; ?>" class="btn btn-xs btn-success btn-icon" data-toggle="tooltip" title="View Message"><i class="fa fa-eye" style="padding: 4px 0px;"></i></a>
								<div class="modal fade" id="view-details1-<?php echo $Data['cu_id']; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Message Details</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<table style="width: 100%;">
													<tr>
														<td style="border-top:none;"><?php if($Data['cu_msg'] !== "") { echo $Data['cu_msg']; }?></td>
													</tr>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<a  onclick="deleteData(<?= $cu_id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Contact"><i class="fa fa-trash-alt"></i></a>
							</td>
							</td>
						</tr>
						<?php
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
