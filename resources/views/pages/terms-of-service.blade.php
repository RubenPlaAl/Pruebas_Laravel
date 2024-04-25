<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Términos de Servicio') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen mb-5" style="background-image: url('./storage/Fondo-Pages.jpg'); background-size: cover; background-position: center;">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="text-lg text-gray-800 dark:text-gray-200">
                    Estos <span class="font-semibold">términos de servicio</span> gobiernan el uso de nuestro sitio web por parte de los usuarios. Al acceder y utilizar este sitio web, aceptas estos términos y condiciones en su totalidad.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Uso del sitio web
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    Estás autorizado a utilizar este sitio web para fines legales y de acuerdo con estos términos de servicio. No debes utilizar este sitio web de ninguna manera que cause o pueda causar daño al sitio web o a terceros.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Contenido
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    El contenido de este sitio web es proporcionado únicamente para información general y no constituye asesoramiento profesional. Nos reservamos el derecho de modificar o eliminar cualquier contenido sin previo aviso.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Enlaces a otros sitios web
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    Este sitio web puede contener enlaces a sitios web de terceros que no están bajo nuestro control. No asumimos ninguna responsabilidad por el contenido o las políticas de privacidad de estos sitios web de terceros.
                </p>

                <p class="text-lg text-gray-800 dark:text-gray-200 mt-4">
                    Si tienes alguna pregunta sobre nuestros términos de servicio, no dudes en <a href="{{ route('contact') }}" class="text-blue-500 hover:underline">contactarnos</a>.
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
