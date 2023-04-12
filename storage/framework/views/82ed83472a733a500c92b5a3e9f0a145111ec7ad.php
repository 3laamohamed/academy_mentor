
   
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
              <li><a href="#"><?php echo e(get_phrase('settings')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('codes')); ?></a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('admin.login_code.open_modal')); ?>', '<?php echo e(get_phrase('Add login codes')); ?>')"><?php echo e(get_phrase('Add login codes')); ?></a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start codes area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            <?php if(isset($codes) > 0): ?>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(get_phrase('codes')); ?></th>
                            <th scope="col"><?php echo e(get_phrase('used')); ?></th>
                            
                        </tr>
                	</thead>
                	<tbody>
                		<?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                			<td>
                				<?php echo e($key+1); ?>

                			</td>
                      <?php if($code->used=='used'): ?>
                			<td style="color: red ;text-decoration: line-through">
                                <?php echo e($code['code']); ?>

    						      </td>                     
                       <?php else: ?>
                             			<td>
                                <?php echo e($code['code']); ?>

    						      </td>  
                       <?php endif; ?>
                			<td>
                                <?php echo e($code['used']); ?>

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
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fahinkbt/academy-mentor.com/resources/views/admin/login_code/login_code_list.blade.php ENDPATH**/ ?>