<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('topics')->insert([
            'name' => 'Введение в HTML и CSS',
            'subject_id' => 1
        ]);

        \DB::table('topics')->insert([
            'name' => 'Введение в JavaScript',
            'subject_id' => 1
        ]);

        \DB::table('topics')->insert([
            'name' => 'JavaScript - работа с данными',
            'subject_id' => 1
        ]);

        \DB::table('topics')->insert([
            'name' => 'Информационная безопаснось. Основы',
            'subject_id' => 3
        ]);

        \DB::table('topics')->insert([
            'name' => 'Сетевая безопасность',
            'subject_id' => 3
        ]);

        \DB::table('topics')->insert([
            'name' => 'Хеширование',
            'subject_id' => 3
        ]);

        \DB::table('topics')->insert([
            'name' => 'Интернет технология. Основные понятия',
            'subject_id' => 2
        ]);

        \DB::table('topics')->insert([
            'name' => 'Виды доступа к Интернет',
            'subject_id' => 2
        ]);
    }
}
