<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.question.update', ['id' => $exam_question->id]) }}">
    @csrf 
    <div class="form-row">
        <div class="fpb-7">
            <label for="exam_name" class="eForm-label">{{ get_phrase('Exam Name') }}</label>
            <select name="exam_name" id="exam_name" class="form-select eForm-select eChoice-multiple-with-remove" required>
                <option value="{{$exams->where('id',$exam_question->exam_id)->first()->id}}">{{ get_phrase($exams->where('id',$exam_question->exam_id)->first()->name) }}</option>
                @foreach($exams as $exam)
                    @if($exam->id !=$exam_question->exam_id)
                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="fpb-7">
            <label for="question" class="eForm-label">{{ get_phrase('question') }}</label>
            <input type="text" value="{{$exam_question->question}}" class="form-control eForm-control" id="question" name = "question" required>
        </div>
                    <div class="fpb-7">
                <label for="question_photo" class="eForm-label">{{ get_phrase('question_photo') }}</label>
                              <input
                              value='{{$exam_question->question_photo}}' 
                class="form-control eForm-control-file"
                id="question_photo" name="question_photo" accept="image/*"
                type="file"
              />
            </div>
        <div class="fpb-7">
            <label for="question_degree" class="eForm-label">{{ get_phrase('question degree') }}</label>
            <input type="number" min='1' value="{{$exam_question->question_degree}}" class="form-control eForm-control" id="question_degree" name = "question_degree" required>
        </div>

        @foreach ($answers as $answer)
        <div class="fpb-7">
            <label for="answer{{$question_num}}" class="eForm-label">{{ get_phrase('answer ' .$question_num) }}</label> 
            <input type="text" value='{{$answer->answer}}' class="form-control eForm-control" id="answer{{$question_num}}" name = "answer{{$question_num++}}" required>
        </div>

        @endforeach
        <div class="fpb-7">
            <label for="correct_answer" class="eForm-label">{{ get_phrase('correct answer') }}</label>
            <select name="correct_answer" id="correct_answer" class="form-select eForm-select eChoice-multiple-with-remove" required>
                        @foreach ($answers as $answer)
                        @if ($answer->correct==1)
                            <option selected value={{$answers_count}}>answer {{$answers_count}}</option>
                            @else
                        <option value={{$answers_count}}>answer {{$answers_count}}</option>
                        @endif
                        {{$answers_count++}}
                     @endforeach
            </select>
        </div>
        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit">{{ get_phrase('edit question') }}</button>
        </div>

    </div>
</form>