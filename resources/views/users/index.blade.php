<x-app-layout title="Users">
    <x-slot name="heading">
        Users
    </x-slot>
    <h1>Users Content</h1>
    @dump($people)

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>email</th>
                <th>created at</th>
                <th>created at</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($people as $index => $user) --}}
            @foreach ($people as $user)
                <tr>
                    {{-- <td>{{ ++$index }}</td> --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>{{ $user->created_at->diffForHumans() }} </td>
                    <td>{{ (new \Carbon\Carbon($user->created_at))->format('d M Y') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
