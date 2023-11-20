<x-app-layout>
    @if(session()->has('message'))
        <x-dashboard-elements>
            {{ session()->get('message') }}
        </x-dashboard-elements>
    @endif
    <form method="post" action="{{ route('events.update', ['event' => $event]) }}" class="p-16 m-10" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{old('title', $event->title)}}"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label class="mt-2" for="category" :value="__('Category')" />
            <x-text-input id="category" class="mt-1 block w-full" type="text" name="category" value="{{old('title', $event->category->name)}}"/>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="start_date" :value="__('Start Date')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{old('title', $event->start_date)}}"/>
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="end_date" :value="__('End Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="end_date" value="{{old('title', $event->end_date)}}"/>
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{old('title', $event->description)}}"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="graphics" :value="__('Image')" />
            <x-text-input id="graphics" class="block mt-1 w-full" type="file" name="graphics"/>
            <x-input-error :messages="$errors->get('graphics')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Update Event') }}
            </x-primary-button>
        </div>
    </form>
        <div class="p-6 ml-16">
            <x-primary-button >
                <a href="{{ url()->previous() }}" class=""> Back </a>
            </x-primary-button >
        </div>
</x-app-layout>
