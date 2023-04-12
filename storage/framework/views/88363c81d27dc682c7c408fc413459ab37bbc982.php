<div class="eForm-layouts">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('superadmin.school.update', ['id' => $school->id])); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">
            <div class="fpb-7">
                <label for="title" class="eForm-label"><?php echo e(get_phrase('Title')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($school->title); ?>" id="title" name = "title" required>
            </div>
            <div class="fpb-7">
                <label for="address" class="eForm-label"><?php echo e(get_phrase('School address')); ?></label>
                <textarea class="form-control eForm-control" id="address" name = "address" rows="2" required><?php echo e($school->address); ?></textarea>
            </div>
            <div class="fpb-7">
                <label for="title" class="eForm-label"><?php echo e(get_phrase('School phone')); ?></label>
                <input type="number" min="0" class="form-control eForm-control" value="<?php echo e($school->phone); ?>" id="phone" name = "phone" required>
            </div>
            <div class="fpb-7">
                <label for="school_info" class="eForm-label"><?php echo e(get_phrase('School info')); ?></label>
                <textarea class="form-control eForm-control" id="school_info" name = "school_info" rows="2" required><?php echo e($school->school_info); ?></textarea>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update school')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

    "use strict";
    
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH /home/mentor/public_html/resources/views/superadmin/school/edit_school.blade.php ENDPATH**/ ?>