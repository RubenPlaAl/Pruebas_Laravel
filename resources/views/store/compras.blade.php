<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-0">
                {{ __('Pedidos Realizados') }}
            </h2>
        </div>
    </x-slot>
    <section class="bg-gray-100 dark:bg-gray-800 py-10" :class="{ 'h-screen': (pedidos.length < 3)}" style="background-image: url('../storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center;">

    @if($pedidos->isEmpty())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-screen">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        {{ __("No has comprado nada todavia, ve a la tienda y no te pierdas nuestros geniales precios.") }}
                    </div>
                </div>
            </div>
    @else
        <div class="max-w-4xl mx-auto">
        @php 
        $contador = 1; 
        @endphp
            @foreach ($pedidos as $pedido)
            <div class="bg-white dark:bg-gray-900 shadow-lg rounded-lg mb-4">
                <div class="px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Pedido {{ $contador }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">Fecha del pedido: {{ $pedido->created_at }}</p>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Ítems del pedido:</h3>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($pedido->items as $item)
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                        <img src="{{ route('store.file',['filename' => $item->caratula]) }}" alt="" class="zoom">
                            <p class="text-gray-800 dark:text-gray-200 font-semibold">{{ $item->nombre }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @php
            $contador++;
            @endphp
            @endforeach
        </div>
        @endif
        @include('includes.volver');
    </section>
</x-app-layout>
