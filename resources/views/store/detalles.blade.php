<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-0">
                {{ __('Game details') }}
            </h2>
        </div>
    </x-slot>
    <section style="background-image: url('../storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 p-8">
            <div class="foto">
                <img src="{{ route('store.file',['filename' => $juego->caratula]) }}" alt="" class="zoom">
            </div>

            <div class="detalles bg-gray-800 text-white p-4 rounded-lg text-center flex justify-center items-center">
                <div class="texto mt-4 mb-6">
                    <h2 class="text-4xl font-semibold mb-4">{{ $juego->precio }}€ </h2>

                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold mb-2">{{$juego->nombre}}</h2>
                    </div>
                    <div class="mt-4">

                        <p class="text-xl">{{ $juego->descripcion }}</p>
                    </div>

                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold mb-2">Stock:</h2>
                        <p class="text-xl">{{ $juego->stock }}</p>
                    </div>

                    @if($juego->stock > 0)
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$juego->id}}">
                        <x-primary-button class="mt-5" type>
                            {{ __('Add to Cart') }}
                        </x-primary-button>
                    </form>
                    @else
                    <div class="mt-5 mt-5 flex justify-center">
                    <x-primary-button class="deletebtn" type>
                        {{ __('Out of Stock') }}
                    </x-primary-button>

                    </div>
                  
                    @endif
                </div>
            </div>
        </div>
        @include('includes.volver')
    </section>
</x-app-layout>