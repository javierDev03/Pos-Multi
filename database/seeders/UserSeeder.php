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
            [
                'name'              => 'Norita Financiero',
                'email'             => 'rf_cenidet@tecnm.mx',
                'password'          => Hash::make('citca2025xo'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            [
                'name'              => 'Ricardo Fabricio Escobar Jimenez',
                'email'             => 'ricardo.ej@cenidet.tecnm.mx',
                'password'          => Hash::make('citca2025fab'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            [
                'name'              => 'Carlos Daniel García Beltrán',
                'email'             => 'carlos.gb@cenidet.tecnm.mx',
                'password'          => Hash::make('citca2025car'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            [
                'name'              => 'Vitervo López Caballero',
                'email'             => 'vitervolopezcaballero@gmail.com',
                'password'          => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            [
                'name'              => 'Vitervo López Caballero',
                'email'             => 'veranocientifico@cenidet.tecnm.mx',
                'password'          => Hash::make('Password'),
                'email_verified_at' => now(),
                'created_at'        => now(),
            ],
            [
                'name'              => 'Vitervo López Caballero',
                'email'             => 'vitervo@cenidet.edu.mx',
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
        $conferencista= Role::create(['name' => 'Conferencista', 'description' => 'Conferencista']);
        $tallerista   = Role::create(['name' => 'Tallerista', 'description' => 'Tallerista']);
        $asistente    = Role::create(['name' => 'Asistente', 'description' => 'Asistente']);

        // Asignar roles a usuarios existentes
        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($admin);
        User::find(3)->assignRole($financial);
        User::find(4)->assignRole($adminrevista);
        User::find(5)->assignRole($adminrevista);
        User::find(6)->assignRole($postulant);
        User::find(7)->assignRole($editor);
        User::find(8)->assignRole($reviewer);
    }
}
