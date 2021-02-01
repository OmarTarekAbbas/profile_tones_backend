<?php $__env->startSection('page_title'); ?>
 Category
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> Category Table</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('category/create')); ?>" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "categories";
                                // pass table name to delete all function
                                // if the current route exists in delete all table flags it will appear in view
                                // else it'll not appear
                                ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">

                                <thead>
                                    <tr>
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('categories')"></th>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="<?php echo e($value->id); ?>" class="roles" onclick="collect_selected(this)"></td>
                                        <td><?php echo e($value->id); ?></td>
                                        <td>
                                            <?php echo e($value->title); ?>

                                        </td>
                                        <td>
                                            <img class=" img-circle" width="100px" height="100px" src="<?php echo e($value->image); ?>"/>
                                        </td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-success show-tooltip" title="Add Content" href="<?php echo e(url("content/create?category_id=".$value->id."&title=".$value->title)); ?>" data-original-title="Add Content"><i class="fa fa-plus"></i></a>
                                                <?php if(count($value->contents) > 0): ?>
                                                <a class="btn btn-sm show-tooltip" title="Show Content" href="<?php echo e(url("category/$value->id")); ?>" data-original-title="show Content"><i class="fa fa-step-forward"></i></a>
                                                <?php endif; ?>
                                                <a class="btn btn-sm show-tooltip" href="<?php echo e(url("category/$value->id/edit")); ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                                <?php if(setting('enable_delete')): ?>
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="<?php echo e(url("category/$value->id/delete")); ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>


    $('#category').addClass('active');
    $('#category_index').addClass('active');

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/category/index.blade.php ENDPATH**/ ?>