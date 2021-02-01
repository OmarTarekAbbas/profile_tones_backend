<?php $__env->startSection('page_title'); ?>
Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN Content -->
<div id="main-content">
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Setting</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <form action="<?php echo e(url('setting/'.$setting->id)); ?>" method="post"
                        class="form-horizontal form-bordered form-row-stripped" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Key</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="key" id="key" value="<?php echo e($setting->key); ?>" placeholder="key"
                                    class="form-control" readonly required>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php if($setting->type->title == "Image" || $setting->type->title == "Normal Editor" ||
                            $setting->type->title == "Advanced Editor" || $setting->type->title == "selector" ||
                            $setting->type->title == "input_color" || $setting->type->title == "page"): ?>
                            <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Value</label>
                            <?php elseif($setting->type->title == "Video"): ?>
                            <?php echo Form::label('Video',\Lang::get('messages.video').'*',['class'=>'col-sm-3 col-lg-2
                            control-label']); ?>

                            <?php elseif($setting->type->title == "Audio"): ?>
                            <?php echo Form::label('Audio',\Lang::get('messages.audio').'*',['class'=>'col-sm-3 col-lg-2
                            control-label']); ?>

                            <?php elseif($setting->type->title == "File Manager Uploads Extensions"): ?>
                            <?php echo Form::label('File','Extensions Allowed *',['class'=>'col-sm-3 col-lg-2 control-label']); ?>

                            <?php endif; ?>
                            <div class="col-sm-9 col-lg-10 controls">
                                <?php if(file_exists($setting->value)): ?>
                                <?php if($setting->type->title == "Image"): ?>
                                <div class='col-sm-9 col-lg-10 controls'>
                                    <div class='fileupload fileupload-new' data-provides='fileupload'>
                                        <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                                            <img src="<?php echo e(url($setting->value)); ?>" alt="" />
                                        </div>
                                        <div class='fileupload-preview fileupload-exists img-thumbnail'
                                            style='max-width: 200px; max-height: 150px; line-height: 20px;'></div>
                                        <div>
                                            <span class='btn btn-default btn-file'><span class='fileupload-new'>Select
                                                    image</span>
                                                <span class='fileupload-exists'>Change</span>
                                                <input type='file' name='value' accept="image/*"></span>
                                            <a href='#' class='btn btn-default fileupload-exists'
                                                data-dismiss='fileupload'>Remove</a>
                                        </div>
                                    </div>
                                    <span class='label label-important'>NOTE!</span>
                                    <span>Only extension supported jpg, png, and jpeg</span>
                                </div>
                                <?php elseif($setting->type->title == "Video"): ?>
                                <div class="form-group" id="videocont" novalidate>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <?php echo Form::file('Video',["accept"=>"video/*",'class'=>'default']); ?>

                                        <span class='label label-important'>NOTE!</span>
                                        <span>Only extension supported mp4, flv, and 3gp</span>
                                    </div>
                                </div>

                                <?php elseif($setting->type->title == "Audio"): ?>
                                <div class="form-group" id="audiocont" novalidate>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <?php echo Form::file('Audio',["accept"=>"audio/*",'class'=>'default']); ?>

                                        <span class='label label-important'>NOTE!</span>
                                        <span>Only extension supported mp3, webm, and wav</span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <br>
                                <?php elseif($setting->type->title == "selector"): ?>
                                <select class="form-control" name="value">
                                    <option value="1" <?php if($setting->value): ?> selected <?php endif; ?>> True </option>
                                    <option value="0" <?php if(!$setting->value): ?> selected <?php endif; ?>> False</option>
                                </select>
                                <?php elseif($setting->type->title == "input_color"): ?>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="color" name="input_color" value="<?php echo e($setting->value); ?>" style="width: 122%;">
                                </div>
                                <?php else: ?>
                                <?php if($setting->type->title == "File Manager Uploads Extensions"): ?>
                                <?php
                                            $selected_extensions = explode(",",$setting->value)
                                        ?>
                                <select class="form-control" name="extensions[]" multiple>
                                    <option value="image" <?php $__currentLoopData = $selected_extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($extension=='image' ): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Images</option>
                                    <option value="audio" <?php $__currentLoopData = $selected_extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($extension=='audio' ): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Audios</option>
                                    <option value="video" <?php $__currentLoopData = $selected_extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($extension=='video' ): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Videos</option>
                                    <option value="text" <?php $__currentLoopData = $selected_extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($extension=='text' ): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Text</option>
                                    <option value="all" <?php $__currentLoopData = $selected_extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($extension=='all' ): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>All Extensions</option>
                                </select>
                                <?php elseif($setting->value[0]=="<"): ?> <textarea name="value" name="value" placeholder="value"
                                    class="form-control col-md-12 ckeditor" required><?php echo e($setting->value); ?></textarea>
                                    <?php else: ?>
                                    <textarea name="value" name="value" placeholder="value"
                                        class="form-control col-md-12" required><?php echo e($setting->value); ?></textarea>
                                    <?php endif; ?>
                                    <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group last">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                    update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$('#setting').addClass('active');
$('#setting-index').addClass('active');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/setting/edit.blade.php ENDPATH**/ ?>