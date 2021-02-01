

<?php if(Session::has('msg')): ?>
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Heads Up!</strong> <?php echo Session::get('msg'); ?>

        </div>
<?php endif; ?>


<div class="form-group">
    <?php echo Form::label('title',\Lang::get('messages.type.name-type').'*',['class'=>'col-sm-3 col-lg-2 control-label']); ?>

    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::text('title',null,['class'=>'form-control input-lg','required'=>'required','placeholder'=>\Lang::get('messages.type.name-type')]); ?>

    </div>
</div>


<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <?php echo Form::submit($buttonAction,['class'=>'btn btn-primary']); ?>

    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script>
        $('#type').addClass('active');
        $('#type-create').addClass('active');
    </script>
<?php $__env->stopSection(); ?>
        
<?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/types/form.blade.php ENDPATH**/ ?>