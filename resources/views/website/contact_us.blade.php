@extends('website.layouts.master')
@section('metatitle')
  <title>Contact us </title>
@endsection
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
                src="{{ asset('public/assets/website')}}/images/contact-new.png" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                  <h5> Contact Us</h5><br/>
                  <strong>Want To Get In Touch?</strong><br/>
                  <p> We'd Love To Hear From You</p>
                </div>
              </div>
          </div>
          <!-- Carousel wrapper -->
        </div>
      </div>
    </div>
  </section>
  <!-- Banner -->

  <section class="editing" style="padding-bottom: 0px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="sec-heading">Send us a message</h3>

        </div>
      </div>
    </div>
  </section>
  <!-- Editing Section -->

  <!--NEW-FORM SECTION-->
  <div class="container" style="margin-bottom: 50px;">
    <form id="contact-form"  action="javascript:void(0)" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Name</label>
          <input type="text"   name="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Phone Number</label>
          <input type="tel" name="phone_number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control" id="phone_number" placeholder="Phone Number">
        </div>

      </div>
      <div class="form-group">
        <label for="inputAddress">Message</label>
        <textarea  name="message" class="form-control" rows="10" id="message" placeholder="Message.."></textarea>
      </div>
      <button id="submit" type="submit" class="btn btn-primary" style="font-size:20px;">Submit</button>
    </form>
  </div>
  <!--NEW-FORM SECTION-->
  <section style="margin-bottom: -63px;">
    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=9550%20Forest%20Lane%20Ste%20135%2C%20Dallas%2C%20TX%2075243&amp;t=m&amp;z=12&amp;output=embed&amp;iwloc=near" title="9550 Forest Lane Ste 135, Dallas, TX 75243" aria-label="9550 Forest Lane Ste 135, Dallas, TX 75243"></iframe>
  </section>
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $( "#contact-form" ).submit(function( event ) {
      $("#contact-form").validate({
        rules: {
          name: "required",
          email: "required",
          phone_number: "required",
          message: "required",
        },
        messages: {
          required: "This field is required",
        },
        submitHandler: function(form) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });
          $('#submit').html('Sending..');
          var data = new FormData();

          //Form data
          var form_data = $('#contact-form').serializeArray();
          $.each(form_data, function (key, input) {
            data.append(input.name, input.value);
          });

          $.ajax({
            type:'POST',
            url: "{{url('/save_request')}}",
            data:data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
              // console.log(data);
              if(data == 'true'){
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Your Request sent successfully',
                  showConfirmButton: false,
                  timer: 2000
                })
                setTimeout(function () {
                    location.href = "{{ url('/contact-us') }}"
                }, 2000);
              }else{
                Swal.fire({
                  position: 'top-end',
                  icon: 'warning',
                  title: 'Something went wrong!',
                  showConfirmButton: false,
                  timer: 2000
                })
              }
            },
            error: function (er) {
              console.log(er);
              Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Something went wrong!',
                showConfirmButton: false,
                timer: 2000
              })
            }
          });
        }
      })
    });
  </script>
@endsection
