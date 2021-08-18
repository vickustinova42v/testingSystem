<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VariantsOfQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_variants =[
            'h1',
            'h2',
            'h3',
            'Все вышеперечисленное'
        ];

        $right_answers =[
            false,
            false,
            false,
            true
        ];

        for($i=0; $i<=count($name_variants)-1; $i++){
            \DB::table('variants_of_answers')->insert([
                'name' => $name_variants[$i],
                'right_answer' => $right_answers[$i],
                'question_id' => 1
            ]);
        }
    }
}
