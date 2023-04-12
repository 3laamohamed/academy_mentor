@extends('admin.navigation')
   
@section('content')
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('privacy policy') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('privacy policy') }}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
              <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.policy.create') }}">
                  @csrf 
                <div class="form-row">
                      <div class="fpb-7">
                          <label for="privacy_policy" class="eForm-label">{{ get_phrase('privacy policy') }}</label>
                          <textarea  type="area" class="form-control eForm-control" name="privacy_policy" style="height: 450px;" required>
                          @if(isset($policy))
                          {{$policy->policy}}
                          @endif
                          </textarea>
                      </div>

                      <div class="fpb-7 pt-2">
                          <button class="btn-form" type="submit">{{ get_phrase('Save') }}</button>
                      </div>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection