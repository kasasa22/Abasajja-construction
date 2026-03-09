@extends('layouts.app')

@php
// Simulating fetching a blog by ID
$blogs = [
    1 => [
        'tag' => 'Sustainability',
        'date' => 'March 1, 2026',
        'read_time' => '5 min',
        'title' => 'Building Green: Eco-Friendly Materials for Your New Home',
        'content' => '<p>The construction industry is experiencing a massive shift. As climate change becomes a pressing reality, the demand for sustainable, energy-efficient homes has skyrocketed. Homeowners are no longer just looking at the aesthetic appeal of their houses; they are scrutinizing the carbon footprint.</p>
                      <h2>The Rise of Net-Zero Homes</h2>
                      <p>Net-zero homes—buildings that produce as much energy as they consume over a year—are moving from a niche market into the mainstream. This is achieved through a combination of ultra-efficient building envelopes, high-performance windows, and renewable energy systems like solar arrays.</p>
                      <img src="{{ asset(\'images/house2.jpeg\') }}" alt="Modern structure" class="rounded-3xl my-10 shadow-lg w-full" />
                      <h2>Innovative Green Materials</h2>
                      <p>Traditional concrete and steel have massive carbon footprints. To counter this, architects are turning to alternative materials:</p>
                      <ul>
                        <li><strong>Hempcrete:</strong> A bio-composite made of the inner woody core of the hemp plant mixed with a lime-based binder. It\'s breathable and carbon-negative.</li>
                        <li><strong>Cross-Laminated Timber (CLT):</strong> Super strong, fire-resistant engineered wood that can replace steel in multi-story buildings.</li>
                        <li><strong>Recycled Steel:</strong> Using recycled steel radically reduces the energy required in manufacturing.</li>
                      </ul>
                      <blockquote>
                        "Sustainability is no longer an optional add-on in architecture; it is the fundamental baseline from which all good design must originate." – ABS Engineering Team
                      </blockquote>
                      <p>By investing in these materials now, homeowners can severely reduce their lifetime energy costs, resulting in a home that pays for itself over its lifespan.</p>',
        'image' => asset('images/house5.jpeg'),
        'author' => 'ABS Editorial',
        'author_role' => 'Sustainable Design Team'
    ],
    // Dummy fallback for other IDs
];

$blog = $blogs[$id] ?? $blogs[1]; // fallback to 1 if not found
@endphp

@section('title', $blog['title'])

@section('content')
<main class="bg-white min-h-screen">
    
    {{-- Hero Image Section --}}
    <div class="w-full h-[60vh] md:h-[70vh] relative">
        <img src="{{ $blog['image'] }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
        <div class="absolute inset-x-0 bottom-0 p-8 md:p-16 max-w-5xl mx-auto z-10">
            <div class="flex flex-wrap items-center gap-4 mb-6 reveal-hidden" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)" :class="shown ? 'reveal-visible' : ''">
                <span class="px-3 py-1 bg-primary-600 text-white text-[11px] font-black uppercase tracking-widest rounded-full">
                    {{ $blog['tag'] }}
                </span>
                <span class="text-gray-300 text-sm font-medium">{{ $blog['read_time'] }} Read</span>
                <span class="text-gray-300 text-sm font-medium hidden sm:inline">•</span>
                <time class="text-gray-300 text-sm font-medium hidden sm:inline">{{ $blog['date'] }}</time>
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight reveal-hidden drop-shadow-lg" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 300)" :class="shown ? 'reveal-visible' : ''">
                {{ $blog['title'] }}
            </h1>
        </div>
    </div>

    {{-- Content Area --}}
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex flex-col lg:flex-row gap-16 relative">
        
        {{-- Share / Author sidebar (sticky on lg) --}}
        <div class="w-full lg:w-1/4">
            <div class="sticky top-32">
                <div class="mb-10 pb-10 border-b border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Written By</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 shadow-sm border border-gray-200 text-primary-600">
                             <img src="{{ asset('images/logo1.jpeg') }}" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">{{ $blog['author'] }}</p>
                            <p class="text-xs text-gray-500">{{ $blog['author_role'] }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Share Article</p>
                    <div class="flex gap-3">
                        <button class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-500 hover:text-primary-600 hover:border-primary-200 hover:bg-primary-50 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </button>
                        <button class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-500 hover:text-primary-600 hover:border-primary-200 hover:bg-primary-50 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Article Text --}}
        <div class="w-full lg:w-3/4">
            <article class="max-w-none text-gray-700
                            [&_h2]:text-3xl [&_h2]:font-extrabold [&_h2]:text-gray-900 [&_h2]:mt-12 [&_h2]:mb-6 [&_h2]:tracking-tight
                            [&_p]:text-gray-600 [&_p]:leading-loose [&_p]:mb-8 [&_p]:text-lg
                            [&_a]:text-primary-600 [&_a]:font-semibold [&_a]:no-underline hover:[&_a]:text-primary-700 hover:[&_a]:underline
                            [&_blockquote]:border-l-4 [&_blockquote]:border-primary-500 [&_blockquote]:bg-gray-50 [&_blockquote]:p-8 [&_blockquote]:text-xl [&_blockquote]:font-medium [&_blockquote]:italic [&_blockquote]:text-gray-900 [&_blockquote]:rounded-r-2xl [&_blockquote]:mb-8 [&_blockquote]:shadow-sm
                            [&_ul]:list-disc [&_ul]:ml-8 [&_ul]:text-gray-600 [&_ul]:mb-8
                            [&_li]:my-3 [&_li]:text-lg [&_li]:leading-relaxed
                            [&_strong]:font-bold [&_strong]:text-gray-900
                            [&_img]:w-full [&_img]:rounded-3xl [&_img]:shadow-2xl [&_img]:my-12">
                
                {!! $blog['content'] !!}
                
            </article>
            
            {{-- Navigation / Footer of article --}}
            <div class="mt-20 pt-10 border-t border-gray-200 flex justify-between items-center">
                <a href="{{ url('/blog') }}" class="inline-flex items-center text-gray-500 font-bold hover:text-primary-600 transition-colors uppercase text-sm tracking-wider">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Journal
                </a>
            </div>
        </div>
        
    </div>

</main>
@endsection
