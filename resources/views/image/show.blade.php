<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ver los temas') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-5">
            @foreach($images as $image)
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-md mx-auto">
                <a href="{{ route('image.detail', ['id' => $image->id])}}">
                    <div class="max-w-xl relative">
                        <div class="mt-5">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{$image->user->name}}
                            </h2>
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ FormatTime::LongTimeFilter($image->created_at)  }}
                            </span>

                            <div class="relative mt-5">
                                <img src="{{route('image.file',['filename' => $image->image_path])}}" alt="" class="w-full h-auto rounded-lg">
                                <div class="absolute inset-0 bg-black opacity-50 rounded-lg"></div>
                            </div>
                        </div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                            <h3 class="font-semibold">{{$image->description}}</h3>

                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-star-fill  fs-4 mr-2"></i>
                            <i class="bi bi-star-fill text-warning fs-4 mr-2" style="color: yellow; display: none;"></i>
                            <x-primary-button class="mt-5">
                                <a href="#">Opiniones({{count($image->comments)}})</a>
                            </x-primary-button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="clearfix"></div>
            {{$images->links()}}
        </div>
    </section>
</x-app-layout>