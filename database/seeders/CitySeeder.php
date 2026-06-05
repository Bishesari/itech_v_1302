<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'bushehr' => [
                ['name' => 'بوشهر', 'slug' => 'bushehr'],
                ['name' => 'گناوه', 'slug' => 'genaveh'],
                ['name' => 'برازجان', 'slug' => 'borazjan'],
            ],

        ];

        foreach ($cities as $provinceSlug => $cityList) {

            $province = Province::where('slug', $provinceSlug)->first();

            if (! $province) {
                continue;
            }

            foreach ($cityList as $city) {

                City::updateOrCreate(
                    [
                        'province_id' => $province->id,
                        'name' => $city['name'],
                    ],
                    [
                        'slug' => $city['slug'],
                    ]
                );
            }
        }
    }
}
