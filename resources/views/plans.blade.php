@extends('layouts.app')

@section('title', 'House Plans Catalogue — Abasajja Construction')
@section('meta_description', 'Browse our full catalogue of ready-made house plans. Filter by category, bedrooms, price, and size to find your perfect home design.')

@section('content')

@php
$allPlans = [
    [
        'id'          => 1,
        'title'       => 'Modern Family Villa',
        'description' => 'A spacious 4-bedroom villa with open-plan living, large terraces, and premium finishes.',
        'category'    => 'Villa',
        'price'       => 450,
        'beds'        => 4,
        'baths'       => 3,
        'sqm'         => 240,
        'image'       => asset('images/house2.jpeg'),
    ],
    [
        'id'          => 2,
        'title'       => 'Minimalist Bungalow',
        'description' => 'Compact and efficient 3-bedroom bungalow perfect for smaller plots and young families.',
        'category'    => 'Bungalow',
        'price'       => 280,
        'beds'        => 3,
        'baths'       => 2,
        'sqm'         => 120,
        'image'       => asset('images/house3.jpeg'),
    ],
    [
        'id'          => 3,
        'title'       => 'Contemporary Apartment',
        'description' => 'Stylish duplex design for multi-unit living with private balconies and shared amenities.',
        'category'    => 'Apartment',
        'price'       => 520,
        'beds'        => 2,
        'baths'       => 2,
        'sqm'         => 95,
        'image'       => asset('images/house4.jpeg'),
    ],
    [
        'id'          => 4,
        'title'       => 'Eco-Friendly Cottage',
        'description' => 'Sustainable 2-bedroom cottage using natural materials, solar-ready, and perfect for rural plots.',
        'category'    => 'Cottage',
        'price'       => 195,
        'beds'        => 2,
        'baths'       => 1,
        'sqm'         => 85,
        'image'       => asset('images/house5.jpeg'),
    ],
    [
        'id'          => 5,
        'title'       => 'Luxury Mansion',
        'description' => 'Grand 6-bedroom estate with a swimming pool, double garage, and expansive landscaped gardens.',
        'category'    => 'Mansion',
        'price'       => 1200,
        'beds'        => 6,
        'baths'       => 5,
        'sqm'         => 550,
        'image'       => asset('images/house1.jpeg'),
    ],
    [
        'id'          => 6,
        'title'       => 'Multipurpose Building',
        'description' => 'A modern storeyed building design crafted for flexibility, efficiency, and visual impact.',
        'category'    => 'Storeyed house',
        'price'       => 286,
        'beds'        => 8,
        'baths'       => 8,
        'sqm'         => 198,
        'image'       => asset('images/house6.jpeg'),
    ],
];
@endphp

<div
    x-data="{
        plans: {{ json_encode($allPlans) }},
        addedId: null,

        /* ── Filter State ─────────────────────────── */
        search:           '',
        selectedCategory: 'All',
        selectedBeds:     'Any',
        selectedPrice:    'Any',
        selectedSize:     'Any',
        filtersOpen:      false,

        /* ── Options ──────────────────────────────── */
        categories:   ['All', 'Villa', 'Bungalow', 'Apartment', 'Cottage', 'Mansion', 'Storeyed house'],
        bedsOptions:  ['Any', '2+', '3+', '4+', '6+'],
        priceOptions: ['Any', 'Under 300M', '300M – 600M', 'Above 600M'],
        sizeOptions:  ['Any', 'Under 100 m²', '100 – 250 m²', 'Above 250 m²'],

        /* ── Computed: filtered list ──────────────── */
        get filteredPlans() {
            return this.plans.filter(p => {
                const q = this.search.trim().toLowerCase();
                if (q && !p.title.toLowerCase().includes(q) && !p.description.toLowerCase().includes(q) && !p.category.toLowerCase().includes(q)) return false;
                if (this.selectedCategory !== 'All' && p.category !== this.selectedCategory) return false;
                if (this.selectedBeds === '2+' && p.beds < 2) return false;
                if (this.selectedBeds === '3+' && p.beds < 3) return false;
                if (this.selectedBeds === '4+' && p.beds < 4) return false;
                if (this.selectedBeds === '6+' && p.beds < 6) return false;
                if (this.selectedPrice === 'Under 300M'    && p.price >= 300)                      return false;
                if (this.selectedPrice === '300M – 600M'   && (p.price < 300 || p.price > 600))    return false;
                if (this.selectedPrice === 'Above 600M'    && p.price <= 600)                      return false;
                if (this.selectedSize  === 'Under 100 m²'  && p.sqm >= 100)                        return false;
                if (this.selectedSize  === '100 – 250 m²'  && (p.sqm < 100 || p.sqm > 250))        return false;
                if (this.selectedSize  === 'Above 250 m²'  && p.sqm <= 250)                        return false;
                return true;
            });
        },

        /* ── Computed: active filter count ─────────── */
        get activeCount() {
            let n = 0;
            if (this.selectedCategory !== 'All') n++;
            if (this.selectedBeds     !== 'Any') n++;
            if (this.selectedPrice    !== 'Any') n++;
            if (this.selectedSize     !== 'Any') n++;
            if (this.search.trim())              n++;
            return n;
        },

        resetAll() {
            this.search           = '';
            this.selectedCategory = 'All';
            this.selectedBeds     = 'Any';
            this.selectedPrice    = 'Any';
            this.selectedSize     = 'Any';
        },

        formatPrice(p) {
            return p >= 1000 ? (p / 1000).toFixed(1).replace(/\.0$/, '') + 'B' : p + 'M';
        }
    }"
