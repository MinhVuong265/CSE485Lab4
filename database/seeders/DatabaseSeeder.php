<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Reader;
use App\Models\User;
use App\Models\Borrow;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
// <<<<<<< HEAD
        $this->call(Borrow::class);
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        \App\Models\Reader::factory(10)->create();
        Book::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
// =======
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//         Reader::factory(10)->create();
//         Book::factory(10)->create();

// >>>>>>> bbfed5b893c290a0a9bf5c05b58637a1a814005f
}

}
