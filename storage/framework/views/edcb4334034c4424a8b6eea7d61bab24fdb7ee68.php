<?php $__env->startSection('metatitle'); ?>
    <title>Cv/Resume | Service </title>
<?php $__env->stopSection(); ?>
<!-- Banner -->
<?php $__env->startSection('content'); ?>
<style>
    input[type=file]::file-selector-button {
  border: 2px solid #6c5ce7;
  padding: .2em .4em;
  border-radius: .2em;
  background-color: #a29bfe;
  transition: 1s;
  display:none;
}

input[type=file]::-ms-browse:hover {
  background-color: #81ecec;
  border: 2px solid #00cec9;
  display:none;
}

input[type=file]::-webkit-file-upload-button:hover {
  background-color: #81ecec;
  border: 2px solid #00cec9;
  display:none;
}

input[type=file]::file-selector-button:hover {
  background-color: #81ecec;
  border: 2px solid #00cec9;
  display:none;
}
</style>
  <div class="container-fluid">
    <section class="inner-banner">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo e(asset('public/assets/website')); ?>/images/banner-cv.jpg" class="d-block w-100" alt="..."/>
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
            <h3 class="sec-heading my-cv">Resume/CV Building Service</h3>
            <div>
              <p class="sec-text my-cv">Do you want a resume or CV built from scratch? We can handle that. We believe your dream job needs a perfect resume or CV. How your resume/CV appears means a lot to the hiring managers; so, let us take care of that for you.</p>
             </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Form Section -->
    <div class="container my-form" style="margin-bottom: 200px; max-width:960px; margin-top:50px; ">
      <form method="POST" action="<?php echo e(route('customer.confirm-order')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="service_id" value="<?php echo e($service_id); ?>">
        <input type="hidden" name="type" value="resume_cv">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Sub Service <span class="text-danger">*</span></label>
            <select class="custom-select my-select my-1 mr-sm-2" name="sub_service" id="cv_resume" required>
              <option value="" selected>Sub Service</option>
              <?php $__currentLoopData = $sub_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($sub_service->id); ?>"><?php echo e($sub_service->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span class="text-danger"><?php echo e($errors->first('sub_service')); ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Number of Pages <span class="text-danger">*</span></label>
            
            
            <select name="total_pages" class="form-control" id="total-pages" required></select>
            <span class="text-danger"><?php echo e($errors->first('total_pages')); ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Select Currency</label>
              <select class="custom-select my-1 mr-sm-2" name="currency" id="inlineFormCustomSelectPref">
                  <option value="US Dollar">US Dollar</option>
              </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Price</label>
            <input type="text" class="form-control" readonly name="total_amount" id="total_amount" value="0" placeholder="Total Amount" style="padding: 19px; padding-left: 12px;">
          </div>

          
        

    </div>

    <div class="row">
        <div class="form-group col-md-6">
            
            <div class="file-input">
                <input type="file" multiple accept=".pdf, .doc,.docx,.txt,.xls" id="file-input" class="file-input__input"/>
                <label class="file-input__label " id="labelms" for="file-input">
                    <span style="margin-left: 15% !important">Choose File (MS Word & pdf preferred)</span>
                    <img src="<?php echo e(asset('public/assets/website/images/loder.gif')); ?>" class="file-loder" style="display: none; width: 20px;margin-left: 15px;">
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
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
                            <div class="col-sm-5 file-label" style="background-color: #4245a8 !important; color:white; padding:5px; text-align:center; border-radius: 5px;">
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
                        <div class="col-sm-5 " style="background-color: #7f81cf !important; color:white; padding:5px; text-align:center; border-radius: 5px;">
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
        </div>
    </div>
    <div class="row">
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

        <div class="form-group col-md-12">
            <label for="inputEmail4">Client Note</label>
            <textarea name="client_note" class="form-control" rows="5" placeholder="Client Note..."></textarea>
          </div>
          <button type="submit" class="btn btn-warning ripple-surface my-btn" id="btnms" ><i class="fas fa-calculator"></i>&nbsp;&nbsp;&nbsp;Order Now</button>
        </div>
      </form>
      <div class="resume-para"><p>Our turnaround time for resume/CV building service is usually one week. If you want
