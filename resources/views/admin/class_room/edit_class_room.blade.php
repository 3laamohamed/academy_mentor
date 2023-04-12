<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.class_room.update', ['id' => $class_room->id]) }}">
         @csrf 
         <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                <input type="text" class="form-control eForm-control" value="{{ $class_room->name }}" id="name" name = "name" required>
            </div>
                    <div class="fpb-7">
            <label for="expense_category_id" class="eForm-label">{{ get_phrase('branch') }}</label>
            <select class="form-select eForm-select eChoice-multiple-with-remove" name="branch_id" id = "branch_id" required>
                <option value="{{ $current_branch->id}}">{{ $current_branch->name}}</option>
                @foreach ($branches as $branch)
                @if ($current_branch->id!=$branch->id)    
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
                    <div class="fpb-7">
                <label for="class_id" class="eForm-label">{{ get_phrase("Class") }}</label>
                <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" required ">
                    @if ($current_class==null)
                     <option value="">{{ 'please select a class'}}</option>
                                     @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
                    @else
                    <option value="{{ $current_class->id}}">{{ $current_class->name??'no class found'}}</option>
                @foreach ($classes as $class)
                @if ($current_class->id!=$class->id)    
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endif
                @endforeach
                @endif
                </select>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('edit') }}</button>
            </div>
        </div>
    </form>
</div>