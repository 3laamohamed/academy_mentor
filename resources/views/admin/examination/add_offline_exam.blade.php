<?php
date_default_timezone_set('Africa/Cairo');
?>
<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.offline_exam') }}">
        @csrf
        <div class="form-row">

            <div class="fpb-7">
                <label for="exam_name" class="eForm-label">{{ get_phrase('Exam Name') }}</label>
                <input type="text" class="form-control eForm-control" id="exam_name" name="exam_name" />

            </div>
                        <div>
                          <label for="class_room_id" class="eForm-label"
                            >{{ get_phrase('group') }}</label
                            >
                            <select
                            class="form-select" name="class_room_id[]"
                            id="class_room_id"  multiple
                          >
                          <option value="">{{ get_phrase('Select a group') }}</option>
                          @foreach($groups as $group)
                          <option value="{{ $group->id }}">{{ $group->name }}</option>
                          @endforeach
                        </select>
                      </div>
            <div class="fpb-7">
                <label for="class_id" class="eForm-label">{{ get_phrase('Class') }}</label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSubject(this.value)">
                    <option value="">{{ get_phrase('Select a class') }}</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="fpb-7">
                <label for="category_id" class="eForm-label">{{ get_phrase('category') }}</label>
                <select name="category_id" id="category_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">{{ get_phrase('Select a category') }}</option>
                     @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="fpb-7">
                <label for="subject_" class="eForm-label">{{ get_phrase('subject') }}</label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">{{ get_phrase('Select a subject') }}</option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="type" class="eForm-label">{{ get_phrase('type') }}<span class="required"></span></label>
                <select name="exam_type" id="exam_type" class="form-select eForm-select eChoice-multiple-with-remove" required >
                    <option value="">{{ get_phrase('Select exam type') }}</option>

                    <option value="1">online</option>
                    <option value="0">offline</option>
                </select>
            </div>
            <div class="fpb-7">
                <label for="is_exercise" class="eForm-label">{{ get_phrase('exam category') }}<span class="required"></span></label>
                <select name="is_exercise" id="is_exercise" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">{{ get_phrase('Select exam category') }}</option>

                    <option value="1">exercise</option>
                    <option value="0">exam</option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="starting_date" class="eForm-label">{{ get_phrase('Starting date') }}<span class="required">*</span></label>
                <input type="text" class="form-control eForm-control inputDate" id="starting_date" name="starting_date" value="{{ date('m/d/Y') }}" />
            </div>

            <div class="fpb-7">
                <label for="starting_time" class="eForm-label">{{ get_phrase('Starting time') }}<span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="starting_time" name="starting_time" value="{{ date('H:i', strtotime(date('H:i'))) }}">
            </div>

            <div class="fpb-7">
                <label for="ending_date" class="eForm-label">{{ get_phrase('Ending date') }}<span class="required">*</span></label>
                <input type="text" class="form-control eForm-control inputDate" id="ending_date" name="ending_date" value="{{ date('m/d/Y') }}" />
            </div>

            <div class="fpb-7">
                <label for="ending_time" class="eForm-label">{{ get_phrase('Ending time') }}<span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="ending_time" name="ending_time" value="{{ date('H:i', strtotime(date('H:i'))) }}">
            </div>

            <div class="fpb-7" id="form_total_marks">
            </div>

            <div class="fpb-7">
                <label for="duration" class="eForm-label">{{ get_phrase('duration') }}<span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="duration" type="number" min="1" name="duration">
                </div>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Create') }}</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">

  "use strict";


    function classWiseSubject(classId) {
        let url = "{{ route('admin.class_wise_subject', ['id' => ":classId"]) }}";
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
                +'<label for="total_marks" class="eForm-label">{{ get_phrase("Total marks") }}<span class="required">*</span></label>'
                +'<div>'
                    +'<input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks">'
               +'</div>'
            +'</div>');
    }
});
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

</script>
