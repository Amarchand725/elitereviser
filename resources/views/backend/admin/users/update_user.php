<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Update User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Update User</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Update User</h4>
                            </div>
                            <div class="card-body">
								<form action="#" enctype='multipart/form-data' class="form-horizontal" id="update_user">
									<input type="hidden" class="form-control" name="u_id" value="<?= $details[0]['u_id']?>">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> User Name </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="user_name" value="<?= $details[0]['u_name']?>" placeholder="User Name">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<!--<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Password </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="user_password" value="<?= $details[0]['u_password']?>" placeholder="Password">
													</div>
												</div>
											</div>
										</div>-->
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Contact No</label>
													<div class="col-md-9">
														<input type="text" name="user_number" value="<?= $details[0]['u_contact_no']?>" class="form-control" placeholder="Contact No"/>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">User Role</label>
													<div class="col-md-9">
														<select class="form-control" name="user_role">
															<option <?php if($details[0]['u_role_id'] == 1){ echo"selected"; } ?> value="1">Admin</option>
															<option <?php if($details[0]['u_role_id'] == 2){ echo"selected"; } ?> value="2" >Spirituality</option>
															<option <?php if($details[0]['u_role_id'] == 3){ echo"selected"; } ?> value="3" >Education</option>
															<option <?php if($details[0]['u_role_id'] == 4){ echo"selected"; } ?> value="4" >Lifestyle</option>
															<option <?php if($details[0]['u_role_id'] == 5){ echo"selected"; } ?> value="5" >Family</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">User Status</label>
													<div class="col-md-9">
														<select class="form-control" name="user_status">
															<option <?php if($details[0]['u_status'] == 1){ echo"selected"; } ?> value="1">Active</option>
															<option <?php if($details[0]['u_status'] == 2){ echo"selected"; } ?> value="2">Inactive</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<hr>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn btn-success Btn">Submit</button>
														</div>
													</div>
												</div>
												<div class="col-md-6"> </div>
											</div>
										</div>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
	<script src="<?= base_url();?>assets/admin/main-assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
	$(".Btn").html('Update');
	$('#update_user').on('submit',function(e){
			e.preventDefault();
			$(".Btn").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
			var new_product_add = new FormData(this);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('update-users'); ?>',
				data:new_product_add,
                processData: false,
                contentType: false,
                async: false,
				success:function(data){
					var result = JSON.parse(data);
					if(result['code']=='300'){
					$(".Btn").html('Update');
						swal({title: "Successfully!", text: result['msg'], icon: "success"});
						setTimeout(function () {
							location.href = "<?php echo base_url('all-users'); ?>"
						}, 2000);
					}else if(result['code']=='302'){
						$(".Btn").html('Update');
						 swal({title: "Error!", text: result['msg'], icon: 'error'});
					}else if(result['code']=='303'){
						$(".Btn").html('Update');
						swal({title: "Error!", text: result['msg'], icon: 'error'});
					}
				},
				error:function(data){console.log('error: '+data.responseText);}
			});
		});
	</script>          
