@extends('admin.navigation')
   
@section('content')
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('qr groups') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('Academic') }}</a></li>
              <li><a href="#">{{ get_phrase('qr groups') }}</a></li>
            </ul>
          </div>
          {{-- <div class="export-btn-area"> --}}
            {{-- <a href="javascript:;" class="export_btn" onclick="rightModal('{{ route('admin.group_question.open_modal') }}', '{{ get_phrase('Add Exam question') }}')">{{ get_phrase('Add Exam question') }}</a> --}}
          {{-- </div> --}}
        </div>
      </div>
    </div>
</div>
<!-- Start qr groups area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            @if(isset($groups) > 0)
            <!-- Table -->
            <div class="table-responsive">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ get_phrase('group name') }}</th>
                            <th scope="col" class="text-end">{{ get_phrase('Options') }}</th>
                        </tr>
                	</thead>
                	<tbody>
                		@foreach($groups as $key => $group)
                		<tr>
                			<td>
                				{{ $key+1 }}
                			</td>
                			<td>
                                {{ $group['name'] }}
    						</td>
    						<td class="text-center">
                  <a class="export_btn"
                                        href='{{ route('admin.qr_list', ['id' => $group->id]) }}'>
                                        {{ get_phrase('go to qr groups') }}
                                      </a>

                                {{-- <div class="adminTable-action"> --}}
                                    {{-- <button
                                        type="button"
                                        class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        {{ get_phrase('Actions') }}
                                    </button> --}}
                                    {{-- <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                                    >
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('{{ route('admin.edit.question', ['id' => $question->id]) }}', '{{ get_phrase('Edit qr groups') }}')">{{ get_phrase('Edit') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="confirmModal('{{ route('admin.qr groups.delete', ['id' => $question->id]) }}', 'undefined');">{{ get_phrase('Delete') }}</a>
                                        </li>
                                    </ul> --}}
                                {{-- </div>					 --}}
    						</td>
                		</tr>
                		@endforeach
                	</tbody>
                </table>
            </div>
            @else
            <div class="group_catrgories_content">
                <div class="empty_box center">
                    <img class="mb-3" width="150px" src="{{ asset('assets/images/empty_box.png') }}" />
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- End qr groups area -->
@endsection