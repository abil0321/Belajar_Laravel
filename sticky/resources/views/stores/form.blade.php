<x-app-layout>
    {{-- <x-slot name="title">
        Stores
    </x-slot> --}}
    @slot('title ', $meta_page['title'])

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $meta_page['title'] }}
        </h2>
    </x-slot>

    {{-- @dd($store) --}}

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>{{ $meta_page['title'] }}</x-card.title>
                <x-card.description>{{ $meta_page['description'] }}</x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ $meta_page['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                    @method($meta_page['method'])
                    @csrf
                    <div class="mb-6">
                        <x-input-label class="sr-only" for="logo" :value="__('Logo')" />
                        <input id="logo" type="file" name="logo" required />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $store->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" required>
                            {{ old('description', $store->description) }}
                        </x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <br>
                    <x-primary-button>
                        {{ $meta_page['text-btn'] }}
                    </x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
