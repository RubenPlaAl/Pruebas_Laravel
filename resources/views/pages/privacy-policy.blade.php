<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Política de Privacidad') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen mb-5" style="background-image: url('./storage/Fondo-Pages.jpg'); background-size: cover; background-position: center;">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="text-lg text-gray-800 dark:text-gray-200">
                    En nuestro sitio web, nos tomamos muy en serio la privacidad de nuestros usuarios. Esta <span class="font-semibold">política de privacidad</span> describe cómo recopilamos, utilizamos, protegemos y compartimos la información personal que recopilamos de nuestros usuarios.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Información que recopilamos
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    Recopilamos información personal de diversas formas, incluyendo cuando los usuarios se registran en nuestro sitio, realizan una compra, participan en encuestas, se suscriben a nuestro boletín informativo, y más.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Cómo utilizamos la información
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    Utilizamos la información recopilada para proporcionar y mejorar nuestros servicios, personalizar la experiencia del usuario, enviar correos electrónicos promocionales, procesar transacciones y más.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Protección de la información
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    Tomamos medidas razonables para proteger la información personal de nuestros usuarios contra accesos no autorizados, alteración, divulgación o destrucción.
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    Compartir información con terceros
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    No vendemos, intercambiamos ni alquilamos información personal de usuarios a terceros. Sin embargo, podemos compartir información con terceros de confianza que nos ayudan a operar nuestro sitio web y prestar servicios a nuestros usuarios.
                </p>

                <p class="text-lg text-gray-800 dark:text-gray-200 mt-4">
                    Si tienes alguna pregunta sobre nuestra política de privacidad, no dudes en <a href="{{ route('contact') }}" class="text-blue-500 hover:underline">contactarnos</a>.
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
