<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Temas que te gustan') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen" style="background-image: url('./storage/Fondo-Foro.jpg'); background-size: cover; background-position: center;">
            <!--Listado de los temas que gustan al usuario-->
            @foreach($likes as $like)
            @include('includes.image', ['image'=>$like->image])
            @endforeach
            <!--Paginacion-->
            <div class="clearfix"></div>
            {{$likes->links()}}
        </div>
    </section>
</x-app-layout>