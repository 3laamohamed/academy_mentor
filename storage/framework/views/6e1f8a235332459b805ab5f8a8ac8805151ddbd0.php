
   
<?php $__env->startSection('content'); ?>
<?php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
?>

<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
        
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('qr code list')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Academic')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('qr groups')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('qr list')); ?></a></li>
            </ul>
          </div>
                          <!-- Export Button -->
                <?php if(count($students) > 0): ?>
                <div class="position-relative">
                  <button
                    class="eBtn-3 dropdown-toggle"
                    type="button"
                    id="defaultDropdown"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="true"
                    aria-expanded="false"
                    >
                    <span class="pr-10">
                      <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="12.31"
                      height="10.77"
                      viewBox="0 0 10.771 12.31"
                      >
                      <path
                      id="arrow-right-from-bracket-solid"
                      d="M3.847,1.539H2.308a.769.769,0,0,0-.769.769V8.463a.769.769,0,0,0,.769.769H3.847a.769.769,0,0,1,0,1.539H2.308A2.308,2.308,0,0,1,0,8.463V2.308A2.308,2.308,0,0,1,2.308,0H3.847a.769.769,0,1,1,0,1.539Zm8.237,4.39L9.007,9.007A.769.769,0,0,1,7.919,7.919L9.685,6.155H4.616a.769.769,0,0,1,0-1.539H9.685L7.92,2.852A.769.769,0,0,1,9.008,1.764l3.078,3.078A.77.77,0,0,1,12.084,5.929Z"
                          transform="translate(0 12.31) rotate(-90)"
                          fill="#00a3ff"
                        />
                      </svg>
                    </span>
                    <?php echo e(get_phrase('Export')); ?>

                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end eDropdown-menu-2"
                  >
                    <li>
                        <a class="dropdown-item" id="pdf" href="javascript:;" onclick="Export()"><?php echo e(get_phrase('PDF')); ?></a>
                    </li>
                    <li>
                        <a class="dropdown-item" id="print" href="javascript:;" onclick="printableDiv('student_list')"><?php echo e(get_phrase('Print')); ?></a>
                    </li>
                  </ul>
                </div>
                <?php endif; ?>

          
            
          
        </div>
      </div>
    </div>
</div>
<!-- Start qr code list area -->
<div class="row">
  
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            <?php if(isset($students) > 0): ?>
            <!-- Table -->
            <div class="table-responsive" id='student_list'>
              
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(get_phrase('student name')); ?></th>
                            <th scope="col" class="text-end"><?php echo e(get_phrase('qr')); ?></th>
                        </tr>
                	</thead>
                	<tbody>
                		<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<tr>
                			<td>
                				<?php echo e($key+1); ?>

                			</td>
                			<td>
                                <?php echo e($student['name']); ?>

    						</td>
    						<td class="text-center">
                              <?php echo QrCode::size(100)->generate($student['id']); ?>

    						</td>
                		</tr>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	</tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="student_catrgories_content">
                <div class="empty_box center">
                    <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End qr code list area -->
<script type="text/javascript">

  "use strict";


  function Export() {

      // Choose the element that our invoice is rendered in.
      const element = document.getElementById("student_list");

      // clone the element
      var clonedElement = element.cloneNode(true);

      // change display of cloned element
      $(clonedElement).css("display", "block");

      // Choose the clonedElement and save the PDF for our user.
    var opt = {
      margin:       1,
      filename:     'qr_codes_list<?php echo e(date("y-m-d")); ?>.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 }
    };

    // New Promise-based usage:
    html2pdf().set(opt).from(clonedElement).save();

      // remove cloned element
      clonedElement.remove();
  }

  function printableDiv(printableAreaDivId) {
    var printContents = document.getElementById(printableAreaDivId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/admin/attendance/qr_list.blade.php ENDPATH**/ ?>