<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Codes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @forelse($qrCodes as $qrCode)
                    <div class="qr-code">
                        <img src="{{ asset($qrCode->path) }}" alt="" width="60" height="60">
                        <p class="string">{{ $qrCode->string }}</p>
                        <p class="size">{{ $qrCode->size }}</p>
                        <p class="color">{{ $qrCode->color }}</p>
                        <p class="background">{{ $qrCode->background }}</p>
                        <p class="background"><a href="{{ route('qrcode.destroy', $qrCode->id) }}">Remove</a></p>
                    </div>
                @empty
                    <div class="p-6 bg-white border-b border-gray-200 flex">You don't have any QR codes yet</div>
                @endforelse
            </div>
            <div style="margin-top: 30px"><a class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200" href="{{ route('qrcode.create') }}">Create new</a></div>
        </div>
    </div>
    <style>
        .qr-code {
            display: grid;
            grid-template-columns: 1fr 3fr 1fr 1fr 1fr 1fr;
            padding: 5px;
            align-items: center;
        }
    </style>
</x-app-layout>
