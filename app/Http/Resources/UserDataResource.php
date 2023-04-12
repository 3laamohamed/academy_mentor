<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\SchoolBranch;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($data)
    {
        $user=auth()->user();
        $user_information = json_decode($user->user_information, true);
        $branch=SchoolBranch::where(['delete'=>0,'id'=>$user->branch_id])->first();
                if($user->code==null){
            $active=false;
        }else{
            $active=true;
        }

        if($branch!=null){
            $branch_id=$branch->id;
            $branch_name=$branch->name;
        }else{
            $branch_id=null;
            $branch_name=null;
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
$data= [
            'is_blocked'=>$user->blocked,
            'is_active'=>$active,
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
            ],
                'class_group'=>[
                    'id'=>$class_group_id,
                    'name'=>$class_group_name,
                    'status'=>$class_group_status,
            ],
        ];

                return $data;
    }
}
