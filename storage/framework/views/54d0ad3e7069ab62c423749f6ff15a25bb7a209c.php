<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?php echo e(asset('public/assets/website')); ?>/images/favicon.png" type="image/png" sizes="32x32">
    <link href="<?php echo e(asset('public/assets/website')); ?>/bootstrap-4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/website')); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/website')); ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/website')); ?>/slick-slider/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/website')); ?>/slick-slider/slick/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <?php echo $__env->yieldContent('metatitle'); ?>
    <script src="https://cdn.jsdelivr.net/emojione/2.2.7/lib/js/emojione.min.js" type="text/javascript" async="" defer=""></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
  <body>

    <div id="butter">
        <?php echo $__env->make('website.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Before Header Section -->
        <?php echo $__env->yieldContent('content'); ?>
        <!--After footer-->
        <?php echo $__env->make('website.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="<?php echo e(asset('public/assets/website')); ?>/slick-slider/slick/slick.min.js"></script>
    <script src="<?php echo e(asset('public/assets/website')); ?>/bootstrap-4/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('public/assets/website')); ?>/js/custom.js"></script>
    <script src="<?php echo e(asset('public/assets/website')); ?>/js/butter.js"></script>
    <script src="<?php echo e(asset('public/assets/website')); ?>/css/script.js"></script>
    <?php echo $__env->yieldPushContent('js'); ?>
    <script>
    let i=2;
    $(document).ready(function(){
    $(document).on("click", ".closed", function () {
        $(this).parents('.flip-card').removeClass('hover');
    });

        var radius = 200;
        var fields = $('.itemDot');
        var container = $('.dotCircle');
        var width = container.width();
        radius = width/2.5;

        var height = container.height();
        var angle = 0, step = (2*Math.PI) / fields.length;
        fields.each(function() {
            var x = Math.round(width/2 + radius * Math.cos(angle) - $(this).width()/2);
            var y = Math.round(height/2 + radius * Math.sin(angle) - $(this).height()/2);
            if(window.console) {
            //console.log($(this).text(), x, y);
            }

            $(this).css({
            left: x + 'px',
            top: y + 'px'
            });
            angle += step;
        });


        $('.itemDot').click(function(){

            var dataTab= $(this).data("tab");
            $('.itemDot').removeClass('active');
            $(this).addClass('active');
            $('.CirItem').removeClass('active');
            $( '.CirItem'+ dataTab).addClass('active');
            i=dataTab;

            $('.dotCircle').css({
            "transform":"rotate("+(360-(i-1)*36)+"deg)",
            "transition":"2s"
            });
            $('.itemDot').css({
            "transform":"rotate("+((i-1)*36)+"deg)",
            "transition":"1s"
            });


        });

        setInterval(function(){
            var dataTab= $('.itemDot.active').data("tab");
            if(dataTab>4||i>4){
            dataTab=1;
            i=1;
            }
            $('.itemDot').removeClass('active');
            $('[data-tab="'+i+'"]').addClass('active');
            $('.CirItem').removeClass('active');
            $( '.CirItem'+i).addClass('active');
            i++;


            $('.dotCircle').css({
            "transform":"rotate("+(360-(i-2)*36)+"deg)",
            "transition":"2s"
            });
            $('.itemDot').css({
            "transform":"rotate("+((i-2)*36)+"deg)",
            "transition":"2s"
            });

            }, 5000);


    });

    </script>


    <?php echo $__env->yieldContent('js'); ?>

    <!-- <script>
      butter.init({cancelOnTouch: true});
    </script> -->
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/website/layouts/master.blade.php ENDPATH**/ ?>