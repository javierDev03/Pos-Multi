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
        // Crear usuarios
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'vitervo.lc@cenidet.tecnm.mx',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Administrador',
                'email' => 'manuel.am@cenidet.tecnm.mx',
                'password' => Hash::make('citca2025admin'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Norita Financiero',
                'email' => 'rf_cenidet@tecnm.mx',
                'password' => Hash::make('citca2025xo'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ricardo Fabricio Escobar Jimenez',
                'email' => 'ricardo.ej@cenidet.tecnm.mx',
                'password' => Hash::make('citca2025fab'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos Daniel García Beltrán',
                'email' => 'carlos.gb@cenidet.tecnm.mx',
                'password' => Hash::make('citca2025car'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitervo López Caballero',
                'email' => 'vitervolopezcaballero@gmail.com',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitervo López Caballero',
                'email' => 'veranocientifico@cenidet.tecnm.mx',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitervo López Caballero',
                'email' => 'vitervo@cenidet.edu.mx',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Crear roles
        $roles = [
            ['name' => 'Admin', 'description' => 'Administrador'],
            ['name' => 'Editor', 'description' => 'Editor'],
            ['name' => 'Revisor', 'description' => 'Revisor'],
            ['name' => 'Postulante', 'description' => 'Postulante'],
            ['name' => 'Finanzas', 'description' => 'Finanzas'],
            ['name' => 'Admin-Revista', 'description' => 'Admin-Revista'],
            ['name' => 'Conferencista', 'description' => 'Conferencista'],
            ['name' => 'Tallerista', 'description' => 'Tallerista'],
            ['name' => 'Asistente', 'description' => 'Asistente'],
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }

        // Asignar roles a usuarios
        User::find(1)->assignRole('Admin');
        User::find(2)->assignRole('Admin');
        User::find(3)->assignRole('Finanzas');
        User::find(4)->assignRole('Admin-Revista');
        User::find(5)->assignRole('Admin-Revista');
        User::find(6)->assignRole('Postulante');
        User::find(7)->assignRole('Editor');
        User::find(8)->assignRole('Revisor');
    }
}
