<?php

namespace Database\Seeders;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'title' => 'مركز د.احمد الجرايحى',
            'email' => 'elgarihy@gmail.com',
            'phone' => '01556454434',
            'address' => 'cairo',
            'school_info' => 'School info should be here',
            'status' => 1,
            'running_session' => 1,
        ]);
    }
}
