<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $roles = ['super admin', 'admin', 'user'];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role,
            ]);
        }

        $super_admin = Role::query()->where('name', 'super admin')->first();
        $super_admin->syncPermissions(Permission::query()->get()->pluck('id')->toArray());
    }
}
