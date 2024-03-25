<section>
<img src="<?php echo asset("users/$user->image")?>"></img>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile avatar picture.") }}
        </p>
    </header>

  

    <form method="post" action="{{ route('profile.image') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    @method('post')
        <div>
            <x-input-label for="image_path" :value="__('Avatar')" />
            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" :value="old('image', $user->image)"/>
            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
