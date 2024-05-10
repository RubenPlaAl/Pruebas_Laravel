<style>
    #hero {
        width: 100%;
        height: calc(100vh - 110px);
        position: relative;
        overflow: hidden;
    }

    #hero video {
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
        z-index: 1;
    }

    /* Estilos adicionales para hacerlo responsivo */
    @media screen and (max-width: 768px) {
        #hero video {
            background-size: cover;
            height: 50em; 
        }

    #hero-content {
        width: 90%; /* Reducir el ancho del contenido */
        top: 50%; /* Ajustar la posición vertical */
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 16px; 
     
    }
    .text-lg{
        display: none;
    }
}
</style>

<x-app-layout>


    <section id="hero">
        <video autoplay muted loop id="myVideo">
            <source src="storage/Header-Video.mp4" type="video/mp4">
        </video>
        <div id="hero-content">
            <div class="px-4 py-5 my-5 text-center rounded bg-transparent">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200 mx-auto" />
                        </a>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-4">Plar Hub</h1>
                    <p class="text-lg text-gray-900 dark:text-gray-100 mb-4">{{__("Welcome to Plar Hub, the best page to find out about all the news in the World of Video Games, as well as being able to buy any game comfortably from our store. Everything you need in one place.")}}</p>
                    <div class="mt-4">
                    <a href="{{route('forum')}}" :active="request()->routeIs('store')" class="btn10">
                        <span>{{__("Go to Forum")}}</span>
                        <div class="transition"></div>
                    </a>                        <a href="{{route('store')}}" :active="request()->routeIs('store')" class="btn10">
                        <span>{{__("Go to Store")}}</span>
                        <div class="transition"></div>
                    </a>                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>
