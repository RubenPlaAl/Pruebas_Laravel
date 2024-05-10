<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Number of visits') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background-image: url('./storage/Fondo-dashboard.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center dark:text-gray-100">
                    <h2 class="text-2xl font-semibold">{{ __("Welcome") }}, {{ auth()->user()->name }}.</h2>
                    <hr class="my-6">
                    <h2 class="text-2xl font-semibold">{{ __("Total Number of Visits") }}: {{ $visitas->total() }}</h2>
                    <h3 class="text-lg font-semibold mt-4">{{ __("Visit Data") }}:</h3>
                    <ul class="text-left">
                        @foreach ($visitas as $visita)
                            <li class="mb-4">
                                <strong>{{ __("IP") }}:</strong> {{ $visita->ip }}<br>
                                <strong>{{ __("Browser") }}:</strong> {{ $visita->browser }}<br>
                                <strong>{{ __("Visited Page") }}:</strong> {{ $visita->url }}<br>
                                <strong>{{ __("Date") }}:</strong> {{ $visita->created_at->toDateTimeString() }}<br>
                            </li>
                        @endforeach
                    </ul>
                    {{ $visitas->links() }}
                </div>
            </div>
        </div>
        @include('includes.volver')
    </div>
</x-app-layout>
