<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Активен',
            'Отчислен',
            'Уволен',
            'Академический отпуск',
            'Декретный отпуск',
            'Закончил учебу'
        ];

        for($i=0; $i<=count($statuses)-1; $i++){
            \DB::table('statuses')->insert([
                'name' => $statuses[$i]
            ]);
        }
    }
}
