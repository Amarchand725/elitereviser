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
                        <h3 class="text-themecolor m-b-0 m-t-0">Home Service Categories</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Home Service Categories</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row" style="margin-bottom: 10px; display: none;">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4" style="margin-bottom: 10px;">
								<div class="search-field">
									<input type="text" class="form-control" name="searchData" id="searchData" placeholder="Search by name | email | contact no">
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
			var searchData = $("#searchData").val();
			var dataString = 'searchData='+searchData;
			var base_url = '<?php echo base_url('all-categories-with-ajax/0') ?>';
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
            text:"Are you sure you want to delete this category?",icon:"error",
            buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
                confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('delete-category/'); ?>"+id,
                    dataType:'JSON',
                    success:function(data){
                        if(data==true){
                            $('#tr-remove'+id).fadeOut(500);
                            swal({title:"Successfully!",text:"Category deleted successfully",icon:"success",timer:2000});
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
