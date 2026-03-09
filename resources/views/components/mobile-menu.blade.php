<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" aria-label="menu" class="p-2 text-gray-700">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div
        x-show="open"
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 mt-2 w-48 bg-white shadow-premium rounded-xl py-2 z-[60] border border-gray-100"
    >
        <a href="{{ url('/') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">Home</a>
        <a href="{{ url('/about') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">About</a>
        <a href="{{ url('/services') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">Services</a>
        <a href="{{ url('/projects') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">Projects</a>
        <a href="{{ url('/plans') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">Plans</a>
        <a href="{{ url('/blog') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">Blog</a>
        <a href="{{ url('/contact') }}" class="block px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary-600">Contact</a>
        <div class="border-t border-gray-100 my-1"></div>
        <a href="{{ url('/contact') }}" class="block px-4 py-2.5 text-sm font-bold text-primary-600">Get a Quote</a>
    </div>
</div>
