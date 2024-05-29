<x-app-layout>
    {{-- <x-slot name="title">
        Dashboard
    </x-slot> --}}
    @slot('title', 'Dashboard')

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-zinc-900">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </x-container>

</x-app-layout>
