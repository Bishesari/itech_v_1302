<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(

            ['user_name' => 'Yasser'],

            [
                'password' => Hash::make('123456'),
                'is_active' => true,
                'last_login_at' => null,
            ]
        );

        Profile::updateOrCreate(

            ['user_id' => $user->id],

            [
                'identifier_type' => 'national_id',
                'identifier_value' => '2063531218',

                'gender' => 1,

                'f_name_fa' => 'یاسر',
                'l_name_fa' => 'بیشه سری',

                'nickname' => 'یاسر بی',
            ]
        );

        $role = Role::where('slug', 'super-admin')->first();

        if ($role) {

            UserRole::updateOrCreate(

                [
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                    'institute_id' => null,
                    'branch_id' => null,
                ],

                [
                    'is_last_selected' => true,
                ]
            );
        }

        // ساخت شماره تماس
        $contact = Contact::updateOrCreate(
            [
                'type' => 'mobile',
                'value' => '09177755924',
            ]
        );

        // اتصال شماره به کاربر
        $user->contacts()->syncWithoutDetaching([
            $contact->id => [
                'is_primary' => true,
            ],
        ]);
    }
}
