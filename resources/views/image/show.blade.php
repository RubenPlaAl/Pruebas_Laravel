<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ver los temas') }}
            </h2>
        </div>
    </x-slot>
    @include('includes.mensaje')
    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen" style="background-image: url('./storage/Fondo-Foro.jpg'); background-size: cover; background-position: center;">
            @foreach($images as $image)
            @include('includes.image', ['image'=>$image])
            @endforeach
         
            {{$images->links()}}
        </div>
    </section>

</x-app-layout>
