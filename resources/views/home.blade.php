<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mt-4">Latest Chirps</h1>
        <div class="card bg-base-100 shadow mt-8">
        <div class="card-body">
            <form method="POST" action="/chirps">
                @csrf
                <div class="form-control w-full">
                    <textarea name="message" placeholder="What's on your mind?" class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                    rows="4" maxlength="255">{{ old('message') }}</textarea>
                    @error('message')
                    <div class="label">
                        <p class="text-error label-text-alt text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <button type="submit" class="btn btn-primary btn-sm">
                    Chirp
                    </button>
                </div>
            </form>
        </div>
        </div>
        <div class="space-y-4 mt-8">
            @forelse($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <p class="text-center text-gray-500 mt-8">No chirps yet!</p>
            @endforelse
        </div>
    </div>
</x-layout>