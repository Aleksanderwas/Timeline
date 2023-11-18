<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div style="padding:15px; text-align: center">
    </div>
    <x-dashboard-elements>
        Add event
    </x-dashboard-elements>
    <x-dashboard-elements>
        Modify Event
    </x-dashboard-elements>
    <x-dashboard-elements>
        Delete Event
    </x-dashboard-elements>
</x-app-layout>
