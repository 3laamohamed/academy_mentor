@extends('admin.navigation')
   
@section('content')
 
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('videos') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('Academic') }}</a></li>
              <li><a href="#">{{ get_phrase('Subjects') }}</a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="javascript:;" class="export_btn" onclick="rightModal('{{ route('admin.video.open_modal',$id) }}', '{{ get_phrase('Create Video') }}')"><i class="bi bi-plus"></i>{{ get_phrase('Add Video') }}</a>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-8 offset-md-2">
        <div class="eSection-wrap"> 

            @if(count($videos) > 0)
            <div class="table-responsive" style="min-height: 250px;">
                <table class="table eTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ get_phrase('Name') }}</th> 
                            <th class="text-end">{{ get_phrase('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $row)
                             <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td> {{ $row->title }} </td>
                                <td class="text-start">
                                    <div class="adminTable-action">
                                        <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2"  data-bs-toggle="dropdown" aria-expanded="false" >
                                          {{ get_phrase('Actions') }}
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"> 
                                          <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="rightModal('{{ route('video.open_edit_modal', ['id' => $row->id]) }}', '{{ get_phrase('Edit video') }}')">{{ get_phrase('Edit') }}</a>
                                          </li>
                                          <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="confirmModal('{{ route('admin.video.delete', ['id' => $row->id]) }}', 'undefined');">{{ get_phrase('Delete') }}</a>
                                          </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $rows->links() !!} --}}
            </div>
            @else
            <div class="empty_box center">
              <img class="mb-3" width="150px" src="{{ asset('assets/images/empty_box.png') }}" />
              <br>
              <span class="">{{ get_phrase('No data found') }}</span>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection