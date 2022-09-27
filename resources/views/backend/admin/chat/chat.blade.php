@extends('backend.admin.layout.master')
@section('metatitle')
  <title>Customer Chat </title>
@endsection
@push('css')

  {{-- <style>
    .card-bordered {
      border: 1px solid #ebebeb
    }

    .card {
        border: 0;
        border-radius: 0px;
        margin-bottom: 30px;
        -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
        -webkit-transition: .5s;
        transition: .5s
    }

    .padding {
        padding: 3rem !important
    }

    body {
        background-color: #f9f9fa
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card-header {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        align-items: center;
        padding: 15px 20px;
        background-color: transparent;
        border-bottom: 1px solid rgba(77, 82, 89, 0.07)
    }

    .card-header .card-title {
        padding: 0;
        border: none
    }

    h4.card-title {
        font-size: 17px
    }

    .card-header>*:last-child {
        margin-right: 0
    }

    .card-header>* {
        margin-left: 8px;
        margin-right: 8px
    }

    .btn-secondary {
        color: #4d5259 !important;
        background-color: #e4e7ea;
        border-color: #e4e7ea;
        color: #fff
    }

    .btn-xs {
        font-size: 11px;
        padding: 2px 8px;
        line-height: 18px
    }

    .btn-xs:hover {
        color: #fff !important
    }

    .card-title {
        font-family: Roboto, sans-serif;
        font-weight: 300;
        line-height: 1.5;
        margin-bottom: 0;
        padding: 15px 20px;
        border-bottom: 1px solid rgba(77, 82, 89, 0.07)
    }

    .ps-container {
        position: relative
    }

    .ps-container {
        -ms-touch-action: auto;
        touch-action: auto;
        overflow: hidden !important;
        -ms-overflow-style: none
    }

    .media-chat {
        padding-right: 64px;
        margin-bottom: 0
    }

    .media {
        padding: 16px 12px;
        -webkit-transition: background-color .2s linear;
        transition: background-color .2s linear
    }

    .media .avatar {
        flex-shrink: 0
    }

    .avatar {
        position: relative;
        display: inline-block;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        border-radius: 100%;
        background-color: #f5f6f7;
        color: #8b95a5;
        text-transform: uppercase
    }

    .media-chat .media-body {
        -webkit-box-flex: initial;
        flex: initial;
        display: table
    }

    .media-body {
        min-width: 0
    }

    .media-chat .media-body p {
        position: relative;
        padding: 6px 8px;
        margin: 4px 0;
        background-color: #0000;
        border-radius: 3px;
        font-weight: 100;
        color: #fff
    }

    .media>* {
        margin: 0 8px
    }

    .media-chat .media-body p.meta {
        background-color: transparent !important;
        padding: 0;
        opacity: .8
    }

    .media-meta-day {
        -webkit-box-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        align-items: center;
        margin-bottom: 0;
        color: #8b95a5;
        opacity: .8;
        font-weight: 400
    }

    .media {
        padding: 16px 12px;
        -webkit-transition: background-color .2s linear;
        transition: background-color .2s linear
    }

    .media-meta-day::before {
        margin-right: 16px
    }

    .media-meta-day::before,
    .media-meta-day::after {
        content: '';
        -webkit-box-flex: 1;
        flex: 1 1;
        border-top: 1px solid #ebebeb
    }

    .media-meta-day::after {
        content: '';
        -webkit-box-flex: 1;
        flex: 1 1;
        border-top: 1px solid #ebebeb
    }

    .media-meta-day::after {
        margin-left: 16px
    }

    .media-chat.media-chat-reverse {
        padding-right: 12px;
        padding-left: 64px;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: reverse;
        flex-direction: row-reverse
    }

    .media-chat {
        padding-right: 64px;
        margin-bottom: 0
    }

    .media {
        padding: 16px 12px;
        -webkit-transition: background-color .2s linear;
        transition: background-color .2s linear
    }

    .media-chat.media-chat-reverse .media-body p {
        float: right;
        clear: right;
        background-color: #48b0f7;
        color: #fff
    }

    .media-chat .media-body p {
        position: relative;
        padding: 6px 8px;
        margin: 4px 0;
        background-color: #000;
        border-radius: 3px
    }

    .border-light {
        border-color: #f1f2f3 !important
    }

    .bt-1 {
        border-top: 1px solid #ebebeb !important
    }

    .publisher {
        position: relative;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        padding: 12px 20px;
        background-color: #f9fafb
    }

    .publisher>*:first-child {
        margin-left: 0
    }

    .publisher>* {
        margin: 0 8px
    }

    .publisher-input {
        -webkit-box-flex: 1;
        flex-grow: 1;
        border: none;
        outline: none !important;
        background-color: transparent
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: Roboto, sans-serif;
        font-weight: 300
    }

    .publisher-btn {
        background-color: transparent;
        border: none;
        color: #8b95a5;
        font-size: 16px;
        cursor: pointer;
        overflow: -moz-hidden-unscrollable;
        -webkit-transition: .2s linear;
        transition: .2s linear
    }

    .file-group {
        position: relative;
        overflow: hidden
    }

    .publisher-btn {
        background-color: transparent;
        border: none;
        color: #cac7c7;
        font-size: 16px;
        cursor: pointer;
        overflow: -moz-hidden-unscrollable;
        -webkit-transition: .2s linear;
        transition: .2s linear
    }

    .file-group input[type="file"] {
        position: absolute;
        opacity: 0;
        z-index: -1;
        width: 20px
    }

    .text-info {
        color: #48b0f7 !important
    }
  </style> --}}
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
        url: '{{ route("admin.chat.show") }}',
        type: 'get',
        data: {'order_number': order_number},
        success: function(response){
          // $('#chat-content').html(response);
          console.log(response);
        }
      });
		}, 5000); //5 seconds

    $(document).on('click', '#send-message-btn', function(){
      var message = $('#message').val();
      $.ajax({
          type:'POST',
          url:'{{ route("admin.chat.store") }}',
          data:{_token: "{{ csrf_token() }}", 'message': message, 'order_number': {{ $order_number }} },
          success: function(response) {
            $('#message').val('');
            $('#chat-content').html(response);
          }
        });
    });
  </script>
@endsection