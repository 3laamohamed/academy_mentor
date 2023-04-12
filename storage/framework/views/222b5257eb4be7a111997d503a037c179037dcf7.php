<!DOCTYPE html>
<html lang="en">

<head>
    <!-- New -->
    <title>privacy policy</title>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- all the css files -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/uploads/logo/'.get_settings('favicon'))); ?>" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="<?php echo e(asset('assets/vendors/bootstrap-5.1.3/css/bootstrap.min.css')); ?>"
    />

    <!--Custom css-->
    <link
      rel="stylesheet"
      type="text/css"
      href="<?php echo e(asset('assets/css/swiper-bundle.min.css')); ?>"
    />

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/main.css')); ?>" />
    <!-- Datepicker css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/daterangepicker.css')); ?>" />
    <!-- Select2 css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>" />

    <link
      rel="stylesheet"
      type="text/css"
      href="<?php echo e(asset('assets/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css')); ?>"
    />

    <!--Toaster css-->
    <link
      rel="stylesheet"
      type="text/css"
      href="<?php echo e(asset('assets/css/toastr.min.css')); ?>"
    />

    <!-- Calender css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="<?php echo e(asset('assets/calender/main.css')); ?>"
    />

    <script src="<?php echo e(asset('assets/vendors/jquery/jquery-3.6.0.min.js')); ?>"></script>

</head>

<body>
<section class="home-section">
<div class="home-content">
<div class="main_content">
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('privacy policy')); ?></h4>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
                      <div class="fpb-7">
                          <h5>
                            <?php if(isset($policy)): ?>
                            <?php echo html_entity_decode($policy->policy); ?>

                            <?php else: ?>
                            no policies yet
                            <?php endif; ?>
                          </h5>
                      </div>
        </div>
    </div>
</div>
        </div>
</div>
</section>
</body>
</html><?php /**PATH /home/mentor/public_html/resources/views/admin/privacy_policy/show_policy.blade.php ENDPATH**/ ?>