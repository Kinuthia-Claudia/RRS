<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex flex-wrap justify-center items-center">
            <div class="w-full md:w-2/5 p-4">
                <h2 class="text-4xl md:text-7xl font-semibold mb-5">GET IN TOUCH!</h2>
                <form action="{{ route('submit-contact-form') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" id="name" name="name" placeholder='Full Name' class="mt-1 p-4 w-full border rounded-md" required>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" placeholder='Email' class="mt-1 p-4 w-full border rounded-md" required>
                    </div>
                    <div>
                        <textarea id="message" name="message" placeholder='Message' class="mt-1 p-4 w-full border rounded-md" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="px-8 py-4 bg-black text-black hover:bg-green-700">Submit</button>
                </form>
            </div>
            <div class="w-full md:w-3/5 p-4 flex justify-center">
                <div class="rounded-lg overflow-hidden w-full h-full">
                    <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.672191246889!2d36.821946515869824!3d-1.2862166859968148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f182a3c3a2b21%3A0x4f69591e1ffedf3d!2sNairobi%2C%20Kenya!5e0!3m2!1sen!2sus!4v1652911199102"
                        allowFullScreen="" loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
