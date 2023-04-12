<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.code.use', ['id' => $code->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('use code' )); ?></button>
        </div>

    </div>
</form><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/login_code/use.blade.php ENDPATH**/ ?>