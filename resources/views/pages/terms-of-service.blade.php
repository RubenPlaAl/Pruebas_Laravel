<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Terms of Service') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen mb-5" style="background-image: url('./storage/Fondo-Pages.jpg'); background-size: cover; background-position: center;">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __('These')}} <span class="font-semibold">{{ __('terms of service')}}</span> {{ __('govern the use of our website by users. By accessing and using this website, you agree to these terms and conditions in full.')}}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __('Use of the website') }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __('You are authorized to use this website for lawful purposes and in accordance with these terms of service. You must not use this website in any way that causes or may cause damage to the website or third parties.') }}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __('Content') }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("The content of this website is provided solely for general information and does not constitute professional advice. We reserve the right to modify or delete any content without prior notice.")}}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __('Links to other websites') }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __('This website may contain links to third-party websites that are not under our control. We assume no responsibility for the content or privacy policies of these third-party websites.')}}
                </p>

                <p class="text-lg text-gray-800 dark:text-gray-200 mt-4">
                    {{ __('If you have any questions about our terms of service, feel free to ')}}<a href="{{ route('contact') }}" class="text-blue-500 hover:underline">{{ __('contact us')}}</a>.
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
