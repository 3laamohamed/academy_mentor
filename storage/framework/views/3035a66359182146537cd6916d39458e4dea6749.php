<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.exam_category.update', ['id' => $exam_category->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7">
            <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
            <input type="text" class="form-control eForm-control" id="name" name = "name" value="<?php echo e($exam_category->name); ?>" required>
        </div>
        
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('Update category')); ?></button>
        </div>

    </div>
</form><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/exam_category/edit.blade.php ENDPATH**/ ?>