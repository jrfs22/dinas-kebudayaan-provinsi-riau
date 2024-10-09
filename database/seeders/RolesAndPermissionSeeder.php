<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permission
        Permission::create(['name' => 'create news']);
        Permission::create(['name' => 'read news']);
        Permission::create(['name' => 'update news']);
        Permission::create(['name' => 'delete news']);

        Permission::create(['name' => 'create news_categories']);
        Permission::create(['name' => 'read news_categories']);
        Permission::create(['name' => 'update news_categories']);
        Permission::create(['name' => 'delete news_categories']);

        Permission::create(['name' => 'create kontak']);
        Permission::create(['name' => 'update profiles']);
        Permission::create(['name' => 'delete profiles']);

        Permission::create(['name' => 'read kontak']);
        Permission::create(['name' => 'read sambutan']);
        Permission::create(['name' => 'read struktur']);
        Permission::create(['name' => 'read visimisi']);
        Permission::create(['name' => 'read tugas_pokok']);
        Permission::create(['name' => 'read profil']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create news');
        $role->givePermissionTo('read news');
        $role->givePermissionTo('update news');
        $role->givePermissionTo('delete news');


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
