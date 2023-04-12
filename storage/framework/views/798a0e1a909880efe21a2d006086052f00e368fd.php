<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.offline_exam')); ?>">
        <?php echo csrf_field(); ?> 
        <div class="form-row">

            <div class="fpb-7">
                <label for="exam_name" class="eForm-label"><?php echo e(get_phrase('Exam Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="exam_name" name="exam_name" />
                
            </div>

            <div class="fpb-7">
                <label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSubject(this.value)">
                    <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fpb-7">
                <label for="category_id" class="eForm-label"><?php echo e(get_phrase('category')); ?></label>
                <select name="category_id" id="category_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select a category')); ?></option>
                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
            <div class="fpb-7">
                <label for="subject_" class="eForm-label"><?php echo e(get_phrase('subject')); ?></label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select a subject')); ?></option>
                     <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 

            <div class="fpb-7">
                <label for="type" class="eForm-label"><?php echo e(get_phrase('type')); ?><span class="required"></span></label>
                <select name="exam_type" id="exam_type" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=""><?php echo e(get_phrase('Select exam type')); ?></option>

                    <option value="1">online</option>
                    <option value="0">offline</option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="starting_date" class="eForm-label"><?php echo e(get_phrase('Starting date')); ?><span class="required">*</span></label>
                <input type="text" class="form-control eForm-control inputDate" id="starting_date" name="starting_date" value="<?php echo e(date('m/d/Y')); ?>" />
            </div>

            <div class="fpb-7">
                <label for="starting_time" class="eForm-label"><?php echo e(get_phrase('Starting time')); ?><span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="starting_time" name="starting_time" value="<?php echo e(date('H:i', strtotime(date('H:i')))); ?>">
            </div>

            <div class="fpb-7">
                <label for="ending_date" class="eForm-label"><?php echo e(get_phrase('Ending date')); ?><span class="required">*</span></label>
                <input type="text" class="form-control eForm-control inputDate" id="ending_date" name="ending_date" value="<?php echo e(date('m/d/Y')); ?>" />
            </div>

            <div class="fpb-7">
                <label for="ending_time" class="eForm-label"><?php echo e(get_phrase('Ending time')); ?><span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="ending_time" name="ending_time" value="<?php echo e(date('H:i', strtotime(date('H:i')))); ?>">
            </div>

            <div class="fpb-7">
                <label for="total_marks" class="eForm-label"><?php echo e(get_phrase('Total marks')); ?><span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks">
                </div>
            </div>

            <div class="fpb-7">
                <label for="duration" class="eForm-label"><?php echo e(get_phrase('duration')); ?><span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="duration" type="number" min="1" name="duration">
                </div>
            </div>
            
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Create')); ?></button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">

  "use strict";


    function classWiseSubject(classId) {
        let url = "<?php echo e(route('admin.class_wise_subject', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id').html(response);
            }
        });
    }

    $(function () {
      $('.inputDate').daterangepicker(
        {
          singleDatePicker: true,
          showDropdowns: true,
          minYear: 1901,
          maxYear: parseInt(moment().format("YYYY"), 10),
        },
        function (start, end, label) {
          var years = moment().diff(start, "years");
        }
      );
    });

    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

</script><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/examination/add_offline_exam.blade.php ENDPATH**/ ?>