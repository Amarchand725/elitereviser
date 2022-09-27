<?php $__env->startSection('metatitle'); ?>
  <title><?php echo e($service->title); ?> | Service </title>
<?php $__env->stopSection(); ?>
<style type="text/css">
  .hide{
    display: none;
  }
  .show{
    display: block;
  }
</style>
<!-- Banner -->
<?php $__env->startSection('content'); ?>
  <section class="inner-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img  src="<?php echo e(asset('public/assets/website/images')); ?>/<?php echo e($service->bg_image); ?>" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo e($service->title); ?></h5><br/>
                  <h6><strong><?php echo e($service->tags); ?></strong> </h6>
                  <p><?php echo e($service->tagline); ?></p><br/>
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
          <h3 class="sec-heading"><?php echo e($service->title); ?></h3>
          <div class="sec-text"><p><?php echo e($service->full_description); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Form Section -->
  <div class="container my-form" style="margin-bottom: 50px; max-width:960px; margin-top: 100px; ">
    <form method="post" action="<?php echo e(route('customer.confirm-order')); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Sub Service <span class="text-danger">*</span></label>
          <select class="custom-select my-1 mr-sm-2" name="sub_service" required id="inlineFormCustomSelectPref">
            <option selected>Sub Service</option>
            <?php $__currentLoopData = $sub_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($sub_service->id); ?>"><?php echo e($sub_service->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">English Version <span class="text-danger">*</span></label>
            <select class=" custom-select my-1 mr-sm-2" required name="language" id="inlineFormCustomSelectPref">
                <option selected>Select English Version</option>
                <option value="1">American</option>
                <option value="2">British</option>
                <option value="3">Canadian</option>
            </select>
        </div>

        <div id="msg_div" class="alert alert-danger hide">
              <strong>Whoops! </strong><span id="error"></span>
        </div>
      </div>

        <div class="form-row">
            <div class="form-group col-md-6 offset-3">
                <div class="file-input">
                    <input type="file" multiple accept=".pdf, .doc,.docx,.txt,.xls" id="file-input" class="file-input__input"/>
                    <label class="file-input__label " id="labelms" for="file-input">
                        <span style="margin-left: 15% !important">Choose File (MS Word & pdf preferred)</span>
                        <img src="<?php echo e(asset('public/assets/website/images/loder.gif')); ?>" class="loder" style="display: none; width: 20px;margin-left: 15px;">
                    </label>
                </div>
            </div>
        </div>
        <div id="custom">
            <?php if(Session::has('documents')): ?>
                <?php
                    $files = Session::get('documents');
                    $counter = 0;
                    $total_count = 0;
                ?>

                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total_count += $file['count']; ?>
                    <div class="row pt-1 parent-row">
                        <div class="col-sm-5 offset-2 file-label" style="background-color: #4245a8 !important; color:white; padding:5px; text-align:center; border-radius: 5px;">
                            <span>Document <?php echo e(++$counter); ?></span>
                        </div>
                        <div class="col-sm-2 pl-1" style="background-color: #4245a8 !important; color:white; padding:5px; margin-left:5px; text-align:center; border-radius: 5px;">
                            <span><?php echo e($file['count']); ?></span>
                        </div>
                        <div class="col-sm-2 pl-1">
                            <div class="file-input">
                                <button type="button" class="btn btn-danger delete-btn" value="<?php echo e($key); ?>"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="row pt-2 pb-5">
                    <div class="col-sm-5 offset-2" style="background-color: #7f81cf !important; color:white; padding:5px; text-align:center; border-radius: 5px;">
                        <div class="file-input">
                            <span>Total Count</span>
                        </div>
                    </div>
                    <div class="col-sm-2 pl-1" style="background-color: #7f81cf !important; color:white; padding:5px; margin-left:5px; text-align:center; border-radius: 5px;">
                        <div class="file-input">
                            <span id="total-count"><?php echo e($total_count); ?></span>
                            <input type="hidden" name="total_words" id="total_words" value="<?php echo e($total_count); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputAddress">Speed <span class="text-danger">*</span></label>
            <select class="custom-select my-1 mr-sm-2" required name="service_type" id="service-type">
                <option selected>Select Service</option>
                <option value="Normal Service">Normal Service</option>
                <option value="Expedited Service">Expedited Service</option>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="inputAddress">Turnaround Time <span class="text-danger">*</span></label>
            <select class="custom-select my-1 mr-sm-2" required name="trunaround_time" id="trunaround_time">
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="inputAddress">Select Currency </label>
            <select class="custom-select my-1 mr-sm-2" name="currency" id="inlineFormCustomSelectPref">
                <option value="US Dollar" selected>US Dollar</option>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="inputEmail4">Total Amount</label>
            <input type="text" class="form-control" readonly name="total_amount" id="total-amount" value="" placeholder="Total Amount">
            </div>
            <div class="form-group col-md-12">
            <label for="inputEmail4">Client Instruction</label>
            <textarea name="client_note" class="form-control" rows="5" placeholder="Client Instruction…"></textarea>
            </div>
            
            <div class="form-group col-md-6">
                <div class="file-input">
                    <input type="file" id="instruction-file-input" class="file-input__input" accept=".pdf, .doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                    <label class="file-input__label " id="labelms" for="instruction-file-input">
                        <span style="margin-left: 25% !important">Choose Instruction Files</span><img src="<?php echo e(asset('public/assets/website/images/loder.gif')); ?>" class="instruction-loader" style="display: none; width: 20px;margin-left: 15px;">
                    </label>
                </div>
            </div>
            <div class="form-group col-md-8" id="instruction-custom-files">
                <?php if(Session::has('instruction_files')): ?>
                    <?php
                        $files = Session::get('instruction_files');
                        $counter = 0;
                    ?>

                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row pt-1 parent-row">
                            <div class="col-sm-6 file-label" style="background-color: #4245a8 !important; color:white; padding:5px; text-align:center; border-radius: 5px;">
                                <span>Document <?php echo e(++$counter); ?></span>
                            </div>
                            <div class="col-sm-2 pl-1">
                                <div class="file-input">
                                    <button type="button" id="remove-instruction-file-btn" class="btn btn-danger remove-instruction-file-btn" value="<?php echo e($key); ?>"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-12 text-right mt-3">
              <button type="submit" class="btn btn-warning ripple-surface"><i class="fas fa-calculator"></i> Order Now</button>
            </div>
        </div>
    </form>
  </div>
  <!--Form Section-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).on('change', '#instruction-file-input', function(){
      event.preventDefault();
        var fd = new FormData();
        $('.instruction-loader').css('display','block');
        var file = $(this)[0].files;
        fd.append('file',file[0]);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax(
        {
            type: "POST",
            url: "<?php echo e(route('upload-instruction-file')); ?>",
            data : fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(response){
                const obj = JSON.parse(response);
                var html = '';
                $('#instruction-file-input').val('');
                if(obj.files!=null){
                    $('.instruction-loader').css('display','none');
                    $( "#msg_div" ).removeClass( "show" ).addClass( "hide" );

                    var counter = 0;
                    jQuery.each(obj.files, function(index, val) {
                        ++counter;
                        html += '<div class="row pt-1 parent-row">'+
                            '<div class="col-sm-6 file-label" style="background-color: #4245a8 !important; color:white; padding:5px; text-align:center; border-radius: 5px;">'+
                                '<span>Document '+counter+'</span>'+
                            '</div>'+
                            '<div class="col-sm-2 pl-1">'+
                                '<div class="file-input">'+
                                    '<button type="button" id="remove-instruction-file-btn" class="btn btn-danger remove-instruction-file-btn" value="'+index+'"><i class="fa fa-trash"></i></button>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    });
                    $('#instruction-custom-files').html(html);
                }else{
                    $( "#msg_div" ).removeClass( "hide" ).addClass( "show" );
                    document.getElementById( 'error' ).innerHTML = response;
                }
            }
        });
    });

    $(document).on('click', '.remove-instruction-file-btn', function(){
        var name = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax(
                {
                type: "get",
                url: "<?php echo e(route('remove-instruction-file')); ?>",
                data : {'name':name},
                success: function(response){
                    const obj = JSON.parse(response);
                    var html = '';

                    if(obj.files!=null){
                        var counter = 0;
                        jQuery.each(obj.files, function(index, val) {
                            ++counter;
                            html += '<div class="row pt-1 parent-row">'+
                                '<div class="col-sm-6 file-label" style="background-color: #4245a8 !important; color:white; padding:5px">'+
                                    '<span style="margin-left: 32% !important">Document '+counter+'</span>'+
                                '</div>'+
                                '<div class="col-sm-2 pl-1">'+
                                    '<div class="file-input">'+
                                        '<button type="button" id="remove-instruction-file-btn" class="btn btn-danger remove-instruction-file-btn" value="'+index+'"><i class="fa fa-trash"></i></button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        });

                        $('#instruction-custom-files').html(html);
                    }else{
                        Swal.fire(
                        'Sorry!',
                        'Something went wrong try again.',
                        'danger'
                        )
                    }
                }
                });
            }
        })
    });

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
      // var inputs = $(".word-counter");
      // var words = 0;
      // for(var i = 0; i < inputs.length; i++){
      //   words += parseInt($(inputs[i]).val());
      // }
      var words = parseInt($('#total-count').text());
      // var trunaround_charges = tot_charges(words, trunaround_time, service);
      // var total_amount = trunaround_charges;
      if(service=='Normal Service'){
        charges = 0.05*words;
        // total_amount = parseFloat(total_amount+charges);
        $('#total-amount').val(charges.toFixed(2));
        var html = '';
          if(words>=10 && words <=2999){
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
      // var words = $('#total_words').val();
      var words = parseInt($('#total-count').text());
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
    $(document).on('change', '#file-input', function(){
        event.preventDefault();
        var fd = new FormData();
        $('.loder').css('display','block');
        var file = $(this)[0].files;
        fd.append('file',file[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax(
        {
            type: "POST",
            url: "<?php echo e(route('file.upload.submit')); ?>",
            data : fd,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(response){
                // console.log(response);
                const obj = JSON.parse(response);
                var html = '';
                $('#file-input').val('');
                if(obj.files!=null){
                    $('.loder').css('display','none');
                    $( "#msg_div" ).removeClass( "show" ).addClass( "hide" );
                    // document.getElementById( 'total_words_'+counter ).value = obj.word_count;

                    var total_count = 0;
                    var counter = 0;
                    jQuery.each(obj.files, function(index, val) {
                        total_count += parseInt(val.count);
                        ++counter;
                        html += '<div class="row pt-1 parent-row">'+
                            '<div class="col-sm-5 offset-2 file-label" style="background-color: #4245a8 !important; color:white; padding:5px; text-align:center; border-radius: 5px;">'+
                                '<span>Document '+counter+'</span>'+
                            '</div>'+
                            '<div class="col-sm-2 pl-1" style="background-color: #4245a8 !important; color:white; padding:5px; margin-left:5px; text-align:center; border-radius: 5px;">'+
                                '<span>'+val.count+'</span>'+
                            '</div>'+
                            '<div class="col-sm-2 pl-1">'+
                                '<div class="file-input">'+
                                    '<button type="button" class="btn btn-danger delete-btn" value="'+index+'"><i class="fa fa-trash"></i></button>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    });

                    html += '<div class="row pt-1 pb-5">'+
                                '<div class="col-sm-5 offset-2" style="background-color: #7f81cf !important; color:white; padding:5px; text-align:center; border-radius: 5px;">'+
                                    '<div class="file-input">'+
                                        '<span>Total Count</span>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-2 pl-1" style="background-color: #7f81cf !important; color:white; padding:5px; margin-left:5px; text-align:center; border-radius: 5px;">'+
                                    '<div class="file-input">'+
                                        '<span id="total-count">'+total_count+'</span>'+
                                        '<input type="hidden" id="total_words" name="total_words" value="'+total_count+'">'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                            $('#total_words').val(total_count);
                    $('#custom').html(html);

                    var trunaround_time = $('#trunaround_time').val();
                    // var words = $('#total_words').val();
                    var words = parseInt($('#total-count').text());
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

                }else{
                    $('#file-input-remove').css('display','none');
                    $( "#msg_div" ).removeClass( "hide" ).addClass( "show" );
                    document.getElementById( 'total_words_'+counter ).value = null;
                    document.getElementById( 'error' ).innerHTML = data;
                }
            }
        });
    });

    $(document).on('click', '.delete-btn', function(){
        var name = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax(
                {
                type: "get",
                url: "<?php echo e(route('file.remove-file')); ?>",
                data : {'name':name},
                success: function(response){
                    const obj = JSON.parse(response);
                    var html = '';
                    // console.log(obj.files);

                    if(obj.files!=null){
                        var total_count = 0;
                        var counter = 0;
                        jQuery.each(obj.files, function(index, val) {
                            total_count += parseInt(val.count);
                            ++counter;
                            html += '<div class="row pt-1 parent-row">'+
                                '<div class="col-sm-5 offset-2 file-label" style="background-color: #4245a8 !important; color:white; padding:5px">'+
                                    '<span style="margin-left: 32% !important">Document '+counter+'</span>'+
                                '</div>'+
                                '<div class="col-sm-2 pl-1" style="background-color: #4245a8 !important; color:white; padding:5px; margin-left:2px">'+
                                    '<span style="margin-left: 32% !important">'+val.count+'</span>'+
                                '</div>'+
                                '<div class="col-sm-2 pl-1">'+
                                    '<div class="file-input">'+
                                        '<button type="button" class="btn btn-danger delete-btn" value="'+index+'"><i class="fa fa-trash"></i></button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        });

                        if(obj.files.length != 0){
                            html += '<div class="row pt-1 pb-5">'+
                                    '<div class="col-sm-5 offset-2" style="background-color: #7f81cf !important; color:white; padding:5px">'+
                                        '<div class="file-input">'+
                                            '<span style="margin-left: 32% !important">Total Count</span>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-2 pl-1" style="background-color: #7f81cf !important; color:white; padding:5px; margin-left:2px">'+
                                        '<div class="file-input">'+
                                            '<span id="total-count" style="margin-left: 32% !important">'+total_count+'</span>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                        }

                        $('#total_words').val(total_count);

                        $('#custom').html(html);

                        var trunaround_time = $('#trunaround_time').val();
                        // var words = $('#total_words').val();
                        var words = parseInt($('#total-count').text());
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
                    }else{
                        Swal.fire(
                        'Sorry!',
                        'Something went wrong try again.',
                        'danger'
                        )
                    }
                }
                });
            }
        })
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
              url: "<?php echo e(route('file.upload.submitremove')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/website/place-order/placeorder.blade.php ENDPATH**/ ?>