@use('App\Enums\StoreStatus')

<x-app-layout>
    {{-- <x-slot name="title">
        List
    </x-slot> --}}
    @slot('title', 'List Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('List Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
            {{-- <x-card>
                <x-card.header>
                    <x-card.title>
                        {{ $store->name }}
                    </x-card.title>
                    <x-card.description>
                        Created at {{ $store->created_at->format('d f Y') }} by {{ $store->user->name }}
                    </x-card.description>
                </x-card.header>

                <x-card.content>
                    <section>
                        <p class="mb-6">
                            {{ $store->description }}
                        </p>

                        @if ($store->status === StoreStatus::PENDING)
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', `modal-{{ $store->id }}`)">
                            Approve
                        </x-primary-button>


                        <x-modal name="modal-{{ $store->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('stores.approve', $store) }}" class="p-6">
                                @csrf
                                @method('PUT')

                                <h2 class="text-lg font-medium text-zinc-900">
                                    {{ $store->name }}
                                </h2>
                                <p class="mt-1 text-sm text-zinc-600">
                                    {{ $store->description }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-primary-button class="ms-3">
                                        {{ __('Approved') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                        @endif
                    </section>

                </x-card.content>
            </x-card> --}}
            <x-stores.item :$store />
            @endforeach
        </div>
        <div class="my-5">
            {{ $stores->links() }}
        </div>
    </x-container>

</x-app-layout>