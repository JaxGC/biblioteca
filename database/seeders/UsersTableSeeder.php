<?php
namespace Database\Seeders;

use App\Models\model_has_roles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'id_status_usuario' => '1',
            'rol' => 'Admin',
            'clave' => '21140280',
            'id_licenciatura' => '1',
            'imagen_usuario' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ])->syncRoles('Admin');*/
 DB::table('status_usuarios')->insert([
            'Nombre_status_usu' => 'ACTIVO',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('status_usuarios')->insert([
            'Nombre_status_usu' => 'BLOQUEADO',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'id_status_usuario' => '1',
            'rol' => 'Admin',
            'clave' => '21140280', 
            'id_licenciatura' => '1',
            'imagen_usuario' => 'Default.png',
            'selectestado' =>'0',
            'selectmunicipio' =>'0',
            'selectlocalidad' =>'0',
            'referencia'=>'',
            'created_at' => now(),
            'updated_at' => now()
        ])/*->assignRole('Admin')*/;

        model_has_roles::create([
                'role_id'=>'1',
                'model_type'=>'App\Models\User',
                'model_id'=>'1',
                'created_at'=>now(),
                'updated_at'=>now()

            ]);
       
    }
}
