<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('video.update', ['id' => $video->id])); ?>">
         <?php echo csrf_field(); ?> 
        <div class="form-row">  
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" id="name" name = "title" value='<?php echo e($video->title); ?>' required>
            </div>
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Url')); ?></label>
                <input type="url" class="form-control eForm-control" id="url" name = "url" value='<?php echo e($video->url); ?>' required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('edit Video')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script><?php /**PATH /home/mentor/public_html/resources/views/admin/video/edit.blade.php ENDPATH**/ ?>