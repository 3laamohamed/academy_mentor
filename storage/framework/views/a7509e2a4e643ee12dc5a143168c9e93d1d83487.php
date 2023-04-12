
   
<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Expense Category')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Accounting')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Expense Category')); ?></a></li>
                    </ul>
                </div>
                <div class="export-btn-area">
                    <a href="javascript:;" class="export_btn" onclick="rightModal('<?php echo e(route('accountant.expense_category.open_modal')); ?>', '<?php echo e(get_phrase('Create Expense Category')); ?>')"><i class="bi bi-plus"></i><?php echo e(get_phrase('Add Expense Category')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8 offset-md-2">
        <div class="eSection-wrap">
            <?php if(count($expense_categories) > 0): ?>
            <div class="expense_category_content">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table eTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo e(get_phrase('Name')); ?></th>
                                <th scope="col" class="text-end"><?php echo e(get_phrase('Option')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $expense_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($expense_category->name); ?></td>
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
                                                <a class="dropdown-item" href="javascript:;" onclick="rightModal('<?php echo e(route('accountant.edit.expense_category', ['id' => $expense_category->id])); ?>', '<?php echo e(get_phrase('Edit Expense Category')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                                              </li>
                                              <li>
                                                <a class="dropdown-item" href="javascript:;" onclick="confirmModal('<?php echo e(route('accountant.expense.category_delete', ['id' => $expense_category->id])); ?>', 'undefined');"><?php echo e(get_phrase('Delete')); ?></a>
                                              </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $expense_categories->links(); ?>

                </div>
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
<?php echo $__env->make('accountant.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/accountant/expense_category/expense_category_list.blade.php ENDPATH**/ ?>