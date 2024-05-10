<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contact') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen mb-5" style="background-image: url('./storage/Fondo-Pages.jpg'); background-size: cover; background-position: center;">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("Do you have any questions, suggestions, or comments? We'd love to hear from you! Use the contact form below to get in touch with us.") }}
                </p>

                <!-- Contact form -->
                <form id="contactForm" action="{{ route('send.contact.email') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">{{ __("Name") }}</label>
                        <input type="text" id="name" name="name" autocomplete="on" class="form-input w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-400 focus:outline-none focus:ring-blue-400 dark:focus:ring-blue-400" required>
                        <div id="nameError" class="text-red-500 hidden">Por favor, introduce un nombre válido.</div>
                    </div>

                    <div class="mb-4">
                        <label for="question" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">{{ __("Question") }}</label>
                        <textarea id="question" name="question" rows="4" class="form-textarea w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-400 focus:outline-none focus:ring-blue-400 dark:focus:ring-blue-400" required></textarea>
                        <div id="questionError" class="text-red-500 hidden">Por favor, introduce una pregunta con al menos 10 caracteres.</div>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">{{ __("Send Message") }}<i class="ml-2 bi bi-envelope"></i></button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
    // Función para validar el formulario de contacto
    function validarContacto() {
        // Obtener los valores de los campos del formulario
        var name = document.getElementById('name').value.trim();
        var question = document.getElementById('question').value.trim();

        // Expresiones regulares para validar el nombre y la pregunta
        var nameRegex = /^[A-Za-z\s]+$/;
        var questionRegex = /^.{10,}$/;

        // Validar el nombre con la expresión regular
        if (!nameRegex.test(name)) {
            document.getElementById('nameError').classList.remove('hidden');
            return false;
        } else {
            document.getElementById('nameError').classList.add('hidden');
        }

        // Validar la pregunta con la expresión regular
        if (!questionRegex.test(question)) {
            document.getElementById('questionError').classList.remove('hidden');
            return false;
        } else {
            document.getElementById('questionError').classList.add('hidden');
        }

        // La validación pasó, enviar el formulario
        return true;
    }

    // Agregar un event listener para la validación al enviar el formulario
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        // Evitar el envío del formulario si la validación falla
        if (!validarContacto()) {
            event.preventDefault();
        }
    });
</script>
