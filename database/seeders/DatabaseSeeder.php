<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Tag;
use App\Models\Translation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $tags = Tag::factory()->count(3)->create();
        
        Language::factory(5)->has(
            Translation::factory()->count(5000)
            ->hasAttached($tags)
        )->create();

        // $this->call([
        //     TagSeeder::class,
        //     LanguageSeeder::class
        // ]);
    }
}
