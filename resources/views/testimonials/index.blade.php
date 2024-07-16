<x-guest-layout>
    <div style="display: flex; justify-content: center; align-items: center; height: 100px; background-color: #f0f0f0; border-bottom: 1px solid #ccc;">
        <h1 style="font-size: 2rem; color: #333; text-align: center;">Customer Feedback</h1>
    </div>


        <div class="mx-auto w-full max-w-7xl px-4 md:px-5 lg:px-6 grid grid-cols-12 gap-6">
            <!-- Average Rating Section (Left) -->
            <div class="col-span-4">
                <div class="grid min-h-[140px] place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                    <div class="flex items-center justify-center gap-2 font-bold text-blue-gray-500">
                        {{ $averageRating }}
                        <div class="inline-flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRating)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 text-yellow-700 cursor-pointer">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 text-gray-300 cursor-pointer">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-500">
                            Based on {{ $totalReviews }} Reviews
                        </p>
                    </div>
                </div>
            </div>

            <!-- Rating Breakdown Section (Right) -->
            <div class="col-span-8">
                <div class="mb-11 mx-auto max-w-screen-md">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($reviews as $review)
                        <div class="flex items-center mb-4 p-4 border border-gray-200 rounded-lg">
                            <div class="w-16 text-right">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star text-yellow-500"></i>
                                    @else
                                        <i class="far fa-star text-gray-300"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex mb-2 items-center justify-between">
                                    <div>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-200">
                                            {{ $review->rating }} Stars
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xs font-semibold inline-block text-gray-600">
                                            {{ $ratings[$review->rating] }} reviews
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                    <div style="width: {{ ($ratings[$review->rating] / $totalReviews) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-end items-center mb-4">
            <label for="sortTestimonials" class="mr-2">Sort by:</label>
            <select id="sortTestimonials" class="border rounded p-2">
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
                <option value="highest">Highest Rating</option>
                <option value="lowest">Lowest Rating</option>
            </select>
            <button id="sortButton" class="ml-2 p-2 bg-blue-500 text-white rounded">Sort</button>
        </div>


<!-- Actual Reviews -->
<div class="container mx-auto py-8" id="testimonialsContainer">
    @foreach($reviews as $review)
    <article class="bg-pastel-green dark:bg-gray-800 p-6 rounded-lg shadow-md mb-12 mx-auto max-w-3xl text-center">
        <div class="flex items-center justify-center mb-4">
            <div class="ml-4 font-medium dark:text-white">
                <!-- Add user profile picture or any other user-related info here if needed -->
            </div>
        </div>
        <div class="flex items-center justify-center mb-1 space-x-1 rtl:space-x-reverse">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $review->rating)
                    <svg class="w-5 h-5 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @else
                    <svg class="w-5 h-5 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endif
            @endfor
            <h3 class="ms-2 text-lg font-bold text-black">{{ $review->heading }}</h3>
        </div>
        <footer class="mb-5 text-sm font-bold text-black">
            <p>Reviewed by {{ $review->email }} on <time datetime="{{ $review->created_at }}">{{ $review->created_at->format('F j, Y') }}</time></p>
        </footer>
        <p class="mb-2 font-bold text-black">{{ $review->comments }}</p>

        <div class="flex justify-center space-x-4">
            <button class="thumbs-up text-gray-500 hover:text-green-500 focus:outline-none">
                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/>
                </svg>
            </button>

            <button class="thumbs-down text-gray-500 hover:text-red-500 focus:outline-none">
                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M323.8 477.2c-38.2 10.9-78.1-11.2-89-49.4l-5.7-20c-3.7-13-10.4-25-19.5-35l-51.3-56.4c-8.9-9.8-8.2-25 1.6-33.9s25-8.2 33.9 1.6l51.3 56.4c14.1 15.5 24.4 34 30.1 54.1l5.7 20c3.6 12.7 16.9 20.1 29.7 16.5s20.1-16.9 16.5-29.7l-5.7-20c-5.7-19.9-14.7-38.7-26.6-55.5c-5.2-7.3-5.8-16.9-1.7-24.9s12.3-13 21.3-13L448 288c8.8 0 16-7.2 16-16c0-6.8-4.3-12.7-10.4-15c-7.4-2.8-13-9-14.9-16.7s.1-15.8 5.3-21.7c2.5-2.8 4-6.5 4-10.6c0-7.8-5.6-14.3-13-15.7c-8.2-1.6-15.1-7.3-18-15.2s-1.6-16.7 3.6-23.3c2.1-2.7 3.4-6.1 3.4-9.9c0-6.7-4.2-12.6-10.2-14.9c-11.5-4.5-17.7-16.9-14.4-28.8c.4-1.3 .6-2.8 .6-4.3c0-8.8-7.2-16-16-16H286.5c-12.6 0-25 3.7-35.5 10.7l-61.7 41.1c-11 7.4-25.9 4.4-33.3-6.7s-4.4-25.9 6.7-33.3l61.7-41.1c18.4-12.3 40-18.8 62.1-18.8H384c34.7 0 62.9 27.6 64 62c14.6 11.7 24 29.7 24 50c0 4.5-.5 8.8-1.3 13c15.4 11.7 25.3 30.2 25.3 51c0 6.5-1 12.8-2.8 18.7C504.8 238.3 512 254.3 512 272c0 35.3-28.6 64-64 64l-92.3 0c4.7 10.4 8.7 21.2 11.8 32.2l5.7 20c10.9 38.2-11.2 78.1-49.4 89zM32 384c-17.7 0-32-14.3-32-32V128c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H32z"/>
                </svg>
            </button>
        </div>
    </article>
    @endforeach

    <!-- Pagination Links -->

        <div class="mt-4">
            {{ $reviewspage->links() }}
        </div>

