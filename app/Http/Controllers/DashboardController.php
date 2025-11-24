<?php

namespace App\Http\Controllers;

use App\Models\Inspeccion;
use App\Models\TipoVivienda;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Totales generales
        $total = Inspeccion::count();
        $aprobadas = Inspeccion::where('estado_id', 1)->count();
        $pendientes = Inspeccion::where('estado_id', 2)->count();
        $rechazadas = Inspeccion::where('estado_id', 3)->count();

        // Gráfico: últimos 6 meses
        $hace6Meses = Carbon::now()->subMonths(6);

        $inspeccionesMes = Inspeccion::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->where('created_at', '>=', $hace6Meses)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Datos para el grafico
        $meses = $inspeccionesMes->pluck('mes');
        $conteoMeses = $inspeccionesMes->pluck('total');

        // Tipos de vivienda con cantidad de inspecciones
        $tiposVivienda = TipoVivienda::withCount('inspecciones')->get();

        // Últimas 5 inspecciones
        $recientes = Inspeccion::with(['tipo', 'estado'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'total',
            'aprobadas',
            'pendientes',
            'rechazadas',
            'meses',
            'conteoMeses',
            'tiposVivienda',
            'recientes'
        ));
    }
}
