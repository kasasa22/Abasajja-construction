<section class="py-24 bg-white border-t border-gray-100 overflow-hidden" x-data="{ shown: false }" x-intersect.margin.-50px="shown = true">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal-hidden" :class="shown ? 'reveal-visible' : ''">
            <div class="inline-flex items-center space-x-2 bg-gray-50 rounded-full px-4 py-2 border border-gray-100 mb-4">
                <span class="text-xs font-bold text-gray-500 tracking-widest uppercase">Global Network</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-900">Our Trusted Partners</h3>
        </div>

        <div class="relative reveal-hidden delay-200" :class="shown ? 'reveal-visible' : ''">
            {{-- Gradient Masks for sliding effect --}}
            <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>
            
            <div class="flex flex-wrap justify-center gap-12 md:gap-20 items-center transition-all duration-500">
                @php
                    $partners = [
                        ['name' => 'BuildCo', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                        ['name' => 'EcoMaterials', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                        ['name' => 'UrbanPlan', 'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7l6-3 5.447 2.724A1 1 0 0121 7.618v10.764a1 1 0 01-1.447.894L15 17l-6 3z'],
                        ['name' => 'TrustBank', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['name' => 'GreenEnergy', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ];
                @endphp

                @foreach($partners as $index => $p)
                    <div class="group flex items-center justify-center cursor-default transform hover:scale-110 transition-transform duration-300">
                        <div class="flex items-center gap-3 opacity-40 grayscale group-hover:opacity-100 group-hover:grayscale-0 transition-all duration-500">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $p['icon'] }}" />
                            </svg>
                            <span class="text-2xl font-black text-gray-900 tracking-tighter">{{ $p['name'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
