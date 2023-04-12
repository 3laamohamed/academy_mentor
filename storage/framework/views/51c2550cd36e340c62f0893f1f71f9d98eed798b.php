<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Student: <?php echo e(\App\Models\User::find($exams->user_id)->name); ?></li>
                <li class="list-group-item">Total Degree: <?php echo e(\App\Models\Exam::find($exams->exam_id)->total_marks); ?></li>
                <li class="list-group-item">Student Degree: <?php echo e($exams->exam_degree); ?></li>
            </ul>
        </div>
        <div class="col-8">
            <?php if($exams->answers->count() != 0): ?>
            <?php $__currentLoopData = $exams->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-10"><?php echo e($exam->title); ?></div>
                            <div class="col-2"><?php if($exam->is_correct == 'true'): ?><?php echo e($exam->degree); ?> <?php else: ?> 0 <?php endif; ?> / <?php echo e($exam->degree); ?></div>
                        </div>
                    </li>
                    <?php if($exam->is_correct == 'true'): ?>
                        <?php $__currentLoopData = json_decode($exam->student_answers , true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item bg-success"><?php echo e($student_answer['title']); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = json_decode($exam->student_answers , true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item bg-danger"><?php echo e($student_answer['title']); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = json_decode($exam->correct_answers , true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $correct_answers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item bg-success"><?php echo e($correct_answers['title']); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Not Found Data</li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>



<script type="text/javascript">

        "use strict";

        function classWiseSection(classId) {
            let url = "<?php echo e(route('class_wise_sections', ['id' => ":classId"])); ?>";
            url = url.replace(":classId", classId);
            $.ajax({
                url: url,
                success: function(response){
                    $('#section_id').html(response);
                }
            });
        }

        function Export() {

            // Choose the element that our invoice is rendered in.
            const element = document.getElementById("student_list");

            // clone the element
            var clonedElement = element.cloneNode(true);

            // change display of cloned element
            $(clonedElement).css("display", "block");

            // Choose the clonedElement and save the PDF for our user.
            var opt = {
                margin:       1,
                filename:     'student_list_<?php echo e(date("y-m-d")); ?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 }
            };

            // New Promise-based usage:
            html2pdf().set(opt).from(clonedElement).save();

            // remove cloned element
            clonedElement.remove();
        }

        function printableDiv(printableAreaDivId) {
            var printContents = document.getElementById(printableAreaDivId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\resources\views/admin/marks/show_answers.blade.php ENDPATH**/ ?>