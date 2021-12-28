<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
//         \App\Models\CycleAcademy::factory(10)->create();
//        \App\Models\CategoryStatement::factory(5)->create();
//        \App\Models\Statement::factory(6)->create();
//        \App\Models\CategoryEmployment::factory(5)->create();
//        \App\Models\Employment::factory(30)->create();
//        \App\Models\Document::factory(55)->create();
//        \App\Models\TeamMember::factory(55)->create();
//        \App\Models\MediaPost::factory(55)->create();
        \App\Models\MediaEvent::factory(55)->create();
        \App\Models\MediaEventsCategory::factory(10)->create();
    }
}
