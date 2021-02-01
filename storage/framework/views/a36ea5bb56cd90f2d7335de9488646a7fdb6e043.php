<?php $__env->startSection('page_title'); ?>
	<?php echo app('translator')->getFromJson('messages.users.users'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> <?php echo app('translator')->getFromJson('messages.users.users'); ?></h3>
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('users/new')); ?>" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
							<?php 
								$table_name = "users" ;
							?>
							<?php echo $__env->make('partial.delete_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</div>
					</div>
					<br><br>
					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th style="width:18px"><input type="checkbox" onclick="select_all()"></th>
								<th><?php echo app('translator')->getFromJson('messages.users.user_name'); ?></th>
								<th><?php echo app('translator')->getFromJson('messages.users.email'); ?></th>
								<th><?php echo app('translator')->getFromJson('messages.users.role'); ?></th>
								<th><?php echo app('translator')->getFromJson('messages.users.phone'); ?></th> 
								<th class="visible-md visible-lg" style="width:130px"><?php echo app('translator')->getFromJson('messages.action'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($user->email!=\Auth::user()->email): ?>
									<tr class="table-flag-blue">
										<th><input type="checkbox" name="selected_rows[]" class="users" value="<?php echo e($user->id); ?>" onclick="collect_selected(this)"></th>
										<td><?php echo e($user->name); ?></td>
										<td><?php echo e($user->email); ?></td>
										<td><?php echo e($user->role); ?></td>
										<td><?php echo e($user->phone); ?></td> 
										<td class="visible-md visible-lg">
											<div class="btn-group">
												<a class="btn btn-sm show-tooltip" title="" href="<?php echo e(url('users/'.$user->id.'/edit')); ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
												<a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo e(url('users/'.$user->id.'/delete')); ?>" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
											</div>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
	var check = false ; 
		function select_all()
		{
			if(!check)
			{
				$('.users').prop("checked",!check);
				<?php
				foreach($users as $user)
				{
					if($user->email!=\Auth::user()->email){
				?>
						collect_selected("<?php echo e($user->id); ?>") ;
				<?php 
						}
					}	
				?>
				check = true ; 
			}
			else
			{
				$('.users').prop("checked",!check);
				check = false ;
				clear_selected() ; 
			}
		}
	</script>
	<script>
		$('#user').addClass('active');
		$('#user-index').addClass('active');
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/users/index.blade.php ENDPATH**/ ?>