@extends('website.layouts.master')

@section('metatitle')

  <title>{{ $service->title }} | Service </title>

@endsection



<style type="text/css">

  .hide{

    display: none;

  }

  .show{

    display: block;

  }

</style>

<!-- Banner -->

@section('content')

  <section class="inner-banner">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12">

          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>

            <div class="carousel-inner">

              <div class="carousel-item active">

                <img  src="{{ asset('public/assets/website/images')}}/{{ $service->bg_image }}" class="d-block w-100" alt="..."/>

                <div class="carousel-caption d-none d-md-block">

                  <h5>{{ $service->title }}</h5><br/>

                  <h6><strong>{{ $service->tags }}</strong> </h6>

                  <p>{{ $service->tagline }}</p><br/>

                </div>

              </div>

          </div>

        </div>

      </div>

    </div>

  </section>

  <!-- Banner -->

  <section class="editing">

    <div class="container">

      <div class="row">

        <div class="col-lg-12">

          <h3 class="sec-heading">{{ $service->title }}</h3>

          <div class="sec-text"><p>{{ $service->full_description }}</p>

          </div>

        </div>

      </div>

    </div>

  </section>

  <!-- Form Section -->

  <div class="container" style="margin-bottom: 200px; max-width:960px">

    <form method="post" action="{{ route('customer.confirm-order') }}" enctype="multipart/form-data">

      @csrf

      <input type="hidden" name="service_id" value="{{ $service->id }}">

      

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

      <div class="form-row">

        <div class="form-group col-md-6">

          <label for="inputEmail4">Sub Service</label>

          <select class="custom-select my-1 mr-sm-2" name="sub_service" id="inlineFormCustomSelectPref">

            <option selected>CV</option>

            @foreach ($sub_services as $sub_service)

              <option value="{{ $sub_service->id }}">{{ $sub_service->title }}</option>

            @endforeach

          </select>

        </div>

        <div class="form-group col-md-6">

            <label for="inputEmail4">English Version</label>

            <select class=" custom-select my-1 mr-sm-2" name="language" id="inlineFormCustomSelectPref">

                <option selected>Select English Version</option>

                <option value="1">American</option>

                <option value="2">British</option>

                <option value="3">Canadian</option>

            </select>

          </div>

          <div id="msg_div" class="alert alert-danger hide">

              <strong>Whoops! </strong><span id="error"></span>

          </div>

          <div class="form-group col-md-6">

            <label for="inputEmail4">Upload file<small id="file_ext"></small><img src="{{ asset('public/assets/website/images/loder.gif')}}" class="loder" style="display: none; width: 20px;margin-left: 15px;"><span id="file-input-remove" style="color: red; font-size: 10px;margin-left: 10px; cursor: pointer; display:none"><i class="fa fa-trash"></i> Remove file</span></label>

            <div class="file-input">

              <input type="file" name="file" id="file-input" class="file-input__input"/>
              

              <label class="file-input__label" id="labelms" for="file-input">

              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16"

                  role="img" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 512 512">

                  <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>

              </svg>

              <span id="nameofFile">Upload files</span></label>

            </div>

          </div>

        <div class="form-group col-md-6">

          <label for="inputEmail4">Total word count</label>

          <input type="text" class="form-control" readonly name="total_words" id="total_words" placeholder="00">

        </div>

        <div class="form-group col-md-6">

          <label for="inputAddress">Speed</label>

          <select class="custom-select my-1 mr-sm-2" name="service_type" id="service-type">

            <option selected>Select Service</option>

            <option value="Normal Service">Normal Service</option>

            <option value="Expedited Service">Expedited Service</option>

          </select>

        </div>

        <div class="form-group col-md-6">

          <label for="inputAddress">Turnaround Time:</label>

          <select class="custom-select my-1 mr-sm-2" name="trunaround_time" id="trunaround_time">

            <!--<option value="" selected>Select Service First</option>

            <option value="18">18 Hours</option>

            <option value="24">24 Hours</option>

            <option value="36">36 Hours</option>

            <option value="48">48 Hours</option>

            <option value="54">54 Hours</option>

            <option value="72">72 Hours</option>

            <option value="108">108 Hours</option>

            <option value="144">144 Hours</option>

            <option value="216">216 Hours</option>

            <option value="288">288 Hours</option>

            <option value="324">324 Hours</option>

            <option value="432">432 Hours</option>-->

          </select>

        </div>

        <div class="form-group col-md-6">

          <label for="inputAddress">Select Currency</label>

          <select class="custom-select my-1 mr-sm-2" name="currency" id="inlineFormCustomSelectPref">

            <option value="US Dollar" selected>US Dollar</option>

          </select>

        </div>

        <div class="form-group col-md-6">

          <label for="inputEmail4">Total Amount</label>

          <input type="text" class="form-control" readonly name="total_amount" id="total-amount" value="" placeholder="Total Amount">

        </div>

        <div class="form-group col-md-12">

          <label for="inputEmail4">Client Instruction…</label>

          <textarea name="client_note" class="form-control" rows="5" placeholder="Client Instruction…"></textarea>

        </div>

        <div class="form-group col-md-12 text-right mt-3">

          <button type="submit" class="btn btn-warning ripple-surface"><i class="fas fa-calculator"></i> Order Now</button>

        </div>

      </div>

    </form>

  </div>

  <!--Form Section-->

