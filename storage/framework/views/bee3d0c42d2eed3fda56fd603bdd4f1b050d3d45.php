<?php use App\Models\Section; ?>
<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.student.update', ['id' => $user->id])); ?>">
         <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($user->name); ?>" id="name" name = "name" required>
            </div>

            <div class="fpb-7">
                <label for="email" class="eForm-label"><?php echo e(get_phrase('Email')); ?></label>
                <input type="email" class="form-control eForm-control" value="<?php echo e($user->email); ?>" id="email" name = "email" required>
            </div>

            <div class="fpb-7">
                <label for="branch_id" class="eForm-label"><?php echo e(get_phrase("Branch")); ?></label>
                <select name="branch_id" id="branch_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo e(get_phrase('Select a branch')); ?></option>
                    <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($branch->id); ?>" <?php echo e($user->branch_id == $branch->id ?  'selected':''); ?>><?php echo e($branch->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="fpb-7">
                <label for="getClassId" class="eForm-label"><?php echo e(get_phrase("Class")); ?></label>
                <select name="class_id" id="getClassId" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>" <?php echo e($student_details['class_id'] == $class->id ?  'selected':''); ?>><?php echo e($class->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="fpb-7">
                <label for="select_class_room_id" class="eForm-label">group</label>
                <select name="class_room_id" id="select_class_room_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo e(get_phrase('group')); ?></option>
                    <?php $__currentLoopData = $classs_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($room->id); ?>" <?php echo e($user->class_room_id == $room->id ?  'selected':''); ?>><?php echo e($room->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            

            <?php
            $info = json_decode($user->user_information);
            ?>
<?php if($info!=null): ?>
            <div class="fpb-7">
                <label for="birthday" class="eForm-label"><?php echo e(get_phrase('Birthday')); ?><span class="required"></span></label>
                <input type="text" class="form-control eForm-control inputDate" id="birthday" name="birthday" value="<?php echo e(date('m/d/Y', $info->birthday)); ?>" />
                </div>
            </div>

            <div class="fpb-7">
                <label for="gender" class="eForm-label"><?php echo e(get_phrase('Gender')); ?></label>
                <select name="gender" id="gender" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                    <option value=""><?php echo e(get_phrase('Select gender')); ?></option>
                    <option value="Male" <?php echo e($info->gender == 'Male' ?  'selected':''); ?> ><?php echo e(get_phrase('Male')); ?></option>
                    <option value="Female" <?php echo e($info->gender == 'Female' ?  'selected':''); ?>><?php echo e(get_phrase('Female')); ?></option>
                    <option value="Others" <?php echo e($info->gender == 'Others' ?  'selected':''); ?>><?php echo e(get_phrase('Others')); ?></option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="phone" class="eForm-label"><?php echo e(get_phrase('Phone number')); ?></label>
                <input type="text" class="form-control eForm-control" value="<?php echo e($info->phone); ?>" id="phone" name = "phone" placeholder="Provide student number" required>
            </div>
            <div class="fpb-7">
                <label for="blood_group" class="eForm-label"><?php echo e(get_phrase('Blood group')); ?></label>
                <select name="blood_group" id="blood_group" class="form-select eForm-select eChoice-multiple-with-remove">
                    <option value=""><?php echo e(get_phrase('Select a blood group')); ?></option>
                    <option value="a+" <?php echo e($info->blood_group == 'a+' ?  'selected':''); ?> ><?php echo e(get_phrase('A+')); ?></option>
                    <option value="a-" <?php echo e($info->blood_group == 'a-' ?  'selected':''); ?> ><?php echo e(get_phrase('A-')); ?></option>
                    <option value="b+" <?php echo e($info->blood_group == 'b+' ?  'selected':''); ?> ><?php echo e(get_phrase('B+')); ?></option>
                    <option value="b-" <?php echo e($info->blood_group == 'b-' ?  'selected':''); ?> ><?php echo e(get_phrase('B-')); ?></option>
                    <option value="ab+" <?php echo e($info->blood_group == 'ab+' ?  'selected':''); ?> ><?php echo e(get_phrase('AB+')); ?></option>
                    <option value="ab-" <?php echo e($info->blood_group == 'ab-' ?  'selected':''); ?> ><?php echo e(get_phrase('AB-')); ?></option>
                    <option value="o+" <?php echo e($info->blood_group == 'o+' ?  'selected':''); ?> ><?php echo e(get_phrase('O+')); ?></option>
                    <option value="o-" <?php echo e($info->blood_group == 'o-' ?  'selected':''); ?> ><?php echo e(get_phrase('O-')); ?></option>
                </select>
            </div>
                        <div class="fpb-7">
                <label for="phone" class="eForm-label"><?php echo e(get_phrase('Address')); ?></label>
                <textarea class="form-control eForm-control" id="address" name = "address" rows="5" placeholder="Provide student address" required><?php echo e($info->address); ?></textarea>
            </div>
