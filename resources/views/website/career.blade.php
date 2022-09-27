@extends('website.layouts.master')
@section('metatitle')
    <title>Career | Elitereviser </title>
@endsection
<!-- Banner -->
@section('content')
<style>
    footer.lastsec{
    margin-top: 0px !important;
}
.apply{
  padding-top:20px;
  padding-bottom:20px;
}
</style>
  <div class="container-fluid">
    <section class="inner-banner">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('public/assets/website')}}/images/career.jpg" class="d-block w-100" alt="..."/>
              <div class="carousel-caption d-none d-md-block">
                <h5>Career</h5>
                <p>Our proofreaders and editors are the cream of the crop. They are well trained to bring out their best.</p><br/>
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
            <div style="padding-bottom: 40px;">
                <h3  class="sec-heading">WORKING FOR US</h3>
              <!-- <p class="sec-text" style="margin-top:50px">At Elite Reviser, we diligently select our proofreaders and editors to ensure the quality of our services are first class. In our industry, hiring, training, and retaining the best proofreaders and editors is key to satisfying our clients. If working with us interests you, we would love to evaluate your skills. Our team members are given the support they need to continually be the cream of the crop.</p> -->
              <p class="sec-text my-text">We are a company that is regularly looking for proofreaders and editors with different levels of educational backgrounds. Your country of residence is of no significance when you work for us because our jobs are done remotely. What is important to us is your expertise and willingness to achieve excellence in proofreading and editing. You must meet our prerequisites if working for us is of interest to you. If you become selected to work for us, we will do our best to make sure you are supported and equipped in every way possible.</p>
              <p class="sec-text my-text">At Elite Reviser, we are diligent in the selection of our proofreaders and editors to ensure the quality of our services are first class. We always strive to provide excellent services to all our customers, with no exception. In our industry, employing, training, and retaining the experienced and talented proofreaders and editors is key to achieving 100% customer satisfaction. Your performance will frequently be assessed to help you improve your expertise, where necessary. Our team members are given the support they need to continually be the cream of the crop.</p>
              <p class="sec-text my-text">If working for us interests you, we would love to evaluate your skills.</p>
             </div>
          </div>
        </div>
      </div>
    </section>
    
    <section id="features" class="features">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row justify-content-md-center">
            <h2 class="text-center sec-heading">THE BENEFITS OF JOINING US</h2>
          <div class="col-lg-5 order-1 order-lg-1 aos-init aos-animate" data-aos="fade-right">
            <div class="icon-box mt-5 mt-lg-0">
              <img src="{{ asset('public/assets/website')}}/images/competitive.png" style="position: absolute;">
              <!--<i class="fa-brands fa-paypal"></i>-->
              <h4>COMPETITIVE PAY</h4>
              <p>We offer our proofreaders and editors one of the highest rates of pay in the industry.</p>
            </div>
            <div class="icon-box mt-5">
              <img src="{{ asset('public/assets/website')}}/images/flexibility.png" style="position: absolute;">
              <h4>FLEXIBILITY</h4>
              <p>Our proofreaders and editors take advantage of flexible hours — you choose when to work.</p>
            </div>
          </div>
          <div class="image col-lg-5 order-2 order-lg-2 aos-init aos-animate">
              <div class="icon-box mt-5 mt-lg-0">
              <img src="{{ asset('public/assets/website')}}/images/telework.png" style="position: absolute;">
               <!--<i class="fa-solid fa-headset"></i>-->
              <h4>TELEWORK</h4>
              <p>Our proofreaders and editors have the ability to do their job remotely if they choose to.</p>
            </div>
            <div class="icon-box mt-5">
              <img src="{{ asset('public/assets/website')}}/images/support.png" style="position: absolute;">
              <h4>SUPPORT</h4>
              <p>We offer our proofreaders and editors great working conditions and a supportive team.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <section id="features-new" class="features-new">
      <div class="container aos-init aos-animate" data-aos="fade-up">
            <h2 class="text-center sec-heading">SELECTION CRITERIA</h2>
            <p class="features-new-text">The following selection criteria are considered if you want to work for us:</p>
            
        <div class="row justify-content-md-center new-align">
          <div class="col-lg-12 order-1 aos-init aos-animate" data-aos="fade-right">
            <div class="icon-box mybox mt-2 p-2">
             <i class="fa fa-play-circle"></i> <span> Native English speaker.</span>
            </div>
            <div class="icon-box mybox mt-1 p-2">
              <i class="fa fa-play-circle"></i> <span> Ability to adopt American, British, or Canadian English.</span>
            </div>
            <div class="icon-box mybox mt-1 p-2" style="padding-right: 0px !important;">
              <i class="fa fa-play-circle"></i> <span> At least a bachelor’s degree, but a graduate <span class="my-bullets">degree is preferred.</span>
            </div>
            <div class="icon-box mybox mt-1 mb-3 p-2">
              <i class="fa fa-play-circle"></i> <span> Experience proofreading and editing documents in various disciplines.</span>
            </div>
          </div>
          <div class="image col-lg-12 order-2 order-lg-2  aos-init aos-animate">
            <div class="icons">
              <div class="icon-box mybox mt-3 p-2">
              <i class="fa fa-play-circle"></i> <span> Ability to meet stringent deadlines, if necessary.</span>
            </div>
            <div class="icon-box mybox mt-1 p-2">
              <i class="fa fa-play-circle"></i> <span> Advanced skills in Microsoft Word 2010 or above.</span>
            </div>
            <div class="icon-box mybox mt-1 p-2">
              <i class="fa fa-play-circle"></i> <span> Employment experience as a proofreader or an editor.</span>
            </div>
            <div class="icon-box mybox mt-1 p-2 mb-3">
              <i class="fa fa-play-circle"></i> <span> Any professional certification in the <span class="my-bullets bullets">industry is an advantage.</span></span>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- <section id="apply-now" class="apply-now" style="background: linear-gradient(45deg, #1d4e99, #0354d2a6);"> -->
    <section id="apply-now" class="apply-now" style="background:#0000fc8c;">
      <div class="container aos-init aos-animate apply" data-aos="fade-up">
        <div class="row justify-content-md-center">
            <h2 class="text-center sec-heading" style="color:#fff;">APPLY NOW!</h2>
            <p class="apply-now-text">If you meet our selection criteria, please send us your CV and cover letter to <a href="mailto:contact@elitereviser.com" style="color:#fcc002">contact@elitereviser.com</a>. We will get back to you should we find you qualified to work for us.</p>
            <p class="apply-now-text" style="margin-bottom: 45px;">If you have any questions about working with us, please feel free to <a href="{{ route('contact_us')}}" style="color:#fcc002">contact us</a>.</p>
        </div>
      </div>
    </section>
    
    
    
  </div>
@endsection
@push('js')
  
@endpush