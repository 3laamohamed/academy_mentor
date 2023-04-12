<?php $__env->startSection('content'); ?>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('Offline Exam')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Examination')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Offline Exam')); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="eSection-wrap-2">
      <!-- Search and filter -->
      <div
      class="search-filter-area d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15"
      >
              <form action="<?php echo e(route('admin.marks.list',['id'=>$exam_id])); ?>">
                <div
                class="search-input d-flex justify-content-start align-items-center"
                >
                <span>
                  <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                      height="16"
                      viewBox="0 0 16 16"
                      >
                      <path
                      id="Search_icon"
                      data-name="Search icon"
                      d="M2,7A4.951,4.951,0,0,1,7,2a4.951,4.951,0,0,1,5,5,4.951,4.951,0,0,1-5,5A4.951,4.951,0,0,1,2,7Zm12.3,8.7a.99.99,0,0,0,1.4-1.4l-3.1-3.1A6.847,6.847,0,0,0,14,7,6.957,6.957,0,0,0,7,0,6.957,6.957,0,0,0,0,7a6.957,6.957,0,0,0,7,7,6.847,6.847,0,0,0,4.2-1.4Z"
                      fill="#797c8b"
                      />
                    </svg>
                  </span>
                  <input
                  type="text"
                  id="search"
                  name="search"
                  value="<?php echo e($search); ?>"
                  placeholder="Search user"
                  class="form-control"
                  />
                  <?php if($class_id != ''): ?>
                  <input type="hidden" name="class_id" id="class_id" value="<?php echo e($class_id); ?>">
                  <?php endif; ?>
                  <?php if($class_room_id != ''): ?>
                  <input type="hidden" name="class_room_id" id="class_room_id" value="<?php echo e($class_room_id); ?>">
                  <?php endif; ?>
                </div>
              </form>
              <div class="filter-export-area d-flex align-items-center">
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
                        width="14.028"
                        height="12.276"
                        viewBox="0 0 14.028 12.276"
                      >
                      <path
                      id="filter-solid"
                          d="M.106,32.627A1.1,1.1,0,0,1,1.1,32H12.934a1.092,1.092,0,0,1,.989.627,1.054,1.054,0,0,1-.164,1.164l-4.99,6.126V43.4a.877.877,0,0,1-1.4.7L5.612,42.786a.871.871,0,0,1-.351-.7V39.917L.248,33.79a1.1,1.1,0,0,1-.142-1.164Z"
                          transform="translate(0 -32)"
                          fill="#00a3ff"
                        />
                      </svg>
                    </span>
                    <?php echo e(get_phrase('Filter')); ?>

                  </button>
                  <div
                  class="dropdown-menu dropdown-menu-end filter-options"
                  aria-labelledby="defaultDropdown"
                  >
                    <h4 class="title"><?php echo e(get_phrase('Filter Options')); ?></h4>
                    <form action="<?php echo e(route('admin.marks.list',['id'=>$exam_id])); ?>">
                      <div class="filter-option d-flex flex-column">
                        <?php if($search != ''): ?>
                        <input type="hidden" name="search" id="search" value="<?php echo e($search); ?>">
                        <?php endif; ?>
                        <div>
                          <label for="class_id" class="eForm-label"
                            ><?php echo e(get_phrase('Class')); ?></label
                            >
                            <select
                            class="form-select" name="class_id"
                            id="class_id"  required
                          >
                          <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                          <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($class->id); ?>" <?php echo e($class_id == $class->id ?  'selected':''); ?>><?php echo e($class->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                        <div>
                          <label for="class_room_id" class="eForm-label"
                            ><?php echo e(get_phrase('group')); ?></label
                            >
                            <select
                            class="form-select" name="class_room_id"
                            id="class_room_id"  required
                          >
                          <option value=""><?php echo e(get_phrase('Select a group')); ?></option>
                          <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($group->id); ?>" <?php echo e($class_room_id == $group->id ?  'selected':''); ?>><?php echo e($group->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div>
                        </div>
                      </div>
                      <div
                        class="filter-button d-flex justify-content-end align-items-center"
                      >
                        <a class="form-group">
                          <button class="eBtn eBtn btn-primary" type="submit"><?php echo e(get_phrase('Apply')); ?></button>
                        </a>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Export Button -->
                <?php if(count($exams) > 0): ?>
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


<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="card-body exam_content" id="offline_exam_export">
                <div class="table-responsive">
                    <table class="table eTable" id='student_list'>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo e(get_phrase('Exam name')); ?></th>
                                <th scope="col"><?php echo e(get_phrase('student name')); ?></th>
                                <th scope="col"><?php echo e(get_phrase('student degree')); ?></th>
                                <th scope="col"><?php echo e(get_phrase('total degree')); ?></th>
                                <th scope="col">View Answers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($exam_data->where('id',$exam->exam_id)->first()->name); ?></td>
                                    <td><?php echo e($user_data->where('id',$exam->user_id)->first()->name ?? 'no student found'); ?></td>
                                    <td><?php echo e($exam->exam_degree); ?></td>
                                    <td><?php echo e($exam_data->where('id',$exam->exam_id)->first()->total_marks); ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(route('admin.marks.view_answer',$exam->id)); ?>">View Answers</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

  "use strict";

  function classWiseSection(classId) {
    let url = "<?php echo e(route('class_wise_sections', ['id' => ":classId"])); ?>";
    url = url.replace(":classId", classId);
    $.ajax({
        url: url,
        success: function(response){
            $('#section_id').html(response);
        }
    });
  }

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
      filename:     'student_list_<?php echo e(date("y-m-d")); ?>.pdf',
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


<!-- End Students area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\resources\views/admin/marks/show_marks.blade.php ENDPATH**/ ?>