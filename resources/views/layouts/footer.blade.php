<footer x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-gray-100 dark:border-gray-700 mt-5 text-white">
    <div class="grid grid-cols-4 gap-4">
        <!-- Primera columna: Logo y Copyright -->
        <div class="col-span-1 flex flex-col items-start border-r border-gray-300 dark:border-gray-600 pr-4 pb-4">
            <span>
                <x-application-logo class="block h-6 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </span>
            <span class="mt-2 text-xl">PLAR HUB</span>
            <p>
                @lang('Copyright') &copy; {{ date('Y') }}
            </p>
        </div>

        <!-- Segunda columna: Follow Us y Redes Sociales -->
        <div class="col-span-1 border-r border-gray-300 dark:border-gray-600 pr-4 pb-4">
            <strong class="text-xl">@lang('Siguenos'):</strong>
            <div class="flex mt-2">
                <a href="https://www.facebook.com" target="_blank" class="ml-2"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com" target="_blank" class="ml-2"><i class="bi bi-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank" class="ml-2"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank" class="ml-2"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>


        <!-- Tercera columna: Enlaces de Política de Privacidad, Términos de Servicio y Contacto -->
        <div class="col-span-1 border-r border-gray-300 dark:border-gray-600 pr-4 pb-4">
            <strong class="text-xl">@lang('Enlaces útiles'):</strong>
            <div class="mt-2">
                <a href="{{ route('privacy-policy') }}" class="text-gray-300 hover:text-gray-500">@lang('Política de Privacidad')</a><br>
                <a href="{{ route('terms-of-service') }}" class="text-gray-300 hover:text-gray-500">@lang('Términos de Servicio')</a><br>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-gray-500">@lang('Contáctanos')</a>
            </div>
        </div>


        <!-- Cuarta columna: Datos Finales -->
        <div class="col-span-1 pr-4 pb-4">
            <strong class="text-xl">@lang('Contacto'):</strong>
            <div class="mt-2">
                <p>plar.hub.store@gmail.com</p>
                <p>Crevillente, España</p>
            </div>
            <p>Designed and developed by Rubén PA</p>
        </div>
    </div>
</footer>