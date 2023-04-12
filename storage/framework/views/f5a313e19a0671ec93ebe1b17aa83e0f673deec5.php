
   
<?php $__env->startSection('content'); ?>

<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Language Settings')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Settings')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Language settings')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap pb-2">
        	<ul class="nav nav-tabs eNav-Tabs-custom"id="myTab"role="tablist" >

        		<?php if(isset($edit_profile)):?>
        		<li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="upcoming-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#editphrase"
                    type="button"
                    role="tab"
                    aria-controls="editphrase"
                    aria-selected="false"
                  >
                  <?php echo e(get_phrase('Edit phrase ')); ?>

                    <span></span>
                  </button>
                </li>
                <?php endif;?>

                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link <?php echo e(empty($edit_profile) ? 'active':''); ?>"
                    id="upcoming-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#languagelist"
                    type="button"
                    role="tab"
                    aria-controls="languagelist"
                    aria-selected="false"
                  >
                  <?php echo e(get_phrase('Language list ')); ?><p class="badge bg-success ">
                    <?php echo e(count($languages)); ?>

                </p>
                    <span></span>
                  </button>
                </li>


                <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="archive-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#addlanguage"
                      type="button"
                      role="tab"
                      aria-controls="addlanguage"
                      aria-selected="false"
                    >
                    <?php echo e(get_phrase('Add language')); ?>

                      <span></span>
                    </button>
                </li>
            </ul>

            <div class="tab-content eNav-Tabs-content" id="nav-tabContent">

            	<?php if (isset($edit_profile)):
					$current_editing_language	=	$edit_profile;
				?>
            	<div class="tab-pane fade <?php echo e(!empty($edit_profile) ? 'show active':''); ?> pt-3  " id="editphrase" role="tabpanel" aria-labelledby="editphrase-tab">
					<div class="row">
						<?php foreach ($phrases as $phrase): ?>
						<div class="col-md-3">
	                      <div class="eCard eCard-2">
	                        <div class="eCard-body">
	                          <p class="eCard-text text-center">
	                          	<label for="text" class="eForm-label"><?php echo e($phrase->phrase); ?></label>
	                            <input type="text" class="form-control eForm-control" name="updated_phrase" id = "phrase-<?php echo $phrase->phrase; ?>" value="<?php echo $phrase->translated; ?>">
	                          </p>
	                          <div class="d-flex flex-column align-items-start align-items-md-center">
	                            <a href="#" class="eBtn eBtn-blue" id="btn-<?php echo $phrase->phrase; ?>" onclick="updatePhrase('<?php echo $phrase->phrase; ?>', '<?php echo e($current_editing_language); ?>')"><?php echo e(get_phrase('Update')); ?></a>
	                          </div>
	                        </div>
	                      </div>
	                    </div>
	                    <?php endforeach; ?>
						
					</div>
            	</div>
            	<?php endif;?>

            	<div class="tab-pane fade <?php echo e(empty($edit_profile) ? 'show active':''); ?> " id="languagelist" role="tabpanel" aria-labelledby="languagelist-tab">
            		<div class="table-responsive-sm">
						<table class="table eTable">
							<thead>
								<tr>
									<th><?php echo e(get_phrase('Language')); ?></th>
									<th><?php echo e(get_phrase('Option')); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e(ucwords($language->name)); ?></td>
									<td>
										<a href="<?php echo e(route('superadmin.language.manage', ['language' => $language->name])); ?>">
											<button type="button" class="btn-form btn-sm"><?php echo e(get_phrase('Edit phrase')); ?></button>
										</a>
										<?php if($language->name != 'english'): ?>
										<button type="button" class="btn-form btn-danger btn-sm" onclick="confirmModal('<?php echo e(route('superadmin.language.delete', ['name' => $language->name])); ?>', 'undefined')"><?php echo e(get_phrase('Delete language')); ?></button>
										<?php else: ?>
										<button type="button" class="btn-form btn-danger btn-sm" onclick="notify()"><?php echo e(get_phrase('Delete language')); ?></button>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
            	</div>

            	<div class="tab-pane fade pt-3  " id="addlanguage" role="tabpanel" aria-labelledby="addlanguage-tab">
            		<div class="row">
						<div class="col-xl-5">
							<form class="" action="<?php echo e(route('superadmin.language.add')); ?>" method="post">
								<?php echo csrf_field(); ?>
								<div class="fpb-7">
									<label for="language" class="eForm-label"><?php echo e(get_phrase('Add new language')); ?></label>
									<input type="text" id="language" name="language" class="form-control eForm-control" placeholder="<?php echo e(get_phrase('No special character or space is allowed')); ?>">
									<p class="eCard-text">
			                            <?php echo e(get_phrase('Valid examples').' : French, Spanish, Bengali etc'); ?>

			                        </p>
								</div>
								<button type="submit" class="btn-form"><?php echo e(get_phrase('Save')); ?></button>
							</form>
						</div>
					</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script type="text/javascript">
	
	"use strict";

	function notify() {
		toastr.warning('<?php echo e(get_phrase('System default language can not be removed')); ?>');
	}

	function updatePhrase(phrase, language) {
		$('#btn-'+phrase).text('...');
		var updatedValue = $('#phrase-'+phrase).val();
		let url = "<?php echo e(route('superadmin.language.update_phrase', ['language' => ":language"])); ?>";
		url = url.replace(":language", language);
		$.ajax({
			type : "POST",
			url  : url,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data : {updatedValue : updatedValue, currentEditingLanguage : language, phrase : phrase},
			success : function(response) {
				$('#btn-'+phrase).html('<i class = "bi bi-check-circle"></i>');
				toastr.success('<?php echo e(get_phrase('Phrase updated')); ?>');
			}
		});
	}

</script>
<?php echo $__env->make('superadmin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/superadmin/language/manage_language.blade.php ENDPATH**/ ?>