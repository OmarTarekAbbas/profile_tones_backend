<?php $__env->startSection('page_title'); ?>
Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- BEGIN Content -->
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-black">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> Settings Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('setting/new')); ?>"
                                data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                            <?php
								$table_name = "settings" ;
								// pass table name to delete all function
								// if the current route exists in delete all table flags it will appear in view
								// else it'll not appear
							?>
                            <?php echo $__env->make('partial.delete_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:18px"><input type="checkbox" onclick="select_all('settings')"></th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th class="visible-md visible-lg" style="width:130px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontents">
                                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="table-flag-blue">
                                    <td><input class="select_all_template" type="checkbox" name="selected_rows[]"
                                            value="<?php echo e($setting->id); ?>" onclick="collect_selected(this)"></td>
                                    <td><?php echo e($setting->key); ?></td>
                                    <td>

                                        <?php if(file_exists($setting->value)): ?>
                                        <?php if($setting->type_id == "3"): ?>
                                        <img src="<?php echo e(url($setting->value)); ?>" width="300" height="225">
                                        <?php elseif($setting->type_id == "4"): ?>
                                        <video controls="" width="300" height="225">
                                            <source src="<?php echo e(url($setting->value)); ?>" preload="none">
                                        </video>
                                        <?php elseif($setting->type_id == "5"): ?>
                                        <audio controls="">
                                            <source src="<?php echo e(url($setting->value)); ?>" type="audio/mpeg" preload="none">
                                        </audio>
                                        <?php endif; ?>
                                        <?php elseif($setting->type->title == 'selector'): ?>
                                        <?php if($setting->value): ?>
                                        True
                                        <?php else: ?>
                                        False
                                        <?php endif; ?>
                                        <?php elseif($setting->type_id == "1"): ?>
                                        <?php echo $setting->value; ?>

                                        <?php elseif($setting->type_id == "2"): ?>
                                        <?php echo $setting->value; ?>

                                        <?php elseif($setting->type_id == "6"): ?>
                                        <?php echo $setting->value; ?>

                                        <?php elseif($setting->type_id == "8"): ?>
                                        <p style="background:<?php echo e($setting->value); ?>;width: 10%;border-radius: 5px;" title="<?php echo e($setting->value); ?>">&#8194;</p>
                                        <?php endif; ?>
                                    </td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <a class="btn btn-sm show-tooltip" title=""
                                                href="<?php echo e(url('setting/'.$setting->id.'/edit')); ?>"
                                                data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger show-tooltip" title=""
                                                onclick='return ConfirmDelete()'
                                                href="<?php echo e(url('setting/'.$setting->id.'/delete')); ?>"
                                                data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
// $(function () {
// $("#example").DataTable();
//
// $( "#tablecontents" ).sortable({
//   items: "tr",
//   cursor: 'move',
//   opacity: 0.6,
//   update: function() {
//       sendOrderToServer();
//   }
// });
//
// function sendOrderToServer() {
//   var order = [];
//   $('tr.table-flag-blue').each(function(index,element) {
//     order.push({
//       id: $(this).attr('data-id'),
//       position: index+1
//     });
//   });
//
//   $.ajax({
//     type: "POST",
//     dataType: "json",
//     url: "<?php echo e(url('sortabledatatable')); ?>",
//     data: {
//       order:order,
//       _token: '<?php echo e(csrf_token()); ?>'
//     },
//     success: function(response) {
//         if (response.status == "success") {
//           console.log(response);
//         } else {
//           console.log(response);
//         }
//     }
//   });
//
// }
// });
</script>
<script>
$('#setting').addClass('active');
$('#setting-index').addClass('active');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/setting/index.blade.php ENDPATH**/ ?>