<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.branch') }}">
    @csrf 
    <div class="form-row">
                <div class="fpb-7">
            <label for="name" class="eForm-label">{{ get_phrase('name') }}</label>
            <input type="text" class="form-control eForm-control" id="name" name = "name" required>
        </div>
                <div class="fpb-7">
            <label for="email" class="eForm-label">{{ get_phrase('email') }}</label>
            <input type="text" class="form-control eForm-control" id="email" name = "email" required>
        </div>
                <div class="fpb-7">
            <label for="phone" class="eForm-label">{{ get_phrase('phone') }}</label>
            <input type="integer" min=0 class="form-control eForm-control" id="phone" name = "phone" required>
        </div>
                <div class="fpb-7">
            <label for="address" class="eForm-label">{{ get_phrase('address') }}</label>
            <input type="text" class="form-control eForm-control" id="address" name = "address" required>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit">{{ get_phrase('Create branch') }}</button>
        </div>

    </div>
</form>