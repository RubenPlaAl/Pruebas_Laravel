<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/welcome.css">

    <title>Botones Indice</title>
</head>

<body>
    <!-- Hero section -->
    <div class="hero">
        <div class="overlay"></div>
        <div class="content">
            <h1>{{__("WELCOME TO PLAR HUB")}}</h1>
            <hr>
            <x-application-logo class="block h-6 w-auto fill-current text-gray-800 dark:text-gray-200" />
        

        </div>

        <div class="top-right" >
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 log">
                @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{__("Dashboard")}}</a>
                @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{__("Log in")}}</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{__("Register")}}</a>
                @endif
                @endauth
            </div>
            @endif
            <div class="botton-right ">
        <div class="weather">
        @include("includes.weather") 
       </div>
        </div>
        </div>
   
    </div>
    </div>
    <section  class="h-screen w-screen" style="background-image: url('./storage/Fondo-Dashboard.jpg'); background-size: cover; background-position: center;">
    <!-- Grid section -->
    <div class="grid" >
        <a href="{{ url('/homepage') }}" class="link">
            <div class="card">
                <div class="wrapper">
                    <img src="./storage/Home-Btn.jpeg" alt="Home" class="cover-image">
                </div>
                <img src="./storage/Home-Title.png" alt="Home-title" class="title">
                <img src="./storage/Home-Hover.png" alt="Home-character" class="character">
            </div>
        </a>

        <a href="{{ url('/dashboard') }}" class="link">
            <div class="card">
                <div class="wrapper">
                    <img src="./storage/Dashboard-Btn.jpeg" alt="Dashboard" class="cover-image">
                </div>
                <img src="./storage/Dashboard-Title.png" alt="Dashboard-title" class="title">
                <img src="./storage/Dashboard-Hover.png" alt="Dashboard-character" class="character">
            </div>
        </a>

        <a href="{{ url('/store') }}" class="link">
            <div class="card">
                <div class="wrapper">
                    <img src="./storage/Store-Btn.jpeg" alt="Store" class="cover-image">
                </div>
                <img src="./storage/Store-Title.png" alt="Store-title" class="title">
                <img src="./storage/Store-Hover.png" alt="Store-character" class="character">
            </div>
        </a>

        <a href="{{ url('/forum') }}" class="link">
            <div class="card">
                <div class="wrapper">
                    <img src="./storage/Forum-Btn.jpeg" alt="Forum" class="cover-image">
                </div>
                <img src="./storage/Forum-Title.png" alt="Forum-title" class="title">
                <img src="./storage/Forum-Hover.png" alt="Forum-character" class="character">
            </div>
        </a>
    </div>
    </section>
</body>

</html>

