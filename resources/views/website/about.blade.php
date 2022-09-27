@extends('website.layouts.master')
@section('metatitle')
    <title>About Us | Elitereviser </title>
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
              <img src="{{ asset('public/assets/website')}}/images/about-us.jpg" class="d-block w-100" alt="..."/>
              <div class="carousel-caption d-none d-md-block">
                <h5>About Us</h5>
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
            <h3 class="sec-heading">About Us</h3>
            <div>
              <!-- <p class="sec-text">Elite Reviser is an American proofreading and editing company that is owned and managed by academic. Quality, speed, and affordability are central to all the services we offer our clients. No matter what your needs are, we are well-equipped for them. We offer services for the needs of academic, businesses, non-English speakers, professionals, students, and prolific writers. In addition to proofreading and editing, we specialize in building curriculum vitae (CV) and resume from the scratch.</p> -->
              <!-- <p class="sec-text">Our proofreaders and editors are qualified, experienced individuals from various academic backgrounds, who always go the extra mile to put smiles on the faces of our clients.  We would like to see you join the growing list of our satisfied clients. Tell us how we may better serve you.</p> -->
              <p class="sec-text">Elite Reviser is an American proofreading and editing company that is owned and managed by academic and professional. Our office is located in Dallas, Texas. Quality, speed, and affordability are central to all the services we offer our clients. No matter what your needs are, we are well-equipped for them. We offer services for the needs of academic, businesses, non-English speakers, professionals, students, and prolific writers. In addition to proofreading and editing, we specialize in building curriculum vitae (CV) and resume from the scratch.</p>
              <p class="sec-text">Our proofreaders and editors are qualified, experienced individuals from various academic and professional backgrounds who always go the extra mile necessary to put smiles on the faces of our clients. We would like to see you join the growing list of our satisfied clients. Tell us how we may better serve you.</p>
             </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
@endsection
@push('js')
  
@endpush