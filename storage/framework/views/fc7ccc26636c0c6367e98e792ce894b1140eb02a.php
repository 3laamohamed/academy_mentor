

<?php $__env->startSection('content'); ?>

<?php 

use App\Http\Controllers\CommonController;

use App\Models\Classes;
use App\Models\User;
use App\Models\Section;
use App\Models\DailyAttendances;
use App\Models\Session;

$class_name = Classes::find($page_data['class_id'])->name;
$section_name = Section::find($page_data['section_id'])->name;
$active_session = Session::where('status', 1)->where('school_id', auth()->user()->school_ids)->first();
$student_id_count = 0;

?>

<style>
 .custom_cs{
  padding: 0.375rem 5.75rem;

 }
 .att-custom_div {

   background-color: white !important;

  }

</style>

<div class="mainSection-title">
  <div class="row">
    <div class="col-12">
      <div
        class="d-flex justify-content-between align-items-center flex-wrap gr-15"
      >
        <div class="d-flex flex-column">
          <h4><?php echo e(get_phrase('Daily Attendance')); ?></h4>
          <ul class="d-flex align-items-center eBreadcrumb-2">
            <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
            <li><a href="#"><?php echo e(get_phrase('Academic')); ?></a></li>
            <li><a href="#"><?php echo e(get_phrase('Daily Attendance')); ?></a></li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="eSection-wrap-2">
        <!-- Filter area -->
        <form method="GET" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.daily_attendance.filter')); ?>">
          <div class="att-filter d-flex flex-wrap">
            <div class="att-filter-option">
              <select name="month" id="month" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value=""><?php echo e(get_phrase('Select a month')); ?></option>
                <option value="Jan"<?php echo e($page_data['month'] == 'Jan' ?  'selected':''); ?>><?php echo e(get_phrase('January')); ?></option>
                <option value="Feb"<?php echo e($page_data['month'] == 'Feb' ?  'selected':''); ?>><?php echo e(get_phrase('February')); ?></option>
                <option value="Mar"<?php echo e($page_data['month'] == 'Mar' ?  'selected':''); ?>><?php echo e(get_phrase('March')); ?></option>
                <option value="Apr"<?php echo e($page_data['month'] == 'Apr' ?  'selected':''); ?>><?php echo e(get_phrase('April')); ?></option>
                <option value="May"<?php echo e($page_data['month'] == 'May' ?  'selected':''); ?>><?php echo e(get_phrase('May')); ?></option>
                <option value="Jun"<?php echo e($page_data['month'] == 'Jun' ?  'selected':''); ?>><?php echo e(get_phrase('June')); ?></option>
                <option value="Jul"<?php echo e($page_data['month'] == 'Jul' ?  'selected':''); ?>><?php echo e(get_phrase('July')); ?></option>
                <option value="Aug"<?php echo e($page_data['month'] == 'Aug' ?  'selected':''); ?>><?php echo e(get_phrase('August')); ?></option>
                <option value="Sep"<?php echo e($page_data['month'] == 'Sep' ?  'selected':''); ?>><?php echo e(get_phrase('September')); ?></option>
                <option value="Oct"<?php echo e($page_data['month'] == 'Oct' ?  'selected':''); ?>><?php echo e(get_phrase('October')); ?></option>
                <option value="Nov"<?php echo e($page_data['month'] == 'Nov' ?  'selected':''); ?>><?php echo e(get_phrase('November')); ?></option>
                <option value="Dec"<?php echo e($page_data['month'] == 'Dec' ?  'selected':''); ?>><?php echo e(get_phrase('December')); ?></option>
              </select>
            </div>
            <div class="att-filter-option">
              <select name="year" id="year" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value=""><?php echo e(get_phrase('Select a year')); ?></option>
                <?php for($year = 2015; $year <= date('Y'); $year++){ ?>
                  <option value="<?php echo e($year); ?>"<?php echo e($page_data['year'] == $year ?  'selected':''); ?>><?php echo e($year); ?></option>
                <?php } ?>

              </select>
            </div>
                      <div class="att-filter-option">

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

            <div class="att-filter-option">
              <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                  <?php foreach($classes as $class): ?>
                      <option value="<?php echo e($class['id']); ?>" <?php echo e($page_data['class_id'] == $class['id'] ?  'selected':''); ?>><?php echo e($class['name']); ?></option>
                  <?php endforeach; ?>
              </select>
            </div>


          <div class="att-filter-option">
            <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
              <option value=""><?php echo e(get_phrase('Select section')); ?></option>
              <option value="1"><?php echo e(get_phrase('الترم الاول')); ?></option>
              <option value="2"><?php echo e(get_phrase('الترم التاني')); ?></option>
            </select>
          </div>
            <div class="att-filter-btn">
              <button class="eBtn eBtn btn-secondary" type="submit" ><?php echo e(get_phrase('Filter')); ?></button>
            </div>
            <?php if(count($attendance_of_students) > 0): ?>
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
                  <button class="dropdown-item" href="#" onclick="Export()" ><?php echo e(get_phrase('PDF')); ?></button>
                </li>
              </ul>
            </div>
            <?php endif; ?>
          </div>
        </form>
        <!-- Attendance banner -->
        <div id="pdf_table">
        <?php if(count($attendance_of_students) > 0): ?>
        
        <div class="att-report-banner d-flex justify-content-center justify-content-md-between align-items-center flex-wrap">
          <div class="att-report-summary order-1">
            <h4 class="title"><?php echo e(get_phrase('Attendance Report Of').' '.date('F', $page_data['attendance_date']).', '.date('Y', $page_data['attendance_date'])); ?></h4>
            <p class="summary-item"><?php echo e(get_phrase('Class')); ?>: <span><?php echo e($class_name); ?></span></p>
            <p class="summary-item"><?php echo e(get_phrase('Section')); ?>: <span><?php echo e($section_name); ?></span></p>
        <!-- Attendance table -->

          <div class="att-title">
             <h4 class="att-title-header"> <?php echo e(ucfirst('Student')); ?> /  <?php echo e(get_phrase('Date')); ?></h4>
                  </div>

                <div class="att-table" id="pdf_table">
                  <table class="table eTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo e(get_phrase('name')); ?></th>
                        <th scope="col"><?php echo e(get_phrase('date')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                          <td><h4><?php echo e($groups->where('id',$class_room_id)->first()->name); ?></h4></td>
                          <?php echo e($date=''); ?>

              <?php $__currentLoopData = $attendance_of_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_of_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($date!=date('Y-m-d',strtotime($attendance_of_student['timestamp']))): ?>
                                                                        <tr>
                          <td><h4 ><?php echo e($date=date('Y-m-d',strtotime($attendance_of_student['timestamp']))); ?></h4></td>
                                                                        </tr>
                          <?php endif; ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($user_details = User::where('id',$attendance_of_student['student_id'])->first()->name); ?></td>
                                    <td><?php echo e($date=date('Y-m-d',strtotime($attendance_of_student['timestamp']))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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

       const element = document.getElementById("pdf_table");

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



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mentor/public_html/resources/views/admin/attendance/attendance_list.blade.php ENDPATH**/ ?>