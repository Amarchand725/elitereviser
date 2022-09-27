@extends('backend.admin.layout.master')
@section('metatitle')
  <title>Customer Chat </title>
@endsection
@push('css')
  <style>
    body {
      margin: 0 auto;
      max-width: 800px;
      padding: 0 20px;
    }
    
    .container {
      border: 2px solid #dedede;
      background-color: #f1f1f1;
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
    }
    
    .darker {
      border-color: #ccc;
      background-color: #ddd;
    }
    
    .container::after {
      content: "";
      clear: both;
      display: table;
    }
    
    .container img {
      float: left;
      max-width: 60px;
      width: 100%;
      margin-right: 20px;
      border-radius: 50%;
    }
    
    .container img.right {
      float: right;
      margin-left: 20px;
      margin-right:0;
    }
    
    .time-right {
      float: right;
      color: #aaa;
    }
    
    .time-left {
      float: left;
      color: #999;
    }
    </style>
@endpush
@section('content')
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Chat</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.orders') }}">Home</a></li>
						<li class="breadcrumb-item active">All Chat</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Services</small></h6>
								<h4 class="m-t-0 text-info">
									{{ count($models) }}
								</h4>
							</div>
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
      <div class="container">
        <div class="page-content page-container" id="page-content">
          <div class="padding">
            <div class="row container d-flex justify-content-center">
              <div class="col-md-12">
                <div class="card card-bordered">
                  <div class="card-header">
                    <h4 class="card-title"><strong>Chat with Admin</strong></h4> <a class="btn btn-xs btn-secondary" href="#" data-abc="true">Order No: {{ $order_number }}</a>
                  </div>
                  <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                    @foreach ($models as $model)
                      @if($model->reciever_id == Auth::user()->id)
                      <div class="media media-chat media-chat-reverse-customer">
                        <div class="media-body">
                          <h3>{{ Str::upper($model->hasSender->name) }}</h3>
                          <p>{{ $model->message }}</p>
                          <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
                        </div>
                      </div>
                      @elseif($model->sender_id==Auth::user()->id)
                        <div class="media media-chat-admin"> 
                          <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                          <div class="media-body">
                            <h3>{{ Str::upper(Auth::user()->name) }}</h3>
                            <p>{{ $model->message }}</p>
                            <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
                          </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                  <div class="publisher bt-1 border-light"> 
                    <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> 
                    <input class="publisher-input" name="message" id="message" type="text" placeholder="Write something"> 
                    {{-- <span class="publisher-btn file-group"> 
                      <i class="fa fa-paperclip file-browser"></i> 
                      <input type="file" name="attachment" id="attachment"> 
                    </span>  --}}
                    <button class="publisher-btn text-info" id="send-message-btn" data-abc="true"><i class="fa fa-paper-plane"></i></button> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>
@endsection
@section('js')
  <script>
    setInterval(function() {
      var order_number = {{ $order_number }};
      $.ajax({
        url: '{{ route("editor.chat.show") }}',
        type: 'get',
        data: {'order_number': order_number},
        success: function(response){
          $('#chat-content').html(response);
          // console.log(response);
        }
      });
		}, 5000); //5 seconds

    $(document).on('click', '#send-message-btn', function(){
      var message = $('#message').val();
      $.ajax({
          type:'POST',
          url:'{{ route("editor.chat.store") }}',
          data:{_token: "{{ csrf_token() }}", 'message': message, 'order_number': {{ $order_number }} },
          success: function(response) {
            $('#message').val('');
            $('#chat-content').html(response);
          }
        });
    });
  </script>
@endsection