<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name'  => 'الباقه التجريبيه المجانية',
            'price' => 0,
            'package_type' => 'trail',
            'interval' => 'Days',
            'days'  => 7,
            'status' => 1,
            'branch' => 1,
            'description'   => 'الحصول علي جميع المزايا مجانا لمدة اسبوع',
        ]);
        Package::create([
            'name'  => 'الباقة الشهرية',
            'price' => 500,
            'package_type' => 'paid',
            'interval' => 'Monthly',
            'days'  => 1,
            'status' => 1,
            'branch' => 2,
            'description'   => 'الحصول علي جميع المزايا خلال لمدة شهر',
        ]);
        Package::create([
            'name'  => 'الباقة النصف سنوية',
            'price' => 2400,
            'package_type' => 'paid',
            'interval' => 'Monthly',
            'days'  => 1,
            'status' => 1,
            'branch' => 3,
            'description'   => 'الحصول علي جميع المزايا خلال لمدة 6 اشهر',
        ]);
        Package::create([
            'name'  => 'الباقه السنوية',
            'price' => 3600,
            'package_type' => 'paid',
            'interval' => 'Monthly',
            'days'  => 1,
            'status' => 1,
            'branch' => 5,
            'description'   => 'الحصول علي جميع المزايا خلال لمدة سنة',
        ]);
    }
}
