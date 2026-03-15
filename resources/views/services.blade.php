@extends('layouts.app')

@section('title', 'Our Services — ABS Company')

@section('content')
<main class="bg-gray-50 min-h-screen pb-24" x-data="{ activeSection: 'pre-construction' }">
    
    {{-- Hero Banner --}}
    <section class="relative bg-secondary pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden" x-data="{ shown: false }" x-intersect="shown = true">
        <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary-900/40 z-10"></div>
        <div class="absolute inset-0 bg-cover bg-center z-0 opacity-20" style="background-image: url('{{ asset('images/project5.jpeg') }}')"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="max-w-4xl reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <p class="text-primary-400 font-bold tracking-[0.2em] uppercase text-xs mb-6">What We Do</p>
                <h1 class="text-5xl md:text-7xl font-black text-white mb-8 tracking-tighter leading-tight">
                    Expertise you can <br/><span class="text-gray-400">build upon.</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 leading-relaxed max-w-3xl font-light">
                    From initial architectural concepts to full-scale construction and post-construction management, we offer comprehensive services tailored to bring your vision to life.
                </p>
            </div>
        </div>
    </section>

    {{-- Main Content Area --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-30">
        
        <div class="flex flex-col lg:flex-row gap-16">
            
            {{-- Sticky Sidebar Navigation --}}
            <div class="hidden lg:block w-1/4">
                <div class="sticky top-32">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-8 border-b border-gray-200 pb-4">Services Index</h3>
                    <nav class="space-y-4">
                        <a href="#pre-construction" @click="activeSection = 'pre-construction'" 
                           :class="activeSection === 'pre-construction' ? 'text-primary-600 font-bold translate-x-3' : 'text-gray-500 hover:text-gray-900'"
                           class="flex items-center gap-4 text-sm font-medium transition-all duration-300">
                            <span class="text-xs font-mono opacity-50">01</span> Pre-Construction
                        </a>
                        <a href="#general-contracting" @click="activeSection = 'general-contracting'" 
                           :class="activeSection === 'general-contracting' ? 'text-primary-600 font-bold translate-x-3' : 'text-gray-500 hover:text-gray-900'"
                           class="flex items-center gap-4 text-sm font-medium transition-all duration-300">
                            <span class="text-xs font-mono opacity-50">02</span> General Contracting
                        </a>
                        <a href="#design-build" @click="activeSection = 'design-build'" 
                           :class="activeSection === 'design-build' ? 'text-primary-600 font-bold translate-x-3' : 'text-gray-500 hover:text-gray-900'"
                           class="flex items-center gap-4 text-sm font-medium transition-all duration-300">
                            <span class="text-xs font-mono opacity-50">03</span> Design-Build
                        </a>
                        <a href="#renovations" @click="activeSection = 'renovations'" 
                           :class="activeSection === 'renovations' ? 'text-primary-600 font-bold translate-x-3' : 'text-gray-500 hover:text-gray-900'"
                           class="flex items-center gap-4 text-sm font-medium transition-all duration-300">
                            <span class="text-xs font-mono opacity-50">04</span> Renovations
                        </a>
                        <a href="#management" @click="activeSection = 'management'" 
                           :class="activeSection === 'management' ? 'text-primary-600 font-bold translate-x-3' : 'text-gray-500 hover:text-gray-900'"
                           class="flex items-center gap-4 text-sm font-medium transition-all duration-300">
                            <span class="text-xs font-mono opacity-50">05</span> Management
                        </a>
                        <a href="#support" @click="activeSection = 'support'" 
                           :class="activeSection === 'support' ? 'text-primary-600 font-bold translate-x-3' : 'text-gray-500 hover:text-gray-900'"
                           class="flex items-center gap-4 text-sm font-medium transition-all duration-300">
                            <span class="text-xs font-mono opacity-50">06</span> Support
                        </a>
                    </nav>

                    {{-- CTA Box --}}
                    <div class="mt-16 bg-gray-900 rounded-3xl p-8 text-center relative overflow-hidden group">
                        <div class="absolute inset-0 bg-cover bg-center opacity-10 group-hover:opacity-20 transition-opacity duration-500" style="background-image: url('{{ asset('images/project6.jpeg') }}')"></div>
                        <h4 class="text-white font-bold text-lg mb-2 relative z-10">Start your project</h4>
                        <p class="text-gray-400 text-sm mb-6 relative z-10">Schedule a free consultation with our lead engineers today.</p>
                        <a href="/contact" class="inline-block bg-primary-600 text-white font-bold text-sm px-6 py-3 rounded-full hover:bg-white hover:text-gray-900 transition-colors relative z-10">Contact Us</a>
                    </div>
                </div>
            </div>

            {{-- Main Scrollable Services Area --}}
            <div class="w-full lg:w-3/4 space-y-32">
                
                {{-- 01: Pre-Construction --}}
                <div id="pre-construction" class="scroll-mt-32" x-intersect.half="activeSection = 'pre-construction'">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="md:w-1/2">
                            <span class="text-primary-600 font-bold text-sm tracking-widest uppercase mb-4 block">01 — Foundation</span>
                            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">Pre-Construction<br/>& Planning</h2>
                            <p class="text-gray-500 text-lg leading-relaxed font-light mb-8">
                                The foundation of every successful build. We conduct thorough site investigations, perform constructability reviews, manage budgets, process zoning permits, and generate highly accurate cost estimates before breaking ground.
                            </p>
                            
                            <ul class="space-y-4 mb-8">
                                <li class="flex items-start gap-3 border-b border-gray-200 pb-3">
                                    <svg class="w-6 h-6 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <div>
                                        <p class="font-bold text-gray-900">Budget Management</p>
                                        <p class="text-sm text-gray-500">Transparent forecasting and tracking.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3 border-b border-gray-200 pb-3">
                                    <svg class="w-6 h-6 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <div>
                                        <p class="font-bold text-gray-900">Logistics & Zoning</p>
                                        <p class="text-sm text-gray-500">Navigating local regulations effortlessly.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="md:w-1/2 w-full h-[400px] rounded-3xl overflow-hidden shadow-2xl relative">
                            <img src="{{ asset('images/project7.jpeg') }}" class="w-full h-full object-cover" alt="Pre-construction planning" />
                        </div>
                    </div>
                </div>

                {{-- 02: General Contracting --}}
                <div id="general-contracting" class="scroll-mt-32" x-intersect.half="activeSection = 'general-contracting'">
                    <div class="flex flex-col md:flex-row-reverse gap-8 items-start">
                        <div class="md:w-1/2">
                            <span class="text-primary-600 font-bold text-sm tracking-widest uppercase mb-4 block">02 — Execution</span>
                            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">General<br/>Contracting</h2>
                            <p class="text-gray-500 text-lg leading-relaxed font-light mb-8">
                                Taking holistic command of your project. We hire and manage specialized subcontractors, oversee supply chain logistics, ensure rigorous daily schedules, and adhere entirely to safety standards and local building codes.
                            </p>
                            
                            <ul class="space-y-4 mb-8">
                                <li class="flex items-start gap-3 border-b border-gray-200 pb-3">
                                    <svg class="w-6 h-6 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <div>
                                        <p class="font-bold text-gray-900">Subcontractor Management</p>
                                        <p class="text-sm text-gray-500">Vetting and supervising elite tradesmen.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3 border-b border-gray-200 pb-3">
                                    <svg class="w-6 h-6 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <div>
                                        <p class="font-bold text-gray-900">Timeline Coordination</p>
                                        <p class="text-sm text-gray-500">Keeping projects strictly on schedule.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="md:w-1/2 w-full h-[400px] rounded-3xl overflow-hidden shadow-2xl relative">
                            <img src="{{ asset('images/project8.jpeg') }}" class="w-full h-full object-cover" alt="General Contracting execution" />
                        </div>
                    </div>
                </div>

                {{-- 03: Design-Build --}}
                <div id="design-build" class="scroll-mt-32" x-intersect.half="activeSection = 'design-build'">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="md:w-1/2">
                            <span class="text-primary-600 font-bold text-sm tracking-widest uppercase mb-4 block">03 — Unity</span>
                            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">Design-Build<br/>Integration</h2>
                            <p class="text-gray-500 text-lg leading-relaxed font-light mb-8">
                                Streamline your journey with a singular, unified contract. We bring together developers, architects, and construction managers under one roof to accelerate design, lower costs, and ensure absolute alignment of vision.
                            </p>
                            <a href="/contact" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition uppercase tracking-widest text-sm border-b-2 border-primary-600 pb-1">
                                Discover our unified approach <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                        <div class="md:w-1/2 w-full h-[400px] rounded-3xl overflow-hidden shadow-2xl relative">
                            <img src="{{ asset('images/project9.jpeg') }}" class="w-full h-full object-cover" alt="Design-Build approach" />
                        </div>
                    </div>
                </div>

                {{-- 04: Renovations --}}
                <div id="renovations" class="scroll-mt-32" x-intersect.half="activeSection = 'renovations'">
                    <div class="p-10 md:p-16 bg-white border border-gray-100 rounded-[2.5rem] shadow-premium relative overflow-hidden group">
                        <div class="absolute right-0 top-0 w-1/2 h-full bg-primary-50 rounded-l-full transform translate-x-10 -translate-y-10 group-hover:scale-110 transition-transform duration-[2s] opacity-50 z-0"></div>
                        <div class="relative z-10 max-w-2xl">
                            <span class="text-primary-600 font-bold text-sm tracking-widest uppercase mb-4 block">04 — Transformation</span>
                            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">Luxury Renovations</h2>
                            <p class="text-gray-500 text-lg leading-relaxed font-light mb-8">
                                Transform existing spaces to meet modern standards of living. From complex historical townhouse expansions to high-end multi-family unit upgrades, we breathe new aesthetic and functional life into old properties.
                            </p>
                        </div>
                             <div class="relative z-10 grid grid-cols-3 gap-4 mt-8">
                                <div class="h-32 rounded-2xl overflow-hidden shadow-md"><img src="{{ asset('images/project10.jpeg') }}" class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition duration-500"></div>
                                <div class="h-32 rounded-2xl overflow-hidden shadow-md"><img src="{{ asset('images/project11.jpeg') }}" class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition duration-500"></div>
                                <div class="h-32 rounded-2xl overflow-hidden shadow-md"><img src="{{ asset('images/project12.jpeg') }}" class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition duration-500"></div>
                         </div>
                    </div>
                </div>

                {{-- 05: Construction Management --}}
                <div id="management" class="scroll-mt-32" x-intersect.half="activeSection = 'management'">
                    <div class="flex flex-col md:flex-row-reverse gap-8 items-start">
                        <div class="md:w-1/2">
                            <span class="text-primary-600 font-bold text-sm tracking-widest uppercase mb-4 block">05 — Oversight</span>
                            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">Construction<br/>Management</h2>
                            <p class="text-gray-500 text-lg leading-relaxed font-light mb-8">
                                Operating as your direct agent and advocate. We administer contracts, perform rigorous quality control, hold on-site coordination meetings, and provide transparent financial tracking to ensure the developer's peace of mind.
                            </p>
                            <div class="p-6 bg-gray-50 rounded-2xl border-l-4 border-primary-500">
                                <p class="text-gray-900 font-medium italic">"ABS took over the management phase and eliminated every logistical pain point we previously suffered. True professionals."</p>
                                <p class="text-sm text-gray-500 mt-2 font-bold uppercase tracking-wider">— Estate Developer</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 w-full h-[400px] rounded-3xl overflow-hidden shadow-2xl relative">
                            <img src="{{ asset('images/project13.jpeg') }}" class="w-full h-full object-cover" alt="Construction Management" />
                        </div>
                    </div>
                </div>

                {{-- 06: Post Construction --}}
                <div id="support" class="scroll-mt-32" x-intersect.half="activeSection = 'support'">
                    <div class="flex flex-col md:flex-row gap-8 items-center bg-gray-900 text-white rounded-[3rem] p-10 md:p-16 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('{{ asset('images/project14.jpeg') }}')"></div>
                        <div class="relative z-10 w-full text-center">
                            <span class="text-primary-500 font-bold text-sm tracking-widest uppercase mb-4 block">06 — Commitment</span>
                            <h2 class="text-4xl md:text-6xl font-black mb-6 tracking-tight leading-tight">Post-Construction Support</h2>
                            <p class="text-gray-400 text-lg md:text-xl leading-relaxed font-light mb-10 max-w-3xl mx-auto">
                                Our commitment stands tall after the ribbon is cut. We provide comprehensive warranty services, track maintenance requests, and monitor overall building performance to ensure long-term satisfaction and sustainability.
                            </p>
                            <a href="/contact" class="inline-block px-10 py-4 bg-primary-600 text-white font-bold rounded-full shadow-[0_0_20px_rgba(2,132,199,0.4)] hover:bg-primary-500 hover:-translate-y-1 transition-all">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>
@endsection
