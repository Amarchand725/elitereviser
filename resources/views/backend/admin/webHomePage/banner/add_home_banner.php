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
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Home Page Banner </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Add Home Page Banner</li>
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
                                <h4 class="m-b-0 text-white">Add Home Page Banner</h4>
                            </div>
                            <div class="card-body">
								<form action="#" enctype='multipart/form-data' class="form-horizontal" id="add_banner">
                                    <div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Banner Title</label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="s_title" placeholder="Banner Title">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Banner Sub Title</label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="s_sub_title" placeholder="Banner Sub Title">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3">  Banner  Description </label>
													<div class="col-md-9">
														<input type="text" class="form-control" name="s_title_desc" placeholder="Banner Description">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Banner Bg Image </label>
													<div class="col-md-9">
														<input type="file" class="" name="s_bg_image" placeholder="Banner Bg Image">
													</div>
												</div>
											</div>
										</div>
										<!--/row-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Banner Button Text</label>
													<div class="col-md-9">
														<input type="text" name="s_button_text" class="form-control" placeholder="Banner Button Text"/>
													</div>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Banner Button Link </label>
													<div class="col-md-9">
														<input type="text" name="s_button_link" class="form-control" placeholder="Banner Button Link"/>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-3"> Status</label>
													<div class="col-md-9">
														<select class="form-control" name="s_status">
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
	$('#add_banner').on('submit',function(e){
			e.preventDefault();
			$(".Btn").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
			var new_product_add = new FormData(this);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('save-home-page-banner'); ?>',
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
							location.href = "<?php echo base_url('home-page-banner'); ?>"
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
