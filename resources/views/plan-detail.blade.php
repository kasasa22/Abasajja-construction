@extends('layouts.app')

@section('title', $plan['title'] ?? 'Plan Details' . ' — ABS Company')

@section('content')
@php
    // Dummy plan data for the specific ID if not passed from controller
    $plans = [
        1 => [
            'id' => 1,
            'title' => 'Modern Family Villa',
            'description' => 'A spacious 4-bedroom villa with open-plan living and large terraces.',
            'category' => 'Villa',
            'price' => 450.0,
            'beds' => 4,
            'baths' => 3,
            'sqm' => 240,
            'features' => ['Open plan living', 'Large terraces', 'Modern kitchen', 'Master suite'],
            'packages' => [
                'architectural' => ['price' => 450, 'includes' => ['Architectural drawings', '3D renders']],
                'full' => ['price' => 850, 'includes' => ['Architectural drawings', 'Structural drawings', 'MEP drawings', '3D renders']]
            ]
        ],
        // ... more plans could be here
    ];
    
    // Default to a fallback plan if ID not found in our dummy list
    $plan = $plans[$id] ?? [
        'id' => $id,
        'title' => 'Multipurpose building',
        'category' => 'Storeyed house',
        'description' => 'A modern, multipurpose building design crafted for flexibility, efficiency, and visual impact. Perfect for commercial, residential, or mixed-use projects that demand smart space planning and timeless appeal.',
        'features' => [
            '4 shops on the ground floor',
            '4 bedrooms on the first and second floor each',
            'Maximized natural lighting',
            'Cost efficient foundation design'
        ],
        'beds' => 8,
        'baths' => 8,
        'sqm' => 198,
        'price' => 286.0,
        'packages' => [
            'basic' => ['price' => 858, 'includes' => ['Approved architectural', 'structural and MEP drawings']],
            'structural' => ['price' => 280, 'includes' => ['Approved structural drawings']],
            'mep' => ['price' => 280, 'includes' => ['Approved MEP drawings']]
        ]
    ];

    // Same image map as plans.blade.php — keeps overview card & detail page in sync
    $planImages = [
        1 => 'house2.jpeg',
        2 => 'house3.jpeg',
        3 => 'house4.jpeg',
        4 => 'house5.jpeg',
        5 => 'house1.jpeg',
        6 => 'house6.jpeg',
    ];
    $mainImage   = asset('images/' . ($planImages[$id] ?? 'house' . ($id % 6 + 1) . '.jpeg'));
    $nextImage1  = asset('images/project' . (($id + 1) % 14 + 1) . '.jpeg');
    $nextImage2  = asset('images/project' . (($id + 2) % 14 + 1) . '.jpeg');
    $nextImage3  = asset('images/project' . (($id + 3) % 14 + 1) . '.jpeg');
@endphp

