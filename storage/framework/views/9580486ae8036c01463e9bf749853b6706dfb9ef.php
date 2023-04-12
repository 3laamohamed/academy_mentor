<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.login_codes')); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7">
            <label for="number_of_codes" class="eForm-label"><?php echo e(get_phrase('number of codes')); ?></label>
            <input type="number" min='1' class="form-control eForm-control" id="number_of_codes" name = "number_of_codes" required>
        </div>
        
        <div class="fpb-7">
            <label for="ending_date" class="eForm-label"><?php echo e(get_phrase('Ending date')); ?><span class="required">*</span></label>
            <input type="text" class="form-control eForm-control inputDate" id="ending_date" name="ending_date" value="<?php echo e(date('m/d/Y')); ?>" />
        </div>

        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('Create login codes')); ?></button>
        </div>

    </div>
</form>
<script type="text/javascript">

  "use strict";


    function classWiseSubject(classId) {
        let url = "<?php echo e(route('admin.class_wise_subject', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id').html(response);
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
$('#exam_type').on('change',function(){
    if(this.value==1){
        $('#form_total_marks_input').remove();
    }else{
        $('#form_total_marks').append(
                '<div id="form_total_marks_input">'
                +'<label for="total_marks" class="eForm-label"><?php echo e(get_phrase("Total marks")); ?><span class="required">*</span></label>'
                +'<div>'
                    +'<input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks">'
               +'</div>'
            +'</div>');
    }
});
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

</script><?php /**PATH /home/mentor/public_html/resources/views/admin/login_code/create.blade.php ENDPATH**/ ?>