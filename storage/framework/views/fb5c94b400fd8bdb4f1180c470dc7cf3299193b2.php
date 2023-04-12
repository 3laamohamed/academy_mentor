<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.class.update', ['id' => $class->id])); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="name" name="name" value="<?php echo e($class->name); ?>" required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update class')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\projects\Academy-mentor8\academy-mentor\resources\views/admin/class/edit_class.blade.php ENDPATH**/ ?>