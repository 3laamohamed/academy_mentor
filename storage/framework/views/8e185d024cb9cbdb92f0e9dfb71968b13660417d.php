<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.department.update', ['id' => $department->id])); ?>">
         <?php echo csrf_field(); ?> 
         <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($department->name); ?>" id="name" name = "name" required>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\projects\Academy-mentor8\academy-mentor\resources\views/admin/department/edit_department.blade.php ENDPATH**/ ?>