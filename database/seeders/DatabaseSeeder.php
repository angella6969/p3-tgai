<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Rekrutmen::factory(1000)->create();
        // \App\Models\Test::factory(10)->create();
        // \App\Models\Question::factory(10)->create();
        // \App\Models\Option::factory(10)->create();
        // \App\Models\Answer::factory(10)->create();
        // Membuat 10 pertanyaan dan 30 jawaban (3 jawaban per pertanyaan)
        Question::factory()->count(10)->has(Answer::factory()->count(3))->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nama' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '1',
        ]);
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '2',
        ]);
    }
}
