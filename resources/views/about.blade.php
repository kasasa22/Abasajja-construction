@extends('layouts.app')

@section('title', 'About Us — ABS Company')

@section('content')
<main class="bg-gray-50 min-h-screen pb-32">
    
    {{-- Hero Section (Minimalist & Editorial) --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 lg:pt-48 lg:pb-24" x-data="{ shown: false }" x-intersect="shown = true">
        <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''">
            <span class="text-primary-600 font-bold tracking-[0.2em] uppercase text-xs mb-6 block">Established Heritage</span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-gray-900 mb-8 tracking-tighter leading-[0.9]">
                Architects of <br/>
                <span class="text-gray-400 font-light italic">tomorrow's</span> legacy.
            </h1>
            <div class="w-24 h-1 bg-primary-600 mb-8"></div>
            <p class="text-xl md:text-2xl text-gray-500 leading-relaxed max-w-3xl font-light">
                We are a collective of visionary engineers, designers, and master builders dedicated to creating spaces that elevate the human experience.
            </p>
        </div>
    </section>

    {{-- Cinematic Image --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="w-full h-[60vh] md:h-[80vh] relative overflow-hidden group rounded-[3rem] shadow-2xl mb-8">
            <div class="absolute inset-0 bg-gray-900/10 z-10"></div>
            <img src="{{ asset('images/project10.jpeg') }}" 
                 alt="ABS Architecture Studio" 
                 class="w-full h-full object-cover transform scale-100 group-hover:scale-105 transition-transform duration-[3s] ease-out origin-bottom">
        </div>
    </section>

    {{-- The Story & Stats --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 relative z-20 -mt-24 md:-mt-32">
        <div class="flex flex-col lg:flex-row gap-0 lg:gap-8 items-stretch">
            
            {{-- Story Block --}}
            <div class="lg:w-7/12 bg-white p-10 md:p-16 rounded-[2.5rem] shadow-premium border border-gray-100" x-data="{ shown: false }" x-intersect.half="shown = true">
                <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                    <span class="text-gray-400 font-bold text-xs tracking-widest uppercase mb-4 block">Our Origin</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 tracking-tight">Designing affordable, climate-aware masterpieces for the modern world.</h2>
                    <div class="prose prose-lg prose-gray max-w-none prose-p:font-light prose-p:leading-loose">
                        <p>
                            Founded on the belief that world-class design should not be an exclusive luxury, ABS Company has rapidly evolved into a premiere architectural and civil engineering powerhouse. We design highly adaptive house plans tailored specifically for diverse geographic climates and localized building methods.
                        </p>
                        <p>
                            We prioritize extreme buildability and cost-effectiveness. By intricately blending cutting-edge sustainable materials with timeless aesthetic principles, we ensure maximum daylight, natural cross-ventilation, and structural superiority in every physical blueprint we stamp.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Decorative Connector --}}
            <div class="hidden lg:flex flex-col items-center justify-center px-2 gap-3 relative">
                <div class="w-px flex-1 bg-gradient-to-b from-transparent via-primary-300 to-transparent"></div>
                <div class="w-10 h-10 rounded-full border-2 border-primary-400 bg-white flex items-center justify-center shadow-lg shrink-0 z-10">
                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div class="w-px flex-1 bg-gradient-to-b from-transparent via-primary-300 to-transparent"></div>
            </div>

            {{-- Stats Block --}}
            <div class="lg:w-5/12 flex flex-col justify-between gap-6" x-data="{ shown: false }" x-intersect.half="shown = true">
                <div class="reveal-hidden delay-100 bg-gray-900 text-white p-10 rounded-[2.5rem] flex-1 flex flex-col justify-center relative overflow-hidden group" :class="shown ? 'reveal-visible' : ''">
                    <div class="absolute inset-0 bg-cover bg-center opacity-5 group-hover:opacity-20 transition-opacity duration-1000" style="background-image: url('{{ asset('images/project2.jpeg') }}')"></div>
                    <div class="relative z-10 text-center">
                        <span class="block text-6xl md:text-7xl font-black text-primary-500 mb-2">150<span class="text-3xl">+</span></span>
                        <span class="uppercase tracking-widest text-xs font-bold text-gray-400">Projects Delivered</span>
                    </div>
                </div>
                
                <div class="reveal-hidden delay-200 bg-primary-600 text-white p-10 rounded-[2.5rem] flex-1 flex flex-col justify-center" :class="shown ? 'reveal-visible' : ''">
                    <div class="text-center">
                        <span class="block text-6xl md:text-7xl font-black mb-2 text-white">12</span>
                        <span class="uppercase tracking-widest text-xs font-bold text-primary-200">Industry Awards</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    {{-- Mission Callout --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ shown: false }" x-intersect.half="shown = true">
        <div class="bg-gray-100 rounded-[3rem] p-10 md:p-20 text-center reveal-hidden" :class="shown ? 'reveal-visible' : ''">
            <svg class="w-12 h-12 text-primary-400 mx-auto mb-8 opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.714 4.026-6.695 4.993-6.799v-2.81c-2.527.106-5.111.758-7.01 2.373-1.899-1.615-4.483-2.267-7.01-2.373v2.81c.967.104 4.993 1.085 4.993 6.799v7.391h4.034zm-9.017-7.391c0-4.665-2.008-5.322-3-5.45v-2.159c2.083.084 3.934.542 5.438 1.408-.517 1.309-.76 2.955-.76 4.81v3.39h-1.678zm14.331-4.041c-.992.128-3 .785-3 5.45v3.391h-1.678v-3.39c0-1.856-.243-3.502-.76-4.81 1.504-.866 3.355-1.324 5.438-1.408v2.167z"/></svg>
            <h3 class="text-2xl md:text-4xl font-light text-gray-900 leading-snug max-w-4xl mx-auto">
                "We are a highly dedicated unit of elite architects, civil engineers, and master draughtsmen. We unite to deliver architectural masterpieces that stand the absolute test of time."
            </h3>
            <p class="mt-8 text-sm font-bold tracking-widest uppercase text-gray-400">The ABS Mission</p>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-24 bg-gray-50" x-data="{ shown: false }" x-intersect="shown = true">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <div>
                    <span class="text-primary-600 font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Leadership & Talent</span>
                    <h2 class="text-4xl md:text-6xl font-black text-gray-900 tracking-tight">Meet the Minds<span class="text-primary-600">.</span></h2>
                </div>
                <div class="mt-6 md:mt-0 text-gray-500 max-w-sm font-light">
                    Our multi-disciplinary team combines decades of global commercial and residential engineering experience.
                </div>
            </div>

            @php
                $members = [
                    ['name' => 'Mawanda Alex', 'role' => 'Civil Engineer & CEO', 'image' => asset('images/mawanda.jpeg')],
                    ['name' => 'Bigabwamukama Grim', 'role' => 'Civil Engineer & CEO', 'image' => asset('images/grim.jpeg')],
                    ['name' => 'Kananura Saul', 'role' => 'Project Manager', 'image' => asset('images/saul.jpeg')],
                    ['name' => 'Lee Gideon Alani', 'role' => 'Interior Designer', 'image' => asset('images/bus.jpeg')],
                    ['name' => 'Busulwa A', 'role' => 'Landscape Architect', 'image' => asset('images/lee.jpeg')],
                    ['name' => 'John D', 'role' => 'Draughtsman', 'image' => asset('images/jd.jpeg')],
                ];
                // Fallback hero + background images from real project photos
                $projectPhotos = array_map(fn($n) => asset("images/project{$n}.jpeg"), range(1, 14));
            @endphp

            {{-- Asymmetrical / Elegant Team Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16 mt-16">
                @foreach($members as $index => $member)
                    <div class="group relative reveal-hidden" 
                         :class="shown ? 'reveal-visible' : ''" 
                         style="transition-delay: {{ $index * 100 }}ms">
                         
                        <div class="relative overflow-hidden rounded-3xl aspect-square md:aspect-[4/5] bg-gray-100 mb-6">
                            {{-- Geometric overlay on hover --}}
                            <div class="absolute inset-0 bg-primary-900/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 mix-blend-multiply"></div>
                            
                            <img
                                src="{{ $member['image'] }}"
                                alt="{{ $member['name'] }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-700 ease-in-out"
                                onerror="this.onerror=null; this.src='{{ asset('images/project' . ($loop->index % 14 + 1) . '.jpeg') }}';"
                            />
                        </div>
                        
                        <div class="pl-2 border-l-2 border-transparent group-hover:border-primary-500 transition-colors duration-300">
                            <h3 class="text-2xl font-black text-gray-900 mb-1 group-hover:text-primary-600 transition-colors">{{ $member['name'] }}</h3>
                            <p class="text-gray-500 font-medium tracking-wide text-sm">{{ $member['role'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</main>
@endsection
