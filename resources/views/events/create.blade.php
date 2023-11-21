<x-app-layout>
    @if(session()->has('message'))
        <x-dashboard-elements>
            {{ session()->get('message') }}
        </x-dashboard-elements>
    @endif
    <form method="POST" action="{{ route('events.store') }}" class="px-16 m-10" enctype="multipart/form-data">
        @csrf
        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label class="mt-2" for="category" :value="__('Category')" />
            <x-text-input id="category" class="mt-1 block w-full" type="text" name="category" :value="old('category')"/>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="start_date" :value="__('Start Date')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')"/>
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="end_date" :value="__('End Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')"/>
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="graphics" :value="__('Image')" />
            <x-text-input id="graphics" class="block mt-1 w-full" type="file" name="graphics" :value="old('graphics')"/>
            <x-input-error :messages="$errors->get('graphics')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Add Event') }}
            </x-primary-button>
        </div>
    </form>
    <div class="p-6 lg:gap-8">
        <x-primary-button >
            <a href="{{ url()->previous() }}" class=""> Back </a>
        </x-primary-button >
    </div>
</x-app-layout>
