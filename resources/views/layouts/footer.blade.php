<footer x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-gray-100 dark:border-gray-700 mt-5 text-white">
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <!-- Primera columna: Logo y Copyright -->
        <div class="sm:border-r sm:border-gray-300 sm:dark:border-gray-600 pb-4">
            <span>
                <x-application-logo class="block h-6 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </span>
            <span class="mt-2 text-xl">{{ __("PLAR HUB") }}</span>
            <p>
                {{ __("Copyright©") }} &copy; {{ date('Y') }}
            </p>
        </div>

        <!-- Segunda columna: Follow Us y Redes Sociales -->
        <div class="sm:border-r sm:border-gray-300 sm:dark:border-gray-600 pb-4">
            <strong class="text-xl">{{ __("Follow us") }}:</strong>
            <div class="flex mt-2">
                <a href="https://www.facebook.com" target="_blank" class="ml-2"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com" target="_blank" class="ml-2"><i class="bi bi-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank" class="ml-2"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank" class="ml-2"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>


        <!-- Tercera columna: Enlaces de Política de Privacidad, Términos de Servicio y Contacto -->
        <div class="sm:border-r sm:border-gray-300 sm:dark:border-gray-600 pb-4">
            <strong class="text-xl">{{ __("Useful Links") }}:</strong>
            <div class="mt-2">
                <a href="{{ route('privacy-policy') }}" class="text-gray-300 hover:text-gray-500">{{ __("Privacy Policy") }}</a><br>
                <a href="{{ route('terms-of-service') }}" class="text-gray-300 hover:text-gray-500">{{ __("Terms of Service") }}</a><br>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-gray-500">{{ __("Contact Us") }}</a>
            </div>
        </div>


        <!-- Cuarta columna: Datos Finales -->
        <div class="pb-4">
            <strong class="text-xl">{{ __("Contact") }}:</strong>
            <div class="mt-2">
                <p>{{ __("plar.hub.store@gmail.com") }}</p>
                <p>{{ __("Crevillente, Spain") }}</p>
            </div>
            <p>{{ __("Designed and developed by Rubén PA") }}</p>
        </div>
    </div>
</footer>
