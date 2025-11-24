@extends('layouts.app')

@section('content')

<div class="p-6 space-y-6">

    <!-- Título -->
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard de Inspecciones</h1>

    <!-- TARJETAS SUPERIORES -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white p-5 rounded-xl shadow-sm border">
            <p class="text-gray-500 text-sm">Total Inspecciones</p>
            <p class="text-3xl font-bold mt-2">{{ $total }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border">
            <p class="text-gray-500 text-sm">Aprobadas</p>
            <p class="text-3xl font-bold mt-2 text-green-600">{{ $aprobadas }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border">
            <p class="text-gray-500 text-sm">Pendientes</p>
            <p class="text-3xl font-bold mt-2 text-yellow-500">{{ $pendientes }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border">
            <p class="text-gray-500 text-sm">Rechazadas</p>
            <p class="text-3xl font-bold mt-2 text-red-500">{{ $rechazadas }}</p>
        </div>

    </div>

    <!-- GRÁFICOS SUPERIORES -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Gráfico de barras -->
        <div class="bg-white p-5 rounded-xl shadow-sm border h-[350px]">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Inspecciones por Mes</h2>
            <canvas id="barChart"></canvas>
        </div>

        <!-- Gráfico donut -->
        <div class="bg-white p-5 rounded-xl shadow-sm border h-[350px]">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Estado de Inspecciones</h2>
            <canvas id="donutChart"></canvas>
        </div>

    </div>

    <!-- GRAFICOS INFERIORES -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Tipos de Vivienda -->
        <div class="bg-white p-5 rounded-xl shadow-sm border">
            <h2 class="text-lg font-semibold mb-4">Tipos de Vivienda</h2>

            @foreach($tiposVivienda as $tipo)
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full 
                            @if($loop->index == 0) bg-blue-500 
                            @elseif($loop->index == 1) bg-purple-500 
                            @else bg-teal-500 @endif"></span>

                        <span>{{ $tipo->nombre }}</span>
                    </div>
                    <span class="font-semibold text-gray-700">{{ $tipo->inspecciones_count }}</span>
                </div>
            @endforeach
        </div>

        <!-- Inspecciones Recientes -->
        <div class="bg-white p-5 rounded-xl shadow-sm border">
            <h2 class="text-lg font-semibold mb-4">Inspecciones Recientes</h2>

            @foreach($recientes as $ins)
            <div class="p-4 mb-3 rounded-lg bg-gray-100 flex justify-between items-center">

                <div>
                    <p class="font-semibold">INS-{{ $ins->id_inspeccion }}</p>
                    <p class="text-sm text-gray-600">{{ $ins->direccion }}</p>
                </div>

                <div class="text-right">
                    <span class="px-3 py-1 rounded-full text-white text-xs
                        @if($ins->estado_id == 1) bg-green-600
                        @elseif($ins->estado_id == 2) bg-yellow-500
                        @else bg-red-500 @endif">
                        {{ $ins->estado->nombre }}
                    </span>

                    <p class="text-xs text-gray-500 mt-1">
                        {{ $ins->created_at->format('Y-m-d') }}
                    </p>
                </div>

            </div>
            @endforeach

        </div>

    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // === BAR CHART ===
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: @json($meses),
            datasets: [{
                label: 'Inspecciones',
                data: @json($conteoMeses),
                backgroundColor: '#4A90E2',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });

    // === DONUT CHART ===
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: ['Aprobadas', 'Pendientes', 'Rechazadas'],
            datasets: [{
                data: [{{ $aprobadas }}, {{ $pendientes }}, {{ $rechazadas }}],
                backgroundColor: ['#22c55e', '#f59e0b', '#ef4444']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

@endsection
