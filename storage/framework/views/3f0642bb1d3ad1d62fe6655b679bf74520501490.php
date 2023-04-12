<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.branch.edit', ['id' => $branch->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
                <div class="fpb-7">
            <label for="name" class="eForm-label"><?php echo e(get_phrase('name')); ?></label>
            <input type="text" class="form-control eForm-control" id="name" name = "name" required value=' <?php echo e($branch->name); ?>'>
        </div>
                <div class="fpb-7">
            <label for="email" class="eForm-label"><?php echo e(get_phrase('email')); ?></label>
            <input type="text" class="form-control eForm-control" id="email" name = "email" required value=' <?php echo e($branch->email); ?>'>
        </div>
                <div class="fpb-7">
            <label for="phone" class="eForm-label"><?php echo e(get_phrase('phone')); ?></label>
            <input type="integer" min=0 class="form-control eForm-control" id="phone" name = "phone" required value=' <?php echo e($branch->phone); ?>'>
        </div>
                <div class="fpb-7">
            <label for="address" class="eForm-label"><?php echo e(get_phrase('address')); ?></label>
            <input type="text" class="form-control eForm-control" id="address" name = "address" required value=' <?php echo e($branch->address); ?>'>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('edit branch')); ?></button>
        </div>

    </div>
</form><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/branches/edit.blade.php ENDPATH**/ ?>