</div>

<style>
    .bg-pastel-green {
        background: linear-gradient(to right, #85e8c4, #a2c5e2); /* Adjust as needed */
    }
    .thumbs-up svg {
        transition: fill 0.2s;
    }
    .thumbs-down svg {
        transition: fill 0.2s;
    }
    .thumbs-up.active svg {
        fill: green;
    }
    .thumbs-down.active svg {
        fill: red;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const thumbsUpButtons = document.querySelectorAll('.thumbs-up');
        const thumbsDownButtons = document.querySelectorAll('.thumbs-down');

        thumbsUpButtons.forEach(button => {
            button.addEventListener('click', function () {
                this.classList.toggle('active');
                const thumbsDown = this.nextElementSibling;
                if (thumbsDown.classList.contains('active')) {
                    thumbsDown.classList.remove('active');
                }
            });
        });

        thumbsDownButtons.forEach(button => {
            button.addEventListener('click', function () {
                this.classList.toggle('active');
                const thumbsUp = this.previousElementSibling;
                if (thumbsUp.classList.contains('active')) {
                    thumbsUp.classList.remove('active');
                }
            });
        });
    });
</script>
<script>
    document.getElementById('sortTestimonials').addEventListener('change', function() {
        let sortOption = this.value;

        fetch(`/api/sort-reviews?sort=${sortOption}`)
            .then(response => response.json())
            .then(data => {
                let testimonialsContainer = document.getElementById('testimonialsContainer');
                testimonialsContainer.innerHTML = '';

                data.reviews.forEach(review => {
                    let reviewHtml = `
                        <article class="bg-pastel-green dark:bg-gray-800 p-6 rounded-lg shadow-md mb-12 mx-auto max-w-3xl text-center">
                            <div class="flex items-center justify-center mb-4">
                                <div class="ml-4 font-medium dark:text-white">
                                    <!-- Add user profile picture or any other user-related info here if needed -->
                                </div>
                            </div>
                            <div class="flex items-center justify-center mb-1 space-x-1 rtl:space-x-reverse">
                                ${Array.from({ length: 5 }, (_, i) => i + 1).map(i => `
                                    <svg class="w-5 h-5 ${i <= review.rating ? 'text-yellow-300' : 'text-gray-300 dark:text-gray-500'}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                `).join('')}
                                <h3 class="ms-2 text-lg font-bold text-black">${review.heading}</h3>
                            </div>
                            <footer class="mb-5 text-sm font-bold text-black">
                                <p>Reviewed by ${review.email} on <time datetime="${review.created_at}">${new Date(review.created_at).toLocaleDateString()}</time></p>
                            </footer>
                            <p class="mb-2 font-bold text-black">${review.comments}</p>

                            <div class="flex justify-center space-x-4">
                                <button class="thumbs-up text-gray-500 hover:text-green-500 focus:outline-none">
                                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c20.3 13.5 41.9 20 64 20H384c34.7 0 62.9-27.6 64-61.9c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.3-7.3 18.5-23.3 18.5-40c0-35.3-28.6-64-64-64H297.7c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/>
                                    </svg>
                                </button>
                                <button class="thumbs-down text-gray-500 hover:text-red-500 focus:outline-none">
                                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M222.3 477.3c38.2 10.9 78.1-11.2 89-49.4l5.7-20c3.7-13 10.4-25 19.5-35l51.3-56.4c8.9-9.8 8.2-25-1.6-33.9s-25-8.2-33.9 1.6l-51.3 56.4c-14.1 15.5-24.4 34-30.1 54.1l-5.7 20c-3.6 12.7-16.9 20.1-29.7 16.5s-20.1-16.9-16.5-29.7l5.7-20c5.7-19.9 14.7-38.7 26.6-55.5c5.2-7.3 5.8-16.9 1.7-24.9s-12.3-13-21.3-13L64 288c-8.8 0-16-7.2-16-16c0-6.8 4.3-12.7 10.4-15c7.4-2.8 13-9 14.9-16.7s-.1-15.8-5.3-21.7c-2.5-2.8-4-6.5-4-10.6c0-7.8 5.6-14.3 13-15.7c8.2-1.6 15.1-7.3 18-15.2s1.6-16.7-3.6-23.3c-2.1-2.7-3.4-6.1-3.4-9.9c0-6.7 4.2-12.6 10.2-14.9c11.5-4.5 17.7-16.9 14.4-28.8c-.4-1.3-.6-2.8-.6-4.3c0-8.8 7.2-16 16-16H225.5c12.6 0 25 3.7 35.5 10.7l61.7 41.1c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3l-61.7-41.1C269.6 35.6 248 29.1 225.9 29.1H128C93.3 29.1 65.1 56.7 64 91.1c-14.6 11.7-24 29.7-24 50c0 4.5 .5 8.8 1.3 13c-15.4 11.7-25.3 30.2-25.3 51c0 6.5 1 12.8 2.8 18.7C7.2 238.3 0 254.3 0 272c0 35.3 28.6 64 64 64l92.3 0c-4.7 10.4-8.7 21.2-11.8 32.2l-5.7 20c-10.9 38.2 11.2 78.1 49.4 89zM480 320c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H416c-17.7 0-32 14.3-32 32V288c0 17.7 14.3 32 32 32H480z"/>
                                    </svg>
                                </button>
                            </div>
                        </article>
                    `;
                    testimonialsContainer.insertAdjacentHTML('beforeend', reviewHtml);
                });
            })
            .catch(error => console.error('Error:', error));
    });
    </script>



</x-guest-layout>
