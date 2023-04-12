<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.videos')); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">  
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="name" name = "title" placeholder="Provide video title" required>
            </div>
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Url')); ?></label>
                <input type="url" class="form-control eForm-control" id="name" name = "url" placeholder="Provide video url" required>
            </div>

            <div class="fpb-7 pt-2">
                <input type="hidden" name="id" value="<?php echo e($id); ?>" > 
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Create Video')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH D:\projects\Academy-mentor8\academy-mentor\resources\views/admin/video/add.blade.php ENDPATH**/ ?>