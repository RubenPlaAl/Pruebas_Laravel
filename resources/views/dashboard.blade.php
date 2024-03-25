<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center dark:text-gray-100">
                    @if(auth()->check())
                    @if(auth()->user()->role === 'admin')
                    <div>
                        <!-- Contenido exclusivo para administradores -->
                        Bienvenido, Administrador.<br>
                        <i class="bi bi-person-fill text-white"></i>
                    </div>
                    @else
                    <div>
                        <!-- Contenido para usuarios normales -->
                        Bienvenido, {{ auth()->user()->name }}.
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            @if (auth()->user()->image)
            <x-input-label for="image" :value="__('Foto De Perfil')" class="text-center" />
            <div class="text-center">
                
                <img src="users/{{auth()->user()->image}}" >
              
            </div>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>




        <div class="px-4 py-5 my-5 text-center bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200 mx-auto" />
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-4">Plar Hub</h1>
                <p class="text-lg text-gray-900 dark:text-gray-100 mb-4">Bienvenido a Plar Hub, la mejor página para enterarte de todas las novedades del Mundo de los Videojuegos, además de poder comprar cualquier juego cómodamente desde nuestra tienda. Todo lo que necesitas en un mismo lugar.</p>
                <div class="mt-4">
                    <a href="{{ route('forum') }}" class="inline-block bg-blue-500 text-white py-3 px-6 rounded-lg mr-4 hover:bg-blue-600">Ir al Foro</a>
                    <a href="{{ route('store') }}" class="inline-block bg-blue-500 text-white border border-gray-500  py-3 px-6 rounded-lg hover:bg-gray-200 text-black">Ir a Tienda</a>
                </div>
            </div>
        </div>

        <div class="px-4 py-5 my-5 dark:bg-gray-800">
            <h2 class="pb-2 border-bottom text-center text-gray-900 dark:text-gray-100 text-2xl">¿Que vas a hacer?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-5">
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-chat-square-fill text-white"></i>
                    </div>
                    <h2 class="mt-2">Foro</h2>
                    <p class="mt-2 mb-5 h-20">Disfruta de nuestro foro, habla con otros usuarios y enterate de todas las novedades</p>
                    <a href="{{ route('forum') }}" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-bag-fill"></i>
                    </div>
                    <h2 class="mt-2">Tienda</h2>
                    <p class="mt-2 mb-5 h-20">Si ya sabes lo que quieres, simplemente ve a comprarlo en nuestra tienda y disfrutalo</p>
                    <a href="{{ route('store') }}" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h2 class="mt-2">Perfil</h2>
                    <p class="mt-2 mb-5 h-20">Actualiza tu perfil, para que todo el mundo lo vea.</p>
                    <a href="{{ route('profile.edit') }}" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
            </div>
        </div>
        @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="px-4 py-5 my-5 dark:bg-gray-800">
            <h2 class="pb-2 border-bottom text-center text-gray-900 dark:text-gray-100 text-2xl">Opciones de Administrador</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-5">
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-plus-circle-fill text-white"></i>
                    </div>
                    <h2 class="mt-2">Agregar Producto</h2>
                    <p class="mt-2 mb-5">Añadir nuevos productos al catálogo.</p>
                    <a href="#" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                    <h2 class="mt-2">Eliminar Comentario</h2>
                    <p class="mt-2 mb-5">Eliminar comentarios inapropiados o spam.</p>
                    <a href="#" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-person-x-fill"></i>
                    </div>
                    <h2 class="mt-2">Borrar Perfil</h2>
                    <p class="mt-2 mb-5">Eliminar perfiles de usuarios no deseados.</p>
                    <a href="#" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
                <div class="bg-primary bg-gradient rounded-lg p-4 text-center text-gray-900 dark:text-gray-100">
                    <div class="icon bg-black p-2 rounded-full">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h2 class="mt-2">Ver Visitas</h2>
                    <p class="mt-2 mb-5">Ver estadísticas de visitas al sitio web.</p>
                    <a href="#" class="icon-link mt-2">Ir <i class="bi bi-chevron-compact-right"></i></a>
                </div>
            </div>
        </div>
        @endif
    </div>

</x-app-layout>