
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('privacy policy')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('privacy policy')); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
              <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.policy.create')); ?>">
                  <?php echo csrf_field(); ?> 
                <div class="form-row">
                      <div class="fpb-7">
                          <label for="privacy_policy" class="eForm-label"><?php echo e(get_phrase('privacy policy')); ?></label>
                          <textarea  type="area" class="form-control eForm-control" name="privacy_policy" style="height: 450px;" required>
                          <?php if(isset($policy)): ?>
                          <?php echo e($policy->policy); ?>

                          <?php endif; ?>
                          </textarea>
                      </div>

                      <div class="fpb-7 pt-2">
                          <button class="btn-form" type="submit"><?php echo e(get_phrase('Save')); ?></button>
                      </div>
                </div>
              </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fahinkbt/academy-mentor.com/resources/views/admin/privacy_policy/list.blade.php ENDPATH**/ ?>