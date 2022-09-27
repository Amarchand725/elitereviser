<ul>                    
    @foreach ($conversations as $conversation)                        
        @if($conversation->reciever_id==Auth::user()->id)    
            <li class="sent">														
                <i class="fa fa-get-pocket" aria-hidden="true"></i>
                <p>{!! $conversation->message !!}</p>
                @if($conversation->attachment)
                    <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $conversation->attachment }}" href="{{ asset('public/assets/files') }}/{{ $conversation->attachment }}" title="ImageName">													
                        <i class="fa fa-download" aria-hidden="true" style="float: left;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>			
                    </a>								   								
                @endif														
            </li>                        
        @elseif($conversation->sender_id==Auth::user()->id)						
            <li class="replies">															
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