<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.lesson')); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">
            <div class="fpb-7">
                <label for="class_id_on_create" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                     <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
            <div class="fpb-7">
                <label for="subject_id_on_create" class="eForm-label"><?php echo e(get_phrase('subject')); ?></label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select a subject')); ?></option>
                     <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="name" name = "name" placeholder="Provide lesson name" required>
            </div>
            <div class="fpb-7">
                <label for="video" class="eForm-label"><?php echo e(get_phrase('video title')); ?></label>
                <input type="text" class="form-control eForm-control" id="video" name = "video_title" placeholder="Provide lesson title" required>
            </div>
            <div class="fpb-7">
                <label for="url" class="eForm-label"><?php echo e(get_phrase('url')); ?></label>
                <input type="text" class="form-control eForm-control" id="url" name = "url" placeholder="Provide lesson url" required>
            </div>
            <div class="fpb-7">
                <label for="thumbnail" class="eForm-label"><?php echo e(get_phrase('thumbnail')); ?></label>
                              <input
                class="form-control eForm-control-file"
                id="thumbnail" name="thumbnail" accept="image/*"
                type="file"
              />
            </div>
            
            <div class="fpb-7">
                <label for="section" class="eForm-label"><?php echo e(get_phrase('section')); ?></label>
                <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select a section')); ?></option>
                     <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Create Lesson')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/lesson/add.blade.php ENDPATH**/ ?>