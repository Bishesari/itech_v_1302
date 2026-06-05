<?php

namespace Database\Seeders;

use App\Models\Institute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutes = [

            [
                'short_name' => 'آی تک',
                'full_name' => 'آموزشگاه فنی و حرفه‌ای آزاد آی تک',
                'slug' => 'I-Tech Institute',
                'abbr' => 'ITCBU',
                'is_active' => true,
                'logo_url' => null,
            ],

            [
                'short_name' => 'البرز',
                'full_name' => 'آموزشگاه فنی البرز',
                'slug' => 'alborz-tech',
                'abbr' => 'ALB',
                'is_active' => true,
                'logo_url' => null,
            ],

        ];

        foreach ($institutes as $institute) {

            Institute::updateOrCreate(
                ['slug' => $institute['slug']],
                $institute
            );
        }
    }
}
