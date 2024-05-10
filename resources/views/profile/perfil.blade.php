<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <!-- Avatar and Information -->
            <div class="datos-profile flex items-center">
                @if($user->image)
                <div class="nav-avatar mr-4">
                    <div class="profile-avatar">
                        <img src="{{route('user.avatar', ['filename'=>$user->image])}}" class="rounded" style="height: 150px;">
                    </div>
                </div>
                @endif
                <div>
                    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Profile of ') . $user->name }}
                    </h2>
                    <span class="text-sm text-gray-500 dark:text-gray-300">
                        {{ __('Joined: ') . FormatTime::LongTimeFilter($user->created_at) }}
                    </span>
                    <br>
                    <span class="text-sm text-gray-500 dark:text-gray-300">
                        {{ __('Posts: ') . count($user->images) }}
                    </span>
                </div>
            </div>
        </div>
    </x-slot>


    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 {{ count($user->images) === 0 ? 'h-screen' : '' }}" style="background-image: url('../storage/Fondo-Foro.jpg'); background-size: cover; background-position: center;">
            <div class="clearfix"></div>
            <!-- If the user has not uploaded any posts, this will be displayed -->
            @if(count($user->images) === 0)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("No posts yet") }}
                    </div>
                </div>
            </div>
            @endif
            <!-- List of user's published topics -->
            @foreach($user->images as $image)
            @include('includes.image', ['image'=> $image])
            @endforeach
            @include('includes.volver')
        </div>
    </section>
</x-app-layout>
