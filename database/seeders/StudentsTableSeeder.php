<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RomanizedKhmerStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'first_name' => 'Sokha',
                'last_name' => 'Mat',
                'gender' => 'Female',
                'date_of_birth' => '2010-03-12'
            ],
            [
                'first_name' => 'Vanna',
                'last_name' => 'Samoeun',
                'gender' => 'Female',
                'date_of_birth' => '2011-07-25'
            ],
            [
                'first_name' => 'Rith',
                'last_name' => 'Chantha',
                'gender' => 'Male',
                'date_of_birth' => '2009-11-08'
            ],
            [
                'first_name' => 'Samnang',
                'last_name' => 'Phandy',
                'gender' => 'Male',
                'date_of_birth' => '2012-01-30'
            ],
            [
                'first_name' => 'Sreyneath',
                'last_name' => 'Yutthara',
                'gender' => 'Female',
                'date_of_birth' => '2010-09-15'
            ],
            [
                'first_name' => 'Panha',
                'last_name' => 'Sokheang',
                'gender' => 'Female',
                'date_of_birth' => '2011-04-22'
            ],
            [
                'first_name' => 'Theary',
                'last_name' => 'Channa',
                'gender' => 'Male',
                'date_of_birth' => '2009-12-05'
            ],
            [
                'first_name' => 'Chanthan',
                'last_name' => 'Oun',
                'gender' => 'Male',
                'date_of_birth' => '2012-02-18'
            ],
            [
                'first_name' => 'Piseth',
                'last_name' => 'Thida',
                'gender' => 'Female',
                'date_of_birth' => '2010-08-07'
            ],
            [
                'first_name' => 'Vathana',
                'last_name' => 'Sophal',
                'gender' => 'Female',
                'date_of_birth' => '2011-05-19'
            ]
        ];

        foreach ($students as $i => $student) {
            DB::table('students')->insert(array_merge($student, [
                'user_id' => $i + 100,
                'roll' => $i + 1,
                'blood_group' => ['A+', 'B+', 'O+', 'AB+'][rand(0, 3)],
                'religion' => 'Buddhism',
                'email' => strtolower($student['first_name']).'.'.strtolower($student['last_name']).'@school.edu.kh',
                'class' => rand(1, 12),
                'section' => ['A', 'B', 'C', 'D'][rand(0, 3)],
                'admission_id' => 'ADM-'.(2023000 + $i + 1),
                'phone_number' => '855'.rand(10, 99).rand(100000, 999999),
                'upload' => 'student_'.($i+1).'.jpg',
                'created_at' => Carbon::now()->subMonths(rand(1, 12)),
                'updated_at' => Carbon::now()->subMonths(rand(1, 12))
            ]));
        }
    }
}
