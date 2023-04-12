@extends('admin.navigation')

@section('content')
    <div class="row">
        <div class="col-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Student: {{\App\Models\User::find($exams->user_id)->name}}</li>
                <li class="list-group-item">Total Degree: {{\App\Models\Exam::find($exams->exam_id)->total_marks}}</li>
                <li class="list-group-item">Student Degree: {{$exams->exam_degree}}</li>
            </ul>
        </div>
        <div class="col-8">
            @if($exams->answers->count() != 0)
            @foreach($exams->answers as $exam)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-10">{{$exam->title}}</div>
                            <div class="col-2">@if($exam->is_correct == 'true'){{$exam->degree}} @else 0 @endif / {{$exam->degree}}</div>
                        </div>
                    </li>
                    @if($exam->is_correct == 'true')
                        @foreach(json_decode($exam->student_answers , true) as $student_answer)
                            <li class="list-group-item bg-success">{{$student_answer['title']}}</li>
                        @endforeach
                    @else
                        @foreach(json_decode($exam->student_answers , true) as $student_answer)
                            <li class="list-group-item bg-danger">{{$student_answer['title']}}</li>
                        @endforeach
                        @foreach(json_decode($exam->correct_answers , true) as $correct_answers)
                            <li class="list-group-item bg-success">{{$correct_answers['title']}}</li>
                        @endforeach
                    @endif
                </ul>
                <br>
            @endforeach
            @else
                <div class="col-12 text-center">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Not Found Data</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>



<script type="text/javascript">

        "use strict";
        function classWiseSection(classId) {
            let url = "{{ route('class_wise_sections', ['id' => ":classId"]) }}";
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
                filename:     'student_list_{{ date("y-m-d") }}.pdf',
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
@endsection
