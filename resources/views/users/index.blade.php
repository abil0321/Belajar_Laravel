<x-app-layout>
    <x-slot name="heading">
        Users
    </x-slot>
    <h1>Users Content</h1>
    @foreach ($users as $user)
        <h1>{{ $user['name'] }}</h1>
        <p>{{ $user['email'] }}</p>
    @endforeach
</x-app-layout>
