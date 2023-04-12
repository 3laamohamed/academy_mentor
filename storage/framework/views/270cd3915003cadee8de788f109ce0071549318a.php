<?php 

use App\Models\ExamCategory;

$category_details = ExamCategory::where('name', $exam->name)->first();

?>

<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.offline_exam.update', ['id' => $exam->id])); ?>">
        <?php echo csrf_field(); ?> 
        <div class="form-row">

            <div class="fpb-7">
                <label for="exam_name" class="eForm-label"><?php echo e(get_phrase('Exam Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="exam_name" name="exam_name" value="<?php echo e($exam->name); ?>" />
            </div>

            <div class="fpb-7">
                <label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSubjectOnExamEdit(this.value)">
                    <option value="">Select a class</option>
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>" <?php echo e($exam->class_id == $class->id ?  'selected':''); ?>><?php echo e($class->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
                                <div class="fpb-7">
                <label for="category_id" class="eForm-label"><?php echo e(get_phrase('category')); ?></label>
                <select name="category_id" id="category_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value=<?php echo e($categories->where('id',$exam->category_id)->first()->id); ?>><?php echo e(get_phrase($categories->where('id',$exam->category_id)->first()->name)); ?></option>
                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->id !=$exam->category_id): ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 

            <div class="fpb-7">
                <label for="subject_id" class="eForm-label"><?php echo e(get_phrase('Subject')); ?></label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required >
                    <option value="">Select a subject</option>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subject->id); ?>" <?php echo e($exam->subject_id == $subject->id ?  'selected':''); ?>><?php echo e($subject->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
                        <div class="fpb-7">
                <label for="type" class="eForm-label"><?php echo e(get_phrase('type')); ?><span class="required"></span></label>
                <select name="exam_type" id="exam_type" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option <?php echo e($exam->type == 1 ?  'selected':''); ?> value="1">online</option>
                    <option <?php echo e($exam->type == 0 ?  'selected':''); ?> value="0">offline</option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="starting_date" class="eForm-label"><?php echo e(get_phrase('Starting date')); ?><span class="required">*</span></label>
                <input type="date" class="form-control eForm-control" id="eInputDate" name="starting_date" value="<?php echo e(date('Y-m-d', $exam->starting_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="starting_time" class="eForm-label"><?php echo e(get_phrase('Starting time')); ?><span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="starting_time" name="starting_time" value="<?php echo e(date('H:i', $exam->starting_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="ending_date" class="eForm-label"><?php echo e(get_phrase('Ending date')); ?><span class="required">*</span></label>
                <input type="date" class="form-control eForm-control" id="eInputDate" name="ending_date" value="<?php echo e(date('Y-m-d', $exam->ending_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="ending_time" class="eForm-label"><?php echo e(get_phrase('Ending time')); ?><span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="ending_time" name="ending_time" value="<?php echo e(date('H:i', $exam->ending_time)); ?>">
            </div>

            <div class="fpb-7">
                <label for="total_marks" class="eForm-label"><?php echo e(get_phrase('Total marks')); ?><span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks" value="<?php echo e($exam->total_marks); ?>" >
                </div>
            </div>
                        <div class="fpb-7">
                <label for="duration" class="eForm-label"><?php echo e(get_phrase('duration')); ?><span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="duration" type="number" min="1" name="duration" value="<?php echo e($exam->duration); ?>">
                </div>
            </div>
            
            
            <div class="fpb-7">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">

  "use strict";


    function classWiseSubjectOnExamEdit(classId) {
        let url = "<?php echo e(route('admin.class_wise_subject', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id').html(response);
            }
        });
    }

    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

</script>   <?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/examination/edit_offline_exam.blade.php ENDPATH**/ ?>