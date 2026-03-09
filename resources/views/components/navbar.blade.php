<header
    x-data="{ scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
    :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-premium py-2' : 'bg-transparent py-2 md:py-4'"
    class="fixed w-full z-50 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center space-x-2 sm:space-x-3 group">
                <div class="h-7 w-7 sm:h-10 sm:w-10 bg-primary-600 text-white rounded-lg flex items-center justify-center font-bold text-xl shadow-lg transition-transform group-hover:scale-105 overflow-hidden">
                    <img src="{{ asset('images/logo1.jpeg') }}" alt="ABS" class="h-full w-full object-cover" />
                </div>
                <div>
                    <div class="text-xs sm:text-xl font-bold tracking-tight transition-colors text-gray-900">
                        Abasajja Construction Company
                    </div>
                </div>
            </a>

            <nav class="hidden md:flex items-center space-x-8">
                @php
                    $navLinks = [
                        ['name' => 'Home', 'path' => '/'],
                        ['name' => 'About', 'path' => '/about'],
                        ['name' => 'Services', 'path' => '/services'],
                        ['name' => 'Projects', 'path' => '/projects'],
                        ['name' => 'Plans', 'path' => '/plans'],
                        ['name' => 'Blog', 'path' => '/blog'],
                        ['name' => 'Contact', 'path' => '/contact'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    <a
                        href="{{ url($link['path']) }}"
                        class="text-sm font-medium transition-colors hover:text-primary-600 {{ request()->is(trim($link['path'], '/')) ? 'text-primary-600' : 'text-gray-700' }}"
                    >
                        {{ $link['name'] }}
                    </a>
                @endforeach

                <a href="{{ url('/cart') }}" x-data class="relative p-2 text-gray-700 hover:text-primary-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span
                        x-show="$store.cart.count > 0"
                        x-text="$store.cart.count"
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[10px] font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-primary-600 rounded-full"
                        style="display:none"
                    ></span>
                </a>

                <a
                    href="{{ url('/contact') }}"
                    class="px-5 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-full shadow-lg hover:bg-primary-700 hover:shadow-xl transition-all transform hover:-translate-y-0.5"
                >
                    Get a Quote
                </a>
            </nav>

            <div class="md:hidden flex items-center gap-4">
                <a href="{{ url('/cart') }}" class="relative p-2 text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
                <x-mobile-menu />
            </div>
        </div>
    </div>
</header>
