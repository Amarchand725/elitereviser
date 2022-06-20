@extends('website.layouts.master')
@section('metatitle')
    <title>Cv/Resume | Service </title>
@endsection
<!-- Banner -->
@section('content')
  <div class="container-fluid">
    <section class="inner-banner">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('public/assets/website')}}/images/banner-cv.jpg" class="d-block w-100" alt="..."/>
              <div class="carousel-caption d-none d-md-block">
                <h5>Resume/CV</h5>
                <p>We deliver the best possible results on all projects. You can always count on us for a work well done.</p><br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <Editing Section> -->
    <section class="editing">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="sec-heading">Resume/CV Building Service</h3>
            <div>
              <p class="sec-text">Do you want a resume or CV built from scratch? We can handle that. We believe your dream job needs a perfect resume or CV. How your resume/CV appears means a lot to the hiring managers; so, let us take care of that for you.</p>
             </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Form Section -->
    <div class="container" style="margin-bottom: 200px; max-width:960px">
      <form method="POST" action="{{ route('customer.confirm-order') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service_id }}">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Sub Service</label>
            <select class="custom-select my-1 mr-sm-2" name="sub_service" id="cv_resume">
              @foreach ($sub_services as $sub_service)
                <option value="{{ $sub_service->id }}">{{ $sub_service->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Number of Pages</label>
            <input type="text" onkeypress='validate(event)' maxlength="2" minlength="1" class="form-control" id="no_of_pages" name="total_pages" placeholder="00">
            <span style="color: red" id="error-pages"></span>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Select Currency</label>
              <select class="custom-select my-1 mr-sm-2" name="currency" id="inlineFormCustomSelectPref">
                  <option value="US Dollar">US Dollar</option>
              </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Price</label>
            <input type="text" class="form-control" readonly name="total_amount" id="total_amount" value="0" placeholder="Total Amount">
          </div>
        
          <div class="form-group col-md-6">
            <label for="inputEmail4">Upload file</label>
            <div class="file-input">
              <input type="file" name="file" id="file-input" class="file-input__input"/>
              <label class="file-input__label" id="labelms" for="file-input">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16"
                  role="img" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 512 512">
                  <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
              </svg>
              <span>Upload file</span></label>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="inputEmail4">Client Note</label>
            <textarea name="client_note" class="form-control" rows="5" placeholder="Client Note..."></textarea>
          </div>
          <button type="submit" class="btn btn-warning ripple-surface" id="btnms"><i class="fas fa-calculator"></i>&nbsp;&nbsp;&nbsp;Order Now</button>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('js')
    <script>
      $(document).on('keyup', '#no_of_pages', function(){
        var pages = $(this).val();
        var sub_service = $('#cv_resume').val();
        
        if(sub_service==40){ //resume $75
          $(this).attr('max', 4);
          if(pages>4){
            $('#error-pages').html('Max 4 pages')
          }else{
            var total_amount = pages*75;
            $('#total_amount').val(total_amount);
            $('#error-pages').html('');
          }
        }else{ //cv $50
          $(this).attr('max', 50);
          if(pages>50){
            $('#error-pages').html('Max 50 pages')
          }else{
            var total_amount = pages*50;
            $('#total_amount').val(total_amount);
            $('#error-pages').html('');
          }
        }
      });
      function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
          key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode(key);
        }
        var regex = /[1-50]|\./;
        if( !regex.test(key) ) {
          theEvent.returnValue = false;
          if(theEvent.preventDefault) theEvent.preventDefault();
        }
      }
      $(document).on('change','#cv_resume', function(){
        var sub_service = $(this).val();
        if(sub_service==40){ //resume
          $('#no_of_pages').attr('max', 4);
          $('#error-pages').html('Max 4 pages');
        }else{ //cv
          $('#no_of_pages').attr('max', 50);
          $('#error-pages').html('Max 50 pages');
        }
      });
    </script>
@endpush