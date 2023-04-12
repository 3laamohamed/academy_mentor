@extends('admin.navigation')

@section('content')

<?php 

use App\Http\Controllers\CommonController;
use App\Models\School;
use App\Models\Section;

?>

<div class="mainSection-title">
  <div class="row">
    <div class="col-12">
      <div
      class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{$student->name}} report</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('Users') }}</a></li>
              <li><a href="#">{{ get_phrase('Students') }}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start Students area -->
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
                    {{ get_phrase('Export') }}
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end eDropdown-menu-2"
                  >
                    <li>
                        <a class="dropdown-item" id="pdf" href="javascript:;" onclick="Export()">{{ get_phrase('PDF') }}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" id="print" href="javascript:;" onclick="printableDiv('student_list')">{{ get_phrase('Print') }}</a>
                    </li>
                  </ul>
                </div>

<div class="row" id="student_list">
    <div class="col-12">
        
        <div class="eSection-wrap">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                </div>
            </div>
            <h4>{{$student->name}} exams</h4>
            <div class="card-body exam_content" id="offline_exam_export"></div>
                <div class="table-responsive">
                    <table class="table eTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Exam name') }}</th>
                                <th scope="col">{{ get_phrase('student degree') }}</th>
                                <th scope="col">{{ get_phrase('total degree') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $exam_data->find($exam->exam_id)->name ??'deleted exam'}}</td>
                                    <td>{{ $exam->exam_degree??'-' }}</td>
                                    <td>{{ $exam_data->find($exam->exam_id)->total_marks??'deleted exam' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="eSection-wrap">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                </div>
            </div>
            <h4>{{$student->name}} attendance report</h4>
            <div class="card-body exam_content" id="offline_exam_export">
                <div class="table-responsive">
                    <table class="table eTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('class') }}</th>
                                <th scope="col">{{ get_phrase('section') }}</th>
                                <th scope="col">{{ get_phrase('session') }}</th>
                                <th scope="col">{{ get_phrase('date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $classes->where('id',$attendance->class_id)->first()->name ??'-'}}</td>
                                    @if ($attendance->section_id==1)
                                        <td>التيرم الاول</td>
                                    @else
                                        <td>التيرم الثاني</td>
                                    @endif
                                    <td>{{ $active_session->where('id',$attendance->session_id)->first()->session_title ??'-' }}</td>
                                    <td>{{ date('Y-m-d', strtotime($attendance->timestamp)); }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Students area -->
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