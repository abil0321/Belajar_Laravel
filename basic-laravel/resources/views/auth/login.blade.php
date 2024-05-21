<x-app-layout title="login">
    <x-slot name="heading">
        Login
    </x-slot>
    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="">
            <label for="email">Email </label>
            <input type="email" value="{{ old('email') }}" class="border px-4 py-2 rounded block mt-1" name="email"
                id="email">
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
            Login
        </x-button>

    </form>
</x-app-layout>
