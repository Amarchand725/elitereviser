<!-- Footer -->
    <footer class="lastsec">
        <div style="background:linear-gradient(360deg, #c86e00, #f8ba02); opacity: 0.9;">
            <div class="container">
          
          <div class="row footerrow justify-content-md-center">
            <div class="col-lg-4">
              <div class="footer1">
                <img src="<?php echo e(asset('public/assets/website')); ?>/images/footer-logo.png" class="img-fluid">
              </div>
              <div class="footer2" style="margin-top: 0%">
                 <ul class="footerLinks emailLinks" style="clear:both">
                    <li class="first">
                       <span class="fas fa-phone" style="color:#fff"></span>
                       <a href="tel:+14693051828">
                            +1 (469) 305 1828
                       </a>
                    </li>
                    <li>
                       <span class="fa fa-envelope" style="color:#fff"></span>
                       <a href="mailto:contact@elitereviser.com">
                         contact@elitereviser.com
                       </a>
                    </li>
                    <li class="last">
                       <span class="far fa-map-marker-alt" style="color:#fff"></span>
                       <a href="javascript:;">
                            9550 Forest Lane Ste 135, Dallas, TX 75243
                       </a>
                    </li>
                 </ul>
              </div>
              <div class="footer1">
                <ul>
                  <li><i class="fab fa-facebook-f" aria-hidden="true"></i></li>
                  <li><i class="fab fa-twitter" aria-hidden="true"></i></li>
                  <li><i class="fab fa-linkedin-in" aria-hidden="true"></i></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="footer2">
                <h3>Company</h3>
                <ul>
                  <li><a class="" aria-current="page" href="<?php echo e(route('index')); ?>">Home</a></li>
                  <li> <a class="" href="<?php echo e(route('about-us')); ?>">About</a></li>
                  <li><a class=""  href="<?php echo e(route('career')); ?>">Career</a></li>
                  <li><a class=""  href="<?php echo e(route('contact_us')); ?>">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="footer2">
                <h3>Services</h3>
                <ul>
                  <li> <a href="<?php echo e(url('place_order')); ?>/<?php echo e(1); ?>">Academic</a></li>
                  <li><a href="<?php echo e(url('place_order')); ?>/<?php echo e(2); ?>">Corporation</a></li>
                  <li><a href="<?php echo e(url('place_order')); ?>/<?php echo e(3); ?>">Non-English Speaker</a></li>
                  <li><a href="<?php echo e(url('place_order')); ?>/<?php echo e(4); ?>">Professional</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2">
                <div class="footer2">
                  <h3 style="visibility: hidden;" class="service2">Services</h3>
                  <ul>
                    <li style="margin-left: 0px;"><a href="<?php echo e(url('place_order')); ?>/<?php echo e(5); ?>">Student</a></li>
                    <li style="margin-left: 0px;"><a href="<?php echo e(url('place_order')); ?>/<?php echo e(6); ?>">Writer</a></li>
                    <li style="margin-left: 0px;"><a href="<?php echo e(url('cv')); ?>">CV/Resume Building</a></li>
                  </ul>
                </div>
              </div>
            <div class="col-lg-2">
              <div class="footer2">
                <h3>Customers</h3>
                <ul>
                    <li><a href="<?php echo e(route('login')); ?>">My Account</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Create an Account</a></li>
                    <li><a href="<?php echo e(route('my_orders')); ?>">My Order</a></li>
                </ul>
    
              </div>
            </div>
          </div>
        </div>
            <div class="copyright">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="copy">
                  <p>Copyright © <?php echo e(date('Y')); ?> | Elite Reviser | All rights reserved.</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="privacy">
                  <p><a style="color:#fff" href="<?php echo e(route('terms')); ?>">Terms of Service</a> | <a style="color:#fff" href="<?php echo e(route('privacy')); ?>">Privacy Policy</a></p>
                </div>
              </div>
    
            </div>
          </div>
        </div>
        </div>
    </footer>
<!-- Footer -->
  <?php $__env->startSection('js'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $( "#subscribe" ).submit(function( event ) {



          $("#subscribe").validate({
             rules: {
                  email: "required",
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
                 // $('#submit').html('Sending..');
                  var data = new FormData();

                  //Form data
                  var form_data = $('#subscribe').serializeArray();
                  $.each(form_data, function (key, input) {
                      data.append(input.name, input.value);
                  });



                  $.ajax({
                      type:'POST',
                      url: "<?php echo e(url('/subscribe')); ?>",
                      data:data,
                      cache:false,
                      contentType: false,
                      processData: false,
                      success:function(data){
                          console.log(data);
                          if(data == 'true'){
                              Swal.fire({
                                  position: 'top-end',
                                  icon: 'success',
                                  title: 'Thanks for subscribing',
                                  showConfirmButton: false,
                                  timer: 2000
                              })
                              setTimeout(function () {
                                  location.href = "<?php echo e(url('/')); ?>"
                              }, 2000);
                          }else if(data == 'false'){
                              Swal.fire({
                                  position: 'top-end',
                                  icon: 'warning',
                                  title: 'This Email is already exists',
                                  showConfirmButton: false,
                                  timer: 2000
                              });
                          }else{
                              Swal.fire({
                                  position: 'top-end',
                                  icon: 'warning',
                                  title: 'Something went wrong!',
                                  showConfirmButton: false,
                                  timer: 2000
                              });
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

  <?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/website/layouts/footer.blade.php ENDPATH**/ ?>