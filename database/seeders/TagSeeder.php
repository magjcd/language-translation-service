<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::insert([
            ['tag_name' => 'mobile'],
            ['tag_name' => 'desktop'],
            ['tag_name' => 'web'],
        ]);
    }
}
