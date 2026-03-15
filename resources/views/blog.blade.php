@extends('layouts.app')

@section('title', 'Architecture Blog & News — ABS Company')

@section('content')

@php
// Dummy data
$blogs = [
    [
        'id' => 1,
        'tag' => 'Sustainability',
        'date' => 'March 1, 2026',
        'read_time' => '5 min',
        'title' => 'Building Green: Eco-Friendly Materials for Your New Home',
        'summary' => 'Discover how renewable materials, solar integration, and high-performance insulation are shaping the future of net-zero and passive homes.',
        'image' => asset('images/house5.jpeg'),
        'featured' => true
    ],
    [
        'id' => 2,
        'tag' => 'Technology',
        'date' => 'February 15, 2026',
        'read_time' => '4 min',
        'title' => 'Beyond Automation: Integrating Advanced Smart Home Systems',
        'summary' => 'Smart homes are becoming the norm. Learn how integrating AI-driven predictive climate control and automated security nets transforms a house.',
        'image' => asset('images/house2.jpeg'),
        'featured' => false
    ],
    [
        'id' => 3,
        'tag' => 'Design Trends',
        'date' => 'January 20, 2026',
        'read_time' => '6 min',
        'title' => 'Bringing the Outdoors In: Essential Trends for Outdoor Living',
        'summary' => 'The boundaries between interior and exterior are fading. Explore how to maximize your property\'s footprint for year-round entertaining.',
        'image' => asset('images/house6.jpeg'),
        'featured' => false
    ],
    [
        'id' => 4,
        'tag' => 'Architecture',
        'date' => 'December 10, 2025',
        'read_time' => '5 min',
        'title' => 'Designing for Dynamic Living: Creating Multi-purpose Rooms',
        'summary' => 'With remote work on the rise, static rooms are a thing of the past. Learn how to design spaces with moving partitions and adaptable built-ins.',
        'image' => asset('images/house4.jpeg'),
        'featured' => false
    ],
    [
        'id' => 5,
        'tag' => 'Engineering',
        'date' => 'November 28, 2025',
        'read_time' => '7 min',
        'title' => 'Building Strong: Construction for Extreme Weather',
        'summary' => 'How resilient is your home? We dive into structural advancements, from impact-resistant glass to hurricane straps and raised foundations.',
        'image' => asset('images/house1.jpeg'),
        'featured' => false
    ]
];
@endphp

