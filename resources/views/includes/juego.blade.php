<div class="tarjeta p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-md mx-auto">
    <div class="max-w-xl relative text-center">
        <!-- Nombre del juego -->
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
            {{ $juego->nombre }}
        </h1>
        <!-- Carátula del juego -->
        <div class="flex justify-center mb-4">
            <div class="caratula">
                <img src="{{route('store.file',['filename' => $juego->caratula])}}" alt="" class="rounded mt-2" style="height: 300px; width: auto;">
            </div>
        </div>
        <!-- Descripción del juego -->
        <div class="mt-4 mb-4">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">{{__("Description")}}</h2>
            <p class="text-gray-700 dark:text-gray-300">{{ $juego->descripcion }}</p>
        </div>

        <!-- Botón para ver detalles del juego -->
        <div class="flex justify-center">
            <a href="{{route('store.detalles', ['id' => $juego->id])}}">
                <x-primary-button>
                    {{ __('Game details') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</div>
