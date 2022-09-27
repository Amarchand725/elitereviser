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
						<th>Date Time</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($allData)):
						foreach ($allData as $Data):
							$nl_id= $Data['nl_id'];
							?>

							<tr id="tr-remove<?= $nl_id;?>">

								<td><?php if(!empty($Data['nl_name'])){ echo $Data['nl_name'];}else{ echo"N/A";} ?></td>
								<td><?php if(!empty($Data['nl_email'])){ echo $Data['nl_email'];}else{ echo"N/A";} ?></td>
								<td><?php if(!empty($Data['nl_added_datetime'])){ echo $Data['nl_added_datetime'];}else{ echo"N/A";} ?></td>
								<td>
									<a  onclick="deleteData(<?= $nl_id; ?>)" class="btn btn-sm btn-icon btn-danger" style="color:#fff;"  data-toggle="tooltip" title="Delete Contact"><i class="fa fa-trash-alt"></i></a>
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
