<?php use App\Models\Classes; 
   // $classes = Classes::where('school_id',auth()->user()->school_id)->get();
?>

   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('Lessons')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Academic')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Subjects')); ?></a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('admin.lesson.open_modal')); ?>', '<?php echo e(get_phrase('Create Lesson')); ?>')"><i class="bi bi-plus"></i><?php echo e(get_phrase('Add lesson')); ?></a>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-8 offset-md-2">
        <div class="eSection-wrap">
            <form method="GET" class="d-block ajaxForm" action="<?php echo e(route('admin.lessons')); ?>">
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                        <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSection(this.value)">
                            <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>" ><?php echo e($class->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="eBtn eBtn btn-secondary" type="submit" id = "filter_routine"><?php echo e(get_phrase('Filter')); ?></button>
                    </div>
                </div>
            </form>

            <?php if(count($lessons) > 0): ?>
            <div class="table-responsive">
                <table class="table eTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(get_phrase('Name')); ?></th>
                            <th><?php echo e(get_phrase('Class')); ?></th>
                            <th class="text-end"><?php echo e(get_phrase('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $class = Classes::get()->where('id', $row->class_id)->first(); ?>
                             <tr>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td> <a href="<?php echo e(route('admin.lesson.show',$row->id)); ?>" >  <?php echo e($row->name); ?> </a> </td>
                                <td><?php echo e($class->name); ?></td>
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
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('<?php echo e(route('admin.edit.subject', ['id' => $row->id])); ?>', '<?php echo e(get_phrase('Edit Subject')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                                          </li>
                                          <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('admin.subject.delete', ['id' => $row->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
                                          </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
            </div>
            <?php else: ?>
            <div class="empty_box center">
              <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
              <br>
              <span class=""><?php echo e(get_phrase('No data found')); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\Academy-mentor8\academy-mentor\resources\views/admin/lesson/show.blade.php ENDPATH**/ ?>