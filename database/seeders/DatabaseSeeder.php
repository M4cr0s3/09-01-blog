<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        User::create([
            'fio' => 'Торшин Максим Михайлович',
            'email' => 'user@ya.ru',
            'birthday' => Carbon::now(),
            'role' => 1,
            'password' => Hash::make('asdasdasd')
        ]);

        Category::factory(5)->create();
        Post::factory(10)->create();
    }
}
