<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Modify Post') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 h-screen w-screen" style="background-image: url(' http://localhost/EntornoServidor/PlarHub/Pruebas_Laravel/public/storage/Fondo-Foro.jpg'); background-size: cover; background-position: center; background-repeat: repeat;">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-md mx-auto">
                <div class="max-w-xl">
                    <div class="pt-5">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Edit Topic') }}
                        </h2>
                       
                    </div>
                    <form method="post" action="{{route('image.update')}}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}"/>

                        <div>
                        <p class="text-white">{{__("Current Image")}}</p> <img src="{{route('image.file',['filename' => $image->image_path])}}" alt="" class="edit">

                            <x-input-label for="image_path" :value="__('Image')" />
                            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('Topic')" />
                            <x-text-input id="description" name="description" type="text-area" class="mt-1 block w-full" value="{{$image->description}}"/> 
                            <x-input-error class="mt-2" :messages="$errors->get('tema')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Changes') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
