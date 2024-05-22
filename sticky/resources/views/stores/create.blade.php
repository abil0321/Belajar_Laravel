<x-app-layout>
    {{-- <x-slot name="title">
        Stores
    </x-slot> --}}
    @slot('title', 'Create Store')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Store') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>Create New Store</x-card.title>
                <x-card.description>You can create up to 5 Stores</x-card.description>
            </x-card.header>
            <x-card.content>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis earum alias quo, dolorum debitis id
                similique consequatur saepe quidem iusto tempora beatae libero accusamus eligendi quis iure vel dolore
                minus.
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
