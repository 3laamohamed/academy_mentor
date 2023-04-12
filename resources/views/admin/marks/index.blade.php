@extends('admin.navigation')
   
@section('content')
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('Manage Marks') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('Examination') }}</a></li>
              <li><a href="#">{{ get_phrase('Marks') }}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
             <div class="row">
                {{-- <div class="row justify-content-md-center"> --}}
                    <table class="table eTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('classes') }}</th>
                                <th scope="col">{{ get_phrase('Exam name') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $class->name }}</td>
                                    <td>
                                     @foreach ($exams->where('class_id',$class->id) as $exam)
                                        <a href='{{route("admin.marks.list",["id"=>$exam->id])}}'>
                                        {{$exam->name}} /
                                        </a>
                                    @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script type="text/javascript">

  "use strict";

    function classWiseSection(classId) {
        let url = "{{ route('admin.class_wise_sections', ['id' => ":classId"]) }}";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id').html(response);
                classWiseSubect(classId);
            }
        });
    }

    function classWiseSubect(classId) {
        let url = "{{ route('admin.class_wise_subject', ['id' => ":classId"]) }}";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id').html(response);
            }
        });
    }

    function filter_marks(){
        var exam_category_id = $('#exam_category_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var subject_id = $('#subject_id').val();
        if(exam_category_id != "" &&  class_id != "" && section_id!= "" && subject_id!= ""){
            getFilteredMarks();
        }else{
            toastr.error('{{ get_phrase('Please select all the fields') }}');
        }
    }

    var getFilteredMarks = function() {
        var exam_category_id = $('#exam_category_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var subject_id = $('#subject_id').val();
        if(exam_category_id != "" &&  class_id != "" && section_id!= "" && subject_id!= ""){
            let url = "{{ route('admin.marks.list') }}";
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {exam_category_id: exam_category_id, class_id : class_id, section_id : section_id, subject_id: subject_id},
                success: function(response){
                    $('.marks_content').html(response);
                }
            });
        }
    }

</script> --}}