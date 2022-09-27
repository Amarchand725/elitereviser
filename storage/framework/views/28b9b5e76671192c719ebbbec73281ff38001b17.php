<?php $__env->startSection('metatitle'); ?>
  <title>Elite Reviser</title>
<?php $__env->stopSection(); ?>

<!-- Banner -->
<?php $__env->startSection('content'); ?>
    <section class="banner">
        <div class="banner-video-right">
            <video id="myVideo" controls autoplay muted loop >
                <source src="<?php echo e(asset('public/assets/website/images')); ?>/video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="container">

            <div class="row bannersec">

                <div class="col-lg-12">
                    <div class="banner-text-left-heading">
                        <h5>We Provide <span class="auto-typing"></span></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-text-left">
                        <p>Our services are all about quality, speed, and affordability. No matter what your needs are, our elite editors and proofreaders have all the diligence and expertise to turn your work into a masterpiece.</p>
                        <p style="margin: 0px;"><i class="fa fa-check-circle" style="color: #fcc002;"></i> Excellent Service</p>
                        <p style="margin: 0px;"><i class="fa fa-check-circle" style="color: #fcc002;"></i> Cream of the Crop Proofreaders/Editors</p>
                        <p style="margin: 0px;"><i class="fa fa-check-circle" style="color: #fcc002;"></i> 100% Customer Satisfaction</p>
                        <a href="<?php echo e(route('services')); ?>" class="btn business ripple-surface" style="margin-top:25px">Place Order</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    
                </div>
            </div>
        </div>
    </section>
  <!-- Banner -->

  <!-- Categories -->
  <div class="container">
    <section class="category">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="sec-heading">CHOOSE YOUR CATEGORY AND <br>GET STARTED</h3>
          </div>
        </div>
        <div class="row">
          <?php $__currentLoopData = $main_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="box <?php echo e($service->bg_color); ?>" style="background: url('<?php echo e(asset('public/assets/website/images')); ?>/<?php echo e($service->bg_image); ?>')no-repeat;">
                <h3 class="hd"><?php echo e($service->title); ?></h3>
                <p><?php echo e($service->short_description); ?></p>
                <a href="<?php echo e(route('place_order', ['id'=>$service->id])); ?>" class="btn business">Place Order</a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
  </div>
  <!-- Categories -->
  <!-- Editing Section -->
  <section class="editing" style="padding-top:0px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="sec-heading new-style">HOW OUR EDITING & PROOFREADING <br>PROCESS WORKS</h3>
        </div>
      </div>
      <div class="row project-process">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="box">
            <img src="<?php echo e(asset('public/assets/website')); ?>/images/icon (3).png" class="img-fluid" alt="">
            <h3 class="hd">SUBMIT YOUR WORK</h3>
            <p>When you upload your work on our website and make the appropriate payment, your work is considered submitted and ready to be edited and proofread.</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="box">
            <img src="<?php echo e(asset('public/assets/website')); ?>/images/icon (2).png" class="img-fluid" alt="">
            <h3 class="hd"> EDITOR ASSIGNED TO WORK</h3>
            <p>Once submitted, your work will be assigned to one of our editors and proofreaders, who will thoroughly improve the quality of your work. </p>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="box">
            <img src="<?php echo e(asset('public/assets/website')); ?>/images/icon (1).png" class="img-fluid" alt="">
            <h3 class="hd">QUALITY EVALUATED </h3>
            <p> At this point, your work is given a more critical revision by one of our experts to ensure the final product is a masterpiece.</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="box">
            <img src="<?php echo e(asset('public/assets/website')); ?>/images/icon (4).png" class="img-fluid" alt="">
            <h3 class="hd">YOUR WORK COMPLETED </h3>
            <p> Once your work is completed, you will be notified to download it for your review and approval.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Editing Section -->
  <!--Word Process-->
  <section class="section-padding clients-section wow">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-12 iq-features">
             <div class="row align-items-center">
                <div class="col-md-12">
                   <div class="holderCircle">
                      <div class="round"></div>
                      <div class="dotCircle">
                         <span class="itemDot active itemDot1" data-tab="1">
                            <i class="fas fa-hand-holding-box mid-position"></i>
                            <span class="forActive"></span>
                         </span>
                         <span class="itemDot itemDot2" data-tab="2">
                            <!-- <i class="fa fa-asterisk mid-position"></i> -->
                            <i class="far fa-laptop-code mid-position"></i>
                            <span class="forActive "></span>
                         </span>
                         <span class="itemDot itemDot3" data-tab="3">
                            <!-- <i class="fa fa-check mid-position"></i> -->
                            <i class="fas fa-drafting-compass mid-position"></i>

                            <span class="forActive"></span>
                         </span>
                         <span class="itemDot itemDot4" data-tab="4">
                            <!-- <i class="fa fa-pencil-square-o mid-position"></i> -->
                            <i class="far fa-badge-check mid-position"></i>
                            <span class="forActive"></span>
                         </span>
                         
                      </div>
                      <div class="contentCircle">
                         <div class="CirItem title-box active CirItem1">
                            <h2 class="title"><span>SUBMIT YOUR WORK</span></h2>
                            <p>
                               "When you upload your work on our website and make the appropriate payment, your work is considered submitted and ready to be edited and proofread."
                            </p>
                            <!-- <i class="fa fa-lightbulb-o"></i> -->
                         </div>
                         <div class="CirItem title-box CirItem2">
                            <h2 class="title"><span>EDITOR ASSIGNED TO WORK</span></h2>
                            <p>
                                Once submitted, your work will be assigned to one of our editors and proofreaders, who will thoroughly improve the quality of your work.
                            </p>
                            <!-- <i class="fa fa-asterisk"></i> -->
                         </div>
                         <div class="CirItem title-box CirItem3">
                            <h2 class="title"><span>QUALITY EVALUATED</span></h2>
                            <p>
                                At this point, your work is given a more critical revision by one of our experts to ensure the final product is a masterpiece.
                            </p>
                            <!-- <i class="fa fa-check"></i> -->
                         </div>
                         <div class="CirItem title-box CirItem4">
                            <h2 class="title"><span>YOUR WORK COMPLETED</span></h2>
                            <p>
                                Once your work is completed, you will be notified to download it for your review and approval.
                            </p>
                            <!-- <i class="fa fa-pencil-square-o"></i> -->
                         </div>
                         
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-12"></div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="customH">
                
             </div>
           </div>
       </div>
    </div>
 </section>

  <!--Word Process-->

  <!-- Testionials -->
  <section class="testionials" style="display:none;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-10 m-auto">
          <h3 class="sec-heading">OUR TESTIMONIALS</h3>
          <div id="testionial">
            <div class="item">
                <div class="box">
                
                    <h3>Amelia Adam</h3>
                    <h4>United States</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    <i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i>
                </div>
            </div>
            <div class="item">
                <div class="box">
                    
                        <h3>Amelia Adam</h3>
                        <h4>United States</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                        <i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i>
                    </div>
            </div>
            <div class="item">
                <div class="box">
                    
                        <h3>Amelia Adam</h3>
                        <h4>United States</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                        <i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i><i class="fa fa-star" style="color: #fcc002;"></i>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testionials -->

  <!-- Work -->
  <section class="work">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-9 col-lg-9 ">
          <div class="content">
            <h3 class="sec-heading">Still not sure what service is right for you?</h3>
            <p><strong>Elite Reviser</strong> can handle that. <strong><a href="<?php echo e(route('contact_us')); ?>" class="" style="/* background:#fcc002; */color: #fcc002;" ;=""> Contact Us.</a></strong></p>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 dis-flex-end">
          <a href="<?php echo e(route('services')); ?>"  class="btn btn-business" style="background:#fcc002; color: #fff;">Get Started</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Work -->

  <!-- Resume -->
  <section class="resume">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="content">
            <h3 class="sec-heading">RESUME/CV BUILDING SERVICE</h3>
            <p>Do you want a resume or CV built from scratch? We can handle that. We believe your dream job needs a perfect resume or CV. How your resume/CV appears means a lot to the hiring managers; so, let us take care of that for you. <span><a href="<?php echo e(route('cv')); ?>" style="text-decoration: none; " class="hoverClass cv-resume">Start your journey into a perfect career today with a perfect resume/CV.</a></span></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Resume -->
  <script src="<?php echo e(asset('public/assets/website')); ?>/js/min.autoType.1.0.0.js"></script>

<script>
         //documention :
         autoTyping({
            container : document.querySelector('.auto-typing'),
            text : ['Editing Service' , 'Proofreading Service', 'CV/Resume Service'],
            loop : true, //optional
            typeSpeed : 150,
            loopSpeed : 700,
            // color : ['red','green','blue'],//optional
            blink : true, //optional
            blinkSpeed : 400,
            blinkType : 'default', // flatted;

         }).start();
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/website/index.blade.php ENDPATH**/ ?>