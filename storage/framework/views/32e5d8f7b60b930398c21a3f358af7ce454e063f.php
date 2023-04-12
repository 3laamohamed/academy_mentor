<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4><?php echo e(get_phrase('app Settings')); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <?php if($android_app_details->maintenance_mode==1): ?>

                            <a class="btn btn-success"
                               href='<?php echo e(route('admin.settings.enable_maintenance_mode')); ?>'>
                                enable android maintenance mode
                            </a>
                        <?php else: ?>
                            <a class="btn btn-danger"
                               href='<?php echo e(route('admin.settings.disable_maintenance_mode')); ?>'>
                                disable android maintenance mode
                            </a>
                        <?php endif; ?>
                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.settings.update_app_config')); ?>">
                                <?php echo csrf_field(); ?>
                                <input class="d-none" value="android" name="type">
                                <div class="fpb-7">
                                    <label for="school_name" class="eForm-label"><?php echo e(get_phrase('android app url')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($android_app_details->app_url); ?>" id="android_url" name = "android_url" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="phone" class="eForm-label"><?php echo e(get_phrase('android app minimum version')); ?></label>
                                    <input type="number" class="form-control eForm-control" value="<?php echo e($android_app_details->minimum_version); ?>" id="android_minimum_version" name = "android_minimum_version" required>
                                </div>
                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form">Update settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 pb-3">
                        <?php if($ios_app_details->maintenance_mode==1): ?>

                            <a class="btn btn-success"
                               href='<?php echo e(route('admin.settings.enable_ios_maintenance_mode')); ?>'>
                                enable IOS maintenance mode
                            </a>
                        <?php else: ?>
                            <a class="btn btn-danger"
                               href='<?php echo e(route('admin.settings.disable_ios_maintenance_mode')); ?>'>
                                disable IOS maintenance mode
                            </a>
                        <?php endif; ?>
                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.settings.update_app_config')); ?>">
                                <?php echo csrf_field(); ?>
                                <input class="d-none" value="ios" name="type">
                                <div class="fpb-7">
                                    <label for="school_name" class="eForm-label"><?php echo e(get_phrase('ios app url')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($ios_app_details->app_url); ?>" id="ios_url" name = "ios_url" required>
                                </div>
                                <div class="fpb-7">
                                    <label for="phone" class="eForm-label"><?php echo e(get_phrase('ios app minimum version')); ?></label>
                                    <input type="number" class="form-control eForm-control" value="<?php echo e($ios_app_details->minimum_version); ?>" id="ios_minimum_version" name = "ios_minimum_version" required>
                                </div>
                                <div class="fpb-7 pt-2">
                                    <button type="submit" class="btn-form">Update settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/admin/app_settings/app_config.blade.php ENDPATH**/ ?>