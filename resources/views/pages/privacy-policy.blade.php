<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Privacy Policy') }}
            </h2>
        </div>
    </x-slot>

    <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-5 w-screen mb-5" style="background-image: url('./storage/Fondo-Pages.jpg'); background-size: cover; background-position: center;">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("In our website, we take the privacy of our users very seriously. This") }} <span class="font-semibold">{{ __("privacy policy") }}</span> {{ __("describes how we collect, use, protect, and share the personal information we collect from our users.") }}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __("Information We Collect") }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("We collect personal information in various ways, including when users register on our site, make a purchase, participate in surveys, subscribe to our newsletter, and more.") }}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __("How We Use the Information") }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("We use the collected information to provide and improve our services, personalize user experience, send promotional emails, process transactions, and more.") }}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __("Information Protection") }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("We take reasonable measures to protect our users' personal information against unauthorized access, alteration, disclosure, or destruction.") }}
                </p>

                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">
                    {{ __("Sharing Information with Third Parties") }}
                </h3>

                <p class="text-lg text-gray-800 dark:text-gray-200">
                    {{ __("We do not sell, trade, or rent users' personal information to third parties. However, we may share information with trusted third parties who help us operate our website and provide services to our users.") }}
                </p>

                <p class="text-lg text-gray-800 dark:text-gray-200 mt-4">
                    {{ __("If you have any questions about our privacy policy, feel free to") }} <a href="{{ route('contact') }}" class="text-blue-500 hover:underline">{{ __("contact us") }}</a>.
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
