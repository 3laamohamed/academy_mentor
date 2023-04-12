<?php
date_default_timezone_set('Africa/Cairo');
?>
<table id="basic-datatable" class="table eTable">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(get_phrase('Exam')); ?></th>
            <th><?php echo e(get_phrase('Starting Time')); ?></th>
            <th><?php echo e(get_phrase('Ending Time')); ?></th>
            <th><?php echo e(get_phrase('Total Marks')); ?></th>
            <th class="text-center"><?php echo e(get_phrase('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->index + 1); ?></td>
                <td><?php echo e($exam->name); ?></td>
                <td><?php echo e(date('d M Y - h:i A', $exam->starting_time)); ?></td>
                <td><?php echo e(date('d M Y - h:i A', $exam->ending_time)); ?></td>
                <td><?php echo e($exam->total_marks); ?></td>
                <td class="text-start">
                    <div class="adminTable-action">
                        <button
                          type="button"
                          class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <?php echo e(get_phrase('Actions')); ?>

                        </button>
                        <ul
                          class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                        >
                          <li>
                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('<?php echo e(route('admin.edit.offline_exam', ['id' => $exam->id])); ?>', '<?php echo e(get_phrase('Edit Exam')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('admin.offline_exam.delete', ['id' => $exam->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
                          </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /home/mentor/public_html/resources/views/admin/examination/exam_list.blade.php ENDPATH**/ ?>