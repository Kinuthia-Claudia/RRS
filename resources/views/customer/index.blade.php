<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="text-align: center;">
                    <i class="fas fa-right-to-bracket fa-bounce" style="color: #5aa388; font-size: 48px;"></i>
                    <p style="font-size: 18px; margin-top: 10px;">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
