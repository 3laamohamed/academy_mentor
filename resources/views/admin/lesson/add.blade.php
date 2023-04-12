<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.lesson') }}">
         @csrf 
        <div class="form-row">
            <div class="fpb-7">
                <label for="class_id_on_create" class="eForm-label">{{ get_phrase('Class') }}</label>
                <select name="class_id" id="class_id" class="class_id form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">{{ get_phrase('Select a class') }}</option>
                     @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="fpb-7">
                <label for="subject_id_on_create" class="eForm-label">{{ get_phrase('subject') }}</label>
                <select name="subject_id" id="subject_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">{{ get_phrase('Select a subject') }}</option>
                </select>
            </div> 
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                <input type="text" class="form-control eForm-control" id="name" name = "name" placeholder="Provide lesson name" required>
            </div>
            <div class="fpb-7">
                <label for="thumbnail" class="eForm-label">{{ get_phrase('thumbnail') }}</label>
                              <input
                class="form-control eForm-control-file"
                id="thumbnail" name="thumbnail" accept="image/*"
                type="file"
              />
            </div>
            
            <div class="fpb-7">
                <label for="section" class="eForm-label">{{ get_phrase('section') }}</label>
                <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="">{{ get_phrase('Select a section') }}</option>
                     @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Create Lesson') }}</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    "use strict";
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();

      $(".class_id").on('change',function()
      {
        var class_id =this.value;
        $.ajax({
            type: "get",
            url: "{{route("admin.lesson.get_subject") }}?class_id="+class_id,
            success: function (response) {
                $('#subject_id').html('<option value="">Select a subject</option>');
                $.each(response, function (key, subject) { 
                    $('#subject_id').append('<option value='+subject.id+'>'+subject.name+'</option>');
                });
                
            }
        });
    });
    });
</script>