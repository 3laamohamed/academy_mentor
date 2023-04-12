<?php

namespace App\Http\Controllers\Api;

use App\Models\StudentAnswers;
use auth;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\User;
use App\Models\Grade;
use App\Models\Video;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\School;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Question;
use App\Traits\ApiTrait;
use App\Models\ClassRoom;
use App\Models\ExamCategory;
use App\Models\IosAppConfig;
use App\Models\SchoolBranch;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\UserSolvedExam;
use App\Models\AndroidAppConfig;
use App\Models\DailyAttendances;
use Stripe\ApiOperations\Update;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\LessonResource;
use App\Http\Resources\UserDataResource;
use App\Http\Resources\UserInfoResource;
use Laravel\Sanctum\PersonalAccessToken;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Requests\Api\SolvedExamRequest;
use App\Http\Requests\Api\UpdateUserInfoRequest;

class AuthController extends Controller
{
    use ApiTrait;

    // start lesson function

    public function getUserInfo(request $request)
    {
        return $this->results(true, 'user info data retrieved successfully', new UserDataResource($request));
    }

    public function makeSolvedExam(SolvedExamRequest $request)
    {
        $user = UserSolvedExam::where('exam_id', $request->exam_id)->where('user_id', auth()->user()->id)->first();
        if ($user == null) {
            $data = UserSolvedExam::create([
                'exam_id' => $request->exam_id,
                'user_id' => auth()->user()->id,
                'school_id' => $request->school_id,
                'exam_degree' => $request->exam_degree,
            ]);
            if($data){
                foreach ($request['questions'] as $ques){
                    StudentAnswers::create([
                        'answer_id'=>$data->id,
                        'title'=>$ques->title,
                        'student_answers'=>$ques->student_answers,
                        'correct_answers'=>$ques->correct_answers,
                        'image'=>$ques->image,
                        'degree'=>$ques->degree,
                        'is_correct'=>$ques->is_correct,
                    ]);
                }
            }
            return $this->results(true, 'exam solved successfully', []);
        } else {
            return $this->results(false, 'the user already solved this exam', []);
        }
    }

