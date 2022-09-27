@extends('website.layouts.master')

@section('metatitle')

  <title>Services </title>

@endsection

<!-- Banner -->

@section('content')



<style>

    section.inner-banner .carousel-item:before {

        background: none !important;

    }

</style>

  <section class="inner-banner">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12">

          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>

          <div class="carousel-inner">

            <div class="carousel-item active">

              <img src="{{ asset('public/assets/website')}}/images/banner1.jpg" class="d-block w-100" alt="..."/>

              <div class="carousel-caption d-none d-md-block">

                <h5>Services</h5><br/>

                <h6>

                  <strong>

                    <!-- Academic, Business/Corporate, Non-English Speaker, Professional, Student and Writer @foreach($main_services as $service)

                      {{ $service->title }},

                    @endforeach -->

                     Academic, Corporation, Non-English Speaker, Professional, Student, and Writer

                  </strong> 

                </h6>

                <p>We deliver the best possible results on all projects. You can always count on us for a work well done.</p><br/>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

  <!-- Banner -->



  <!-- Categories -->

  <div class="container">

    <section class="category serv-category">

      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-12">

            <h3 class="sec-heading">CHOOSE YOUR CATEGORY AND<br>GET STARTED</h3>

          </div>

        </div>

        <div class="row mob-row-change" style="padding-bottom: 50px;">

          @foreach($main_services as $key=>$service)

            <div class="col-sm-12 col-md-6 col-lg-6">

              <div class="service-box @if($key==3) box-blue @elseif($key==2) box-yellow @else  {{ $service->bg_color }} @endif" style="background: url('{{ asset('public/assets/website/images')}}/{{ $service->bg_image }}')no-repeat;">

                <h3 class="hd">{{ $service->title }}</h3>

                <p class="academic"><span class="academic2">{{ $service->full_description }}</span></p>

                <a href="{{ route('place_order', ['id'=>$main_services[$key]->id])}}" class="btn business">Place Order</a>

              </div>

            </div>

          @endforeach

        </div>

      </div>

    </section>

  </div>

  <!-- Categories -->

@endsection



  @section('js')

  <script>

</script>



@endsection

