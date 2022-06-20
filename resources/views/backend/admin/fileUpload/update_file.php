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
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Email File</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Add Email File</li>
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
                                <h4 class="m-b-0 text-white">Add Email File form</h4>
                            </div>
                            <div class="card-body">
								<form action="#" enctype='multipart/form-data' class="form-horizontal" id="add_email_file">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-left col-md-2">Add Email File</label>
													<div class="col-md-10">
                                                        <input type="hidden" name="sum_id" value="<?= $sum_detail[0]['sum_id'];?>"/>
                                                        <input type="file" name="document_file"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
	<script src="<?= base_url();?>assets/main-assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
	$(".Btn").html('Save');
	$('#add_email_file').on('submit',function(e){
			e.preventDefault();
			$(".Btn").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');
			var new_product_add = new FormData(this);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('update-add-file'); ?>',
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
							location.href = "<?php echo base_url('all-files-milestone-five-achived'); ?>"
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
	</script>          
            