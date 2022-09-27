<?php $__env->startSection('metatitle'); ?>

  <title>Services </title>

<?php $__env->stopSection(); ?>

<!-- Banner -->

<?php $__env->startSection('content'); ?>



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

              <img src="<?php echo e(asset('public/assets/website')); ?>/images/banner1.jpg" class="d-block w-100" alt="..."/>

              <div class="carousel-caption d-none d-md-block">

                <h5>Services</h5><br/>

                <h6>

                  <strong>

                    <!-- Academic, Business/Corporate, Non-English Speaker, Professional, Student and Writer <?php $__currentLoopData = $main_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <?php echo e($service->title); ?>,

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->

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

          <?php $__currentLoopData = $main_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-sm-12 col-md-6 col-lg-6">

              <div class="service-box <?php if($key==3): ?> box-blue <?php elseif($key==2): ?> box-yellow <?php else: ?>  <?php echo e($service->bg_color); ?> <?php endif; ?>" style="background: url('<?php echo e(asset('public/assets/website/images')); ?>/<?php echo e($service->bg_image); ?>')no-repeat;">

                <h3 class="hd"><?php echo e($service->title); ?></h3>

                <p class="academic"><span class="academic2"><?php echo e($service->full_description); ?></span></p>

                <a href="<?php echo e(route('place_order', ['id'=>$main_services[$key]->id])); ?>" class="btn business">Place Order</a>

              </div>

            </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

      </div>

    </section>

  </div>

  <!-- Categories -->

<?php $__env->stopSection(); ?>



  <?php $__env->startSection('js'); ?>

  <script>

</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/website/services.blade.php ENDPATH**/ ?>