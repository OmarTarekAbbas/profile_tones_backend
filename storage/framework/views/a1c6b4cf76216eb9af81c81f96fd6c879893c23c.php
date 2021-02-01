<?php $__env->startSection('page_title'); ?>

	Type 

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-blue">
                <div class="box-title">
                    <?php if($type != null): ?>
                        <h3><i class="fa fa-table"></i> Update Type</h3>
                    <?php else: ?>
                        <h3><i class="fa fa-table"></i> Add Type</h3>
                    <?php endif; ?>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php if($type != null): ?>
                        <?php echo Form::model($type,['url'=>'types/'.$type->id,'class'=>'form-horizontal','files'=>'true','method'=>'PATCH']); ?>

                        <?php echo $__env->make('types.form',['buttonAction'=>\Lang::get('messages.edit'),'required'=>'  *'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo Form::open(['url'=>'types','class'=>'form-horizontal','files'=>'true','method'=>'POST']); ?>

                        <?php echo $__env->make('types.form',['buttonAction'=>\Lang::get('messages.save'),'required'=>' *'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/types/input.blade.php ENDPATH**/ ?>