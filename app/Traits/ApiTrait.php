<?php

namespace App\Traits;

trait ApiTrait{
    public function results($status,$message,$data=null){
        $response=[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
        return response()->json($response);
}
 
}