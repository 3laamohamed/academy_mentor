@extends('admin.navigation')

@section('content')
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('school branches') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('school branches') }}</a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('{{ route('admin.branches.open_modal') }}', '{{ get_phrase('Add branches') }}')">{{ get_phrase('Add branch') }}</a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start codes area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            @if(isset($branches) > 0)
            <!-- Table -->
            <div class="table-responsive">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ get_phrase('name') }}</th>
                            <th scope="col">{{ get_phrase('phone') }}</th>
                            <th scope="col">{{ get_phrase('email') }}</th>
                            <th scope="col">{{ get_phrase('address') }}</th>
                            <th scope="col" class="text-end">{{ get_phrase('Options') }}</th>
                        </tr>
                	</thead>
                	<tbody>
                      		@foreach($branches as $key => $branch)
                		<tr class="@if($branch->delete == 1) text-danger @endif">
                			<td>
                				{{ $key+1 }}
                			</td>
                			<td>
                                {{ $branch->name }}
    						</td>
                			<td>
                                {{ $branch->phone }}
    						</td>
                			<td>
                                {{ $branch->email }}
    						</td>
                			<td>
                                {{ $branch->address }}
    						</td>
    						<td class="text-center">
                                <div class="adminTable-action">
                                    <button
                                        type="button"
                                        class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        {{ get_phrase('Actions') }}
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                                    >
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('{{ route('admin.edit.branch', ['id' => $branch->id]) }}', '{{ get_phrase('edit branch') }}')">{{ get_phrase('edit') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.branch.activationBranch',['id'=>$branch->id,'status'=>$branch->delete]) }}">@if($branch->delete == 1) Active @else Inactive @endif</a>
                                        </li>
                                    </ul>
                                </div>
    						</td>
                		</tr>
                		@endforeach
                	</tbody>
                </table>
            </div>
            @else
            <div class="login_codes_catrgories_content">
                <div class="empty_box center">
                    <img class="mb-3" width="150px" src="{{ asset('assets/images/empty_box.png') }}" />
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- End codes area -->
@endsection
