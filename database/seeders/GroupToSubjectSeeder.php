<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupToSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('group_to_subjects')->insert([
            'status' => true,
            'group_id' => 1,
            'subject_id' => 1
        ]);

        \DB::table('group_to_subjects')->insert([
            'status' => true,
            'group_id' => 1,
            'subject_id' => 2
        ]);

        \DB::table('group_to_subjects')->insert([
            'status' => true,
            'group_id' => 1,
            'subject_id' => 3
        ]);

        \DB::table('group_to_subjects')->insert([
            'status' => true,
            'group_id' => 2,
            'subject_id' => 1
        ]);

        \DB::table('group_to_subjects')->insert([
            'status' => true,
            'group_id' => 2,
            'subject_id' => 2
        ]);

        \DB::table('group_to_subjects')->insert([
            'status' => true,
            'group_id' => 2,
            'subject_id' => 3
        ]);
    }
}
