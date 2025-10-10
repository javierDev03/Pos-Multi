<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Asegura que solo los usuarios autenticados puedan acceder a este controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra la vista principal del dashboard.
     *
     * @param Request $request
     * @return Response
     */
    public function dashboard(Request $request): Response
    {
        // --- INICIO DE LA LÓGICA ---
        // Este es un buen lugar para empezar a agregar la lógica de tu nuevo dashboard.
        // Puedes obtener datos de la base de datos, calcular estadísticas, etc.

        // Ejemplo: Obtener el nombre del usuario autenticado.
        $userName = auth()->user()->name;

        // Ejemplo: Preparar un array con datos para pasar a la vista.
        // Estos datos coinciden con los widgets de ejemplo de la plantilla de Vue.
        $stats = [
            'clients' => 512,
            'sales' => 777,
            'performance' => 256,
        ];

        // --- FIN DE LA LÓGICA ---


        // Renderiza el componente de Inertia 'Dashboard' y le pasa los datos necesarios como props.
        return Inertia::render('Dashboard', [
            // Descomenta y utiliza estas props a medida que las necesites.
            // 'userName' => $userName,
            // 'stats' => $stats,
        ]);
    }
}