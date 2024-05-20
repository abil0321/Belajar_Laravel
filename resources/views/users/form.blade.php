<x-app-layout title="{{ $page_meta['title'] }}">
    <x-slot name="heading">
        {{ $page_meta['title'] }}
    </x-slot>
    {{-- <h1>Create user content</h1> --}}
    <br>
    <form action="{{ $page_meta['url'] }}" class="space-y-6" method="post">
        @method($page_meta['method'])
        @csrf
        {{-- @dump($errors) --}}
        <div class="">
            <label for="name">Name </label>
            <input type="text" value="{{ old('name', $user->name) }}" class="border px-4 py-2 rounded block mt-1"
                name="name" id="name">
            @error('name')
                <p class="text-red-500 text-sm-mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="email">Email </label>
            <input type="email" value="{{ old('email', $user->email) }}" class="border px-4 py-2 rounded block mt-1"
                name="email" id="email">
            @error('email')
                <p class="text-red-500 text-sm-mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="password">Password </label>
            <input type="password" class="border px-4 py-2 rounded block mt-1" name="password" id="password">
            @error('password')
                <p class="text-red-500 text-sm-mt-1">{{ $message }}</p>
            @enderror
        </div>

        <x-button>
            {{ $page_meta['submit_text'] }}
        </x-button>
    </form>
</x-app-layout>
