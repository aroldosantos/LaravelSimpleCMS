<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
            ->count(10)
            ->state(new Sequence(
                ['administrator' => 'Y'],
                ['administrator' => 'N'],
            ))
            ->create();

        \App\Models\Categoria::factory()->count(10)->create();
    }
}
