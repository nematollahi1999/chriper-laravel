<x-layout>
    <x-slot:title>
        Welcome to Chirper
    </x-slot:title>
    @forelse($chirps as $chirp)
    <div class="card bg-base-100 shadow mt-8">
        <div class="card-body">
            <div>
                <div class="font-bold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</div>
                <div class="mt-1">{{ $chirp->message }}</div>
                <div class="text-xs text-gray-500 mt-2">{{ $chirp->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>
    @empty
        <p class="text-center text-gray-500 mt-8">No chirps yet!</p>
    @endforelse
</x-layout>