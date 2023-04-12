<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.question')); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7">
            <label for="exam_name" class="eForm-label"><?php echo e(get_phrase('Exam Name')); ?></label>
            <select name="exam_name" id="exam_name" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value=""><?php echo e(get_phrase('Select exam  name')); ?></option>
                <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="fpb-7">
            <label for="question" class="eForm-label"><?php echo e(get_phrase('question')); ?></label>
            <input type="text" class="form-control eForm-control" id="question" name = "question" required>
        </div>
                    <div class="fpb-7">
                <label for="question_photo" class="eForm-label"><?php echo e(get_phrase('question photo')); ?></label>
                              <input
                class="form-control eForm-control-file"
                id="question_photo" name="question_photo" accept="image/*"
                type="file"
              />
            </div>
            
        <div class="fpb-7">
            <label for="question_degree" class="eForm-label"><?php echo e(get_phrase('question degree')); ?></label>
            <input type="number" min='1' class="form-control eForm-control" id="question_degree" name = "question_degree" required>
        </div>
        <div class="fpb-7">
            <label for="answer1" class="eForm-label"><?php echo e(get_phrase('answer 1')); ?></label> 
            <input type="text" class="form-control eForm-control" id="answer1" name = "answer1" required>
        </div>
        <div class="fpb-7">
            <label for="answer2" class="eForm-label"><?php echo e(get_phrase('answer 2')); ?></label>
            <input type="text" class="form-control eForm-control" id="answer2" name = "answer2" required>
        </div>
        <div class="fpb-7">
            <label for="answer3" class="eForm-label"><?php echo e(get_phrase('answer 3')); ?></label>
            <input type="text" class="form-control eForm-control" id="answer3" name = "answer3" required>
        </div>
        <div class="fpb-7">
            <label for="answer4" class="eForm-label"><?php echo e(get_phrase('answer 4')); ?></label>
            <input type="text" class="form-control eForm-control" id="answer4" name = "answer4" required>
        </div>
        <div class="fpb-7">
            <label for="correct_answer" class="eForm-label"><?php echo e(get_phrase('correct answer')); ?></label>
            <select name="correct_answer" id="correct_answer" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value=""><?php echo e(get_phrase('Select correct answer')); ?></option>
                    <option value="1">answer 1</option>
                    <option value="2">answer 2</option>
                    <option value="3">answer 3</option>
                    <option value="4">answer 4</option>
            </select>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('Create question')); ?></button>
        </div>

    </div>
</form><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/questions/create.blade.php ENDPATH**/ ?>