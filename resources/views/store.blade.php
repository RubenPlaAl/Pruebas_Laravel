<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    @include('includes.mensaje')
  
    <div class="h-screen flex items-initial justify-center " style="background-image: url('./storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center;">
        <div class="flex flex-col sm:flex-row max-w-7xl sm:w-70p mx-auto justify-arround mt-5">
            <div class="lg:w-1/2 mb-4  sm:mb-0 sm:mr-2">
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
            <div class="lg:w-1/2">
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
    </div>
</x-app-layout>

