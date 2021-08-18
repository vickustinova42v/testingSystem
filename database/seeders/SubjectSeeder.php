<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('subjects')->insert([
            'name' => 'Разработка сайтов',
            'user_id' => 2
        ]);
        \DB::table('subjects')->insert([
            'name' => 'Интернет-технологии',
            'user_id' => 2
        ]);
        \DB::table('subjects')->insert([
            'name' => 'Защита информации',
            'user_id' => 2
        ]);
    }
}
