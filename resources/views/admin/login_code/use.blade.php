<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.code.use', ['id' => $code->id]) }}">
    @csrf 
    <div class="form-row">
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit">{{ get_phrase('use code' ) }}</button>
        </div>

    </div>
</form>