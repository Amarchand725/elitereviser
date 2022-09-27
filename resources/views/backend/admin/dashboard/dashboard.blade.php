@extends('backend.admin.layout.master')
@section('content')
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/orders') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
                                        <i class="far fa-money-bill-alt" aria-hidden="true"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">$20656</h3>
    									<h6 class="text-muted mb-0 ml-2">Total Sale</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/orders') }}">
						    <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0 ml-2">30</h3>
									<h6 class="text-muted mb-0 ml-2">New Orders</h6>
								</div>
							</div>
						</div>
					    </a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/orders') }}">
						    <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
									<i class="fa fa-cart-plus"></i>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0 ml-2">24</h3>
									<h6 class="text-muted mb-0 ml-2">Inprogress Orders</h6>
								</div>
							</div>
						</div>
					    </a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/orders') }}">
						    <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0 ml-2">54</h3>
									<h6 class="text-muted mb-0 ml-2">Total Orders</h6>
								</div>
							</div>
						</div>
					    </a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/artists') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fa fa-users"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">23</h3>
    									<h6 class="text-muted mb-0 ml-2">Total Writers</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/audience') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fa fa-users"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">1394</h3>
    									<h6 class="text-muted mb-0 ml-2">Total Customers</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/subscribers') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fa fa-users"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">1254</h3>
    									<h6 class="text-muted mb-0 ml-2">Total Subscribers</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('admin/coupons') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fa fa-code" aria-hidden="true"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">100</h3>
    									<h6 class="text-muted mb-0 ml-2">Total Coupons</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
			</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
		
<style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}
#month-wise-report {
    height: 300px;
}
.highcharts-credits{
	display:none;
}
</style>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div id="month-wise-report"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Send request for withdraw payment Modal -->
	<div class="modal fade" id="add-withdraw-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-top" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Withdraw Payment</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form method="post" action="{{ url('/artist/withdraw/store') }}">
						@csrf
						<input type="hidden" name="payment">
						<div class="modal-body">
							<div class="form-group">
								<label for="">Enter Payment</label>
								<input type="text" name="requested_payment"  class="form-control" placeholder="Enter payment">
							</div>
							<div class="form-group">
								<label for="">Message</label>
								<textarea name="message" id="" class="form-control" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Add approve Modal -->

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script>
		$(document).on('click', '.withdraw-btn', function(){
			$('#add-withdraw-modal').modal('show');
		});
	</script>
@endsection
@section('js')
<script>
Highcharts.chart('month-wise-report', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Month wise Report'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Month wise Report'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'New Orders',
        data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]

    }, {
        name: 'Inprogress Orders',
        data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]

    }, {
        name: 'Completed Orders',
        data: [48, 38, 39, 41, 47, 48, 59, 59, 52, 65, 59, 51]

    }, {
        name: 'Total Orders',
        data: [42, 33, 34, 39, 52, 75, 57, 60, 47, 39, 46, 51]

    }]
});
</script>
@endsection