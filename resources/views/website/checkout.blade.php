@extends('website.layouts.master')
@section('metatitle')
   <title>Checkout | Elite Revisor</title>
@endsection
@push('css')
<style>
   .nav-tabs .nav-link.active{
     background: #fc6077 !important;
     color: white !important;
   }
   .signbtn {
     background: #495057 !important;
     color: white !important;
   }
   .panel-title {
     display: inline;
     font-weight: bold;
   }
   .display-table {
     display: table;
   }
   .display-tr {
     display: table-row;
   }
   .display-td {
     display: table-cell;
     vertical-align: middle;
     width: 61%;
   }
   .hide{
     display: none !important;
   }
   .forgot{
         background: none !important;
         color: white !important;
         margin-top: none !important;
         margin: 0 15px !important;
         padding: 0px !important;
     }
 </style>
@endpush
<!-- Banner -->
@section('content')
<section class="inner-banner">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
             <!-- Carousel wrapper -->
             <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
             <!-- Inner -->
             <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                   <img
                      src="{{ asset('public/assets/website')}}/images/banner1.png" class="d-block w-100" alt="..."/>
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:#FCC002; margin-top:15px;"> Checkout</h5>
                      <br/>
                       <!--<h6><strong>Journal Artical, Research Proposal, Presentation, Abstract, Research Paper</strong> </h6>-->
                           <p>We deliver the best possible results on all projects. You can always count on us for a work well done.</p>
                      <br/>
                   </div>
                </div>
                <!-- Inner -->
             </div>
             <!-- Carousel wrapper -->
          </div>
       </div>
    </div>
   </section>
   <!-- Banner -->
   <section class="editing" style="padding-bottom:0px">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
            <!-- <h3 class="sec-heading">Checkout</h3> -->
            </div>
         </div>
      </div>
   </section>
   <div class="container-wrap">
      <div class="page-content container">
         <div class="row">
            <div class="col-md-12">
               <fieldset>
                  @php
                    $data = Session::get('data');
                    $documents = Session::get('documents');
                    $instruction_files = Session::get('instruction_files');
                  @endphp
                  @if(Session::get('discount'))
                     @php $discount_data = Session::get('discount'); @endphp
                  @endif
                  <div id="order-details-panel" class="panel panel-default panel-default-scribendi form-horizontal">
                     <div class="panel-heading">
                        <span class="fa fa-copy"></span>
                        &nbsp;Order Details
                     </div>
                     <div class="panel-body">
                        <div class="form-group">
                           <label class="control-label col-sm-4 col-md-3 panel-title">Order title:</label>
                           <div class="col-sm-12 col-md-12">
                            @if(isset($data['service_type']))
                                <td colspan="2">
                                    {{ $data['service_type'] }},
                                    <span style="display: inline-block;">{{ $data['total_words'] }} words completed within {{ $data['trunaround_time'] }} Hours</span><br />
                                    <ul>
                                        @php $counter=0 @endphp
                                        @foreach ($documents as $key=>$document)
                                            <li>{{ ++$counter }} - <a href="{{ asset('public/assets/website/documents') }}/{{ $document['name'] }}" download>Attachment({{ $document['name'] }})</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            @else
                                <td colspan="2">
                                    @php
                                        $service = App\Models\Service::where('id', $data['sub_service'])->first();
                                    @endphp
                                    {{ $service->title }} - {{ $data['total_pages'] }} pages, <br />
                                </td>
                            @endif
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-4 col-md-3 panel-title">Your instructions:</label>
                           <div class="col-sm-12 col-md-12">
                                <tr>
                                    <td colspan="2">
                                        <span style="display: inline-block;"><u>Instruction Attachments</u></span><br />
                                        <ul>
                                            @php $counter=0 @endphp

                                            @foreach ($instruction_files as $instruction_file)
                                                <li>{{ ++$counter }} - <a href="{{ asset('public/assets/website/instruction_documents') }}/{{ $instruction_file['name'] }}" download>Attachment</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                           </div>
                           <div class="col-sm-12 col-md-12">
                            <span style="display: inline-block;"><u>Client Note</u></span><br />
                            {{ $data['client_note'] }}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="quote-panel" class="panel panel-default panel-default-scribendi">
                     <div class="panel-heading">
                        <span class="fa fa-shopping-cart"></span>
                        <span class="notranslate">&nbsp;</span>Order Total
                     </div>
                     <div class="panel-body">
                        <div class="alert-alipay-old-currency alert alert-info alert-sm" style="display: none;">
                           <span class="fa fa-info-circle"></span>
                           <span class="notranslate">&nbsp;</span>Because AliPay does not accept payments in US Dollar, your
                           order will be converted to the equivalent Canadian Dollar amount before proceeding to AliPay. AliPay will
                           then convert the price of your order into Chinese Yuan Renminbi to process the payment.
                        </div>
                        <table id="quote-table" class="table" style=" width: 100%;">
                           <div class="form-horizontal">
                              <div id="coupon-checkout-error" class="alert alert-sm alert-danger mb-15" style="display: none;">
                                 <span class="fa fa-exclamation-triangle"></span>
                                 <span class="notranslate">&nbsp;</span><span id="coupon-check-error-message"></span>
                              </div>
                              <div class="form-group-coupon-code form-group mb-5">
                                 <label for="coupon_code" class="control-label col-sm-4 col-md-3 col-xs-12" style="font-weight: normal;">Discount Code (optional):</label>
                                 <div class="col-md-4 col-sm-5 col-xs-11">
                                    <div class="input-group">
                                       @if(Session::get('discount'))
                                          <input type="text" name="coupon_code1" id="coupon_code" class="form-control" value="{{ $discount_data['coupon'] }}">
                                       @else
                                          <input type="text" name="coupon_code1" id="coupon_code" class="form-control" value="">
                                       @endif

                                       <div class="input-group-btn">
                                          <button id="coupon-submit" @if(Session::get('discount')) disabled @endif type="button" class="btn btn-primary coupon-btn">
                                          <span class="glyphicon glyphicon-ok"></span>
                                          &nbsp;Apply
                                          </button>
                                       </div>
                                       @if(Session::get('discount'))
                                          <div class="">
                                             <button class="btn btn-danger remove-coupon-btn" data-session={{ 'discount' }} title="Remove coupon" style="margin-left:2px"><i class="fa fa-times"></i></button>
                                          </div>
                                       @endif
                                    </div>
                                    <div class="input-group">
                                       <span id="error-coupon" style="color: red"></span>
                                    </div>
                                 </div>
                                 <div class="col-sm-2 col-xs-1 pl-0">
                                    <span class="coupon-success text-success fa fa-check mt-5" style="font-size: 24px; margin-left: -2px; display: none;"></span>
                                 </div>
                              </div>
                           </div>
                           <tbody id="order-details">
                              <tr>
                                 <td colspan="2">
                                    @if(isset($data['service_type']))
                                    {{ $data['service_type'] }},
                                    @else
                                       @if($data['sub_service']=='41')
                                          CV
                                       @else
                                          Resume
                                       @endif
                                    @endif
                                    @if(isset($data['total_words']))
                                       <span style="display: inline-block;"> {{ $data['total_words'] }} words completed within {{ $data['trunaround_time'] }}</span>
                                    @endif
                                 </td>
                                 <td id="checkout-base-price" class="price text-right">
                                    {{ $data['currency'] }} ${{ number_format($data['total_amount'], 2) }}
                                 </td>
                              </tr>
                              <tr>
                                 <td>Currency: {{ $data['currency'] }}</td>
                                 <td class="text-right" align="right" style="font-weight: bold;">Total:<span class="notranslate">&nbsp;</span></td>
                                 <td id="checkout-final-price" class="price text-right" style="font-weight: bold;">
                                    ${{ number_format($data['total_amount'], 2) }}
                                 </td>
                              </tr>
                              @if(Session::get('discount'))
                                 <tr>
                                    <td colspan="2">Discount: @if($discount_data['type']=='percent') {{ $discount_data['tot_discount'] }}% @endif</td>
                                    <td class="price text-right" style="font-weight: bold;">${{ number_format($discount_data['discount'], 2) }}</td>
                                 </tr>
                                 <tr>
                                    <td colspan="2">New Amount: </td>
                                    <td class="price text-right" style="font-weight: bold;">${{ number_format($data['total_amount']-$discount_data['discount'], 2) }}</td>
                                 </tr>
                              @endif
                           </tbody>
                        </table>
                        <div class="canada-tax" style="margin-top: -19px;">
                           <strong>Please note:</strong> Our head office is in Ontario, so sales tax (GST/HST) will be added to orders from Canada.
                        </div>
                     </div>
                  </div>
                  <div id="payment-options-panel" class="panel panel-default panel-default-scribendi">
                     <div class="panel-heading">
                        <span class="fa fa-lock"></span>
                        <span class="notranslate">&nbsp;</span>Payment Options
                     </div>
                     <div class="panel-body" style="position: relative;">
                        <div class="paymentMethod">
                           <div class="payment-option payment-option-card selected">
                              <label class="payment-option-title">
                                 <input type="radio" name="pay_by" value="stripe" checked="checked">
                                 Stripe
                              </label>
                           </div>
                           <div class="payment-option payment-option-paypal">
                              <label class="payment-option-title">
                                 <input type="radio" name="pay_by" value="paypal">
                                 PayPal
                              </label>
                           </div>
                        </div>
                        <br />
                        <form
                           role="form"
                           action="{{ route('stripe.post') }}"
                           method="post"
                           class="require-validation"
                           data-cc-on-file="false"
                           data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                           id="payment-form">
                           @csrf
                           <div class="row col-sm-12" id="payment-form"></div>
                        </form>
                     </div>
                  </div>
               </fieldset>
            </div>
         </div>
      </div>
   </div>
