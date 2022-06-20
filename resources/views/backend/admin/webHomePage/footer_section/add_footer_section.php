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
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Footer Section </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Add Footer Section</li>
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
                                <h4 class="m-b-0 text-white">Add Footer Section</h4>
                            </div>
                            <div class="card-body">
								<form action="#" enctype='multipart/form-data' class="form-horizontal" id="add_services_category">
                                    <div class="form-body">
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Logo </label>
													<div class="col-md-9">
														<input type="file" class="" name="set_logo" placeholder="Logo">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">Footer Logo </label>
													<div class="col-md-9">
														<input type="file" class="" name="set_footer_logo" placeholder="Footer Logo">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">Footer Description</label>
													<div class="col-md-9">
														<textarea type="color" rows="10" class="form-control" name="set_footer_text" placeholder="Footer Description"></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">Phone Number</label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_phone" placeholder="Phone Number">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">Email</label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_email" placeholder="Email">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">Facebook Link</label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_fb_link" placeholder="Facebook Link">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Twitter Link </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_twit_link" placeholder="Twitter Link">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Linkedin Link </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_linkdin_link" placeholder="Linkedin Link">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Instagram Link </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_inst_link" placeholder="Instagram Link">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Sub Footer Description </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="set_sub_footer_desc" placeholder="Sub Footer Description">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Status</label>
													<div class="col-md-9">
														<select class="form-control" name="set_status">
															<option value="1">Active</option>
															<option value="0">Inactive</option>
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
	$(".Btn").html('Save');
	/*--Begin Add Product File Script--*/
	$('#add_services_category').on('submit',function(e){
			e.preventDefault();
			$(".Btn").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
			var new_product_add = new FormData(this);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('save-footer-section'); ?>',
				data:new_product_add,
                processData: false,
                contentType: false,
                async: false,
				success:function(data){
					var result = JSON.parse(data);
					if(result['code']=='300'){
					$(".Btn").html('Save');
						swal({title: "Successfully!", text: result['msg'], icon: "success"});
						setTimeout(function () {
							location.href = "<?php echo base_url('all-footer-sections'); ?>"
						}, 2000);
					}else if(result['code']=='302'){
						$(".Btn").html('Save');
						 swal({title: "Error!", text: result['msg'], icon: 'error'});
					}else if(result['code']=='303'){
						$(".Btn").html('Save');
						 swal({title: "Error!", text: result['msg'], icon: 'error'});
					}
				},
				error:function(data){console.log('error: '+data.responseText);}
			});
		});
	/*--End Add Product File Script--*/
      </script>      