>

    {{-- ══════════ Hero ══════════ --}}
    <section class="relative bg-secondary py-24 overflow-hidden" x-data="{ shown: false }" x-intersect="shown = true">
        <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary-900/40 z-10"></div>
        <div class="absolute inset-0 bg-cover bg-center z-0 opacity-20" style="background-image: url('{{ asset('images/project3.jpeg') }}')"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
            <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <p class="text-primary-400 text-sm font-bold tracking-[0.25em] uppercase mb-4">Our Catalogue</p>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                    Find Your Perfect <span class="text-primary-400">Home Plan</span>
                </h1>
                <p class="text-xl text-gray-300 font-light max-w-2xl mx-auto">
                    Browse our catalogue of ready-made plans. Filter by type, size, bedrooms, and budget to narrow down exactly what you need.
                </p>
            </div>
        </div>
    </section>

    {{-- ══════════ Filter Bar ══════════ --}}
    <div class="sticky top-16 z-40 bg-white/90 backdrop-blur-xl border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

            {{-- Top row: Search + Mobile toggle --}}
            <div class="flex items-center gap-3">

                {{-- Search --}}
                <div class="relative flex-1 max-w-md">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                    <input
                        id="plans-search"
                        x-model.debounce.300ms="search"
                        type="search"
                        placeholder="Search plans…"
                        class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gray-200 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:bg-white transition"
                    />
                </div>

                {{-- Results badge --}}
                <span class="hidden sm:flex items-center text-sm text-gray-500 whitespace-nowrap">
                    <span class="font-bold text-gray-800" x-text="filteredPlans.length"></span>&nbsp;plan<span x-show="filteredPlans.length !== 1">s</span>
                </span>

                {{-- Spacer --}}
                <div class="flex-1"></div>

                {{-- Reset (if any active) --}}
                <button
                    x-show="activeCount > 0"
                    x-transition
                    @click="resetAll()"
                    class="flex items-center gap-1.5 px-4 py-2.5 rounded-full bg-gray-100 hover:bg-red-50 text-gray-600 hover:text-red-600 text-sm font-medium transition-all"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Clear
                    <span class="w-5 h-5 rounded-full bg-primary-600 text-white text-[10px] font-bold flex items-center justify-center" x-text="activeCount"></span>
                </button>

                {{-- Mobile filter toggle --}}
                <button
                    @click="filtersOpen = !filtersOpen"
                    class="sm:hidden flex items-center gap-2 px-4 py-2.5 rounded-full border border-gray-200 bg-gray-50 text-sm font-medium text-gray-700"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M7 12h10M11 20h2"/>
                    </svg>
                    Filters
                    <span x-show="activeCount > 0" class="w-4 h-4 rounded-full bg-primary-600 text-white text-[9px] font-bold flex items-center justify-center" x-text="activeCount"></span>
                </button>
            </div>

            {{-- Filter rows (always visible on sm+, collapsible on mobile) --}}
            <div class="hidden sm:block mt-4 space-y-4" id="filter-panel">

                {{-- Category pills --}}
                <div class="flex flex-wrap gap-2">
                    <template x-for="cat in categories" :key="cat">
                        <button
                            @click="selectedCategory = cat"
                            :class="selectedCategory === cat
                                ? 'bg-primary-600 text-white shadow-[0_0_18px_-4px_rgba(2,132,199,0.55)] scale-105'
                                : 'bg-white text-gray-600 border border-gray-200 hover:border-primary-300 hover:text-primary-700'"
                            class="px-5 py-2 rounded-full text-sm font-semibold transition-all transform active:scale-95"
                            x-text="cat"
                        ></button>
                    </template>
                </div>

                {{-- Secondary filters --}}
                <div class="flex flex-wrap gap-3 items-center">

                    {{-- Bedrooms --}}
                    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full px-4 py-2">
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="text-xs text-gray-500 font-medium whitespace-nowrap">Beds</span>
                        <div class="flex gap-1">
                            <template x-for="opt in bedsOptions" :key="opt">
                                <button
                                    @click="selectedBeds = opt"
                                    :class="selectedBeds === opt ? 'bg-primary-600 text-white' : 'text-gray-600 hover:bg-gray-200'"
                                    class="px-2.5 py-0.5 rounded-full text-xs font-bold transition-all"
                                    x-text="opt"
                                ></button>
                            </template>
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full px-4 py-2">
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs text-gray-500 font-medium whitespace-nowrap">Budget</span>
                        <div class="flex gap-1">
                            <template x-for="opt in priceOptions" :key="opt">
                                <button
                                    @click="selectedPrice = opt"
                                    :class="selectedPrice === opt ? 'bg-primary-600 text-white' : 'text-gray-600 hover:bg-gray-200'"
                                    class="px-2.5 py-0.5 rounded-full text-xs font-bold transition-all whitespace-nowrap"
                                    x-text="opt"
                                ></button>
                            </template>
                        </div>
                    </div>

                    {{-- Size --}}
                    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full px-4 py-2">
                        <svg class="w-4 h-4 text-gray-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                        <span class="text-xs text-gray-500 font-medium whitespace-nowrap">Size</span>
                        <div class="flex gap-1">
                            <template x-for="opt in sizeOptions" :key="opt">
                                <button
                                    @click="selectedSize = opt"
                                    :class="selectedSize === opt ? 'bg-primary-600 text-white' : 'text-gray-600 hover:bg-gray-200'"
                                    class="px-2.5 py-0.5 rounded-full text-xs font-bold transition-all whitespace-nowrap"
                                    x-text="opt"
                                ></button>
                            </template>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Mobile collapsible filter panel --}}
            <div x-show="filtersOpen" x-transition class="sm:hidden mt-4 space-y-4 pb-1">
                {{-- Category pills --}}
                <div class="flex flex-wrap gap-2">
                    <template x-for="cat in categories" :key="cat">
                        <button
                            @click="selectedCategory = cat; filtersOpen = false"
                            :class="selectedCategory === cat
                                ? 'bg-primary-600 text-white'
                                : 'bg-white text-gray-600 border border-gray-200'"
                            class="px-4 py-1.5 rounded-full text-sm font-semibold transition-all"
                            x-text="cat"
                        ></button>
                    </template>
                </div>
                <div class="grid grid-cols-1 gap-3">
                    {{-- Beds mobile --}}
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1.5">Bedrooms</p>
                        <div class="flex gap-1.5 flex-wrap">
                            <template x-for="opt in bedsOptions" :key="opt">
                                <button
                                    @click="selectedBeds = opt"
                                    :class="selectedBeds === opt ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700'"
                                    class="px-4 py-1.5 rounded-full text-sm font-bold transition-all"
                                    x-text="opt"
                                ></button>
                            </template>
                        </div>
                    </div>
                    {{-- Price mobile --}}
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1.5">Budget</p>
                        <div class="flex gap-1.5 flex-wrap">
                            <template x-for="opt in priceOptions" :key="opt">
                                <button
                                    @click="selectedPrice = opt"
                                    :class="selectedPrice === opt ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700'"
                                    class="px-4 py-1.5 rounded-full text-sm font-bold transition-all"
                                    x-text="opt"
                                ></button>
                            </template>
                        </div>
                    </div>
                    {{-- Size mobile --}}
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1.5">Size</p>
                        <div class="flex gap-1.5 flex-wrap">
                            <template x-for="opt in sizeOptions" :key="opt">
                                <button
                                    @click="selectedSize = opt"
                                    :class="selectedSize === opt ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700'"
                                    class="px-4 py-1.5 rounded-full text-sm font-bold transition-all"
                                    x-text="opt"
                                ></button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ══════════ Grid ══════════ --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- Active filter chips (sm+) --}}
        <div class="hidden sm:flex flex-wrap items-center gap-2 mb-8" x-show="activeCount > 0" x-transition>
            <span class="text-xs text-gray-400 font-medium">Active filters:</span>
            <template x-if="selectedCategory !== 'All'">
                <span class="flex items-center gap-1 px-3 py-1 bg-primary-50 text-primary-700 border border-primary-200 rounded-full text-xs font-semibold">
                    <span x-text="selectedCategory"></span>
                    <button @click="selectedCategory='All'" class="ml-1 hover:text-red-500 transition">×</button>
                </span>
            </template>
            <template x-if="selectedBeds !== 'Any'">
                <span class="flex items-center gap-1 px-3 py-1 bg-primary-50 text-primary-700 border border-primary-200 rounded-full text-xs font-semibold">
                    <span x-text="selectedBeds + ' beds'"></span>
                    <button @click="selectedBeds='Any'" class="ml-1 hover:text-red-500 transition">×</button>
                </span>
            </template>
            <template x-if="selectedPrice !== 'Any'">
                <span class="flex items-center gap-1 px-3 py-1 bg-primary-50 text-primary-700 border border-primary-200 rounded-full text-xs font-semibold">
                    <span x-text="selectedPrice"></span>
                    <button @click="selectedPrice='Any'" class="ml-1 hover:text-red-500 transition">×</button>
                </span>
            </template>
            <template x-if="selectedSize !== 'Any'">
                <span class="flex items-center gap-1 px-3 py-1 bg-primary-50 text-primary-700 border border-primary-200 rounded-full text-xs font-semibold">
                    <span x-text="selectedSize"></span>
                    <button @click="selectedSize='Any'" class="ml-1 hover:text-red-500 transition">×</button>
                </span>
            </template>
            <template x-if="search.trim()">
                <span class="flex items-center gap-1 px-3 py-1 bg-primary-50 text-primary-700 border border-primary-200 rounded-full text-xs font-semibold">
                    "<span x-text="search"></span>"
                    <button @click="search=''" class="ml-1 hover:text-red-500 transition">×</button>
                </span>
            </template>
        </div>

        {{-- Plans Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="plan in filteredPlans" :key="plan.id">
                <div class="group relative rounded-[2rem] overflow-hidden bg-gray-900 border border-white/10 shadow-2xl h-auto aspect-[4/5] md:aspect-[3/4] transform hover:-translate-y-2 transition-all duration-500 will-change-transform">

                    {{-- Background image --}}
                    <img
                        :src="plan.image"
                        :alt="plan.title"
                        class="absolute inset-0 w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-[1.5s] ease-out opacity-80 group-hover:opacity-100"
                    />

                    {{-- Gradient overlays --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/30 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/90 to-transparent z-10 opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>

                    {{-- Category Badge --}}
                    <div class="absolute top-6 left-6 z-20">
                        <span class="px-4 py-1.5 bg-white/10 backdrop-blur-xl text-white text-[11px] font-extrabold tracking-[0.18em] uppercase rounded-full border border-white/20 shadow-xl" x-text="plan.category"></span>
                    </div>

                    {{-- Content --}}
                    <div class="absolute inset-x-0 bottom-0 p-6 z-20 flex flex-col justify-end">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 ease-out">
                            <h3 class="text-2xl font-bold text-white mb-2 leading-tight drop-shadow-md" x-text="plan.title"></h3>
                            <p class="text-gray-300 text-sm leading-relaxed line-clamp-2 mb-5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-75" x-text="plan.description"></p>

                            {{-- Stats & Price --}}
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 text-white/90 text-sm">
                                    {{-- Beds --}}
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span class="font-semibold" x-text="plan.beds"></span>
                                    </div>
                                    <div class="w-1 h-1 rounded-full bg-white/30"></div>
                                    {{-- Baths --}}
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                        </svg>
                                        <span class="font-semibold" x-text="plan.baths"></span>
                                    </div>
                                    <div class="w-1 h-1 rounded-full bg-white/30"></div>
                                    {{-- Size --}}
                                    <span class="font-semibold" x-text="plan.sqm + ' m²'"></span>
                                </div>

                                {{-- View details link (takes up left side of price row) --}}
                                <a :href="'/plans/' + plan.id"
                                   class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 text-white font-semibold text-xs hover:bg-white/20 transition-all z-40 relative">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Add to Cart button (z-40, above overlay) --}}
                    <button
                        @click.prevent.stop="
                            $store.cart.add({
                                id: plan.id,
                                title: plan.title,
                                packageKey: 'standard',
                                packageName: 'Standard Package',
                                price: plan.price,
                                sqm: plan.sqm,
                                beds: plan.beds,
                                baths: plan.baths,
                                image: plan.image
                            });
                            addedId = plan.id;
                            setTimeout(() => addedId = null, 2000)
                        "
                        class="absolute top-6 right-6 z-40 flex items-center gap-1.5 px-3.5 py-2 rounded-full text-xs font-bold transition-all duration-300 shadow-lg"
                        :class="addedId === plan.id
                            ? 'bg-green-500 text-white scale-105'
                            : 'bg-white/15 backdrop-blur-md border border-white/25 text-white hover:bg-primary-600 hover:border-primary-500'"
                    >
                        <svg x-show="addedId !== plan.id" class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <svg x-show="addedId === plan.id" class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span x-text="addedId === plan.id ? 'Added!' : plan.price + 'M'"></span>
                    </button>
                </div>
            </template>
        </div>

        {{-- Empty state --}}
        <div x-show="filteredPlans.length === 0" x-transition class="text-center py-24">
            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No plans match your filters</h3>
            <p class="text-gray-400 mb-6">Try adjusting your search or removing some filters.</p>
            <button @click="resetAll()" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-full font-semibold transition-all hover:-translate-y-0.5 shadow-lg">
                Clear all filters
            </button>
        </div>

    </div>

</div>
@endsection
