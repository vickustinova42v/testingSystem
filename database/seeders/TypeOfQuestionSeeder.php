<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypeOfQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_of_question = [
            'single',
            'multiple',
            'insertion'
        ];

        for($i=0; $i<=count($type_of_question)-1; $i++){
            \DB::table('type_of_questions')->insert([
                'name' => $type_of_question[$i],
            ]);
        }
    }
}
