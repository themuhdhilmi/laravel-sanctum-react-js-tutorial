<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::Factory()->create([
            'name' => 'Admin'
        ]);
        Role::Factory()->create([
            'name' => 'Developer'
        ]);

        Role::Factory()->create([
            'name' => 'Tester'
        ]);

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123123123'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            'first_name' => 'Developer',
            'last_name' => 'Developer',
            'email' => 'developer@developer.com',
            'password' => Hash::make('123123123'),
            'role_id' => 2,
        ]);

        User::factory()->create([
            'first_name' => 'Tester',
            'last_name' => 'Tester',
            'email' => 'tester@tester.com',
            'password' => Hash::make('123123123'),
            'role_id' => 3,
        ]);


        User::factory(100)->create();
    }
}
