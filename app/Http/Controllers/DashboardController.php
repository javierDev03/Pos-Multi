<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {
        $user = auth()->user();
        $role = $user->getRoleNames()->first();

        // Solo datos simples de usuarios si es Admin o Editor
        $data = null;
        if (in_array($role, ['Admin', 'Editor'])) {
            $startOfWeek = now()->startOfWeek();
            $endOfWeek = now()->endOfWeek();

            $data = [
                'postulants' => User::role('Postulante')->count(),
                'newPostulantsThisWeek' => User::role('Postulante')
                    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->count(),
            ];
        }

        return Inertia::render('Dashboard', [
            'data' => $data,
            'role' => $role,
        ]);
    }
}
