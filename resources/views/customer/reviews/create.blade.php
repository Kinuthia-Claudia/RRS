<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('customer.reviews.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to reviews</a>
            </div>
            <form method="POST" action="{{ route('customer.reviews.store') }}" class="space-y-6">
                @csrf


                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <div class="mt-1 flex items-center space-x-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}" class="hidden">
                            <label for="rating{{ $i }}" class="cursor-pointer">
                                <svg id="star-{{ $i }}" class="w-6 h-6 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                        @endfor
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const stars = document.querySelectorAll('[id^="star-"]');
                        const radios = document.querySelectorAll('[name="rating"]');

                        stars.forEach(star => {
                            star.addEventListener('click', function () {
                                const rating = this.id.split('-')[1];

                                // Update the radio buttons
                                radios.forEach(radio => {
                                    radio.checked = radio.value === rating;
                                });

                                // Update the star colors
                                stars.forEach(star => {
                                    const starRating = star.id.split('-')[1];
                                    star.classList.toggle('text-yellow-300', starRating <= rating);
                                    star.classList.toggle('text-gray-300', starRating > rating);
                                });
                            });
                        });
                    });
                </script>

                <style>
                    .text-yellow-300 {
                        color: #fcd34d;
                    }
                    .text-gray-300 {
                        color: #d1d5db;
                    }
                </style>



                <div>
                    <label for="heading" class="block text-sm font-medium text-gray-700">Heading</label>
                    <input id="heading" name="heading" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('heading') }}">
                </div>

                <div>
                    <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
                    <textarea id="comments" name="comments" rows="3" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('comments') }}</textarea>
                </div>

                <div class="mt-6 p-4">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Send</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