<main class="bg-gray-50 pb-32" x-data="{
    activeImage: 0,
    selectedPackage: Object.keys({{ json_encode($plan['packages'] ?? []) }})[0] || null,
    images: [
        '{{ $mainImage }}',
        '{{ $nextImage1 }}',
        '{{ $nextImage2 }}',
        '{{ $nextImage3 }}'
    ],
    packages: {{ json_encode($plan['packages'] ?? []) }},
    added: false,
    addToCart() {
        const pkg = this.selectedPackage ? this.packages[this.selectedPackage] : null;
        $store.cart.add({
            id: {{ $plan['id'] }},
            title: '{{ addslashes($plan['title']) }}',
            packageKey: this.selectedPackage || 'standard',
            packageName: (this.selectedPackage || 'standard').charAt(0).toUpperCase() + (this.selectedPackage || 'standard').slice(1) + ' Package',
            price: pkg ? pkg.price : {{ $plan['price'] }},
            sqm: {{ $plan['sqm'] }},
            beds: {{ $plan['beds'] }},
            baths: {{ $plan['baths'] }},
            image: this.images[0]
        });
        this.added = true;
        setTimeout(() => window.location.href = '{{ url('/cart') }}', 800);
    }
}">
    
    {{-- Top Info Bar --}}
    <div class="bg-secondary text-gray-400 py-4 text-sm font-semibold tracking-wide uppercase">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2">
            <a href="{{ url('/plans') }}" class="hover:text-white transition-colors">Catalogue</a>
            <span class="text-gray-600">/</span>
            <span class="text-white">{{ $plan['category'] }}</span>
            <span class="text-gray-600">/</span>
            <span class="text-primary-400">{{ $plan['title'] }}</span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
        <div class="grid lg:grid-cols-2 gap-16">
            
            {{-- Image Gallery (Sticky on Desktop) --}}
            <div class="lg:sticky lg:top-24 h-max">
                <div class="rounded-3xl overflow-hidden shadow-premium aspect-[4/3] bg-gray-200 mb-6 relative group border border-gray-100">
                    <img
                        :src="images[activeImage]"
                        alt="{{ $plan['title'] }}"
                        class="w-full h-full object-cover transition-all duration-700 ease-in-out transform group-hover:scale-105"
                    />
                    {{-- Navigation Arrows --}}
                    <div class="absolute inset-0 flex items-center justify-between p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button @click="activeImage = activeImage === 0 ? images.length - 1 : activeImage - 1" class="w-12 h-12 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center text-gray-900 shadow-lg hover:bg-white hover:scale-110 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button @click="activeImage = activeImage === images.length - 1 ? 0 : activeImage + 1" class="w-12 h-12 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center text-gray-900 shadow-lg hover:bg-white hover:scale-110 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Thumbnails --}}
                <div class="grid grid-cols-4 gap-4">
                    <template x-for="(img, idx) in images" :key="idx">
                        <button
                            @click="activeImage = idx"
                            class="rounded-xl overflow-hidden h-28 border-2 transition-all duration-300 relative group"
                            :class="activeImage === idx ? 'border-primary-600 ring-4 ring-primary-100 shadow-md' : 'border-transparent hover:border-primary-300 opacity-70 hover:opacity-100'"
                        >
                            <img :src="img" :alt="'Thumbnail ' + (idx + 1)" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-primary-900/10 group-hover:bg-transparent transition-colors"></div>
                        </button>
                    </template>
                </div>
            </div>

            {{-- Plan Details Content --}}
            <div class="lg:py-4">
                <div class="mb-6 flex items-center gap-4">
                    <span class="px-4 py-1.5 bg-primary-50 text-primary-700 text-xs font-bold rounded-full uppercase tracking-widest border border-primary-100">
                        {{ $plan['category'] }}
                    </span>
                    <span class="flex items-center text-sm font-bold text-gray-500 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                        Available Now
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">{{ $plan['title'] }}</h1>
                <p class="text-xl text-gray-600 mb-10 leading-relaxed font-light">{{ $plan['description'] }}</p>

                {{-- Key Stats Grid --}}
                <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-8 mb-12">
                    <h3 class="text-xs font-extrabold text-gray-400 uppercase tracking-widest mb-6">Master Specifications</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div>
                            <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest mb-2 mt-4"><svg class="w-4 h-4 mr-1.5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>Total Area</div>
                            <span class="text-2xl font-extrabold text-gray-900">{{ $plan['sqm'] }} <span class="text-sm font-medium text-gray-500">m²</span></span>
                        </div>
                        <div>
                            <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest mb-2 mt-4"><svg class="w-4 h-4 mr-1.5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Bedrooms</div>
                            <span class="text-2xl font-extrabold text-gray-900">{{ $plan['beds'] }}</span>
                        </div>
                        <div>
                            <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest mb-2 mt-4"><svg class="w-4 h-4 mr-1.5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>Bathrooms</div>
                            <span class="text-2xl font-extrabold text-gray-900">{{ $plan['baths'] }}</span>
                        </div>
                        <div>
                            <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest mb-2 mt-4"><svg class="w-4 h-4 mr-1.5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>Floors</div>
                            <span class="text-2xl font-extrabold text-gray-900">1</span>
                        </div>
                    </div>
                </div>

                <div class="mb-12">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-6">Key Features</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($plan['features'] ?? [] as $f)
                            <li class="flex items-start bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                                <span class="bg-primary-50 rounded-lg p-1 mr-3 mt-0.5"><svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg></span>
                                <span class="text-gray-700 font-medium">{{ $f }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Packages Section --}}
                @if(isset($plan['packages']) && count($plan['packages']) > 0)
                    <div class="mb-12">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-extrabold text-gray-900">Select Package</h3>
                            <a href="#" class="text-sm font-bold text-primary-600 hover:text-primary-700 underline underline-offset-4 decoration-primary-200">Compare packages</a>
                        </div>
                        <div class="space-y-4">
                            @foreach($plan['packages'] as $key => $pkg)
                                <label
                                    class="block relative bg-white border-2 rounded-2xl p-6 cursor-pointer transition-all duration-300"
                                    :class="selectedPackage === '{{ $key }}' ? 'border-primary-600 shadow-[0_0_20px_-5px_rgba(2,132,199,0.3)] bg-primary-50/10' : 'border-gray-100 hover:border-gray-300 hover:bg-gray-50'"
                                >
                                    <input type="radio" x-model="selectedPackage" value="{{ $key }}" class="sr-only">
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-colors"
                                                :class="selectedPackage === '{{ $key }}' ? 'border-primary-600 bg-white' : 'border-gray-300 bg-white'">
                                                <div class="w-3 h-3 rounded-full bg-primary-600 transform transition-transform"
                                                    :class="selectedPackage === '{{ $key }}' ? 'scale-100' : 'scale-0'"></div>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold text-gray-900 capitalize">{{ $key }} Package</h4>
                                                @if($key === 'basic') <span class="inline-block mt-1 px-2 py-0.5 bg-gray-900 text-white text-[10px] uppercase tracking-widest font-bold rounded">Most Popular</span> @endif
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-2xl font-extrabold text-primary-600 block leading-none mb-1">US$ {{ number_format($pkg['price'], 0) }}</span>
                                            <span class="text-xs text-gray-400 font-medium">One-time payment</span>
                                        </div>
                                    </div>
                                    <div class="pl-10">
                                        <ul class="text-sm text-gray-600 space-y-2 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                                            @foreach($pkg['includes'] ?? [] as $item)
                                                <li class="flex items-start">
                                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2.5 mt-1.5 flex-shrink-0"></span>
                                                    <span class="leading-snug">{{ $item }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="sticky bottom-4 z-40 flex flex-col sm:flex-row items-center justify-between gap-6 p-6 md:px-8 md:py-6 bg-secondary rounded-2xl md:rounded-[2rem] text-white shadow-premium mt-12 border border-white/10 backdrop-blur-xl">
                    <div class="w-full sm:w-auto text-left">
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1.5">Total Investment</div>
                        <div class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">
                            <span x-text="selectedPackage ? 'US$ ' + packages[selectedPackage].price.toLocaleString() : 'US$ {{ number_format($plan['price'], 0) }}'"></span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <a href="{{ url('/contact') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl font-bold transition-all text-center flex items-center justify-center">
                            Customize Plan
                        </a>
                        <button
                            @click="addToCart()"
                            :disabled="added"
                            class="px-8 py-4 rounded-xl font-bold transition-all transform active:scale-95 text-center flex items-center justify-center gap-2 disabled:opacity-75"
                            :class="added
                                ? 'bg-green-500 text-white shadow-[0_0_20px_-5px_rgba(34,197,94,0.5)]'
                                : 'bg-primary-600 hover:bg-primary-500 text-white shadow-[0_0_20px_-5px_rgba(2,132,199,0.5)] hover:-translate-y-1'"
                        >
                            <span x-text="added ? 'Added! Redirecting...' : 'Add to Cart'"></span>
                            <svg x-show="!added" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <svg x-show="added" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
