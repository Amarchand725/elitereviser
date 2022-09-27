@extends('website.layouts.master')
@section('metatitle')
  <title>Customer Chat </title>
@endsection
@push('css')
  <style>
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
  </style>
@endpush
@section('content')
  <section class="inner-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
            <div class="carousel-inner">
              <div class="carousel-item active" style="height: 287px;!important">
                <img src="{{ asset('public/assets/website')}}/images/banner1.png" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="margin-top: 17px; !important">Ch<strong>at</strong></h5>
                  <br/>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--NEW-FORM SECTION-->
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
                    <div class="media media-chat"> 
                      <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                      <div class="media-body">
                        {!! $model->message !!}
                        @if($model->attachment)
                          <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $model->attachment }}" href="{{ asset('public/assets/files') }}/{{ $model->attachment }}" title="ImageName">													
                            <i class="fa fa-download" aria-hidden="true" style="float: left;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>			
                          </a>								   								
                        @endif		
                        <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
                      </div>
                    </div>
                  @elseif($model->sender_id==Auth::user()->id)
                    <div class="media media-chat media-chat-reverse">
                      <div class="media-body">
                        <p>{!! $model->message !!}</p>
                        @if($model->attachment)
                          <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $model->attachment }}" href="{{ asset('public/assets/files') }}/{{ $model->attachment }}" title="ImageName">													
                            <i class="fa fa-download" aria-hidden="true" style="float: left;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>			
                          </a>								   								
                        @endif		
                        <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
              <div class="publisher bt-1 border-light"> 
                <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> 
                <form id="send-message-form" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="order-number" name="order_number" value="{{ $order_number }}">
                  <input type="hidden" id="customer_id" name="customer_id" value="{{ Auth::user()->id }}">
                  <input class="publisher-input" name="message" id="input-message" type="text" placeholder="Write something"> 
                  {{-- <span class="publisher-btn file-group">  --}}
                    {{-- <i class="fa fa-paperclip file-browser"></i>  --}}
                  <input type="file" name="attachment" id="attachment"> 
                  {{-- </span>  --}}
                  <button type="submit" class="btn btn-warning btn-sm submit_btn" id="send-message-btn" data-abc="true"><i class="fa fa-paper-plane"></i></button> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('js')
  <script>
   /*  $(document).on('click', '#send-message-btn', function(){
      var message = $('#message').val();
      $.ajax({
          type:'POST',
          url:'{{ route("customer.chat.store") }}',
          data:{_token: "{{ csrf_token() }}", 'message': message, 'order_number': {{ $order_number }} },
          success: function(response) {
            $('#message').val('');
            $('#chat-content').html(response);
          }
        });
    }); */

    $(document).ready(function(){
      //on click button to send message
      $('#send-message-form').on('submit', function(e) {
          e.preventDefault(); 		
          var order_id = $('#order-number').val();
          var customer_id = $('#customer_id').val();				
          $('.submit_btn').prop("disabled", true);
          var message = $('#input-message').val();				
          var data = new FormData();

          //Form data
          var form_data = $(this).serializeArray();
          $.each(form_data, function (key, input) {
              data.append(input.name, input.value);
          });

          //File data
          var file_data = $('input[name="attachment"]')[0].files;
          if(file_data.length){
              if(file_data[0].size/1048576 > 5 ){
                  $('#error').html('Max file size accepted 5mb.');
                  return false; 
              }
              data.append("filename", file_data[0]);
          }
          
          $.ajax({
              url:'{{ route("customer.chat.store") }}',
              type: 'post',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
              data: data,
              cache:false,
              contentType: false,
              processData: false,
              success: function(data){
                console.log(data);
                /* if(data.status=='true'){
                  $('.messages').html(data.result);							
                  $('.messages').position().top + $('.messages').height();
                  $('#input-message').val('');										                            
                  $('#attachment').val('');							                            
                  $('.submit_btn').removeAttr("disabled");
                } */
              }
          });
      });
    })
    
    setInterval(function() {
      var order_id = {{ $order_number }};
      $.ajax({
          url: '{{ route("customer.get.chat") }}',
          type: 'get',
          data: {'order_id':order_id},
          success: function(data){
            // console.log(data);
            $('#chat-content').html(data);
          }
      });
    }, 5000); //5 seconds
  </script>
@endpush