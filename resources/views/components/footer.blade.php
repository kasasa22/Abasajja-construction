<footer class="bg-secondary text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Navigation</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ url('/plans') }}" class="text-gray-300 hover:text-white transition-colors">Browse Plans</a></li>
                    <li><a href="{{ url('/blog') }}" class="text-gray-300 hover:text-white transition-colors">Blog & News</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Services</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/services') }}" class="text-gray-300 hover:text-white transition-colors">Custom Design</a></li>
                    <li><a href="{{ url('/services') }}" class="text-gray-300 hover:text-white transition-colors">Site Analysis</a></li>
                    <li><a href="{{ url('/projects') }}" class="text-gray-300 hover:text-white transition-colors">Our Portfolio</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white transition-colors">Consultations</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Contact</h3>
                <ul class="space-y-3 text-gray-300">
                    <li>Makerere, Kavule Basima building</li>
                    <li>Kampala, Uganda</li>
                    <li>+256 769 344073</li>
                    <li>abasajjagroupofcompanies@gmail.com</li>
                </ul>
            </div>

            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="h-8 w-8 bg-primary-500 rounded flex items-center justify-center font-bold text-white">ABS</div>
                    <span class="text-xl font-bold">ABS Company</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Designing affordable, climate-adapted homes for modern living. Your dream home starts here.
                </p>

                {{-- Newsletter Subscription --}}
                <div class="mb-6">
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-2">Subscribe to our newsletter</h4>
                    <form class="flex gap-2">
                        <input
                            type="email"
                            placeholder="Enter your email"
                            class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm flex-grow focus:outline-none focus:ring-2 focus:ring-primary-500"
                        />
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>

                {{-- Social Media Icons --}}
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/abasajja_constructioncompany" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.53c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-sm italic">
                &copy; {{ date('Y') }} ABS. All rights reserved. Designed by <a href="https://kasasalivingstonetrevor.me/" class="text-primary-400 hover:text-primary-300 transition-colors" target="_blank">Trevor</a>.
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
