<?php

namespace Database\Seeders;

use App\Models\User\CompanySetting;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultSettings();
        $this->createDefaultRolePermissions();
        $this->createDefaultUsers();
        $this->createDemoUsers();
    }

    private function createDefaultSettings()
    {
        CompanySetting::create([
            'name'                 => 'Niloy Das  ',
            'mobile1'              => '01xxxxxxxxx',
            'email'                => 'info@gmail.com',
        ]);
    }

    private function createDefaultRolePermissions()
    {

        $permissions = [
            ['name' => 'user.access'],
            ['name' => 'user.create'],
            ['name' => 'user.edit'],
            ['name' => 'user.show'],
            ['name' => 'user.delete'],

            ['name' => 'status.access'],
            ['name' => 'status.delete'],

            ['name' => 'category.access'],
            ['name' => 'category.delete'],

            ['name' => 'officeCheckin.access'],
            ['name' => 'officeCheckin.delete'],

            ['name' => 'office.access'],
            ['name' => 'office.delete'],

            ['name' => 'application.access'],
            ['name' => 'application.show'],
            ['name' => 'application.delete'],

            ['name' => 'agent.access'],
            ['name' => 'agent.delete'],

            ['name' => 'workflow.access'],
            ['name' => 'workflow.delete'],

            ['name' => 'contact.access'],
            ['name' => 'contact.delete'],

            ['name' => 'branch.access'],
            ['name' => 'branch.delete'],

            ['name' => 'currency.access'],
            ['name' => 'currency.delete'],

            ['name' => 'appointment.access'],
            ['name' => 'appointment.delete'],

            ['name' => 'revenueType.access'],
            ['name' => 'revenueType.delete'],

            ['name' => 'productType.access'],
            ['name' => 'productType.delete'],

            ['name' => 'product.access'],
            ['name' => 'product.delete'],

            ['name' => 'partnerType.access'],
            ['name' => 'partnerType.delete'],

            ['name' => 'partner.access'],
            ['name' => 'partner.delete'],

            ['name' => 'client.access'],
            ['name' => 'client.delete'],

            ['name' => 'task.access'],
            ['name' => 'task.delete'],

            ['name' => 'enqury.access'],
            ['name' => 'enqury.delete'],

            ['name' => 'country.access'],
            ['name' => 'country.delete'],

            ['name' => 'state.access'],
            ['name' => 'state.delete'],

            ['name' => 'city.access'],
            ['name' => 'city.delete'],


            ['name' => 'contact_message.access'],
            ['name' => 'contact_message.delete'],

            ['name' => 'profile.access'],
            ['name' => 'profile.edit'],

            ['name' => 'settings.access'],
            ['name' => 'settings.edit'],

            ['name' => 'role.access'],
            ['name' => 'role.create'],
            ['name' => 'role.edit'],
            ['name' => 'role.show'],
            ['name' => 'role.delete'],

            ['name' => 'permission.access'],
            ['name' => 'permission.create'],
            ['name' => 'permission.edit'],
            ['name' => 'permission.show'],
            ['name' => 'permission.delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission["name"]
            ]);
        };

        //get all permissions via Gate::before rule; see AuthServiceProvider
        Role::create([
            'name' => 'Admin'
        ]);

        $userPermissions = [
            'profile.access',
            'profile.edit',
        ];

        Role::create([
            'name' => 'User'
        ])->givePermissionTo($userPermissions);
    }

    private function createDefaultUsers()
    {
        $admin=User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123123123'),
            'remember_token'    => Str::random(10),
        ]);
        $admin->assignRole('Admin');
    }

    private function createDemoUsers()
    {
        $user=User::create([
            'name'              => 'User',
            'email'             => 'user@gmail.com',
            'email_verified_at' => now(),
            'phone'             => '',
            'password'          => Hash::make('123123123'),
            'remember_token'    => Str::random(10),
        ]);
        $user->assignRole('User');
    }



}
