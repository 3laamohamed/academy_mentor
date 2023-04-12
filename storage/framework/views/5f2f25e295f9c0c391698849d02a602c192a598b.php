
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('codes')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Examination')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('codes')); ?></a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('admin.branches.open_modal')); ?>', '<?php echo e(get_phrase('Add branches')); ?>')"><?php echo e(get_phrase('Add branch')); ?></a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start codes area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            <?php if(isset($branches) > 0): ?>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(get_phrase('name')); ?></th>
                            <th scope="col"><?php echo e(get_phrase('phone')); ?></th>
                            <th scope="col"><?php echo e(get_phrase('email')); ?></th>
                            <th scope="col"><?php echo e(get_phrase('address')); ?></th>
                            <th scope="col" class="text-end"><?php echo e(get_phrase('Options')); ?></th>
                        </tr>
                	</thead>
                	<tbody>
                		<?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                			<td>
                				<?php echo e($key+1); ?>

                			</td>
                			<td>
                                <?php echo e($branch['name']); ?>

    						</td>
                			<td>
                                <?php echo e($branch['phone']); ?>

    						</td>
                			<td>
                                <?php echo e($branch['email']); ?>

    						</td>
                			<td>
                                <?php echo e($branch['address']); ?>

    						</td>
    						<td class="text-center">
                                <div class="adminTable-action">
                                    <button
                                        type="button"
                                        class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <?php echo e(get_phrase('Actions')); ?>

                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                                    >
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('<?php echo e(route('admin.edit.branch', ['id' => $branch->id])); ?>', '<?php echo e(get_phrase('edit branch')); ?>')"><?php echo e(get_phrase('edit')); ?></a>
                                        </li>
                                    </ul>
                                </div>					
    						</td>
                		</tr>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	</tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="login_codes_catrgories_content">
                <div class="empty_box center">
                    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End codes area -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/branches/branch_list.blade.php ENDPATH**/ ?>