<?php $__env->startSection('page_title'); ?>
	Operators
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> Operator Table</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('operator/create')); ?>" data-original-title="Add new operator"><i class="fa fa-plus"></i></a>
							<?php
								$table_name = "operators" ;
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
								<th>Operator image</th>
								<th>Operator name</th>
                                <th>URL</th>
								<th>County</th>
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
						</thead>
						<tbody id="tablecontents">
						<?php $__currentLoopData = $operators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="table-flag-blue">
								<td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="<?php echo e($operator->id); ?>" onclick="collect_selected(this)"></td>
								<td><img src="<?php echo e($operator->image); ?>" width="300" height="225"></td>
								<td><?php echo e($operator->name); ?></td>
                                <td>

                                    <input type="text" id="url_h<?php echo e($operator->id); ?>" value="<?php echo e(url(url('/?op='.$operator->id))); ?>">
                                    <span class="btn" onclick="x = document.getElementById('url_h<?php echo e($operator->id); ?>'); x.select();document.execCommand('copy')"> <i class="fa fa-copy"></i> </span>
                                </td>
								<td><?php echo e($operator->country->title); ?></td>
								</td>
								<td class="visible-md visible-lg">
								    <div class="btn-group">
								    	<a class="btn btn-sm show-tooltip" title="" href="<?php echo e(url('operator/'.$operator->id.'/edit')); ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
								      <a class="btn btn-sm btn-danger show-tooltip" title="" onclick = 'return ConfirmDelete()' href="<?php echo e(url('operator/'.$operator->id.'/delete')); ?>" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

    $(function () {
    $("#example").DataTable();
    });

    </script>
	<script>
		$('#operator').addClass('active');
		$('#operator_index').addClass('active');
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/operator/index.blade.php ENDPATH**/ ?>