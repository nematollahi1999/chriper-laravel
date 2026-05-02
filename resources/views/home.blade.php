<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mt-4">Latest Chirps</h1>

        <div class="space-y-4 mt-8">
            @forelse($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <p class="text-center text-gray-500 mt-8">No chirps yet!</p>
            @endforelse
        </div>
    </div>
</x-layout>