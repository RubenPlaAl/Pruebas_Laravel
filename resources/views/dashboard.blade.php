<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @include('includes.mensaje')

    <div class="py-12" style="background-image: url('./storage/Fondo-dashboard.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center dark:text-gray-100">
                    @if(auth()->check())
                    @if(auth()->user()->role === 'admin')
                    <div>
                        <!-- Contenido exclusivo para administradores -->
                        <h2 class="text-2xl font-semibold">{{__('Welcome, Administrator')}}</h2><br>
                    </div>
                    @else
                    <div>
                        <!-- Contenido para usuarios normales -->
                        <h2 class="text-2xl font-semibold">{{__('Welcome')}}, {{ auth()->user()->name }}.</h2>
                    </div>
                    @endif
                    @endif
                    @include('includes.language')
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-5 my-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg menu">
                <div class="p-4 text-center dark:text-gray-100">
                    <div class="icon bg-primary bg-gradient p-4 rounded-t-lg">
                        <i class="bi bi-chat-square-fill text-white text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold mt-4">{{__('Favorites')}}</h2>
                    <p class="mt-2 mb-5">{{__( "Go to the topics you like, and check the ones others like.")}}</p>
                    <a href="{{ route('likes') }}" class="btn btn-primary">{{__("Go")}} <i class="bi bi-chevron-compact-right"></i>
                        <span class="border border-top"></span>
                        <span class="border border-right"></span>
                        <span class="border border-bottom"></span>
                        <span class="border border-left"></span>
                    </a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg menu">
                <div class="p-4 text-center dark:text-gray-100">
                    <div class="icon bg-primary bg-gradient p-4 rounded-t-lg">
                        <i class="bi bi-people-fill text-white text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold mt-4">{{__("People")}}</h2>
                    <p class="mt-2 mb-5">{{__("Search other people")}}</p>
                    <a href="{{ route('profile.index') }}" class="btn btn-primary">{{__("Go")}} <i class="bi bi-chevron-compact-right"></i>
                        <span class="border border-top"></span>
                        <span class="border border-right"></span>
                        <span class="border border-bottom"></span>
                        <span class="border border-left"></span>
                    </a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg menu">
                <div class="p-4 text-center dark:text-gray-100">
                    <div class="icon bg-primary bg-gradient p-4 rounded-t-lg">
                        <i class="bi bi-person-fill text-white text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold mt-4">{{__("Profile")}}</h2>
                    <p class="mt-2 mb-5">{{__("Here is your Personal Profile")}}</p>
                    <a href="{{ route('perfil', ['id' => Auth::user()->id]) }}" class="btn btn-primary">{{__("Go")}}  <i class="bi bi-chevron-compact-right"></i>
                        <span class="border border-top"></span>
                        <span class="border border-right"></span>
                        <span class="border border-bottom"></span>
                        <span class="border border-left"></span>
                    </a>
                </div>
            </div>
        </div>
        @if(auth()->check() && auth()->user()->role === 'admin')

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg menu">
                <div class="p-6 text-gray-900 text-center dark:text-gray-100">
                    @if(auth()->user()->role === 'admin')
                    <div>
                        <h2 class="text-2xl font-semibold">{{__("Admin Options")}}</h2>
                    </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4 py-5 my-5">
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg menu">
                    <div class="p-4 text-center text-gray-900 dark:text-gray-100">
                        <div class="icon bg-primary bg-gradient p-2 rounded-full">
                            <i class="bi bi-plus-circle-fill text-white text-3xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold mt-2">{{__("Add Products")}}</h2>
                        <p class="mt-2 mb-5">{{__("Add products to the shop")}}</p>
                        <a href="{{ route('store.crear')}}" class="btn btn-primary">{{__("Go")}}<i class="bi bi-chevron-compact-right"></i>
                            <span class="border border-top"></span>
                            <span class="border border-right"></span>
                            <span class="border border-bottom"></span>
                            <span class="border border-left"></span>
                        </a>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg menu">
                    <div class="p-4 text-center text-gray-900 dark:text-gray-100">
                        <div class="icon bg-primary bg-gradient p-2 rounded-full">
                            <i class="bi bi-trash-fill text-white text-3xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold mt-2">{{__("Delete Posts or Comments")}}</h2>
                        <p class="mt-2 mb-5">{{__( "Delete inappropriate or spam posts or comments.")}}</p>
                        <a href="{{ route('image.show') }}" class="btn btn-primary">{{__("Go")}} <i class="bi bi-chevron-compact-right"></i>
                            <span class="border border-top"></span>
                            <span class="border border-right"></span>
                            <span class="border border-bottom"></span>
                            <span class="border border-left"></span>
                        </a>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg menu">
                    <div class="p-4 text-center text-gray-900 dark:text-gray-100">
                        <div class="icon bg-primary bg-gradient p-2 rounded-full">
                            <i class="bi bi-person-x-fill text-white text-3xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold mt-2">{{__("Delete Profiles")}}</h2>
                        <p class="mt-2 mb-5">{{__( "Delete unwanted user profiles, also you can create a PDF of the users")}}</p>
                        <a href="{{route('admin.borrar-usuarios')}}" class="btn btn-primary">{{__("Go")}} <i class="bi bi-chevron-compact-right"></i>
                            <span class="border border-top"></span>
                            <span class="border border-right"></span>
                            <span class="border border-bottom"></span>
                            <span class="border border-left"></span>
                        </a>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg menu">
                    <div class="p-4 text-center text-gray-900 dark:text-gray-100">
                        <div class="icon bg-primary bg-gradient p-2 rounded-full">
                            <i class="bi bi-eye-fill text-white text-3xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold mt-2">{{__("View Visits")}}</h2>
                        <p class="mt-2 mb-5">{{__("View website visit statistics.")}}</p>
                        <a href="{{route('admin.numero-visitas')}}" class="btn btn-primary">{{__("Go")}}<i class="bi bi-chevron-compact-right"></i>
                            <span class="border border-top"></span>
                            <span class="border border-right"></span>
                            <span class="border border-bottom"></span>
                            <span class="border border-left"></span>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>

</x-app-layout>