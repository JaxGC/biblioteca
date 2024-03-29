<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles para los usuarios y definir permisos
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Alum']);
        $role3=Role::create(['name'=>'Maes']);
        $role4=Role::create(['name'=>'Invi']);
        $role5=Role::create(['name'=>'CoAdmin']);

        //permisos para listados de administradores icons3 
        Permission::create(['name'=>'icons3'])->assignRole($role1);//->syncRoles($role1,$role2);--Para mas de dos roles
        Permission::create(['name'=>'PrestamoLibro'])->syncRoles($role1,$role2,$role3);
        Permission::create(['name'=>'ActivarPrestamos'])->syncRoles($role1,$role5);
        Permission::create(['name'=>'PrestamoLibroM'])->syncRoles($role1,$role2);
    }
}
