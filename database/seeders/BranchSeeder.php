<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\City;
use App\Models\Institute;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [

            'I-Tech Institute' => [

                [
                    'short_name' => 'شعبه مرکزی',
                    'code' => 'CEN',
                    'is_main' => true,
                    'province' => 'bushehr',
                    'city' => 'bushehr',
                    'address' => null,
                    'postal_code' => null,
                    'phone' => null,
                    'mobile' => null,
                    'is_active' => true,
                ],

                [
                    'short_name' => 'گناوه',
                    'code' => 'ITCGNV',
                    'is_main' => false,
                    'province' => 'bushehr',
                    'city' => 'genaveh',
                    'address' => null,
                    'postal_code' => null,
                    'phone' => null,
                    'mobile' => null,
                    'is_active' => true,
                ],

            ],

        ];

        foreach ($branches as $instituteSlug => $branchList) {

            $institute = Institute::where('slug', $instituteSlug)->first();

            if (! $institute) {
                continue;
            }

            foreach ($branchList as $data) {

                $province = Province::where('slug', $data['province'])->first();
                $city = City::where('slug', $data['city'])->first();

                if (! $province || ! $city) {
                    continue;
                }

                Branch::updateOrCreate(

                    [
                        'institute_id' => $institute->id,
                        'code' => $data['code'],
                    ],

                    [
                        'short_name' => $data['short_name'],
                        'is_main' => $data['is_main'],
                        'province_id' => $province->id,
                        'city_id' => $city->id,
                        'address' => $data['address'],
                        'postal_code' => $data['postal_code'],
                        'phone' => $data['phone'],
                        'mobile' => $data['mobile'],
                        'is_active' => $data['is_active'],
                    ]
                );
            }
        }
    }
}
