<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups= [
            '11',
            '12',
            '13в'
        ];

        $faculty_id= [
            1,
            1,
            1
        ];

        for($i=0; $i<=count($groups)-1; $i++){
            \DB::table('groups')->insert([
                'name' => $groups[$i],
                'faculty_id' => $faculty_id[$i]
            ]);
        }
    }
}
