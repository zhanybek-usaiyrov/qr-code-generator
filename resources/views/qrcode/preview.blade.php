<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Preview QR Code') }}
        </h2>
    </x-slot>

    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                {!!
                    QrCode::size($inputs['size'])
                        ->color($inputs['color-rgb'][0], $inputs['color-rgb'][1], $inputs['color-rgb'][2])
                        ->backgroundColor($inputs['background-color-rgb'][0], $inputs['background-color-rgb'][1], $inputs['background-color-rgb'][2])
                        ->generate($inputs['string'])
                !!}
            </div>
            <form method="POST" action="{{ route('qrcode.store') }}">
                @csrf
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="string" type="hidden" name="string" value="{{ $inputs['string'] }}" required="required" autofocus="autofocus">
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="size" type="hidden" min="100" max="1000" step="50" name="size" value="{{ $inputs['size'] }}" required="required">
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="color" type="hidden" name="color" value="{{ $inputs['color'] }}" required="required">
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="background-color" type="hidden" name="background-color" value="{{ $inputs['background-color'] }}" required="required">

                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
