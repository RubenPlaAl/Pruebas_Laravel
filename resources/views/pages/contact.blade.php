<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contacto') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen mb-5" style="background-image: url('./storage/Fondo-Pages.jpg'); background-size: cover; background-position: center;">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="text-lg text-gray-800 dark:text-gray-200">
                    ¿Tienes alguna pregunta, sugerencia o comentario? ¡Nos encantaría saber de ti! Utiliza el formulario de contacto a continuación para ponerte en contacto con nosotros.
                </p>

                <!-- Formulario de contacto -->
                <form action="{{ route('send.contact.email') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">Nombre</label>
                        <input type="text" id="name" name="name" class="form-input w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-400 focus:outline-none focus:ring-blue-400 dark:focus:ring-blue-400" required>
                    </div>

                    <div class="mb-4">
                        <label for="pregunta" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">Pregunta</label>
                        <textarea id="pregunta" name="pregunta" rows="4" class="form-textarea w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-400 focus:outline-none focus:ring-blue-400 dark:focus:ring-blue-400" required></textarea>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Enviar Mensaje<i class="ml-2 bi bi-envelope"></i></button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
