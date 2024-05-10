<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    @include('includes.mensaje')
  
    <div class="py-12 h-screen flex items-center justify-center" style="background-image: url('./storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center;">
   
        <div class="w-1/2 mx-2 mb-[500px] lg:mx-4"> <!-- Se ajustó el margen horizontal en tamaño pequeño -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <p class="mb-6">{{__("Buy")}}</p>
                    <a href="{{route('store.show')}}" :active="request()->routeIs('store')" class="btn10">
                        <span>{{__("Go to Store")}}</span>
                        <div class="transition"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-1/2 mx-2 mb-[500px] lg:mx-4"> <!-- Se ajustó el margen horizontal en tamaño pequeño -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <p class="mb-6">{{__("Registration")}}</p>
                    <a href="{{route('store.compras')}}" :active="request()->routeIs('store')" class="btn10">
                        <span>{{__("VIEW PURCHASES")}}</span>
                        <div class="transition"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
