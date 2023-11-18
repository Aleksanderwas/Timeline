<x-app-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="start_date" :value="__('Start Date')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required autocomplete="start_date" />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="end_date" :value="__('End Date')" />
            <x-text-input id="date" class="block mt-1 w-full"
                          type="date"
                          name="end_date"
                          required autocomplete="end_date" />

            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="end_date" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Add Event') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
