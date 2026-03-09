@extends('layouts.app')

@section('title', 'Our Projects — ABS Company')

@section('content')
<main class="bg-gray-50 min-h-screen">
    {{-- Hero Banner --}}
    <section class="relative bg-secondary py-24 overflow-hidden" x-data="{ shown: false }" x-intersect="shown = true">
        <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary-900/80 z-10"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center z-0 opacity-40"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="max-w-3xl reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <h1 class="text-primary-400 font-bold tracking-widest uppercase text-sm mb-4">Our Portfolio</h1>
                <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-6 tracking-tight">Visions brought <br/>to life.</h2>
                <p class="text-xl text-gray-300 leading-relaxed max-w-2xl font-light">
                    Explore our completed construction processes and past custom home projects that define our commitment to quality, aesthetic excellence, and precision.
                </p>
            </div>
        </div>
    </section>

    {{-- Projects Portfolio --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 -mt-8 relative z-30 space-y-24">
        
        {{-- Project 1 --}}
        <div class="flex flex-col lg:flex-row gap-12 items-center bg-white p-6 md:p-10 rounded-[2.5rem] shadow-premium border border-gray-100 group">
            <div class="w-full lg:w-1/2 overflow-hidden rounded-3xl h-[400px]">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="The Havenwood Estate" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
            </div>
            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="w-8 h-[2px] bg-primary-500"></span>
                    <span class="text-primary-600 font-bold tracking-wider uppercase text-xs">New Custom Luxury Home</span>
                </div>
                <h3 class="text-3xl md:text-4xl font-black text-gray-900 mb-6 tracking-tight">The Havenwood Estate</h3>
                <p class="text-gray-600 mb-6 leading-relaxed text-lg font-light">
                    This project involved the complete design and construction of a sprawling 7,500 sq ft custom luxury residence nestled on a hillside lot. The aim was to create a contemporary farmhouse aesthetic with expansive outdoor living spaces.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Challenge</p>
                        <p class="text-sm font-medium text-gray-800">Sloped terrain requiring advanced tiered retaining wall systems.</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Highlight</p>
                        <p class="text-sm font-medium text-gray-800">Multi-level infinity pool and geothermal climate control.</p>
                    </div>
                </div>
                <div>
                   <span class="text-sm text-green-600 font-bold bg-green-50 px-3 py-1 rounded-md">✓ Delivered 5% under budget</span>
                </div>
            </div>
        </div>

        {{-- Project 2 --}}
        <div class="flex flex-col lg:flex-row-reverse gap-12 items-center bg-white p-6 md:p-10 rounded-[2.5rem] shadow-premium border border-gray-100 group">
            <div class="w-full lg:w-1/2 overflow-hidden rounded-3xl h-[400px]">
                <img src="https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="The Elm Street Revival" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
            </div>
            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="w-8 h-[2px] bg-primary-500"></span>
                    <span class="text-primary-600 font-bold tracking-wider uppercase text-xs">Full Renovation & Expansion</span>
                </div>
                <h3 class="text-3xl md:text-4xl font-black text-gray-900 mb-6 tracking-tight">The Elm Street Revival</h3>
                <p class="text-gray-600 mb-6 leading-relaxed text-lg font-light">
                    A comprehensive renovation and careful rear expansion to a historical townhouse. The goal was to modernize the living quarters, introduce open-concept dynamics, whilst gracefully preserving the structure's original 19th-century character.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Challenge</p>
                        <p class="text-sm font-medium text-gray-800">Strict historical preservation guidelines and tight urban logistics.</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Highlight</p>
                        <p class="text-sm font-medium text-gray-800">Restored original brickwork blending into modern rear glass facade.</p>
                    </div>
                </div>
                <div>
                    <span class="text-sm text-green-600 font-bold bg-green-50 px-3 py-1 rounded-md">✓ Recognition from Historical Society</span>
                </div>
            </div>
        </div>

        {{-- Project 3 --}}
        <div class="flex flex-col lg:flex-row gap-12 items-center bg-white p-6 md:p-10 rounded-[2.5rem] shadow-premium border border-gray-100 group">
            <div class="w-full lg:w-1/2 overflow-hidden rounded-3xl h-[400px]">
                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Grandview Multi-Family" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-[1.5s] ease-out">
            </div>
            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="w-8 h-[2px] bg-primary-500"></span>
                    <span class="text-primary-600 font-bold tracking-wider uppercase text-xs">Commercial / Multi-Family Upgrade</span>
                </div>
                <h3 class="text-3xl md:text-4xl font-black text-gray-900 mb-6 tracking-tight">The Grandview Complex</h3>
                <p class="text-gray-600 mb-6 leading-relaxed text-lg font-light">
                    Systematic renovation of 12 individual apartment units within an active multi-family building to vastly increase property value and tenant retention. We revitalized aesthetics focusing on kitchens, baths, and high-durability flooring.
                </p>
                 <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Challenge</p>
                        <p class="text-sm font-medium text-gray-800">Executing fast-turnaround phase renovations in a live, occupied environment.</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Highlight</p>
                        <p class="text-sm font-medium text-gray-800">Advanced noise containment and off-site pre-fabrication integration.</p>
                    </div>
                </div>
                 <div>
                    <span class="text-sm text-green-600 font-bold bg-green-50 px-3 py-1 rounded-md">✓ Increased property value by over 15%</span>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
