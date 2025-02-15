<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages_list= [
            ["code" => "en", "name" => "English"],
            ["code" => "es", "name" => "Spanish"],
            ["code" => "fr", "name" => "French"],
            ["code" => "ar", "name" => "Arabic - العربية"]
        ];

        Language::insert($languages_list);
    }
}
