<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen {{ count($users) <= 3 ? 'h-screen' : '' }}" style="background-image: url('http://localhost/EntornoServidor/PlarHub/Pruebas_Laravel/public/storage/Fondo-Foro.jpg'); background-size: cover; background-position: center;">
            <div class="row buscador">
                <div class="col-md-12 mx-auto">
                    <div class="input-group">
                        <form method="GET" action="{{ route('profile.index')}}" id="buscador">
                            <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="search">
                            <span class="input-group-append">
                                <x-primary-button class="btn-search btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" value="Search">
                                    {{ __("Search") }}
                                </x-primary-button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>

            @if(count($users) === 0)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        {{ __("There are no profiles with that search, try another name.") }}
                    </div>
                </div>
            </div>

            @endif
            @foreach($users as $user)

            <div class="datos-profile flex items-center mb-5 p-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($user->image)
                <div class="nav-avatar mr-4">
                    <div class="profile-avatar">
                        <img src="{{route('user.avatar', ['filename'=>$user->image])}}" style="height: 150px;">
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
                        {{ __('Publications: ') . count($user->images) }}
                    </span>
                    <br><br>
                    <a href="{{route('perfil', ['id' => $user])}}"><x-primary-button>{{__("Visit Profile")}}</x-primary-button></a>

                </div>
            </div>
            @endforeach

            {{$users->links()}}
            @include('includes.volver')
        </div>
    </section>
</x-app-layout>
