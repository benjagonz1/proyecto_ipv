<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Sistema IPV' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-[#F5F7FB]">

    <nav class="bg-white shadow-sm border-b p-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="bg-black text-white w-10 h-10 flex items-center justify-center rounded-lg">
                🏢
            </div>
            <div>
                <h1 class="text-xl font-semibold">IPV Formosa</h1>
                <p class="text-sm text-gray-500 -mt-1">Sistema de Inspecciones</p>
            </div>
        </div>

        <div class="flex items-center space-x-6">
            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 rounded-lg text-sm font-medium 
               {{ request()->routeIs('dashboard') ? 'bg-black text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                Dashboard
            </a>
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
