<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
        style="background-image: url('https://cdn.pixabay.com/photo/2021/02/08/07/39/chef-5993951_960_720.jpg')">
        <h1
            class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Welcome To the Restaurant</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
           Where we blend tradition with a modern flair to deliver dishes that surprise and satisfy.
            From our kitchen to your table we promise to help yoy create a memorable dining experience.

        </div>
        <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
                @auth
                    <a href="{{ route('reservations.step.one') }}" type="button"
                        class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-900 focus:outline-none">
                        Reserve a spot
                    </a>
                @else
                    <button type="button"
                        class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-900 focus:outline-none"
                        onclick="showLoginRegisterModal()">
                        Reserve a spot
                    </button>
                @endauth
            </span>
        </div>
        <div id="loginRegisterModal"
        class="fixed top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-auto relative"> <!-- Added relative positioning -->
            <button type="button" onclick="closeLoginRegisterModal()"
                class="absolute top-0 right-0 -mt-4 -mr-4 text-gray-600 hover:text-gray-800 focus:outline-none"> <!-- Adjusted position to top-right corner -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold mb-6">Please register and log in to reserve a table</h2>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('login') }}"
                    class="inline-block px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full hover:bg-green-900 focus:outline-none">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="inline-block px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full hover:bg-green-900 focus:outline-none">
                    Register
                </a>
            </div>
        </div>
    </div>

    <script>
        function showLoginRegisterModal() {
            const modal = document.getElementById('loginRegisterModal');
            modal.classList.remove('hidden');
        }

        function closeLoginRegisterModal() {
            const modal = document.getElementById('loginRegisterModal');
            modal.classList.add('hidden');
        }
    </script>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                        <!-- <h1
              class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
            > -->
                        <h3 class="text-xl">About Us
                        </h3>
                        <h2 class="text-4xl text-green-600">What to expect</h2>
                        <!-- </h1> -->
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                            We're a global fusion adventure,
                            where East meets West and every bite takes you on a journey. Fresh, seasonal ingredients dance with bold
                            spices, creating a menu that's both innovative and comforting.
                             But it's not just the food. Our friendly staff is as passionate about exploration as our chefs.
                              They'll guide you through our menu, recommending dishes based on your preferences, and making sure
                               your experience is warm and welcoming.
                              The atmosphere reflects the spirit of our cuisine - a vibrant mix of cultures. Think warm lighting
                                , pops of color, and upbeat music that sets the mood for your culinary escape.  Join us at The Wandering Wok,
                                and explore the world on a plate, all wrapped in a friendly, unforgettable dining experience.

                        </p>
                        <div class="relative flex">
                            <a href="#_"
                                class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                        <img src="https://images.pexels.com/photos/3184192/pexels-photo-3184192.jpeg" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
            <div class="flex flex-wrap items-center -mx-3">
                <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                    <div class="w-full lg:max-w-md">

                        <h2
                            class="mb-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                            WHY CHOOSE US?</h2>

                        <ul>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                    </path>
                                </svg>
                                <span class="font-medium text-gray-500">Excellent ambiance</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium text-gray-500">High quality Dishes</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                                <span class="font-medium text-gray-500">World Class Chef and Waiting Staff</span>
                            </li>
                        </ul>
                    </div>
                </div>

        </div>
    </section>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold">Our Menu</h3>
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                TODAY'S SPECIALITY</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
                @forelse ($specials->menus ?? [] as $menu)
                    <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                        <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
                        <div class="px-6 py-4">
                            <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                {{ $menu->name }}</h4>
                            <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <span class="text-xl text-green-600">${{ $menu->price }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-700">No specials available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>


<section id="our-team" class="bg-gray-100 py-32">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-primary">Meet Our Team</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 my-6 text-center">
                <img src="https://images.pexels.com/photos/16712155/pexels-photo-16712155/free-photo-of-photo-of-a-chef-cooking-in-a-restaurant.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Team Member 1" class="w-full rounded-full mb-4">
                <h3 class="text-xl font-semibold mb-2">Juma Ali</h3>
                <p class="text-gray-700">Head Sous-Chef</p>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 my-6 text-center">
                <img src=https://images.pexels.com/photos/9399545/pexels-photo-9399545.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1 alt="Team Member 2" class="w-full rounded-full mb-4">
                <h3 class="text-xl font-semibold mb-2">Tiffany Mwangi</h3>
                <p class="text-gray-700">Head Pastry Chef</p>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 my-6 text-center">
                <img src=https://images.pexels.com/photos/3242558/pexels-photo-3242558.jpeg?auto=compress&cs=tinysrgb&w=600 alt="Team Member 3" class="w-full rounded-full mb-4">
                <h3 class="text-xl font-semibold mb-2">Mark Njane</h3>
                <p class="text-gray-700">Executive Chef</p>
            </div>

            <!-- Team Member 4 -->
            <div class="bg-white rounded-lg shadow-md p-6 my-6 text-center">
                <img src=https://img.freepik.com/premium-photo/midsection-man-preparing-food-kitchen_1048944-23362485.jpg alt="Team Member 4" class="w-full rounded-full mb-4">
                <h3 class="text-xl font-semibold mb-2">Peter Lee</h3>
                <p class="text-gray-700">Head Commis-Chef</p>
            </div>


        </div>
    </div>
</section>



    <section class="pt-4 pb-12 bg-gray-800">
        <div class="my-16 text-center">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                Testimonials </h2>
            <p class="text-xl text-white">Find out what others have to say</p>
        </div>
        <div class="grid gap-2 lg:grid-cols-3">
            <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
                <div class="flex justify-center -mt-16 md:justify-end">
                    <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                        src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800">"Great Food"</h2>
                    <p class="mt-2 text-gray-600">"I recently visited this restaurant with a group of friends, and we were all very pleased with our evening. The menu had a great variety of options, and the prices were reasonable for the quality of food we received. I ordered the chicken parmesan, and it was delicious, with a perfect blend of crispy and tender. The wine selection was impressive, and our server was knowledgeable and helped us choose a great bottle to complement our meals. The only downside was that the restaurant was quite busy, and we had to wait a bit longer for our food, but it was worth the wait. I will definitely be coming back!"</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-green-500">Bob Ross</a>
                </div>
            </div>
            <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
                <div class="flex justify-center -mt-16 md:justify-end">
                    <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                        src="https://cdn.pixabay.com/photo/2018/01/04/21/15/young-3061652__340.jpg">
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800">"Amazing ambience"</h2>
                    <p class="mt-2 text-gray-600">The ambiance was cozy yet elegant, making it perfect for a date night. We started with the bruschetta, which was fresh and flavorful, and the main courses were equally impressive. I had the seafood pasta, and it was cooked to perfection. My partner ordered the steak, and it was tender and juicy. We finished with the chocolate lava cake, which was divine. I highly recommend this place for anyone looking for a memorable dining experience!"</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-green-500">Ruth Ali</a>
                </div>
            </div>
            <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
                <div class="flex justify-center -mt-16 md:justify-end">
                    <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                        src="https://cdn.pixabay.com/photo/2018/01/18/17/48/purchase-3090818__340.jpg">
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800">"Friendly Service"</h2>
                    <p class="mt-2 text-gray-600">This restaurant is a hidden gem! I came here for a family celebration, and we couldn't have chosen a better place. The décor is charming, and the atmosphere is relaxed yet sophisticated. Our server was friendly and made excellent recommendations. I tried the chef's special, which was a mouth-watering lamb shank, and it exceeded my expectations. My family members were also very happy with their dishes, ranging from fresh salads to hearty pastas.</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-green-500">John Mwema</a>
                </div>

            </div>
        </div>
        <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
                <a  href="{{ route('testimonials.index') }}"    type="button"
                class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-900 focus:outline-none">
                    Read more reviews
                                </a>
        </div>
    </section>
</x-guest-layout>
