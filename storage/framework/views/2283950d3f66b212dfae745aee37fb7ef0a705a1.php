
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('questions')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Examination')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('questions')); ?></a></li>
            </ul>
          </div>
          
            
          
        </div>
      </div>
    </div>
</div>
<!-- Start questions area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            <?php if(isset($exams) > 0): ?>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(get_phrase('exam name')); ?></th>
                            <th scope="col" class="text-end"><?php echo e(get_phrase('Options')); ?></th>
                        </tr>
                	</thead>
                	<tbody>
                		<?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                			<td>
                				<?php echo e($key+1); ?>

                			</td>
                			<td>
                                <?php echo e($exam['name']); ?>

    						</td>
    						<td class="text-center">
                  <a class="export_btn"
                                        href='<?php echo e(route('admin.exam_questions', ['id' => $exam->id])); ?>'>
                                        <?php echo e(get_phrase('go to questions')); ?>

                                      </a>

                                
                                    
                                    
                                
    						</td>
                		</tr>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	</tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="exam_catrgories_content">
                <div class="empty_box center">
                    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End questions area -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/admin/questions/online_exam_list.blade.php ENDPATH**/ ?>