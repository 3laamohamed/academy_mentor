

<?php $__env->startSection('content'); ?>

<style type="text/css">

.login-image{
    width: inherit; 
    height: 100%; 
    position: fixed; 
    background-image: url('<?php echo e(asset("assets/images/login.png")); ?>');
    background-size: cover; 
    background-position: center;
}

</style>

<div class="row h-100">
    <div class="col-lg-6 d-none d-lg-block p-0 h-100">
        <div class="bg-image login-image">
        </div>
    </div>
    <div class="col-lg-6 p-0 h-100 position-relative">
        <div class="parent-elem">
            <div class="middle-elem">
                <div class="primary-form">
                    <div class="form-logo mb-5">
                        <img height="60px" src="<?php echo e(asset('assets/uploads/logo/'.get_settings('dark_logo'))); ?>">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="subtitle mb-2">
                                <?php echo e(get_phrase('Enter your email address to reset your password.')); ?>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="login-form">
                                <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" name="email" class="form-control border-end <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e('Your email address'); ?>">

                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-3 mt-3 fw-600"><?php echo e(get_phrase('Reset password')); ?></button>
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary text-white w-100 py-3 mt-3 fw-600"><i class="bi bi-chevron-left text-10px fw-bolder"></i> <?php echo e(get_phrase('Back')); ?></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.signin_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>