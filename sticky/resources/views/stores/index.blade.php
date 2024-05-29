<x-app-layout>
    {{-- <x-slot name="title">
        Stores
    </x-slot> --}}
    @slot('title', 'Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <x-container>
        {{-- <div style="border: 1px solid red;" class="flex flex-wrap flex-4 gap-6 justify-center"> --}}
            <div class="grid grid-cols-4 gap-6">
                @foreach ($stores as $store)
                <x-card class="p-6">
                    <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                        class="px-6 size-fit rounded-lg">
                    <x-card.header>
                        <x-card.title class="size-fit font-bold text-balance">{{ $store->name }}
                        </x-card.title>
                        <x-card.description>
                            {{ $store->description }}
                        </x-card.description>
                        @auth
                        @if ($store->user_id === auth()->user()->id)
                        <a href="{{ route('stores.edit', $store->id) }}"
                            style="background-color: rgb(0, 174, 255); color: white"
                            class="rounded-md p-1 text-center mt-3">
                            Edit
                        </a>
                        @endif
                        @endauth
                    </x-card.header>
                </x-card>
                @endforeach
            </div>
    </x-container>
</x-app-layout>
