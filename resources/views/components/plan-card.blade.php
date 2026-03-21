@props(['plan'])

@php
    // Map plan IDs to specific images
    $imageMap = [
        1 => 'house2.jpeg',
        2 => 'house3.jpeg',
        3 => 'house4.jpeg',
        4 => 'house5.jpeg',
        5 => 'house1.jpeg',
        6 => 'house6.jpeg',
        7 => 'residential1.jpeg',
        8 => 'church2.jpeg',
        9 => 'fountain1.jpeg',
        10 => 'landscaping.jpeg',
    ];
    $imageName = $imageMap[$plan['id']] ?? 'house' . (($plan['id'] % 6) + 1) . '.jpeg';
@endphp

<div class="relative group rounded-xl md:rounded-[2rem] overflow-hidden bg-gray-900 border border-white/10 shadow-2xl h-auto aspect-[4/5] md:aspect-[3/4] transform hover:-translate-y-2 transition-all duration-500 will-change-transform">
    {{-- Background Image --}}
    <img
        src="{{ asset('images/' . $imageName) }}"
        alt="{{ $plan['title'] }}"
        class="absolute inset-0 w-full h-full object-cover transform scale-100 group-hover:scale-110 transition-transform duration-[1.5s] ease-out opacity-80 group-hover:opacity-100"
    />
    
    {{-- Gradient Overlays --}}
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
    <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/90 to-transparent z-10 transition-opacity duration-500 opacity-80 group-hover:opacity-100"></div>

    {{-- Top Badges --}}
    <div class="absolute top-3 sm:top-4 md:top-6 px-3 sm:px-4 md:px-6 w-full flex justify-between items-start z-20">
        <span class="px-3 sm:px-4 md:px-5 py-1 sm:py-1.5 md:py-2 bg-white/10 backdrop-blur-xl text-white text-[9px] sm:text-[10px] md:text-[11px] font-extrabold tracking-[0.15em] sm:tracking-[0.2em] uppercase rounded-full shadow-2xl border border-white/20">
            {{ $plan['category'] }}
        </span>
        
        <div class="w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white transform translate-x-[150%] opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500 ease-out">
            <svg class="w-5 h-5 -rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
            </svg>
        </div>
    </div>

    {{-- Content --}}
    <div class="absolute inset-x-0 bottom-0 p-3 sm:p-4 md:p-6 z-20 flex flex-col justify-end h-full">
        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 ease-out">
            <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2 leading-tight tracking-tight drop-shadow-md">
                {{ $plan['title'] }}
            </h3>

            <p class="text-gray-300 text-xs sm:text-sm font-light leading-relaxed line-clamp-2 mb-3 sm:mb-4 md:mb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                {{ $plan['description'] }}
            </p>

            {{-- Stats & Price Bar --}}
            <div class="flex items-center justify-between mt-auto">
                <div class="flex items-center gap-4 text-white/90">
                    <div class="flex items-center gap-1.5" title="Bedrooms">
                        <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span class="font-semibold">{{ $plan['beds'] }}</span>
                    </div>
                    <div class="w-1 h-1 rounded-full bg-white/30"></div>
                    <div class="flex items-center gap-1.5" title="Bathrooms">
                        <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        <span class="font-semibold">{{ $plan['baths'] }}</span>
                    </div>
                     <div class="w-1 h-1 rounded-full bg-white/30"></div>
                     <div class="flex items-center gap-1.5" title="Area">
                         <span class="font-semibold">{{ $plan['sqm'] }} <span class="text-[10px] text-gray-400 uppercase">m²</span></span>
                     </div>
                </div>

                {{-- Price Tag --}}
                <div class="px-2 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 bg-primary-600/90 backdrop-blur-sm rounded-lg md:rounded-xl border border-primary-500 text-white text-xs sm:text-sm md:text-base font-extrabold shadow-[0_0_20px_rgba(2,132,199,0.4)]">
                    ${{ number_format($plan['price'], 0) }}
                </div>
            </div>
        </div>
    </div>
    
    {{-- Clickable Overlay --}}
    <a href="{{ url('/plans/' . $plan['id']) }}" class="absolute inset-0 z-30"><span class="sr-only">View {{ $plan['title'] }}</span></a>
</div>
