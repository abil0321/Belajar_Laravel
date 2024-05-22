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
        <div style="border: 1px solid red;" class="flex flex-wrap gap-6">
            @foreach ($stores as $store)
                <x-card class="p-6" style="width: 25%">
                    <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}" class="px-7 rounded-lg"
                        class="size-16 rounded-lg">
                    <h2>{{ $store->name }}</h2>
                    <x-card.description>
                        {{ $store->description }}
                    </x-card.description>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
