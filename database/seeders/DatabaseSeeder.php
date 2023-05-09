<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('cruds')->insert([
        //     'user_id' => 2,
        //     'title' => $this->faker->sentence,
        //     'description' => $this->faker->description,
        //     'status' => 'active',
        // ]);

        // \App\Models\Crud::factory(10)->create();
        // \App\Models\Address::factory(10)->create();
        \App\Models\User::factory(3)->create();
    }
}
