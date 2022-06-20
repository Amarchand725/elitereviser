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
                        <h3 class="text-themecolor m-b-0 m-t-0">All Users</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">All Users</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>Total Users</small></h6>
                                    <h4 class="m-t-0 text-info"><?php if(!empty($user_sales_leads)){ 
										echo str_pad(count($user_sales_leads),4,0,STR_PAD_LEFT);?>
									<?php }?></h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row" style="margin-bottom: 10px;">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4" style="margin-bottom: 10px;">
								<div class="search-field">
									<input type="text" class="form-control" name="company_id" id="company_id" placeholder="Search by name | email | contact no">
								</div>
							</div>

							<div class="col-md-3" style="margin-bottom: 10px;" >
								<div class="search-field">
									<select name="searchrole" id="searchrole" class="select2" style="width: 100%" data-placeholder="Select Order No">
									<option value="All">All Roles </option>
										<option value="1">Admin</option>
										<option value="2">Spirituality</option>
										<option value="3">Education</option>
										<option value="4">Lifestyle</option>
										<option value="5">Family</option>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="margin-bottom: 10px;" >
								<div class="search-field">
									<select name="searchData" id="searchData" class="select2" style="width: 100%" data-placeholder="Select Order No">
										<option value="All">All Status </option>
										<option value="1">Active </option>
										<option value="2">Inactive</option>

									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="search-button" style="float:right;">
									<button type="button" id="search" class="btn btn-info">Search</button>
									<button type="button" id="reset" class="btn btn-warning">Reset</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="ajaxContent" class="row"></div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
	         
   /* Categories Get With Search  */
	$(function() {
		
		/*--first time load--*/
		ajaxlistCategories(page_url=false);
		
		/*-- Search keyword--*/
		$(document).on('click', "#search", function(event) {
			ajaxlistCategories(page_url=false);
			event.preventDefault();
		});
		
		/*-- Reset Search--*/
		$(document).on('click', "#reset", function(event) {
			$("#company_id").val('');
			$("#searchData").val('');
			$("#searchrole").val('');
			ajaxlistCategories(page_url=false);
			event.preventDefault();
		
		});
		
		
		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlistCategories(page_url);
			event.preventDefault();
		});
		
		/*-- create function ajaxlistCategories --*/
		function ajaxlistCategories(page_url = false)
		{
			$("#search").html('<i class="fa fa-spinner fa-spin"></i><i> Searching</i>');
			$("#example").css('opacity','0.3');
			var company_id = $("#company_id").val();
			var searchData = $("#searchData").val();
			var searchrole = $("#searchrole").val();
			var dataString = 'company_id='+company_id+'&searchData='+searchData+'&searchrole='+searchrole;
			var base_url = '<?php echo base_url('all-users-with-ajax/0') ?>';
			if(page_url == false) {
				var page_url = base_url;
			}
			
			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					$("#search").html('Search');
					$("#example").css('opacity','1');
					/* console.log(response); */
					$("#ajaxContent").html(response);
				}
			});
		}
	});
	/* Categories Get With Search  */
    </script>   
<!---Delete Sales File -->
<script type="text/javascript">
    function deleteData(id) {
        swal({title:"",
            text:"Are you sure you want to delete this user?",icon:"error",
            buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
                confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('delete-user/'); ?>"+id,
                    dataType:'JSON',
                    success:function(data){
                        if(data==true){
                            $('#tr-remove'+id).fadeOut(500);
                            swal({title:"Successfully!",text:"User deleted successfully",icon:"success",timer:2000});
                        }
                    },
                    error:function (er) {
                        console.log(er);
                        $.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
                    }
                });
            }
        });
    }
</script>
<!---Delete Sales File -->
