@extends('backend.admin.layout.master')
@section('metatitle')
  <title>Customer Chat </title>
@endsection
@section('content')
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ asset('public/assets/admin/chat-room/style.css') }}">
    </head>
    <body>	
        <div class="page-wrapper">		
            <div class="container-fluid">			
                <div class="row page-titles">				
                    <div id="frame" style="margin:0 auto;">        
                        <div id="sidepanel">            
                            <div id="profile">                
                                <div class="wrap">                    
                                    <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" /> 
                                    <p>{{ Str::upper(Auth::user()->name) }} </p>                    
                                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>                    
                                    <div id="status-options">                        
                                        <ul>                            
                                            <li id="status-online" class="active"><span class="status-circle"></span> 
                                                <p>Online</p>
                                            </li>                            
                                            <li id="status-away"><span class="status-circle"></span> <p>Away</p></li> 
                                            <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li> 
                                            <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>  
                                        </ul>                    
                                    </div>                
                                </div>            
                            </div>            
                            {{-- <div id="search">                
                                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>                
                                <input type="text" placeholder="Search contacts..." />            
                            </div> --}}            
                            <div id="contacts">                
                                <ul>                    
                                    @foreach ($orders as $order)   
                                        <li class="contact @if($order->order_number==$current_order->order_number) active @endif" data-order-number="{{ $order->order_number }}">                            
                                            <div class="wrap">                                
                                                <div class="meta">                                    
                                                    <p class="name">{{ $order->hasOrderDetails->service_type }}</p>                                    
                                                    <p class="preview">{{ date('d, M-Y', strtotime($order->hasOrderDetails->created_at)) }}</p> 
                                                </div>                            
                                            </div>                        
                                        </li>                   
                                    @endforeach                
                                </ul>            
                            </div>        
                        </div>        
                    <div class="content">            
                        <div class="contact-profile">                
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />                
                            <p>{{ Str::upper($customer->name) }} <small>(Editor)</small></p>            
                        </div>                        
                        <div class="messages" id="messages">                
                            <ul>                    
                                @foreach ($conversations as $conversation)                        
                                    @if($conversation->reciever_id==Auth::user()->id)    
                                        <li class="sent">														
                                            <i class="fa fa-get-pocket" aria-hidden="true"></i>
                                            {!! $conversation->message !!}
                                            @if($conversation->attachment)
                                                <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $conversation->attachment }}" href="{{ asset('public/assets/files') }}/{{ $conversation->attachment }}" title="ImageName">													
                                                    <i class="fa fa-download" aria-hidden="true" style="float: left;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>			
                                                </a>								   								
                                            @endif														
                                        </li>                        
                                    @elseif($conversation->sender_id==Auth::user()->id)						
                                        <li class="replies">															
                                            {{-- <i class="fa fa-paper-plane" aria-hidden="true"></i> --}}
                                            {!! $conversation->message !!}
                                            @if($conversation->attachment)	   								
                                                <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $conversation->attachment }}" href="{{ asset('public/assets/files') }}/{{ $conversation->attachment }}" title="ImageName">											
                                                    <i class="fa fa-download" aria-hidden="true" style="float: right;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>										 
                                                </a>								   							
                                            @endif													
                                        </li>	                        
                                    @endif                    
                                @endforeach                
                            </ul>            
                        </div>            
                        <div class="message-input">                
                            <div class="wrap">					
                                <form id="send-message-form" method="post" enctype="multipart/form-data">							 
                                    <input type="hidden" name="order_id" id="order_id" value="{{ $current_order->order_number }}">					
                                    <input type="hidden" name="user_id" id="customer_id" value="{{ $customer->id }}">
                                    <div class="form-group">																
                                        <textarea id="input-message" name="message" placeholder="Write your message..." style="padding:10px 0px 0px 10px" class="texteditor" ></textarea>
                                    </div>														
                                    <div class="form-group">							
                                        <input type="file" name="attachment" class="submit_btn" id="attachment" style="float: inherit;">												
                                        <small id="error" style="color:red; position: absolute; margin-left: 200px; margin-top: 14px;"  class="form-text text-muted"></small>	
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="submit_btn"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>														
                                    </div>												
                                </form>		                
                            </div>            
                        </div>        
                    </div>    
                </div>			
            </div>		
        </div>	
    </div>
    
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="{{ asset('public/assets')}}/tinymce/tinymce.min.js"></script>
    <script>
        $(document).ready(function(){
            //on click button to send message
            $('#send-message-form').on('submit', function(e) {
                e.preventDefault(); 				 
                tinyMCE.triggerSave();	
                var order_id = $('#order_id').val();
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
                    url: '{{ url("admin/editor/chat/store") }}',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    data: data,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        // console.log(data);
                        if(data.status=='true'){
                            $('.messages').html(data.result);							
                            $('.messages').position().top + $('.messages').height();
							$('#input-message').val('');								                            tinyMCE.activeEditor.setContent('');							                            $('#attachment').val('');							                            $('.submit_btn').removeAttr("disabled");
                        }
                    }
                });
            });
        })

        //get active order messages
        $(document).on('click', '.contact', function(){
            $('.contact').removeClass('active');
            $(this).addClass('active');
            var order_id = $(this).attr('data-order-number');
            $('#order_id').val(order_id);

            $.ajax({
                url: '{{ route("admin.get.editor.chat") }}',
                type: 'get',
                data: {'order_id':order_id},
                success: function(data){
                    // console.log(data);
                    if(data.status=='true'){
                        $('.messages').html(data.result);							
                        $('.messages').position().top + $('.messages').height();
                        // $('.messages').animate({scrollTop: $(".messages li").last().offset().top},'slow').outerHeight(true);	
                    }
                }
            });
        });

        // get active orders new messages
        setInterval(function() {
            var order_id = $('#order_id').val();
            $.ajax({
                url: '{{ route("admin.get.editor.chat") }}',
                type: 'get',
                data: {'order_id':order_id},
                success: function(data){
                    // console.log(data);
                    if(data.status=='true'){
                        $('.messages').html(data.result);							
                        $('.messages').position().top + $('.messages').height();
                    }
                }
            });
        }, 5000); //5 seconds
    </script>	
    <script>            
        $(document).ready(function() {                    
            if ($(".texteditor").length > 0) {                            
                tinymce.init({                                    
                    selector: "textarea.texteditor",                                    
                    theme: "modern",                                   
                    height: 50,                                    
                    plugins: [                                            
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",  
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"    
                    ],                                    
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",                            
                });                    
            }            
        });        
        </script>
@endsection