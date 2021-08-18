<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('questions')->insert([
            'name' => 'Какой тег обозначает заголовок на странице?',
            'topics_id' => 1,
            'type_id' => 1,
        ]);
    }
}
