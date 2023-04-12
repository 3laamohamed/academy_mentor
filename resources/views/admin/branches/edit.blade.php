<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.branch.edit', ['id' => $branch->id]) }}">
    @csrf 
    <div class="form-row">
                <div class="fpb-7">
            <label for="name" class="eForm-label">{{ get_phrase('name') }}</label>
            <input type="text" class="form-control eForm-control" id="name" name = "name" required value=' {{$branch->name}}'>
        </div>
                <div class="fpb-7">
            <label for="email" class="eForm-label">{{ get_phrase('email') }}</label>
            <input type="text" class="form-control eForm-control" id="email" name = "email" required value=' {{$branch->email}}'>
        </div>
                <div class="fpb-7">
            <label for="phone" class="eForm-label">{{ get_phrase('phone') }}</label>
            <input type="integer" min=0 class="form-control eForm-control" id="phone" name = "phone" required value=' {{$branch->phone}}'>
        </div>
                <div class="fpb-7">
            <label for="address" class="eForm-label">{{ get_phrase('address') }}</label>
            <input type="text" class="form-control eForm-control" id="address" name = "address" required value=' {{$branch->address}}'>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit">{{ get_phrase('edit branch') }}</button>
        </div>

    </div>
</form>