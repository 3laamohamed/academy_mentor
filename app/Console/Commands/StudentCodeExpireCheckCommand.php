<?php

namespace App\Console\Commands;

use App\Models\LoginCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class StudentCodeExpireCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:StudentExpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command check the code expire date and remove the code from the student row when expire';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users=User::where('role_id',3)->get();
        foreach($users as $user){
            if($user->code!=null){
            $code=LoginCode::where('code',$user->code)->first();
            if($code!=null&&$code->expiry_date!=null&&carbon::parse($code->expiry_date)->lt(Carbon::parse(now()))){
                $user->update(['code'=>null]);
            }
            }
        }
        $codes=LoginCode::get();
        foreach($codes as $code){
            if($code!=null&&$code->expiry_date!=null&&carbon::parse($code->expiry_date)->lt(Carbon::parse(now()))){
                $code->delete();
            }
        }
        // return Command::SUCCESS;
    }
}
