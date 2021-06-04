<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::insert([
            [
                'language_name' => 'Português',
                'created_at'    => now()
            ],
            [
                'language_name' => 'Kimbundu',
                'created_at'    => now()
            ]
        ]);
    }
}
