<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Upload a Topic to the Forum') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 h-screen w-screen" style="background-image: url('./storage/Fondo-Foro.jpg'); background-size: cover; background-position: center;">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-md mx-auto">
                <div class="max-w-xl">
                    <div class="pt-5">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __("Start Topic") }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Select an image and describe the topic you want to start discussing.") }}
                        </p>
                    </div>
                    <form method="post" action="{{route('image.save')}}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="image_path" :value="__('Image')" />
                            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('Topic')" />
                            <x-text-input id="description" name="description" type="text-area" class="mt-1 block w-full h-32" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tema')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Publish') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            @include('includes.volver')
        </div>
     
    </section>

</x-app-layout>