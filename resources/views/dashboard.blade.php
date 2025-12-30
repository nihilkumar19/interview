<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                @auth
    <div class="mt-6">
        <div class="mt-4 flex gap-4">
    
    {{-- Create Item Button --}}
    <a href="{{ route('items.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Item
    </a>

    {{-- View Items Button --}}
    <a href="{{ route('user.items') }}"
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        View Items
    </a>

</div>


    </div>
@endauth

            </div>
        </div>
    </div>
</x-app-layout>
