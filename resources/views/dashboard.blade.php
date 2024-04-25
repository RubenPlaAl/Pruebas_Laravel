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
                        <h2 class="text-2xl font-semibold">Bienvenido, Administrador.</h2><br>
                    </div>
                    @else
                    <div>
                        <!-- Contenido para usuarios normales -->
                        <h2 class="text-2xl font-semibold">Bienvenido, {{ auth()->user()->name }}.</h2>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-5 my-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg menu">
                <div class="p-4 text-center dark:text-gray-100">
                    <div class="icon bg-primary bg-gradient p-4 rounded-t-lg">
                        <i class="bi bi-chat-square-fill text-white text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold mt-4">Favoritos del Foro</h2>
                    <p class="mt-2 mb-5">Ir a los Temas que te interesan y revisar las opiniones de los demás.</p>
                    <a href="{{ route('likes') }}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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
                    <h2 class="text-xl font-semibold mt-4">Gente</h2>
                    <p class="mt-2 mb-5">Aquí puedes buscar otras personas.</p>
                    <a href="{{ route('profile.index') }}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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
                    <h2 class="text-xl font-semibold mt-4">Perfil</h2>
                    <p class="mt-2 mb-5">Aquí está tu perfil personal.</p>
                    <a href="{{ route('perfil', ['id' => Auth::user()->id]) }}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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
                        <h2 class="text-2xl font-semibold">Opciones de Administrador</h2>
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
                        <h2 class="text-xl font-semibold mt-2">Agregar Productos</h2>
                        <p class="mt-2 mb-5">Añadir nuevos productos al catálogo de la tienda.</p>
                        <a href="{{ route('store.crear')}}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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
                        <h2 class="text-xl font-semibold mt-2">Eliminar Publicaciones o Comentarios</h2>
                        <p class="mt-2 mb-5">Eliminar publicaciones o comentarios inapropiados o spam.</p>
                        <a href="{{ route('image.show') }}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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
                        <h2 class="text-xl font-semibold mt-2">Borrar Perfiles</h2>
                        <p class="mt-2 mb-5">Eliminar perfiles de usuarios no deseados.</p>
                        <a href="{{route('admin.borrar-usuarios')}}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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
                        <h2 class="text-xl font-semibold mt-2">Ver Visitas</h2>
                        <p class="mt-2 mb-5">Ver estadísticas de visitas al sitio web.</p>
                        <a href="{{route('admin.numero-visitas')}}" class="btn btn-primary">Ir <i class="bi bi-chevron-compact-right"></i>
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