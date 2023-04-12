<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('video.update', ['id' => $video->id]) }}">
         @csrf 
        <div class="form-row">  
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                <input type="text" class="form-control eForm-control" id="name" name = "title" value='{{$video->title}}' required>
            </div>
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Url') }}</label>
                <input type="url" class="form-control eForm-control" id="url" name = "url" value='{{$video->url}}' required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('edit Video') }}</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });
</script>