<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Crear roles si no existen
        $admin        = Role::firstOrCreate(['name' => 'Admin'], ['description' => 'Administrador']);
        $editor       = Role::firstOrCreate(['name' => 'Editor'], ['description' => 'Editor']);
        $reviewer     = Role::firstOrCreate(['name' => 'Revisor'], ['description' => 'Revisor']);
        $postulant    = Role::firstOrCreate(['name' => 'Postulante'], ['description' => 'Postulante']);
        $financial    = Role::firstOrCreate(['name' => 'Finanzas'], ['description' => 'Finanzas']);
        $adminrevista = Role::firstOrCreate(['name' => 'Admin-Revista'], ['description' => 'Admin-Revista']);

        // 2️⃣ Crear usuarios mediante Eloquent (para que Spatie pueda asignar roles)
        $user1 = User::firstOrCreate(
            ['email' => 'test@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
            ]
        );

        $user2 = User::firstOrCreate(
            ['email' => 'Jav@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
            ]
        );
        $user3 = User::firstOrCreate(
            ['email' => 'test@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Password'),
                'email_verified_at' => now(),
            ]
        );

        // 3️⃣ Asignar roles a los usuarios
        $user1->syncRoles([$admin]);
        $user2->syncRoles([$admin]);
        $user3->syncRoles([$admin]);

        // 4️⃣ (Opcional) Si quieres que admin tenga todos los permisos
        $permissions = Permission::all();
        $admin->syncPermissions($permissions);
    }
}
