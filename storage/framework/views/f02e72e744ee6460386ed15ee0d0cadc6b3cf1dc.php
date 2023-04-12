<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('lesson.update', ['id' => $lesson->id])); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">
            <div class="fpb-7">
                <label for="class_id_on_create" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="<?php echo e($previous_class_id); ?>"><?php echo e($previous_class_name); ?></option>
                     <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($class->id!=$previous_class_id): ?>
                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
            <div class="fpb-7">
                <label for="subject_id_on_create" class="eForm-label"><?php echo e(get_phrase('subject')); ?></label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="<?php echo e($previous_subject_id); ?>"><?php echo e($previous_subject_name); ?></option>
                     <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($subject->id!=$previous_subject_id): ?>
                    <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="name" name = "name" placeholder="Provide lesson name" value='<?php echo e($lesson->name); ?>' required>
            </div>
            <div class="fpb-7">
                <label for="url" class="eForm-label"><?php echo e(get_phrase('url')); ?></label>
                <input type="text" class="form-control eForm-control" id="url" name = "url" placeholder="Provide lesson url" value='<?php echo e($video->url); ?>'  required>
            </div>
            <div class="fpb-7">
                <label for="title" class="eForm-label"><?php echo e(get_phrase('title')); ?></label>
                <input type="text" class="form-control eForm-control" id="title" name = "video_title" placeholder="Provide lesson title" value='<?php echo e($video->title); ?>'  required>
            </div>
            <div class="fpb-7">
                <label for="thumbnail" class="eForm-label"><?php echo e(get_phrase('thumbnail')); ?></label>
                              <input
                              value='<?php echo e($lesson->thumbnail); ?>' 
                class="form-control eForm-control-file"
                id="thumbnail" name="thumbnail" accept="image/*"
                type="file"
              />
            </div>
            
            <div class="fpb-7">
                <label for="section" class="eForm-label"><?php echo e(get_phrase('section')); ?></label>
                <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="<?php echo e($previous_section_id); ?>"><?php echo e($previous_section_name); ?></option>
                     <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($section->id!=$previous_section_id): ?>
                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('edit Lesson')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/lesson/edit.blade.php ENDPATH**/ ?>