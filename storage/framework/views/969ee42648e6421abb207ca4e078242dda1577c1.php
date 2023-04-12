<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.class_room.update', ['id' => $class_room->id])); ?>">
         <?php echo csrf_field(); ?> 
         <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($class_room->name); ?>" id="name" name = "name" required>
            </div>
                    <div class="fpb-7">
            <label for="expense_category_id" class="eForm-label"><?php echo e(get_phrase('branch')); ?></label>
            <select class="form-select eForm-select eChoice-multiple-with-remove" name="branch_id" id = "branch_id" required>
                <option value="<?php echo e($current_branch->id); ?>"><?php echo e($current_branch->name); ?></option>
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($current_branch->id!=$branch->id): ?>    
                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
                    <div class="fpb-7">
                <label for="class_id" class="eForm-label"><?php echo e(get_phrase("Class")); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required ">
                    <?php if($current_class==null): ?>
                     <option value=""><?php echo e('please select a class'); ?></option>
                                     <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <option value="<?php echo e($current_class->id); ?>"><?php echo e($current_class->name??'no class found'); ?></option>
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($current_class->id!=$class->id): ?>    
                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </select>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('edit')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH /home/mentor/public_html/resources/views/admin/class_room/edit_class_room.blade.php ENDPATH**/ ?>