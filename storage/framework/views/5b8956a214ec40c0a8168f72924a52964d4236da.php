
   
<?php $__env->startSection('content'); ?>
 
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('videos')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Academic')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Subjects')); ?></a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('admin.video.open_modal',$id)); ?>', '<?php echo e(get_phrase('Create Video')); ?>')"><i class="bi bi-plus"></i><?php echo e(get_phrase('Add Video')); ?></a>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-8 offset-md-2">
        <div class="eSection-wrap"> 

            <?php if(count($videos) > 0): ?>
            <div class="table-responsive" style="min-height: 250px;">
                <table class="table eTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(get_phrase('Name')); ?></th> 
                            <th class="text-end"><?php echo e(get_phrase('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td> <?php echo e($row->title); ?> </td>
                                <td class="text-start">
                                    <div class="adminTable-action">
                                        <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2"  data-bs-toggle="dropdown" aria-expanded="false" >
                                          <?php echo e(get_phrase('Actions')); ?>

                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"> 
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
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\Academy-mentor8\academy-mentor\resources\views/admin/video/list.blade.php ENDPATH**/ ?>