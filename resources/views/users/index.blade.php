<x-app-layout title="Users">
    <x-slot name="heading">
        Users
    </x-slot>
    {{-- @dump($people) --}}

    <div class="sm:flex sm:items-center">
        <x-section-title>
            <x-slot name="title">Users</x-slot>
            <x-slot name="description">A list of all the users in your account including their name,
                title,
                email and role.
            </x-slot>
        </x-section-title>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button as="a" href="/users/create" class="bg-red-500" type="button">
                Add user
            </x-button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>#</x-table.th>
                    <x-table.th>name</x-table.th>
                    <x-table.th>email</x-table.th>
                    <x-table.th>created at</x-table.th>
                    <x-table.th>at</x-table.th>
                    <x-table.th>created at</x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                {{-- @foreach ($people as $index => $user) --}}
                @foreach ($people as $user)
                    <tr>
                        {{-- <td>{{ ++$index }}</td> --}}
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $user->name }}</x-table.td>
                        <x-table.td>{{ $user->email }}</x-table.td>
                        <x-table.td>{{ $user->created_at->format('d M Y') }}</x-table.td>
                        <x-table.td>{{ $user->created_at->diffForHumans() }} </x-table.td>
                        <x-table.td>{{ (new \Carbon\Carbon($user->created_at))->format('d F Y') }}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </div>

</x-app-layout>
