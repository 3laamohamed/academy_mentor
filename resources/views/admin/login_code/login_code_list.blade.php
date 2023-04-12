@extends('admin.navigation')
   
@section('content')
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('codes') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('settings') }}</a></li>
              <li><a href="#">{{ get_phrase('codes') }}</a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('{{ route('admin.login_code.open_modal') }}', '{{ get_phrase('Add login codes') }}')">{{ get_phrase('Add login codes') }}</a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start codes area -->
<div class="row">
    <div class="col-7 offset-md-2">
        <div class="eSection-wrap">
            @if(isset($codes) > 0)
            <!-- Table -->
            <div class="table-responsive">
                <table class="table eTable">
                	<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ get_phrase('codes') }}</th>
                            <th scope="col">{{ get_phrase('used') }}</th>
                            <th scope="col">{{ get_phrase('expiry date') }}</th>
                            {{-- <th scope="col" class="text-end">{{ get_phrase('Options') }}</th> --}}
                        </tr>
                	</thead>
                	<tbody>
                		@foreach($codes as $key => $code)
                		<tr>
                			<td>
                				{{ $key+1 }}
                			</td>
                      @if($code->used=='used')
                			<td style="color: red ;text-decoration: line-through">
                                {{ $code['code'] }}
    						      </td>                     
                       @else
                             			<td>
                                {{ $code['code'] }}
    						      </td>  
                       @endif
                			<td>
                                {{ $code['used'] }}
    						</td>
                			<td>
                                {{ $code['expiry_date']??'not sett' }}
    						</td>
    						{{-- <td class="text-center">
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
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('{{ route('admin.use.code', ['id' => $code->id]) }}', '{{ get_phrase('use codes') }}')">{{ get_phrase('use') }}</a>
                                        </li>

                                    </ul>
                                </div>					
    						</td> --}}
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