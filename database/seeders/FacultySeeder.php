<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            'ИВТФ',
            'ЭМФ',
            'ИФФ',
            'ЭЭФ',
            'ФЭУ',
            'ТЭФ'
        ];

        for($i=0; $i<=count($faculties)-1; $i++){
            \DB::table('faculties')->insert([
                'name' => $faculties[$i]
            ]);
        }
    }
}
