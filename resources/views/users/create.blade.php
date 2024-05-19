<x-app-layout title="create user">
    <x-slot name="heading">
        Create User
    </x-slot>
    {{-- <h1>Create user content</h1> --}}
    <br>
    <form action="/users" class="space-y-6" method="post">
        @csrf
        {{-- @dump($errors) --}}
        <div class="">
            <label for="name">Name </label>
            <input type="text" class="border px-4 py-2 rounded block mt-1" name="name" id="name">
            @error('name')
                <p class="text-red-500 text-sm-mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="email">Email </label>
            <input type="email" class="border px-4 py-2 rounded block mt-1" name="email" id="email">
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
            Save
        </x-button>
    </form>
</x-app-layout>
