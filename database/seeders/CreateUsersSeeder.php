<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Superadmin',
               'email'=>'superadmin@example.com',
               'role_id'=>'1',
               'user_information' => '{"gender":"Male","blood_group":"a+","birthday":1667989922,"phone":"01090250088","address":"cairo","photo":"user.png"}',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Admin',
               'email'=>'admin@example.com',
               'role_id'=>'2',
               'school_id'  => '1',
               'branch_id'  => '1',
               'user_information' => '{"gender":"Male","blood_group":"a+","birthday":1667989922,"phone":"01090250088","address":"cairo","photo":"user.png"}',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'student@example.com',
               'role_id'=>'3',
               'device_id'=>'DJI654EDJI21548',
               'school_id'  => '1',
               'class_id'  => '1',
               'section_id'  => '1',
               'user_information' => '{"gender":"Male","blood_group":"a+","birthday":1667989922,"phone":"01090250088","address":"cairo","photo":"user.png"}',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'teacher',
               'email'=>'teacher@example.com',
               'role_id'=>'4',
               'device_id'=>'123',
               'school_id'  => '1',
               'class_id'  => '1',
               'section_id'  => '1',
               'user_information' => '{"gender":"Male","blood_group":"a+","birthday":1667989922,"phone":"01090250088","address":"cairo","photo":"user.png"}',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }

}
