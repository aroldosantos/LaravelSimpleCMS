<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        User::factory()
            ->count(10)
            ->state(new Sequence(
                ['administrator' => 'Y'],
                ['administrator' => 'N'],
            ))
            ->create();

        Categoria::factory()
            ->count(10)
            ->create();

        Post::factory()
            ->count(30)
            ->state(new Sequence(
                fn($sequence) => [
                    'user_id' => User::all()->random(),
                    'categoria_id' => Categoria::all()->random(),
                ],
            ))
            ->create();
    }
}