<main class="bg-[#F8F9FA] min-h-screen pb-24">
    
    {{-- Header Section (Clean, modern typography) --}}
    <div class="pt-28 pb-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto text-center" x-data="{ shown: false }" x-intersect="shown = true">
        <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''">
            <span class="text-primary-600 font-bold tracking-widest uppercase text-xs mb-4 block">Journal</span>
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 mb-6 tracking-tighter">
                Architecture <br/><span class="text-gray-400">&</span> Culture.
            </h1>
            <p class="text-lg md:text-xl text-gray-500 font-light max-w-2xl mx-auto">
                Perspectives on modern living, sustainable engineering, and the future of residential design.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Featured Article (Large, Magazine-style) --}}
        @foreach($blogs as $blog)
            @if($blog['featured'])
            <div class="group relative rounded-[2.5rem] overflow-hidden mb-16 shadow-2xl reveal-hidden delay-100 h-[450px] md:h-[600px] flex items-end" x-data="{ shown: false }" x-intersect="shown = true" :class="shown ? 'reveal-visible' : ''">
                
                {{-- Background Image --}}
                <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-[2s] ease-out">
                
                {{-- Elaborate Gradients --}}
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/50 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-transparent opacity-80"></div>
                
                {{-- Content --}}
                <div class="relative z-10 p-8 md:p-16 max-w-3xl transform group-hover:-translate-y-4 transition-transform duration-700 ease-out">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="px-4 py-1.5 bg-primary-600 text-white text-xs font-black uppercase tracking-widest rounded-full shadow-lg">
                            {{ $blog['tag'] }}
                        </span>
                        <span class="text-gray-300 text-sm font-medium">{{ $blog['read_time'] }} Read</span>
                    </div>
                    
                    <a href="{{ url('/blog/' . $blog['id']) }}" class="block">
                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight tracking-tight group-hover:text-primary-300 transition-colors">
                            {{ $blog['title'] }}
                        </h2>
                    </a>
                    
                    <p class="text-gray-300 text-lg font-light leading-relaxed mb-8 max-w-2xl opacity-90">
                        {{ $blog['summary'] }}
                    </p>

                    <div class="flex items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-600 border-2 border-white overflow-hidden">
                                <img src="{{ asset('images/logo1.jpeg') }}" class="w-full h-full object-cover" />
                            </div>
                            <div class="scale-90 origin-left">
                                <p class="text-white font-bold text-sm">ABS Editorial</p>
                                <p class="text-gray-400 text-xs">{{ $blog['date'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Hidden overlay link --}}
                <a href="{{ url('/blog/' . $blog['id']) }}" class="absolute inset-0 z-20"><span class="sr-only">Read featured article</span></a>
            </div>
            @endif
        @endforeach

        {{-- Masonry / Grid Layout for remaining articles --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-x-8 gap-y-16">
            @foreach($blogs as $index => $blog)
                @if(!$blog['featured'])
                
                {{-- Make the first non-featured take up more space (spans 8 cols), the rest span 4 or 6 --}}
                <article class="group @if($index == 1) lg:col-span-8 @elseif($index == 4) lg:col-span-8 @else lg:col-span-4 @endif flex flex-col h-full reveal-hidden" 
                         x-data="{ shown: false }" x-intersect.margin.-50px="shown = true" :class="shown ? 'reveal-visible' : ''"
                         style="transition-delay: {{ $index * 100 }}ms;">
                         
                    <a href="{{ url('/blog/' . $blog['id']) }}" class="block overflow-hidden rounded-[2rem] bg-gray-100 mb-6 relative aspect-video @if($index == 1 || $index == 4) md:aspect-[21/9] @endif">
                        <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1.5s] ease-in-out">
                        
                        {{-- Tag Bubble on image --}}
                        <div class="absolute top-5 left-5">
                            <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-gray-900 border border-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm">
                                {{ $blog['tag'] }}
                            </span>
                        </div>
                    </a>

                    <div class="flex flex-col flex-1 px-2">
                        <div class="flex items-center text-xs text-gray-400 font-semibold tracking-wider font-mono mb-3">
                            <time>{{ $blog['date'] }}</time>
                            <span class="mx-2">—</span>
                            <span>{{ $blog['read_time'] }} Read</span>
                        </div>
                        
                        <a href="{{ url('/blog/' . $blog['id']) }}" class="block group-hover:text-primary-600 transition-colors">
                            <h3 class="text-2xl @if($index == 1 || $index == 4) md:text-3xl @endif font-bold text-gray-900 mb-4 tracking-tight leading-snug">
                                {{ $blog['title'] }}
                            </h3>
                        </a>
                        
                        <p class="text-gray-500 mb-6 flex-1 line-clamp-3 leading-relaxed font-light text-[15px]">
                            {{ $blog['summary'] }}
                        </p>

                        <div class="mt-auto pt-6 border-t border-gray-200/60 hidden sm:flex items-center justify-between">
                             <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-gray-200 border border-white overflow-hidden">
                                     <img src="{{ asset('images/logo1.jpeg') }}" class="w-full h-full object-cover" />
                                </div>
                                <span class="text-gray-900 font-bold text-xs">ABS Editorial</span>
                             </div>
                             
                             <a href="{{ url('/blog/' . $blog['id']) }}" class="text-xs font-bold text-gray-400 group-hover:text-primary-600 uppercase tracking-widest flex items-center gap-1 transition-colors">
                                 Read <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                             </a>
                        </div>
                    </div>
                </article>

                @endif
            @endforeach
        </div>

    </div>
</main>
@endsection
