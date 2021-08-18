<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // админ
        \DB::table('users')->insert([
            'fio' => 'Устинова Виктория Ярославовна',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('123123123'),
            'year_of_admission' => null,
            'number_of_student' => null,
            'group_id' => null,
            'faculty_id' => null,
            'role_id' => 3,
            'status_id' => 1,
        ]);

        // учитель
        \DB::table('users')->insert([
            'fio' => 'Кукушкина Арина Алексеевна',
            'email' => 'teacher@teacher.ru',
            'password' => Hash::make('123123123'),
            'year_of_admission' => null,
            'number_of_student' => null,
            'group_id' => null,
            'faculty_id' => 1,
            'role_id' => 1,
            'status_id' => 1,
        ]);

        // студент
        \DB::table('users')->insert([
            'fio' => 'Алешина Мария Шамилевна',
            'email' => 'student@student.ru',
            'password' => Hash::make('123123123'),
            'year_of_admission' => 2017,
            'number_of_student' => 17476,
            'group_id' => 1,
            'faculty_id' => 1,
            'role_id' => 2,
            'status_id' => 1,
        ]);

        // куратор
        \DB::table('users')->insert([
            'fio' => 'Каверина Екатерина Васильевна',
            'email' => 'curator@curator.ru',
            'password' => Hash::make('123123123'),
            'year_of_admission' => null,
            'number_of_student' => null,
            'group_id' => null,
            'faculty_id' => 1,
            'role_id' => 4,
            'status_id' => 1,
        ]);
    }
}
