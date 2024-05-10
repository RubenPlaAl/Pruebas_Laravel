<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Forum') }}
        </h2>
     
   
 
    </x-slot>
    @include('includes.mensaje')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between h-screen" style="background-image: url('./storage/Fondo-Foro.jpg'); background-size: cover; background-position: center;">

    <div class="w-1/2 mx-4">
        
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                <p class="mb-6">{{__( "Want to post a Topic?")}}</p>
                <a href="{{route('image.create')}}" :active="request()->routeIs('forum')" class="btn10">
                        <span>{{__("Upload Topic")}}</span>
                        <div class="transition"></div>
                    </a>
            </div>
        </div>
    </div>

    <div class="w-1/2 mx-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                <p class="mb-6">{{__( "View the topics?")}}</p>
           
                <a href="{{route('image.show')}}" :active="request()->routeIs('forum')" class="btn10">
                        <span>{{__("View Topics")}}</span>
                        <div class="transition"></div>
                    </a>
            </div>
        </div>
    </div>
</div>

</x-app-layout>