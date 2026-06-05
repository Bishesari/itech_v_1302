<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Profile;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::where('slug','super-admin')->first();
        $newbie = Role::where('slug','newbie')->first();
        $founder = Role::where('slug','founder')->first();

        // -------- Yasser --------
        $user = User::updateOrCreate(
            ['user_name' => 'Yasser'],
            [
                'password' => '123456',
                'is_active' => true,
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

        $contact = Contact::updateOrCreate([
            'type' => 'mobile',
            'value' => '09177755924',
        ]);

        $user->contacts()->syncWithoutDetaching([
            $contact->id => ['is_primary' => true],
        ]);

        UserRole::updateOrCreate([
            'user_id' => $user->id,
            'role_id' => $superAdmin->id,
        ],[
            'is_last_selected' => true
        ]);

        UserRole::updateOrCreate([
            'user_id' => $user->id,
            'role_id' => $newbie->id,
        ]);

        // -------- Neda --------
        $user = User::updateOrCreate(
            ['user_name' => 'Neda'],
            [
                'password' => '123456',
                'is_active' => true,
            ]
        );

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'identifier_type' => 'national_id',
                'identifier_value' => '3500984886',
                'gender' => 2,
                'f_name_fa' => 'ندا',
                'l_name_fa' => 'بخشی زاده',
                'nickname' => 'ندا بخشی',
            ]
        );

        $contact = Contact::updateOrCreate([
            'type' => 'mobile',
            'value' => '09177729312',
        ]);

        $user->contacts()->syncWithoutDetaching([
            $contact->id => ['is_primary' => true],
        ]);

        UserRole::updateOrCreate([
            'user_id' => $user->id,
            'role_id' => $founder->id,
        ],[
            'is_last_selected' => true
        ]);
    }
}