@endsection

@section('js')

  <script>

    //calculate amount according to service

   /* $(document).on('change', '#service-type', function(){

      var service = $(this).val();

      var trunaround_time = $('#trunaround_time').val();

      var words = $('#total_words').val();



      var trunaround_charges = tot_charges(words, trunaround_time, service);

      var total_amount = trunaround_charges;

      if(service=='Normal Service'){

        charges = 0.05*words;

        total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(total_amount.toFixed(2));

      }else if(service=='Expedited Service'){

        charges = 0.05*words*1.15;

        total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(total_amount.toFixed(2));

      }else{

        $('#total-amount').val('');

      }

    });



    $(document).on('change', '#trunaround_time', function(){

      var trunaround_time = $(this).val();

      var words = $('#total_words').val();

      var service = $('#service-type').val();



      var trunaround_charges = tot_charges(words, trunaround_time, service);

      var total_amount = trunaround_charges;



      if(service=='Normal Service'){

        charges = 0.05*words;

        total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(total_amount.toFixed(2));

      }else if(service=='Expedited Service'){

        charges = 0.05*words*1.15;

        total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(total_amount.toFixed(2));

      }else{

        $('#total-amount').val('');

      }

    });*/



    /*function tot_charges(words, trunaround_time){

      if(words<1000){

        if(trunaround_time==12){

          trunaround_charges = 32.50;

        }else if(trunaround_time==18){

          trunaround_charges = 28.75;

        }if(trunaround_time==24){

          trunaround_charges = 25.00;

        }

      }else if(words>=1000 && words<5000){

        if(trunaround_time==24){

          trunaround_charges = 65.00;

        }else if(trunaround_time==36){

          trunaround_charges = 57.50;

        }else if(trunaround_time==48){

          trunaround_charges = 50.00;

        }

      }else if(words>=5000 && words<10000){

        if(trunaround_time==24){

          trunaround_charges = 325.00;

        }else if(trunaround_time==36){

          trunaround_charges = 287.50;

        }else if(trunaround_time==48){

          trunaround_charges = 250.00;

        }

      }else if(words>=10000 && words<15000){

        if(trunaround_time==36){

          trunaround_charges = 650.00;

        }else if(trunaround_time==54){

          trunaround_charges = 575.00;

        }else if(trunaround_time==72){

          trunaround_charges = 500.00;

        }

      }else if(words>=15000 && words<20000){

        if(trunaround_time==36){

          trunaround_charges = 975.00;

        }else if(trunaround_time==54){

          trunaround_charges = 862.00;

        }else if(trunaround_time==72){

          trunaround_charges = 750.00;

        }

      }else if(words>=20000 && words<25000){

        if(trunaround_time==72){

          trunaround_charges = 1300.00;

        }else if(trunaround_time==108){

          trunaround_charges = 1150.00;

        }else if(trunaround_time==144){

          trunaround_charges = 1000.00;

        }

      }else if(words>=25000 && words<30000){

        if(trunaround_time==72){

          trunaround_charges = 1625.00;

        }else if(trunaround_time==108){

          trunaround_charges = 1437.00;

        }else if(trunaround_time==144){

          trunaround_charges = 1250.00;

        }

      }else if(words>=30000 && words<50000){

        if(trunaround_time==144){

          trunaround_charges = 1950.00;

        }else if(trunaround_time==216){

          trunaround_charges = 1725.00;

        }else if(trunaround_time==288){

          trunaround_charges = 1500.00;

        }

      }else if(words>=50000 && words<100000){

        if(trunaround_time==144){

          trunaround_charges = 3250.00;

        }else if(trunaround_time==216){

          trunaround_charges = 2875.00;

        }else if(trunaround_time==288){

          trunaround_charges = 2500.00;

        }

      }else if(words>=100000){

        if(trunaround_time==216){

          trunaround_charges = 6500.00;

        }else if(trunaround_time==324){

          trunaround_charges = 5750.00;

        }else if(trunaround_time==432){

          trunaround_charges = 5000.00;

        }

      }



      return trunaround_charges;

    }*/

    

     //calculate amount according to service

    $(document).on('change', '#service-type', function(){

      var service = $(this).val();

      var trunaround_time = $('#trunaround_time').val();

      var words = $('#total_words').val();



      // var trunaround_charges = tot_charges(words, trunaround_time, service);

      // var total_amount = trunaround_charges;

      if(service=='Normal Service'){

        charges = 0.05*words;

        // total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(charges.toFixed(2));



        var html = '';

          if(words>=100 && words <=2999){

            html = '<option value="24" selected>24 Hours</option>';

          }else if(words>=3000 && words <=4999){

            html = '<option value="48">48 Hours</option>';

          }else if(words>=5000 && words <=7999){

            html = '<option value="60">60 Hours</option>';

          }else if(words>=8000 && words <=9999){

            html = '<option value="72">72 Hours</option>';

          }else if(words>=10000 && words <=14999){

            html = '<option value="96">96 Hours</option>';

          }else if(words>=15000 && words <=19999){

            html = '<option value="120">120 Hours</option>';

          }else if(words>=20000 && words <=29999){

            html = '<option value="144">144 Hours</option>';

          }else if(words>=30000 && words <=49999){

            html = '<option value="288">288 Hours</option>';

          }else if(words>=50000 && words <=749999){

            html = '<option value="360">360 Hours</option>';

          }else if(words>=80000){

            html = '<option value="432">432 Hours</option>';

          }



        $('#trunaround_time').html(html);

      }else if(service=='Expedited Service'){

        charges = 0.05*words*1.15;

        // total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(charges.toFixed(2));



        var html = '';

        if(words>=100 && words <=2999){

            html = '<option value="18" selected>18 Hours</option>';

        }else if(words>=3000 && words <=4999){

          html = '<option value="36">36 Hours</option>';

        }else if(words>=5000 && words <=7999){

          html = '<option value="48">48 Hours</option>';

        }else if(words>=8000 && words <=9999){

          html = '<option value="54">54 Hours</option>';

        }else if(words>=10000 && words <=14999){

          html = '<option value="80">80 Hours</option>';

        }else if(words>=15000 && words <=19999){

          html = '<option value="96">96 Hours</option>';

        }else if(words>=20000 && words <=29999){

          html = '<option value="120">120 Hours</option>';

        }else if(words>=30000 && words <=49999){

          html = '<option value="216">216 Hours</option>';

        }else if(words>=50000 && words <=749999){

          html = '<option value="240">240 Hours</option>';

        }else if(words>=80000){

          html = '<option value="366">366 Hours</option>';

        }



        $('#trunaround_time').html(html);

      }else{

        $('#total-amount').val('');

      }

    });



    $(document).on('change', '#trunaround_time', function(){

      var trunaround_time = $(this).val();

      var words = $('#total_words').val();

      var service = $('#service-type').val();



      // var trunaround_charges = tot_charges(words, trunaround_time, service);

      // var total_amount = trunaround_charges;

      

      if(service=='Normal Service'){

        charges = 0.05*words;

        // total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(charges.toFixed(2));

      }else if(service=='Expedited Service'){

        charges = 0.05*words*1.15;

        // total_amount = parseFloat(total_amount+charges);

        $('#total-amount').val(charges.toFixed(2));
        
      }else{

        $('#total-amount').val('');

      }

    });

    

    //count words of uploaded document

    $(document).ready(function (event) {

      $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

        }

      });



      $('#file-input').on('change', function (event) {

        event.preventDefault();

        var fd = new FormData();

        $('.loder').css('display','inherit');

        var files = $('#file-input')[0].files;

        fd.append('file',files[0]);

        $.ajax(

        {

          type: "POST",

          url: "{{ route('file.upload.submit')}}",

          data : fd,

          enctype: 'multipart/form-data',

          processData: false,

          contentType: false,

          success: function(data){

            const obj = JSON.parse(data);

                console.log(obj.word_cont)

            if(obj.word_cont >= 0){

                $('.loder').css('display','none');

                $('#file-input-remove').css('display','inherit');

              $( "#msg_div" ).removeClass( "show" ).addClass( "hide" );

              document.getElementById( 'total_words' ).value = obj.word_cont;

              document.getElementById( 'nameofFile' ).innerHTML = ' ('+ obj.file_ext +')';

            }

            else{

              console.log(obj.word_cont);

              $('#file-input-remove').css('display','none');

              $( "#msg_div" ).removeClass( "hide" ).addClass( "show" );

              document.getElementById( 'total_words' ).value = null;

              document.getElementById( 'error' ).innerHTML = data;

            }

          }

        });

      });

    });

    

    $(document).ready(function (event) {

      $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

        }

      });

    

        $('#file-input-remove').on('click', function (event) {

            $.ajax(

            {

              type: "POST",

              url: "{{ route('file.upload.submitremove')}}",

              data : '',

              enctype: 'multipart/form-data',

              processData: false,

              contentType: false,

              success: function(data){

                const obj = JSON.parse(data);

                    console.log(obj.word_cont)

                if(obj.word_cont >= 0){

                    $('.loder').css('display','none');

                    $('#file-input-remove').css('display','none');

                  $( "#msg_div" ).removeClass( "show" ).addClass( "hide" );

                  document.getElementById( 'total_words' ).value = obj.word_cont;

                  document.getElementById( 'nameofFile' ).innerHTML = obj.file_ext;

                }

                else{

                  console.log(obj.word_cont);

                  $('#file-input-remove').css('display','inherit');

                  $( "#msg_div" ).removeClass( "hide" ).addClass( "show" );

                  document.getElementById( 'total_words' ).value = null;

                  document.getElementById( 'error' ).innerHTML = data;

                }

              }

            });

          });

    });

    

    

  </script>

  

@endsection