@endsection
@push('js')
   <script>
      $(document).ready(function(){
         var pay_by = $('input[name="pay_by"]:checked').val();
         $.ajax({
            type:'GET',
            url:'{{ route("payment_by") }}',
            data:{'method': pay_by},
            success: function(response) {
               $('#payment-form').html(response);
            }
         });
      });

      $('input:radio[name="pay_by"]').change(function(){
         var pay_by = $(this).val();
         $.ajax({
            type:'GET',
            url:'{{ route("payment_by") }}',
            data:{'method': pay_by},
            success: function(response) {
               $('#payment-form').html(response);
            }
         });
      });

      $(document).on('click', '.remove-coupon-btn', function(){
         var session_key = $(this).attr('data-session');
         Swal.fire({
            title: 'Are you sure?',
            text: "You want to remove coupon?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
         }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
               type:"get",
               url:"{{ url('shop/remove-coupon') }}",
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
               },
               data:{'session_key':session_key},
               success:function(data){
                  if(data.status=='true'){
                     location.reload();
                  }
               },
               error:function (er) {
                  console.log(er);
               }
            });
            }
         })
      });
      $(document).on('click', '.coupon-btn', function(){
         var coupon_code = $('#coupon_code').val();
         if(coupon_code.length==0){
            $('#error-coupon').html('Enter coupon code!');
         }else if(coupon_code.length < 5){
            $('#error-coupon').html('Coupon is invalid!');
         }else{
            $.ajax({
               type:"get",
               url:"{{ route('shop.apply-coupon') }}",
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
               },
               data:{'coupon_code':coupon_code},
               success:function(data){
                  if(data.status=='expired'){
                     $('#error-coupon').html('This is expired!');
                  }else if(data.status=='in-active'){
                     $('#error-coupon').html('This is not active.');
                  }else if(data.status=='used'){
                     $('#error-coupon').html('You have used this code can not use again.');
                  }else if(data.status=='true'){
                     location.reload();
                  }else if(data.status=='not-found'){
                     $('#error-coupon').html('Sorry this is not matched.');
                  }
               },
               error:function (er) {
                  console.log(er);
               }
            });
         }
      });

      $("#coupon_code").keyup(function(){
         var coupon_code = $(this).val();
         if(coupon_code.length == 5){
            $('#error-coupon').html('');
         }
      });
   </script>
   <!-- Payment integration Scripts -->
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script type="text/javascript">
      $(function() {
         var $form = $(".require-validation");
         $('form.require-validation').bind('submit', function(e) {
            var name_on_card = $('.name-on-card').val();
            var card_cvc = $('.card-cvc').val();
            if(name_on_card==''){
               $('#error-name-on-card').html('Name is required field.');
               return false;
            }else{
               $('#error-name-on-card').html('');
            }
            if(card_cvc == ''){
               $('#error-cvc').html('CVC is required field.');
               return false;
            }else{
               $('#error-cvc').html('');
            }
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                  'input[type=text]', 'input[type=file]',
                  'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                  var $input = $(el);
                  if ($input.val() === '') {
                  $input.parent().addClass('has-error');
                  $errorMessage.removeClass('hide');
                  e.preventDefault();
                  }
            });
            if (!$form.data('cc-on-file')) {
                  e.preventDefault();
                  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                  Stripe.createToken({
                  number: $('.card-number').val(),
                  cvc: $('.card-cvc').val(),
                  exp_month: $('.card-expiry-month').val(),
                  exp_year: $('.card-expiry-year').val()
                  }, stripeResponseHandler);
            }
            });
            function stripeResponseHandler(status, response) {
            if (response.error) {
                  $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
            } else {
               //  token contains id, last4, and card type
               var name = $('.name-on-card').val();
               var token = response['id'];
               $form.find('input[type=text]').empty();
               $form.append("<input type='hidden' name='name_on_card' value='" + name + "'/>");
               $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
               $form.get(0).submit();

               $('#pageLoader').show();
            $("#sbt-btn").hide();
            }
         }
      });
   </script>
@endpush
