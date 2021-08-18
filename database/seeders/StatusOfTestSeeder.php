<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusOfTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusesOfTest = [
            'Начат',
            'Не начат',
            'Пройден',
            'Не пройден'
        ];

        for($i=0; $i<=count($statusesOfTest)-1; $i++){
            \DB::table('status_of_tests')->insert([
                'name' => $statusesOfTest[$i]
            ]);
        }
    }
}