<?php else: ?>
            <div class="fpb-7">
                <label for="birthdatepicker" class="eForm-label"><?php echo e(get_phrase('Birthday')); ?><span class="required"></span></label>
                <input type="text" class="form-control eForm-control" id="eInputDate" name="birthday" value="<?php echo e(date('m/d/Y')); ?>" />
            </div>

            <div class="fpb-7">
                <label for="gender" class="eForm-label"><?php echo e(get_phrase('Gender')); ?></label>
                <select name="gender" id="gender" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                    <option value=""><?php echo e(get_phrase('Select gender')); ?></option>
                    <option value="Male"><?php echo e(get_phrase('Male')); ?></option>
                    <option value="Female"><?php echo e(get_phrase('Female')); ?></option>
                    <option value="Others"><?php echo e(get_phrase('Others')); ?></option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="phone" class="eForm-label"><?php echo e(get_phrase('Phone number')); ?></label>
                <input type="text" class="form-control eForm-control" id="phone" name = "phone" required>
            </div>

            <div class="fpb-7">
                <label for="blood_group" class="eForm-label"><?php echo e(get_phrase('Blood group')); ?></label>
                <select name="blood_group" id="blood_group" class="form-select eForm-select eChoice-multiple-with-remove">
                    <option value=""><?php echo e(get_phrase('Select a blood group')); ?></option>
                    <option value="a+"><?php echo e(get_phrase('A+')); ?></option>
                    <option value="a-"><?php echo e(get_phrase('A-')); ?></option>
                    <option value="b+"><?php echo e(get_phrase('B+')); ?></option>
                    <option value="b-"><?php echo e(get_phrase('B-')); ?></option>
                    <option value="ab+"><?php echo e(get_phrase('AB+')); ?></option>
                    <option value="ab-"><?php echo e(get_phrase('AB-')); ?></option>
                    <option value="o+"><?php echo e(get_phrase('O+')); ?></option>
                    <option value="o-"><?php echo e(get_phrase('O-')); ?></option>
                </select>
            </div>
            <div class="fpb-7">
                <label for="phone" class="eForm-label"><?php echo e(get_phrase('Address')); ?></label>
                <textarea class="form-control eForm-control" id="address" name = "address" rows="5" required></textarea>
            </div>

<?php endif; ?>


            <div class="fpb-7">
              <label for="formFile" class="eForm-label"
                ><?php echo e(get_phrase('Photo')); ?></label
              >
              <input
                class="form-control eForm-control-file"
                id="photo" name="photo" accept="image/*"
                type="file"
              />
            </div>
                        <div class="fpb-7">
                <label for="password" class="eForm-label"><?php echo e(get_phrase('new Password')); ?></label>
                <input type="password" class="form-control eForm-control" id="password" name = "password" >
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

    function classWiseSection(classId) {
        let url = "<?php echo e(route('admin.class_wise_sections', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id').html(response);
            }
        });
    }

    $(function () {
      $('.inputDate').daterangepicker(
        {
          singleDatePicker: true,
          showDropdowns: true,
          minYear: 1901,
          maxYear: parseInt(moment().format("YYYY"), 10),
        },
        function (start, end, label) {
          var years = moment().diff(start, "years");
        }
      );
    });

    $(document).ready(function(){
        console.log('alaa');
        $('#getClassId').change(function (e)
        {
            e.preventDefault()
            let classId = $(this).val();
            let branchId = $('#branch_id').val();
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(route('admin.student.getClassRoom')); ?>",
                method:'post',
                data:{branchId,classId,_token},
                success:function(data)
                {
                    var html = '';
                    html+=`<option value=""><?php echo e(get_phrase('Select a class room')); ?></option>`
                    for(var count = 0 ; count < data.length ; count++)
                    {
                        html+=`<option value="${data[count].id}">${data[count].name}</option>`
                    }
                    $('#select_class_room_id').html(html);
                    $('#select_class_room_id').select2();
                }
            });
        });
    });
</script>
<?php /**PATH /home/mentor/public_html/resources/views/admin/student/edit_student.blade.php ENDPATH**/ ?>