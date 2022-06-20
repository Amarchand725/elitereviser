@extends('backend.admin.layout.master')
<link rel="stylesheet" href="{{ asset('public/frontend/css/chat-style.css') }}">
@section('content')
	<div class="page-wrapper">
		<div class="container" style="margin-top: 0px">
				<div class="messaging" style="width:103%; margin-left:-15px">
					<div class="inbox_msg">
						<div class="mesgs">
						<div class="msg_history">
							<div class="start-chat">
								<h2>Start Chat with Customer</h2>
							</div>
						</div>
						<div class="type_msg">
							<div class="input_msg_write">
							<form id="send-message-form" method="post">
								<input type="hidden" id="msg-artist-id">
								<input type="text" class="write_msg" id="message" placeholder="Type a message" />
								<button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							</form>
							</div>
						</div>
						</div>
						<div class="inbox_people">
						<div class="headind_srch">
							<div class="recent_heading">
								<h4>Our Customers</h4>
							</div>
						</div>
						<div class="inbox_chat">
							@foreach ($customers as $customer)
								<div class="chat_list chat-artist" data-customer-id="{{ $customer->hasCustomer->id }}">
									<div class="chat_people">
									<div class="chat_img">
										@if(!empty($customer->hasCustomer->image))
										<img src="{{asset('public/images/users')}}/{{ $customer->hasCustomer->image }}" style="border-radius: 50%; height:50px; width:50px" alt="{{ $customer->hasCustomer->name }}"> 
										@else 
										<img src="{{asset('public/images/dummy.png')}}" alt="{{ $customer->hasCustomer->name }}"> 
										@endif
									</div>
									<div class="chat_ib">
										<h5>{{ $customer->hasCustomer->name }}<span class="chat_date"></span></h5>
									</div>
									</div>
								</div>
							@endforeach
						</div>
						</div>
					</div>
				</div>
			</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$('#send-message-form').on('submit', function(e) {
			e.preventDefault(); 
			var artist_id = $('#msg-artist-id').val();
			var message = $('#message').val();

			$.ajax({
				url: '{{ url("customer/chat/store") }}',
				type: 'get',
				data: {'artist_id':artist_id, 'message':message},
				success: function(data){
				if(data.status=='true'){
					$('.msg_history').html(data.chat);
					$('#message').val('');
				}
				}
			});
		});

		

		setInterval(function() {
			if ($(".active_chat")[0]){
				var artist_id = $('.active_chat').attr('data-customer-id');

				$.ajax({
					url: '{{ url("customer/chat/show") }}',
					type: 'get',
					data: {'artist_id':artist_id},
					success: function(data){
						if(data.status=='true'){
							$('.msg_history').html(data.chat);
						}
					}
				});
			} 
		}, 5000); //5 seconds

		$(document).on('click', '.chat-artist', function(){
			var artist_id = $(this).attr('data-customer-id');
			$(this).parents('.inbox_people').find('.active_chat').removeClass('active_chat');
			$(this).addClass("active_chat");
			$('.start-chat').hide();
			$('.msg_history').html('');
			$('#msg-artist-id').val(artist_id);

			$.ajax({
				url: '{{ url("customer/chat/show") }}',
				type: 'get',
				data: {'artist_id':artist_id},
				success: function(data){
					if(data.status=='true'){
						$('.msg_history').html(data.chat);
					}
				}
			});
		});
	</script>
@endsection