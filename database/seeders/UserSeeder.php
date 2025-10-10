<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar usuarios
        DB::table('users')->insert([
            [
                'name'              => 'Administrador',
                'email'             => 'test@gmail.com',
                'password'          => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            [
                'name'              => 'Administrador',
                'email'             => 'Jav@gmail.com',
                'password'          => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            
        ]);

        // Crear roles
        $admin        = Role::create(['name' => 'Admin', 'description' => 'Administrador']);
        $editor       = Role::create(['name' => 'Editor', 'description' => 'Editor']);
        $reviewer     = Role::create(['name' => 'Revisor', 'description' => 'Revisor']);
        $postulant    = Role::create(['name' => 'Postulante', 'description' => 'Postulante']);
        $financial    = Role::create(['name' => 'Finanzas', 'description' => 'Finanzas']);
        $adminrevista = Role::create(['name' => 'Admin-Revista', 'description' => 'Admin-Revista']);
      

        // Asignar roles a usuarios existentes
        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($admin);
        
    }
}