a shorter turnaround time, email us at <a href="mailto:contact@elitereviser.com">contact@elitereviser.com</a>.</p></div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //count words of uploaded document
    $(document).on('change', '#file-input', function(){
        event.preventDefault();
        var fd = new FormData();
        $('.file-loder').css('display','block');
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
                    $('.file-loder').css('display','none');
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

        $(document).on('change', '#file-input', function(){
            $('.loder').css('display','none');
            $('#file-input-remove').css('display','inherit');
            $( "#msg_div" ).removeClass( "show" ).addClass( "hide");

            var numFiles = $(this)[0].files.length;
            document.getElementById( 'nameofFile').innerHTML = 'File(s) '+numFiles;
        });

        $(document).on('change', '#cv_resume', function(){
            var html = '';
            if($(this).val()==40){
                html += '<option value="" selcted>Select no of cv pages</option>';
                for (let i = 1; i < 5; i++) {
                    html += '<option value="'+i+'">'+i+'</option>';
                }
            }else{
                html += '<option value="" selcted>Select no of resume pages</option>';
                for (let i = 5; i < 51; i++) {
                    html += '<option value="'+i+'">'+i+'</option>';
                }
            }

            $('#total-pages').html(html);
        });

        $(document).on('change', '#total-pages', function(){
            var sub_service = $('#cv_resume').val();
            var pages = $(this).val();
            if(sub_service==40){ //resume $75
                var total_amount = pages*75;
                $('#total_amount').val(total_amount);
                $('#error-pages').html('');
            }else{
                var total_amount = pages*50;
                $('#total_amount').val(total_amount);
                $('#error-pages').html('');
            }
        })

        $('#file-input-remove').on('click', function (event) {
            $('.loder').css('display','none');
            $('#file-input-remove').css('display','none');
            $( "#msg_div" ).removeClass( "show" ).addClass( "hide" );
            $('#file-input').val('');
            document.getElementById( 'nameofFile').innerHTML = 'Upload Files';
        });

    //   $(document).on('keyup', '#no_of_pages', function(){
    //     var pages = $(this).val();
    //     var sub_service = $('#cv_resume').val();
    //     alert(sub_service);
    //     // console.log("pages= "+pages);
    //     if(sub_service==40){ //resume $75
    //     //   $(this).attr('max', 4);
    //     //   if(pages>=5){
    //     //     $('#total_amount').val('0');
    //     //     $('#error-pages').html('4 pages max')
    //     //     // $('.my-btn').attr('disabled', true)
    //     //   }else{
    //     //     var total_amount = pages*75;
    //     //     $('#total_amount').val(total_amount);
    //     //     $('#error-pages').html('');
    //     //     // $('.my-btn').attr('disabled', false)
    //     //   }
    //     }else{ //cv $50
    //     //   $(this).attr('max', 50);
    //     //   if(pages>50){
    //     //     $('#total_amount').val('0');
    //     //     $('#error-pages').html('50 pages max')
    //     //     $('#total_amount').html('')
    //     //     // $('.my-btn').attr('disabled', true)

    //     //   }else if(pages<5){
    //     //     $('#total_amount').val('0');
    //     //     $('#error-pages').html('5 pages min')
    //     //     // $('.my-btn').attr('disabled', true)
    //     //   }else{
    //     //     var total_amount = pages*50;
    //     //     $('#total_amount').val(total_amount);
    //     //     $('#error-pages').html('');
    //     //     // $('.my-btn').attr('disabled', false)
    //     //   }
    //     }
    //   });


      /*function validate(evt) {
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
      }*/
      $(document).on('change','#cv_resume', function(){
        var sub_service = $(this).val();
        if(sub_service==40){ //resume
          $('#no_of_pages').attr('max', 4);
          $('#error-pages').html('1-4 pages');
        }else{ //cv
          $('#no_of_pages').attr('max', 50);
          $('#error-pages').html('5-50 pages');
        }
      });


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/website/cv.blade.php ENDPATH**/ ?>