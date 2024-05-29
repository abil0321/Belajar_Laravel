<x-app-layout>
    {{-- <x-slot name="title">
        My Stores
    </x-slot> --}}
    @slot('title', 'My Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('My Stores') }}
        </h2>
    </x-slot>

    <x-container>
        @forelse($stores as $store)
            <x-card class="p-6 my-5">
                <x-card.header>
                    <x-card.title>{{ $store->title }}</x-card.title>
                    <x-card.description>{{ $store->description }}</x-card.description>
                </x-card.header>
            </x-card>
        @empty
            <p class="text-zinc-400">
                You haven't make any stores yet
            </p>
        @endforelse
    </x-container>

</x-app-layout>
