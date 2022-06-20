@extends('website.layouts.master')
@section('metatitle')
  <title>My Orders </title>
@endsection
@push('css')
@endpush
@section('content')
  <section class="inner-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                src="{{ asset('public/assets/website')}}/images/banner1.png" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                  <h5>Or<strong>ders</strong></h5>
                  <br/>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner -->
  <section class="editing" style="padding-bottom:0px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="sec-heading">Customer Orders</h3>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner -->

  <!--NEW-FORM SECTION-->
  <div class="container" style="margin-bottom: 200px;">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Service</th>
          <th>Sub Service</th>
          <th>Words/Pages</th>
          <th>Deadline</th>
          <th>Client Note</th>
          <th>Value</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{ isset($order->hasOrderDetails)?$order->hasOrderDetails->hasMainService->title:'N/A' }}</td>
            <td>{{ isset($order->hasOrderDetails)?$order->hasOrderDetails->hasSubService->title:'N/A' }}</td>
            @if(!empty($order->hasOrderDetails->total_words))
              <td>{{ number_format(isset($order->hasOrderDetails)?$order->hasOrderDetails->total_words:0) }} Words</td>
            @else 
              <td>{{ isset($order->hasOrderDetails)?$order->hasOrderDetails->total_pages:0 }} Pages</td>
            @endif
            <td>{{ Carbon\Carbon::now('UTC')->addHour(isset($order->hasOrderDetails)?$order->hasOrderDetails->trunarround_time:'')->format('Y-m-d H:i:s') }}</td>
            <td>{{ $order->client_note }}</td>
            <td>${{ number_format($order->total_amount, 2) }}</td>
            <td>
              <a href="{{ route('customer.chat', ['order_number'=>$order->order_number]) }}" class="btn btn-warning"><i class="fa fa-comment" ></i> Chat</a>
              <button class="btn btn-info det-btn mt-2" value="{{ $order->order_number }}"><i class="fa fa-eye" ></i> View</button>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Service</th>
          <th>Sub Service</th>
          <th>Words/Pages</th>
          <th>Deadline</th>
          <th>Client Note</th>
          <th>Value</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>

@endsection
@push('js')
  <!-- Modal -->
  <div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> Order Details</h5>
        </div>
        <div class="modal-body"></div>
      </div>
    </div>
  </div>

  <script>
    $(document).on('click', '.det-btn',  function(){
      var order_id = $(this).val();
      $.ajax({
        type:'GET',
        url:'{{ route("user.order_details") }}',
        data:{order_id:order_id},
        success: function( response ) {
          // console.log(response);
          $('.modal-body').html(response);
          $('#details-modal').modal('show');
        }
      });
    });
  </script>
@endpush
