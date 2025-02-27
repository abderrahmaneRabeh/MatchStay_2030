<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Profile Image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile image.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.updatePhoto') }}" enctype="multipart/form-data"
        class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="profile_image" :value="__('Profile Image URL')" />
            <x-text-input id="profile_image" name="profile_image" type="url" :value="old('profile_image', $user->photo)"
                class="block w-full mt-1" required />
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Upload') }}</x-primary-button>

            @if (session('status') === 'image-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Image uploaded successfully.') }}</p>
            @endif
        </div>
    </form>
</section>