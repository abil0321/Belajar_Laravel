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
                <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-6">
                        <x-input-label class="sr-only" for="logo" :value="__('Logo')" />
                        <input id="logo" type="file" name="logo" required />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" required>
                            {{ old('description') }}
                        </x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <br>
                    <x-primary-button>
                        Create
                    </x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
