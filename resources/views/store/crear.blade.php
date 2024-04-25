<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuevo producto a añadir') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5  w-screen" style="background-image: url('../storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center;">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-md mx-auto">
                <div class="max-w-xl">
                    <div class="pt-5">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Nuevo Juego') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Selecciona la caratula del juego, nombre, descripción, precio y stock.") }}
                        </p>
                    </div>
                    <form action="{{route('store.save')}}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="image_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Caratula</x-input-label>
                            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" required />
                            @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre del juego</x-input-label>
                            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" required />
                            @error('nombre')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</x-input-label>
                            <x-text-input id="descripcion" name="descripcion" rows="4" class="mt-1 block w-full" required />
                            @error('descripcion')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</x-input-label>
                            <x-text-input id="precio" name="precio" type="number" class="mt-1 block w-full" min="0" step="0.01" required />
                            @error('precio')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</x-input-label>
                            <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" min="0" required />
                            @error('stock')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Subir Producto') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            @include('includes.volver')
        </div>
    </section>
</x-app-layout>