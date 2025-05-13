<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard'                    => ['dashboard'],
            'services'                     => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'products'                     => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'sliders'                      => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'whyUs'                        => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'about'                        => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'contacts'                     => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'subscription'                 => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'developments'                 => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'packages'                     => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'packageDetails'               => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'features'                     => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'infoSections'                 => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'infoSectionsDetails'          => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'infoOptions'                  => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'productFeatures'              => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'productServices'              => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'faqs'                         => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'users'                        => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'roles'                        => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'permissions'                  => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
            'settings'                     => ['list', 'show', 'create', 'edit', 'delete' ,'active'],
        ];

        foreach ($permissions as $module => $actions) {
            foreach ($actions as $action) {
                Permission::updateOrCreate([
                    'name' => "{$action} {$module}",
                ]);
            }
        }
    }
}
