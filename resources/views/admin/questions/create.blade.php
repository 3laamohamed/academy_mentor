<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.question') }}">
    @csrf 
    <div class="form-row">
        <div class="fpb-7">
            <label for="exam_name" class="eForm-label">{{ get_phrase('Exam Name') }}</label>
            <select name="exam_name" id="exam_name" class="form-select eForm-select eChoice-multiple-with-remove" required>
                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
            </select>
        </div>
        <div class="fpb-7">
            <label for="question" class="eForm-label">{{ get_phrase('question') }}</label>
            <input type="text" class="form-control eForm-control" id="question" name = "question" required>
        </div>
                    <div class="fpb-7">
                <label for="question_photo" class="eForm-label">{{ get_phrase('question photo') }}</label>
                              <input
                class="form-control eForm-control-file"
                id="question_photo" name="question_photo" accept="image/*"
                type="file"
              />
            </div>
            
        <div class="fpb-7">
            <label for="question_degree" class="eForm-label">{{ get_phrase('question degree') }}</label>
            <input type="number" min='1' class="form-control eForm-control" id="question_degree" name = "question_degree" required>
        </div>
        <div class="fpb-7">
            <label for="answer1" class="eForm-label">{{ get_phrase('answer 1') }}</label> 
            <input type="text" class="form-control eForm-control" id="answer1" name = "answer1" required>
        </div>
        <div class="fpb-7">
            <label for="answer2" class="eForm-label">{{ get_phrase('answer 2') }}</label>
            <input type="text" class="form-control eForm-control" id="answer2" name = "answer2" required>
        </div>
        <div class="fpb-7">
            <label for="answer3" class="eForm-label">{{ get_phrase('answer 3') }}</label>
            <input type="text" class="form-control eForm-control" id="answer3" name = "answer3" required>
        </div>
        <div class="fpb-7">
            <label for="answer4" class="eForm-label">{{ get_phrase('answer 4') }}</label>
            <input type="text" class="form-control eForm-control" id="answer4" name = "answer4" required>
        </div>
        <div class="fpb-7">
            <label for="correct_answer" class="eForm-label">{{ get_phrase('correct answer') }}</label>
            <select name="correct_answer" id="correct_answer" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="">{{ get_phrase('Select correct answer') }}</option>
                    <option value="1">answer 1</option>
                    <option value="2">answer 2</option>
                    <option value="3">answer 3</option>
                    <option value="4">answer 4</option>
            </select>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit">{{ get_phrase('Create question') }}</button>
        </div>

    </div>
</form>