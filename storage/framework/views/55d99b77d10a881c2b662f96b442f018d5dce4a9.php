<div class="eForm-layouts">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('superadmin.package.update', ['id' => $package->id])); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($package->name); ?>" id="name" name = "name" placeholder="Provide package name" required>
            </div>
            <div class="fpb-7">
                <label for="price" class="eForm-label"><?php echo e(get_phrase('Package price')); ?></label>
                <input type="number" min="0" class="form-control eForm-control" value="<?php echo e($package->price); ?>" id="price" name = "price" placeholder="Provide package price" required>
            </div>
            <div class="fpb-7">
                <label for="package_type" class="eForm-label"><?php echo e(get_phrase('Package Type')); ?></label>
                <select name="package_type" id="package_type" class="form-select eForm-select eChoice-multiple-with-remove">
                    <option value=""><?php echo e(get_phrase('Select a package type')); ?></option>
                    <option value="paid" <?php echo e($package->package_type == 'paid' ?  'selected':''); ?> ><?php echo e(get_phrase('Paid')); ?></option>
                    <option value="trail" <?php echo e($package->package_type == 'trail' ?  'selected':''); ?>><?php echo e(get_phrase('Trail')); ?></option>
                </select>
            </div>
            <div class="fpb-7">
                <label for="interval" class="eForm-label"><?php echo e(get_phrase('Interval')); ?></label>
                <select name="interval" id="interval" class="form-select eForm-select eChoice-multiple-with-remove">
                    <option value=""><?php echo e(get_phrase('Select a interval')); ?></option>
                    <option value="Days" <?php echo e($package->interval == 'Days' ?  'selected':''); ?> ><?php echo e(get_phrase('Days')); ?></option>
                    <option value="Monthly" <?php echo e($package->interval == 'Monthly' ?  'selected':''); ?> ><?php echo e(get_phrase('Monthly')); ?></option>
                    <option value="Yearly" <?php echo e($package->interval == 'Yearly' ?  'selected':''); ?> ><?php echo e(get_phrase('Yearly')); ?></option>
                </select>
            </div>
            <div class="fpb-7">
                <label for="days" class="eForm-label"><?php echo e(get_phrase('Interval Preiod')); ?></label>
                <input type="number" min="0" class="form-control eForm-control" value="<?php echo e($package->days); ?>" id="days" name = "days" placeholder="Provide interval days/month/year" required>
            </div>
            <div class="fpb-7">
                <label for="status" class="eForm-label"><?php echo e(get_phrase('Interval')); ?></label>
                <select name="status" id="status" class="form-select eForm-select eChoice-multiple-with-remove">
                    <option value=""><?php echo e(get_phrase('Select a status')); ?></option>
                    <option value="1" <?php echo e($package->status == '1' ?  'selected':''); ?> ><?php echo e(get_phrase('Active')); ?></option>
                    <option value="0" <?php echo e($package->status == '0' ?  'selected':''); ?> ><?php echo e(get_phrase('Deactive')); ?></option>
                </select>
            </div>
            <div class="fpb-7">
                <label for="description" class="eForm-label"><?php echo e(get_phrase('Description')); ?></label>
                <textarea class="form-control eForm-control" id="description" name = "description" rows="2" placeholder="Provide a short description" required><?php echo e($package->description); ?></textarea>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update package')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

    "use strict";
    
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH D:\projects\Academy-mentor8\academy-mentor\resources\views/superadmin/package/edit_package.blade.php ENDPATH**/ ?>