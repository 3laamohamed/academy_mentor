<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.question.update', ['id' => $exam_question->id])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7">
            <label for="exam_name" class="eForm-label"><?php echo e(get_phrase('Exam Name')); ?></label>
            <select name="exam_name" id="exam_name" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="<?php echo e($exams->where('id',$exam_question->exam_id)->first()->id); ?>"><?php echo e(get_phrase($exams->where('id',$exam_question->exam_id)->first()->name)); ?></option>
                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($exam->id !=$exam_question->exam_id): ?>
                        <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="fpb-7">
            <label for="question" class="eForm-label"><?php echo e(get_phrase('question')); ?></label>
            <input type="text" value="<?php echo e($exam_question->question); ?>" class="form-control eForm-control" id="question" name = "question" required>
        </div>
                    <div class="fpb-7">
                <label for="question_photo" class="eForm-label"><?php echo e(get_phrase('question_photo')); ?></label>
                              <input
                              value='<?php echo e($exam_question->question_photo); ?>' 
                class="form-control eForm-control-file"
                id="question_photo" name="question_photo" accept="image/*"
                type="file"
              />
            </div>
        <div class="fpb-7">
            <label for="question_degree" class="eForm-label"><?php echo e(get_phrase('question degree')); ?></label>
            <input type="number" min='1' value="<?php echo e($exam_question->question_degree); ?>" class="form-control eForm-control" id="question_degree" name = "question_degree" required>
        </div>

        <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="fpb-7">
            <label for="answer<?php echo e($question_num); ?>" class="eForm-label"><?php echo e(get_phrase('answer ' .$question_num)); ?></label> 
            <input type="text" value='<?php echo e($answer->answer); ?>' class="form-control eForm-control" id="answer<?php echo e($question_num); ?>" name = "answer<?php echo e($question_num++); ?>" required>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="fpb-7">
            <label for="correct_answer" class="eForm-label"><?php echo e(get_phrase('correct answer')); ?></label>
            <select name="correct_answer" id="correct_answer" class="form-select eForm-select eChoice-multiple-with-remove" required>
                        <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($answer->correct==1): ?>
                            <option selected value=<?php echo e($answers_count); ?>>answer <?php echo e($answers_count); ?></option>
                            <?php else: ?>
                        <option value=<?php echo e($answers_count); ?>>answer <?php echo e($answers_count); ?></option>
                        <?php endif; ?>
                        <?php echo e($answers_count++); ?>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('edit question')); ?></button>
        </div>

    </div>
</form><?php /**PATH C:\pc files\projects\academy_mentor\resources\views/admin/questions/edit.blade.php ENDPATH**/ ?>