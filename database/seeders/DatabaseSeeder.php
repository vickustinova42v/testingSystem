<?php

namespace Database\Seeders;

use App\Models\GroupToSubject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(FacultySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TopicsSeeder::class);
        $this->call(TypeOfQuestionSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(VariantsOfQuestionSeeder::class);
        $this->call(GroupToSubjectSeeder::class);
        $this->call(StatusOfTestSeeder::class);
    }
}
