<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.login_codes')); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
                <div class="fpb-7">
            <label for="number_of_codes" class="eForm-label"><?php echo e(get_phrase('number of codes')); ?></label>
            <input type="number" min='1' class="form-control eForm-control" id="number_of_codes" name = "number_of_codes" required>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('Create login codes')); ?></button>
        </div>

    </div>
</form><?php /**PATH /home/fahinkbt/academy-mentor.com/resources/views/admin/login_code/create.blade.php ENDPATH**/ ?>