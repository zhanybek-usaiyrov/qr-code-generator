<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create QR Code') }}
        </h2>
    </x-slot>

    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('qrcode.preview') }}">
                @csrf
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="string">
                        String
                    </label>

                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="string" type="text" name="string" required="required" autofocus="autofocus">
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="size">
                        Size
                    </label>

                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="size" type="number" min="100" max="1000" step="50" name="size" required="required">
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="color">
                        Color
                    </label>

                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="color" type="color" name="color" value="#000000" required="required">
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="background-color">
                        Background Color
                    </label>

                    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="background-color" type="color" name="background-color" value="#ffffff" required="required">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
