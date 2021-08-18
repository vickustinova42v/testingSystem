<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [
            'teacher',
            'student',
            'admin',
            'curator'
        ];

        $user_rus_roles = [
            'преподаватель',
            'студент',
            'администратор',
            'куратор'
        ];

        for($i=0; $i<=count($user_roles)-1; $i++){
            \DB::table('roles')->insert([
                'name' => $user_roles[$i],
                'rus_name' => $user_rus_roles[$i]
            ]);
        }

    }
}
