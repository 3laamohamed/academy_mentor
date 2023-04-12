<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.grade.update', ['id' => $grade->id])); ?>">
        <?php echo csrf_field(); ?> 
        <div class="form-row">
            <div class="fpb-7">
                <label for="grade" class="eForm-label"><?php echo e(get_phrase('Grade')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($grade->name); ?>" id="grade" name = "grade" required>
            </div>

            <div class="fpb-7">
                <label for="grade_point" class="eForm-label"><?php echo e(get_phrase('Grade point')); ?></label>
                <input type="number" class="form-control eForm-control" id="grade_point" name = "grade_point" step=".01" min="0" value="<?php echo e($grade->grade_point); ?>" placeholder="Provide grade point" required>
            </div>

            <div class="fpb-7">
                <label for="mark_from" class="eForm-label"><?php echo e(get_phrase('Mark From')); ?></label>
                <input type="number" class="form-control eForm-control" id="mark_from" name = "mark_from" min="0" value="<?php echo e($grade->mark_from); ?>" placeholder="Mark from" required>
            </div>

            <div class="fpb-7">
                <label for="mark_upto" class="eForm-label"><?php echo e(get_phrase('Mark upto')); ?></label>
                <input type="number" class="form-control eForm-control" id="mark_upto" name = "mark_upto" min="0" value="<?php echo e($grade->mark_upto); ?>" placeholder="Mark upto" required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH /home/mentor/public_html/resources/views/admin/grade/edit_grade.blade.php ENDPATH**/ ?>