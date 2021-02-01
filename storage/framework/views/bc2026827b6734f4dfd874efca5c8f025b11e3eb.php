<?php $__env->startSection('page_title'); ?>
  Rbt Code
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Rbt Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php if($rbt): ?>
                    <?php echo Form::model($rbt,["url"=>"rbt/$rbt->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]); ?>

                    <?php echo $__env->make('rbt.input',['buttonAction'=>'Edit','required'=>'  (optional)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                    <?php echo Form::open(["url"=>"rbt","class"=>"form-horizontal","method"=>"POST","files"=>"True"]); ?>

                    <?php echo $__env->make('rbt.input',['buttonAction'=>'Save'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#rbts').addClass('active');
        $('#rbts-create').addClass('active');

        //add layer btn
        var rbt = '<div id="code" style="background-color: #f9f7f7;border-radius: 8px;box-shadow: 2px 2px 2px #e8e6e6;padding: 5px;margin:10px 0px;text-align:center">\
            <div class="col-sm-4">\
                <label class="control-label">Operator<span class="text-danger">*</span></label>\
                <div class="controls">\
                  <select class="form-control chosen-rtl"  name="operator_id[]" required>\
                    <?php $__currentLoopData = $operators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                    <option value="<?php echo e($operator->id); ?>" <?php if($rbt): ?> <?php if($rbt->operator_id == $operator->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($operator->name); ?>-<?php echo e($operator->country->title); ?></option>\
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                  </select>\
                </div>\
            </div>\
            <div class="col-sm-4">\
                <label class="control-label">rbt_code <span class="text-danger">*</span></label>\
                <div class="controls">\
                    <?php echo Form::number("rbt_code[]",null,["placeholder"=>"rbt_code","class"=>"form-control text-center","min"=>0 , "required"]); ?>\
                </div>\
            </div>\
            <div class="col-sm-4">\
                <label class="control-label">Image <span class="text-danger">*</span></label>\
                <div class="controls">\
                <?php echo Form::file("image[]",["accept"=>"image/*" ,"class"=>"default"]); ?>\
                </div>\
            </div>\
            <div class="" style="margin-top:25px">\
              <button type="button" class="btn btn-danger delete-rbt"  name="button"> <i class="fa fa-trash" ></i> </button>\
            </div>\
          </div>';
        $(document).ready(function() {
        $(document).on("click",".add_rbt_code",function() {
            $('#rbt').append(rbt);
        });

        $(document).on("click",".delete-rbt",function() {
            $(this).parent('div').parent('div').remove();
        });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/rbt/form.blade.php ENDPATH**/ ?>