    public function getAllLessons(request $request)
    {
        if (isset($request->subject_id)) {
            $lessons = Lesson::where('school_id', $request->school_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('subject_id', $request->subject_id)->get();
        } else {
            $lessons = Lesson::where('school_id', $request->school_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->get();
        }
        if ($lessons->first() == null) {
            return $this->results(false, 'no lessons found');
        }
        // $data=[];
        // $lesson_count=0;
        // foreach($lessons as $lesson){
        //     $video_info=[];
        //     $section_info=[];
        //     $session_info=[];
        //     $video_count=0;
        //     $section_count=0;
        //     $session_count=0;
        //     $lesson_count++;
        //     $sections=Section::where('id',$lesson->section_id)->get();
        //                 foreach($sections as $section){
        //         $section_count++;
        //         $section_info+=['section '.$section_count=>[
        //             'id'=>$section->id,
        //             'title'=>$section->name]
        //         ];
        //     }
        //     $sessions=Session::where('id',$lesson->session_id)->get();
        //                             foreach($sessions as $session){
        //         $session_count++;
        //         $session_info+=['section '.$session_count=>[
        //             'id'=>$session->id,
        //             'title'=>$session->session_title]
        //         ];
        //     }
        //     $videos=Video::where('lesson_id',$lesson->id)->get();
        //     foreach($videos as $video){
        //         $video_count++;
        //         $video_info+=['video '.$video_count=>[
        //             'video_url'=>$video->url,
        //             'video_title'=>$video->title,
        //             'video_id'=>$video->id,]
        //         ];
        //     }
        //     $data+=[$lesson_count=>[
        //         'section'=>[
        //             $section_info
        //         ],
        //         'session'=>[
        //             $session_info],
        //         'thumbnail'=>$lesson->thumbnail,
        //         'title'=>$lesson->name,
        //         'id'=>$lesson->id,
        //         'lesson videos'=> [$video_info],
        //     ]];}

        // return $this->results(true,'lessons retrieved successfully',$data);
        return $this->results(true, 'lessons retrieved successfully', $lessons);
    }
    // end lesson function
    // start lesson details function
    public function getLessonDetails(request $request)
    {
        $lesson = Lesson::where('school_id', $request->school_id)->where('id', $request->lesson_id)->first();
        $section = Section::where('id', $lesson->section_id)->first();
        $session = Session::where('id', $lesson->session_id)->first();
        if ($lesson == null) {
            return $this->results(false, 'no lessons found');
        }
        $data = [];
        $video_info = [];
        $video_count = 0;
        $videos = Video::where('lesson_id', $lesson->id)->get();
        foreach ($videos as $video) {
            $video_count++;
            $video_info1 = [
                'video_url' => $video->url,
                'video_title' => $video->title,
                'video_id' => $video->id,
            ];
            array_push($video_info, $video_info1);
            $video_info1 = [];
        }
        $data += [
            'section' => [
                'id' => $section->id,
                'title' => $section->name
            ],
            'session' => [
                'id' => $session->id,
                'title' => $session->session_title],
            'thumbnail' => $lesson->thumbnail,
            'name' => $lesson->name,
            'id' => $lesson->id,
            'lesson videos' => $video_info,
        ];

        return $this->results(true, 'lessons retrieved successfully', $data);
    }
    // end lesson details function

    // start Subjects function
    public function getAllSubjects(request $request)
    {
        $Subjects = Subject::where('school_id', $request->school_id)->where('class_id', $request->class_id)->get();
        if ($Subjects->first() == null) {
            return $this->results(false, 'no subjects found');
        }
        return $this->results(true, 'subjects retrieved successfully', $Subjects);
    }
    // end Subjects function

    // start exams function
    public function getAllExams(request $request)
    {
        date_default_timezone_set('Africa/Cairo');
        $date = date("Y-m-d h:i:s");
        $date = strtotime($date);
        if (isset($request->is_exercise) && $request->is_exercise == 1) {
            if (isset($request->subject_id)) {
                $exams = Exam::where('school_id', $request->school_id)
                    ->where('class_id', $request->class_id)
                    ->where('is_exercise', $request->is_exercise)
                    ->where('subject_id', $request->subject_id)->get();
                if ($exams->first() == null) {
                    return $this->results(false, 'no exams found', []);
                }
            }
            $exams = Exam::where('school_id', $request->school_id)
                ->where('class_id', $request->class_id)
                ->where('is_exercise', $request->is_exercise)->get();
        } elseif (isset($request->is_exercise) && $request->is_exercise == 0) {
            if (isset($request->subject_id)) {
                if (isset($request->is_solved) && $request->is_solved == 1 && isset($request->user_id)) {
                    $exam_ids = UserSolvedExam::where('user_id', $request->user_id)->get();
                    $ids = [];
                    foreach ($exam_ids as $id) {
                        array_push($ids, $id->exam_id);
                    }
                    // dd($ids);
                    // $ids=2;
                    $initial_exams = Exam::where('school_id', $request->school_id)
                        ->where('class_id', $request->class_id)
                        ->where('subject_id', $request->subject_id)->find($ids);
                    // $solved_exams=UserSolvedExam::where('user_id',$request->user_id)->first()->exam_id->get();
                    // dd($initial_exams);
                    $exams = [];
                    foreach ($initial_exams as $initial_exam) {
                        $exam = [];
                        $exam = ["id" => $initial_exam->id,
                            "name" => $initial_exam->name,
                            "exam_type" => $initial_exam->exam_type,
                            "duration" => $initial_exam->duration,
                            "starting_time" => $initial_exam->starting_time,
                            "ending_time" => $initial_exam->ending_time,
                            "total_marks" => $initial_exam->total_marks,
                            'user_degree' => UserSolvedExam::where('exam_id', $initial_exam->id)->where('user_id', $request->user_id)->first()->exam_degree,
                            "status" => $initial_exam->status,
                            "class_id" => $initial_exam->class_id,
                            "class_room_ids" => $initial_exam->class_room_ids,
                            "subject_id" => $initial_exam->subject_id,
                            "school_id" => $initial_exam->school_id,
                            "session_id" => $initial_exam->session_id,
                            "category_id" => $initial_exam->category_id,
                            "is_exercise" => $initial_exam->is_exercise,
                            "created_at" => $initial_exam->created_at,
                            "updated_at" => $initial_exam->updated_at
                        ];
                        array_push($exams, $exam);
                    }
                    if ($exams == null) {
                        return $this->results(false, 'no exams found', []);
                    } else {
                        return $this->results(true, 'exams retrieved successfully', $exams);
                    }
                } else {
                    $exam_ids = UserSolvedExam::where('user_id', $request->user_id)->get();
                    $ids = [];
                    foreach ($exam_ids as $id) {
                        array_push($ids, $id->exam_id);
                    }
                    $exams = Exam::where('school_id', $request->school_id)
                        ->where('class_id', $request->class_id)
                        ->where('is_exercise', $request->is_exercise)->where('subject_id', $request->subject_id)->whereNotIn('id', $ids)->get();
                }
            } else {
                if (isset($request->is_solved) && $request->is_solved == 1 && isset($request->user_id)) {
                    $exam_ids = UserSolvedExam::where('user_id', $request->user_id)->get();
                    $ids = [];
                    foreach ($exam_ids as $id) {
                        array_push($ids, $id->exam_id);
                    }
                    // dd($ids);
                    // $ids=2;
                    $initial_exams = Exam::where('school_id', $request->school_id)
                        ->where('class_id', $request->class_id)->find($ids);
                    // $solved_exams=UserSolvedExam::where('user_id',$request->user_id)->first()->exam_id->get();
                    // dd($initial_exams);
                    $exams = [];
                    foreach ($initial_exams as $initial_exam) {
                        $exam = [];
                        $exam = ["id" => $initial_exam->id,
                            "name" => $initial_exam->name,
                            "exam_type" => $initial_exam->exam_type,
                            "duration" => $initial_exam->duration,
                            "starting_time" => $initial_exam->starting_time,
                            "ending_time" => $initial_exam->ending_time,
                            "total_marks" => $initial_exam->total_marks,
                            'user_degree' => UserSolvedExam::where('exam_id', $initial_exam->id)->where('user_id', $request->user_id)->first()->exam_degree,
                            "status" => $initial_exam->status,
                            "class_id" => $initial_exam->class_id,
                            "class_room_ids" => $initial_exam->class_room_ids,
                            "subject_id" => $initial_exam->subject_id,
                            "school_id" => $initial_exam->school_id,
                            "session_id" => $initial_exam->session_id,
                            "category_id" => $initial_exam->category_id,
                            "is_exercise" => $initial_exam->is_exercise,
                            "created_at" => $initial_exam->created_at,
                            "updated_at" => $initial_exam->updated_at
                        ];
                        array_push($exams, $exam);
                    }
                    if ($exams == null) {
                        return $this->results(false, 'no exams found', []);
                    } else {
                        return $this->results(true, 'exams retrieved successfully', $exams);
                    }
                } else {
                    $exam_ids = UserSolvedExam::where('user_id', $request->user_id)->get();
                    $ids = [];
                    foreach ($exam_ids as $id) {
                        array_push($ids, $id->exam_id);
                    }
                    $exams = Exam::where('school_id', $request->school_id)
                        ->where('class_id', $request->class_id)
                        ->where('ending_time', '>', $date)
                        ->where('is_exercise', $request->is_exercise)->whereNotIn('id', $ids)->get();
                }
            }
        } else {
            $exams = Exam::where('school_id', $request->school_id)
                ->where('ending_time', '>', $date)
                ->where('class_id', $request->class_id)->get();
        }
        // dd(empty($exams));
        if ($exams->first() == null) {
            return $this->results(false, 'no exams found', []);
        }
        //         $data=[];
        //         // dd($exams);
        //         $exam_count=0;
        // foreach($exams as $exam){
        //     $exam_count++;
        //     $data+=[$exam_count=>[
        //         'id'=>$exam->id,
        //         'title'=>$exam->name,
        //         'duration' =>$exam->duration,
        //         'can_review' =>false,
        //         'is_done' =>false,
        //         'subject' =>[
        //             'id'=>subject::find($exam->subject_id)->id,
        //             'title'=>subject::find($exam->subject_id)->name],
        //         'exam category' =>[
        //             'id'=>ExamCategory::find($exam->category_id)->id,
        //             'title'=>ExamCategory::find($exam->category_id)->name]]
        //     ];}
        // return $this->results(true,'exams retrieved successfully',$data);
        return $this->results(true, 'exams retrieved successfully', $exams);
    }
    // end exams function

    // start exams details function
    public function getExamDetails(request $request)
    {
        $exam = Exam::where('school_id', $request->school_id)->where('id', $request->exam_id)->first();

        $session = Session::where('id', $exam->session_id)->first();

        if ($exam == null) {
            return $this->results(false, 'no exams found');
        }
        $data = [];

        $exam_questions = [];
        $question_count = 0;

        $questions = Question::where('exam_id', $exam->id)->get();
        foreach ($questions as $question) {
            $question_answers = [];
            $answer_count = 0;
            $answers = Answer::where('question_id', $question->id)->get();
            foreach ($answers as $answer) {
                $answer_count++;
                $question_answers1 = [
                    'answer' => $answer->answer,
                    'is_correct' => $answer->correct,

                ];
                array_push($question_answers, $question_answers1);
                $exam_questions1 = [];
            }
            $question_count++;
            $exam_questions1 = [
                'question' => $question->question,
                'id' => $question->id,
                'multiple_choice' => false,
                'image' => $question->question_photo,
                'degree' => $question->question_degree,
                'answers' => $question_answers
            ];
            array_push($exam_questions, $exam_questions1);
            $exam_questions1 = [];
        }
        $data = [
            'session' => [
                'id' => $session->id,
                'name' => $session->session_title],
            'name' => $exam->name,
            'subject' => [
                'id' => subject::find($exam->subject_id)->id,
                'name' => subject::find($exam->subject_id)->name],
            'exam category' => [
                'id' => ExamCategory::find($exam->category_id)->id,
                'name' => ExamCategory::find($exam->category_id)->name],
            'id' => $exam->id,
            'duration' => $exam->duration,
            'can_review' => true,
            'is_done' => false,
            'questions' => $exam_questions,

        ];

        return $this->results(true, 'exams retrieved successfully', $data);
    }
    // end details function

    // start grades function
    public function getStudentGrades(request $request)
    {
        $ranks = UserSolvedExam::where('school_id', $request->school_id)->where('exam_id', $request->exam_id)->orderBy('exam_degree', 'desc')->get();
        $grades = [];
        $user = User::where('school_id', $request->school_id)->get();
        foreach ($ranks as $rank) {
            if ($user->where('id', $rank->user_id)->first() == null) {
                continue;
            }
            $grade = [];
            $grade = [
                'name' => $user->where('id', $rank->user_id)->first()->name,
                'id' => $rank->user_id,
                'degree' => $rank->exam_degree,
                'branch' => [
                    'id' => $user->where('id', $rank->user_id)->first()->branch_id,
                    'name' => SchoolBranch::where('id', $user->where('id', $rank->user_id)->first()->branch_id)->first()->name,
                ],
            ];
            array_push($grades, $grade);
        }
        if ($grades == null) {
            return $this->results(false, 'no grades for this user');
        }
        return $this->results(true, 'exam grades retrieved successfully', $grades);
    }
    // end grades function

    // start branches function
    public function getBranches(request $request)
    {
        $branches = SchoolBranch::where(['delete' => 0, 'school_id' => $request->school_id])->get();
        if ($branches->first() == null) {
            return $this->results(false, 'no branches found');
        }
        return $this->results(true, 'branches retrieved successfully', $branches);
    }

    public function changePassword(request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return $this->results(false, 'من فضلك ادخل كلمه السر الصحيحه', []);
        } else {
            $pass = Hash::make($request->new_password);
            $user = User::where('id', auth()->user()->id)->first();
            $user->update(['password' => $pass]);
            return $this->results(true, 'تم تغير كلمه السر بنجاح', []);
        }
    }
    // end branches function

    // start groups function
    public function getGroups(request $request)
    {
        if($request->active_only == 0){
            $groups = ClassRoom::where(['class_id'=>$request->class_id])->get();
        }else{
            $groups = ClassRoom::where(['status'=>1,'class_id'=>$request->class_id])->get();
        }
        if ($groups->first() == null) {
            return $this->results(false, 'no Class found');
        }
        return $this->results(true, 'groups retrieved successfully', $groups);
    }
    // end groups function

    // start classes function
    public function getClasses(request $request)
    {
        $classes = Classes::where('school_id', $request->school_id)->get();
        if ($classes->first() == null) {
            return $this->results(false, 'no classes found');
        }
        return $this->results(true, 'classes retrieved successfully', $classes);
    }

    public function updateUserInfo(UpdateUserInfoRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->Update($request->all());
        return $this->results(true, 'user data updated successfully', []);
    }
    // public function privacyPolicy(request $request){
    //     $policy=privacyPolicy::where('school_id',$request->school_id)->first()->policy;
    //     if($policy==null){
    //         return $this->results(false,'no policy found');
    //     }
    //     return $this->results(true,'policy retrieved successfully',$policy);
    // }
    public function attend(request $request)
    {
        date_default_timezone_set('Africa/Cairo');
        $date = date("Y-m-d");
        $teacher = auth()->user();
        $student = User::where('id', $request->student_id)->first();
        if ($student == null) {
            return $this->results(false, 'student not found', []);
        } else {
            if ($teacher->role_id == 4) {
                if (DailyAttendances::where(['class_id' => $student->class_id,
                        'section_id' => $request->section_id,
                        'student_id' => $request->student_id,
                        'school_id' => $teacher->school_id,
                        'timestamp' => $date
                    ])->count() == 0) {
                    $attendance = new DailyAttendances();
                    $attendance->class_id = $student->class_id;
                    $attendance->section_id = $request->section_id;
                    $attendance->student_id = $request->student_id;
                    $attendance->status = 1;
                    $attendance->session_id = School::where('id', $teacher->school_id)->first()->running_session;
                    $attendance->school_id = $teacher->school_id;
                    $attendance->save();
                }
                return $this->results(true, 'student attended successfully', []);
            } else {
                return $this->results(false, 'you must be teacher', []);
            }
        }
        // 'section_id'=>$request->section_id,
        // 'student_id'=>$student->id,
        // 'status'=>1,
        // 'session_id '=>School::where('id',auth()->user()->school_id)->first()->running_session,
        // 'school_id'=>$student->school_id,
        // 'day'=>Carbon::now(),
    }
    // end classes function

    // start classes function
    public function config(request $request)
    {
        $school = School::find($request->school_id);
        $data = [
            'is_school_active' => AndroidAppConfig::where('school_id', 1)->first()->maintenance_mode,
            'school_name' => $school->title,
            'school_address' => $school->address,
            'school_phone' => $school->phone,
            'school_info' => $school->info,
            'block_screenshots' => true,
            'privacy_policy' => PrivacyPolicy::where('school_id', $request->school_id)->first()->policy,
            'base_urls' => [
                "student_image_path" => "https://academy-mentor.com/storage/assets/uploads/user-images",
                "question_image_path" => "https://academy-mentor.com/storage/assets/uploads/user-images",
            ],
            'android_config' => [
                "status" => true,
                "link" => AndroidAppConfig::where('school_id', 1)->first()->app_url,
                "min_version" => AndroidAppConfig::where('school_id', 1)->first()->minimum_version,
            ],
            'ios_config' => [
                "status" => true,
                "link" => IosAppConfig::where('school_id', 1)->first()->app_url,
                "min_version" => IosAppConfig::where('school_id', 1)->first()->minimum_version,
            ]
        ];
        return $this->results(true, 'config retrieved successfully', $data);
    }
    // end classes function

}
