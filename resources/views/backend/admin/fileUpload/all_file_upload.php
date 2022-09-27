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
                        <h3 class="text-themecolor m-b-0 m-t-0">All Companies Milestone Five Achived</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">All Companies Milestone Five Achived</li>
                        </ol>
                    </div>
                    <!--<div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>Total Sales Leads</small></h6>
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
                    </div>-->
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
							<div class="col-md-3" style="margin-bottom: 10px;">
								<div class="search-field">
									<select name="company_id" id="company_id" class="select2" style="width: 100%" data-placeholder="Select Order No">
									<option value="All">All Companies </option>
									
									<?php print_r($user_sales_leads); if(!empty($user_sales_leads)){ 
									foreach($user_sales_leads as $companies){?>
									<option value="<?= $companies['sl_id'];?>"><?= $companies['sl_company_name'];?></option>
									<?php }}?>
									</select>
									
								</div>
							</div>
							<?php $role_id = $this->session->userdata('su_role_id'); ?>
							<div class="col-md-3" style="margin-bottom: 10px; <?php if($role_id == 2){ echo "visibility: hidden;";}?>  " >
								<div class="search-field">
									<input name="searchData" id="searchData" class="form-control" placeholder="Search By User Name">
								</div>
							</div>
							
							<div class="col-md-6">
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
    <script src="<?= base_url();?>assets/main-assets/plugins/jquery/jquery.min.js"></script>
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
			var dataString = 'company_id='+company_id+'&searchData='+searchData;
			var base_url = '<?php echo base_url('all-files-milestone-five-achived-with-ajax/0') ?>';
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
    function sendEmailData(id,slid) {
        swal({title:"",
            text:"Are you sure you want to send email?",icon:"warning",
            buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
                confirm:{text:"Send",value:!0,visible:!0,className:"btn btn-success",closeModal:!0}}
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('send-email-milestone-five/'); ?>"+id+'/'+slid,
                    dataType:'JSON',
                    success:function(data){
                        if(data==true){
                           /*  $('#tr-remove'+id).fadeOut(500); */
                            swal({title:"Successfully!",text:"Email Send successfully",icon:"success",timer:2000});
                            setTimeout(function(){location.href="<?php echo base_url('all-files-milestone-five-achived'); ?>"} , 2000);
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
  