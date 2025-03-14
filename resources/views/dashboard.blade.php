<x-app-layout>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 overflow-y-scroll">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="background-color: red" class="p-6 bg-white border-b border-gray-200">
                    <livewire:chat />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
