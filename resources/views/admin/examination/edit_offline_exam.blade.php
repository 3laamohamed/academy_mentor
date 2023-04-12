<?php

use App\Models\ExamCategory;

$category_details = ExamCategory::where('name', $exam->name)->first();
date_default_timezone_set('Africa/Cairo');
?>

<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.offline_exam.update', ['id' => $exam->id]) }}">
        @csrf
        <div class="form-row">

            <div class="fpb-7">
                <label for="exam_name" class="eForm-label">{{ get_phrase('Exam Name') }}</label>
                <input type="text" class="form-control eForm-control" id="exam_name" name="exam_name" value="{{$exam->name}}" />
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
                          <option value="{{ $group->id }}"
                            @if ($exam->class_room_ids!=null&&$exam->class_room_ids!='')
                            
                            >{{ $group->name }}</option>
                            @endif
                                                        >{{ $group->name }}</option>

                          @endforeach
                        </select>
                      </div>
            <div class="fpb-7">
                <label for="class_id" class="eForm-label">{{ get_phrase('Class') }}</label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required onchange="classWiseSubjectOnExamEdit(this.value)">
                    <option value="">Select a class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" >{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
                                <div class="fpb-7">
                <label for="category_id" class="eForm-label">{{ get_phrase('category') }}</label>
                <select name="category_id" id="category_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value={{$categories->where('id',$exam->category_id)->first()->id}}>{{ get_phrase($categories->where('id',$exam->category_id)->first()->name) }}</option>
                     @foreach($categories as $category)
                    @if($category->id !=$exam->category_id)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="fpb-7">
                <label for="subject_id" class="eForm-label">{{ get_phrase('Subject') }}</label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required >
                    <option value="">Select a subject</option>
                    {{-- @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $exam->subject_id == $subject->id ?  'selected':'' }}>{{ $subject->name }}</option>
                    @endforeach --}}
                </select>
            </div>
                        <div class="fpb-7">
                <label for="type" class="eForm-label">{{ get_phrase('type') }}<span class="required"></span></label>
                <select name="exam_type" id="exam_type" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option {{ $exam->exam_type == 1 ?  'selected':'' }} value="1">online</option>
                    <option {{ $exam->exam_type == 0 ?  'selected':'' }} value="0">offline</option>
                </select>
            </div>
                        <div class="fpb-7">
                <label for="type" class="eForm-label">{{ get_phrase('exam category') }}<span class="required"></span></label>
                <select name="is_exercise" id="is_exercise" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option {{ $exam->is_exercise == 1 ?  'selected':'' }} value="1">exercise</option>
                    <option {{ $exam->is_exercise == 0 ?  'selected':'' }} value="0">exam</option>
                </select>
            </div>


            <div class="fpb-7">
                <label for="starting_date" class="eForm-label">{{ get_phrase('Starting date') }}<span class="required">*</span></label>
                <input type="date" class="form-control eForm-control" id="eInputDate" name="starting_date" value="{{ date('Y-m-d', $exam->starting_time) }}">
            </div>

            <div class="fpb-7">
                <label for="starting_time" class="eForm-label">{{ get_phrase('Starting time') }}<span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="starting_time" name="starting_time" value="{{ date('H:i', $exam->starting_time) }}">
            </div>

            <div class="fpb-7">
                <label for="ending_date" class="eForm-label">{{ get_phrase('Ending date') }}<span class="required">*</span></label>
                <input type="date" class="form-control eForm-control" id="eInputDate" name="ending_date" value="{{ date('Y-m-d', $exam->ending_time) }}">
            </div>

            <div class="fpb-7">
                <label for="ending_time" class="eForm-label">{{ get_phrase('Ending time') }}<span class="required">*</span></label>
                <input type="time" class="form-control eForm-control" id="ending_time" name="ending_time" value="{{ date('H:i', $exam->ending_time) }}">
            </div>
@if ($exam->exam_type==0)

<div class="fpb-7" id='form_total_marks'>
    <div id='form_total_marks_input'>
        <label for="total_marks" class="eForm-label">{{ get_phrase('Total marks') }}<span class="required">*</span></label>
        <div>
            <input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks" value="{{ $exam->total_marks }}" >
        </div>
    </div>
</div>
@else
<div class="fpb-7" id='form_total_marks'>
    </div>

@endif
                        <div class="fpb-7">
                <label for="duration" class="eForm-label">{{ get_phrase('duration') }}<span class="required">*</span></label>
                <div>
                    <input class="form-control eForm-control" id="duration" type="number" min="1" name="duration" value="{{ $exam->duration }}">
                </div>
            </div>


            <div class="fpb-7">
                <button class="btn-form" type="submit">{{ get_phrase('Update') }}</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">

  "use strict";


    function classWiseSubjectOnExamEdit(classId) {
        let url = "{{ route('admin.class_wise_subject', ['id' => ":classId"]) }}";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id').html(response);
            }
        });
    }

    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
$('#exam_type').on('change',function(){
    if(this.value==1){
        $('#form_total_marks_input').remove();
    }else{

                 $('#form_total_marks').append(
                '<div id="form_total_marks_input">'
                +'<label for="total_marks" class="eForm-label">{{ get_phrase("Total marks") }}<span class="required">*</span></label>'
                +'<div>'
                    +' <input class="form-control eForm-control" id="total_marks" type="number" min="1" name="total_marks" value="{{ $exam->total_marks }}" >'
               +'</div>'
            +'</div>');

    }
});
</script>
