<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Classes;
use App\Traits\ApiTrait;
use App\Models\ClassRoom;
use App\Models\LoginCode;
use App\Models\SchoolBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserInfoResource;
use App\Http\Requests\Api\RegisterRequest;

class GeneralController extends Controller
{
    use ApiTrait;
    // start login function
    public function login(LoginRequest $request){
        $data=$request->validated();
        $user=User::where('email',$data['email'])->first();
        if($data['email']=='test@test.com'){
        if(!auth()->attempt($data)){
            return $this->results(false,'خطأ في الحساب او كلمه المرور');
        }else{
        $user=User::where('email',$data['email'])->first();
        $user_information = json_decode($user->user_information, true);
        $branch=SchoolBranch::where(['delete'=>0,'id'=>$user->branch_id])->first();
        if($branch!=null){
            $branch_id=$branch->id;
            $branch_name=$branch->name;
            $branch_status = $branch->delete;
        }else{
            $branch_id=null;
            $branch_name=null;
            $branch_status = null;
        }
        $class=Classes::where('id',$user->class_id)->first();
        if($class!=null){
            $class_id=$class->id;
            $class_name=$class->name;
        }else{
            $class_id=null;
            $class_name=null;
        }
        $class_group=ClassRoom::where('id',$user->class_room_id)->first();
        if($class_group!=null){
            $class_group_id=$class_group->id;
            $class_group_name=$class_group->name;
            $class_group_status=$class_group->status;
        }else{
            $class_group_id=null;
            $class_group_name=null;
            $class_group_status=null;
        }
        return  $this->results(true,'تم تسجيل الدخول بنجاح',[
            'full_name'=>$user->name,
            'id'=>$user->id,
            'phone'=>$user_information['phone'],
            'image'=>$user_information['photo'],
            'email'=>$user->email,
            'class_list'=>[
                'name'=>$class_name,
                'id'=>$class_id
            ],
            'branch'=>[
                'id'=>$branch_id,
                'name'=>$branch_name,
                'status'=>$branch_status,
            ],
                'class_group'=>[
                    'id'=>$class_group_id,
                    'name'=>$class_group_name,
                    'status'=>$class_group_status,
            ],
            'token'=>'286|U2KbqAbMBIeClDaSfziFfXlLn0EN9KGMJNsMFTbX',

        ]);}

        }else{
            if ($user->device_id == null){
                $user->update(['device_id'=>$request->device_id]);
            }
            if (isset($request->code)&&$user->code == null){
                $code=LoginCode::where('code',$request->code);
                if($code->exists()&&$code->first()->used=='not used'){
                $code->first()->update(['used'=>1]);
                $user->update(['code'=>$request->code]);
                }else{ return $this->results(false,'برجاء ادخال كود تسجيل دخول صحيح',[]);}
            }

            if(isset($request->role)&&$request->role==4){
                $user_role_id=User::where('email',$data['email'])->first()->role_id;
                if($user_role_id!=4){
                    return $this->results(false,'يجب ان تكون مدرس لتتمكن من تسجيل الدخول',[]);
                }
            }
            if ($user->device_id != $request->device_id) {

            return $this->results(false,'برجاء تسجيل الدخول فقط من الجهاز الذي قمت بإنشاء الحساب عليه');
        }elseif(!auth()->attempt($data)){
            return $this->results(false,'خطأ في الحساب او كلمه السر');
        }
        $token=$user->tokens()->where('tokenable_id',$user->id)->first();
        if($token!=null){
            $token->delete();
        }
        return $this->results(true,'تم تسجيل الدخول بنجاح',new UserInfoResource($data));
    }}
    // end login function
    // start register function
        public function register(RegisterRequest $request){
        $data=$request->validated();
        $user=User::create($data);
        if($user){
            LoginCode::where('code',$user->code)->first()->update(['used'=>1]);
        return $this->results(true,'تم انشاء حساب  بنجاح',new UserInfoResource($data));
        }
        return $this->results(false,'لم يتم انشاء الحساب');
    }
    // end register function

}
