<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Operator Name <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::text('name',null,['placeholder'=>'Operator Name','class'=>'form-control btn-lg','required']); ?>

    </div>
</div>

<!-- <div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Ussd Code </label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::number('rbt_ussd_code',null,['placeholder'=>'Ussd Code','class'=>'form-control','min'=>0]); ?>

    </div>
</div> -->

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Sms Code </label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::number('rbt_sms_code',null,['placeholder'=>'Sms Code','class'=>'form-control','min'=>0]); ?>

    </div>
</div>

<?php if(isset($_REQUEST['country_id'])): ?>
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Country <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::select('country_id',array($_REQUEST['country_id'] => $_REQUEST['title']),null,['class'=>'form-control chosen-rtl btn-lg','required' => true]); ?>

    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Country<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::select('country_id',$countrys->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']); ?>

    </div>
</div>
<?php endif; ?>

<div class="form-group">
    <label class="col-sm-3 col-md-2 control-label">Image </label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                <?php if($operator): ?>
                    <img src="<?php echo e($operator->image); ?>" alt="" />
                <?php else: ?>
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                <?php endif; ?>
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                    <span class="fileupload-exists">Change</span>
                    <?php echo Form::file('image',["accept"=>"image/*" ,"class"=>"default"]); ?>

                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <?php echo Form::submit($buttonAction,['class'=>'btn btn-primary']); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/operator/input.blade.php ENDPATH**/ ?>