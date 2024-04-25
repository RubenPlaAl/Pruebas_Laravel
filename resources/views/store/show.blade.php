<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ver Productos') }}
        </h2>
        <a href="{{route("store.checkout")}}">
        <div class="cart flex items-center justify-center bg-gray-200 p-2 rounded-full">
            <i class="bi bi-cart text-black"></i>
          <!--Aqui ira el if-->
        <span class="badge">{{count(Cart::content())}}</span>
           
        </div>
        </a>
    </div>
</x-slot>


    <section>
        <div class="hero-image">
            <div class="hero-text">
                <h2>Bienvenido</h2>
                <p>¡Sumérgete en la aventura! Encuentra tus juegos favoritos aquí.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen" style="background-image: url('../storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center;">
        @include('includes.mensaje')

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($juegos as $juego)
                @include('includes.juego', ['juego'=>$juego])
                @endforeach
            </div>
            {{$juegos->links()}}
        </div>
    </section>
</x-app-layout>