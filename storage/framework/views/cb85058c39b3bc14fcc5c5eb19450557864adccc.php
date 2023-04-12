<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('Class Rooms')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Academic')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Class Rooms')); ?></a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('admin.class_room.open_modal')); ?>', '<?php echo e(get_phrase('Create Class Room')); ?>')"><i class="bi bi-plus"></i><?php echo e(get_phrase('Add class room')); ?></a>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            <?php if(count($class_rooms) > 0): ?>
            <div class="table-responsive">
                <table class="table eTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(get_phrase('Name')); ?></th>
                            <th><?php echo e(get_phrase('branch')); ?></th>
                            <th><?php echo e(get_phrase('class')); ?></th>
                            <th><?php echo e(get_phrase('status')); ?></th>
                            <th class="text-end"><?php echo e(get_phrase('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $class_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($branches->where('id',$class_room->branch_id)->first())): ?>
                             <tr>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td><?php echo e($class_room->name); ?></td>
                                <td><?php echo e($branches->where('id',$class_room->branch_id)->first()->name); ?></td>
                                <td><?php echo e($classes->where('id',$class_room->class_id)->first()->name ?? 'no class found'); ?></td>
                                <td>
                                    <?php if($class_room->status == 1): ?>
                                        <div class="badge bg-success text-wrap" style="width: 4rem;">
                                            Active
                                        </div>
                                    <?php else: ?>
                                        <div class="badge bg-danger text-wrap" style="width: 4rem;">
                                            Inactive
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
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
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('<?php echo e(route('admin.edit.class_room', ['id' => $class_room->id])); ?>', '<?php echo e(get_phrase('Edit Class Room')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                                          </li>
                                          <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('admin.class_room.delete', ['id' => $class_room->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
                                          </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('admin.class_room.activation', ['id' => $class_room->id])); ?>">
                                                <?php if($class_room->status == 1): ?>
                                                        Inactive
                                                <?php else: ?>
                                                        Active
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                             <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo $class_rooms->links(); ?>

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

<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/admin/class_room/class_room_list.blade.php ENDPATH**/ ?>