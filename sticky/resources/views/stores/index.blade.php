<x-app-layout>
    {{-- <x-slot name="title">
        Stores
    </x-slot> --}}
    @slot('title', 'Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <div style="border: 1px solid red;" class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
            <x-card class="p-6">
                <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}" class="px-7 rounded-lg"
                    class="size-16 rounded-lg">
                <x-card.header>
                    <h2>{{ $store->name }}</h2>
                </x-card.header>
                <x-card.description>
                    {{ $store->description }}
                </x-card.description>
                {{-- @dd(auth()->user()->id) --}}
                @auth
                @if ($store->user_id === auth()->user()->id)
                <a href="{{ route('stores.edit', $store) }}" class="underline text-blue-600 px-8">
                    Edit
                </a>
                @endif
                @endauth
            </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
