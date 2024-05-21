<x-app-layout title="Users">
    <x-slot name="heading">
        {{ $user->name }}
    </x-slot>
    {{-- @dump($people) --}}

    <div class="sm:flex sm:items-center">
        <x-section-title>
            <x-slot name="title">{{ $user->email }}</x-slot>
            <x-slot name="description">Terima kasih selama {{ $user->created_at->diffForHumans() }} telah bersama kami.
            </x-slot>
        </x-section-title>
    </div>

    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @method('DELETE')
        @csrf
        <x-button type="submit" class="mt-5">
            Delete
        </x-button>
    </form>
</x-app-layout>
